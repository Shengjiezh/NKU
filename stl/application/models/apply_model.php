<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class apply_model extends CI_model {
	function __construct() {
		parent::__construct();
	}
	
	function get_info($account_id,$type,$activity_id=-1){
		if($type==0){
			$temp=$this->db->query("select * from apply where account_id=$account_id and type=0")->row_array();
		}
		else{
			$temp=$this->db->query("select * from apply where account_id=$account_id and type=$type and activity_id=$activity_id")->row_array();
		}
		return $temp;
	}
	
	function get_apply($status,$type,$college_id=-1){
		if($status==0){
			$temp=$this->db->query("select * from apply where status=0 and type=$type and account_id in(select id from account where info_id in(select id from league_info where college_id=$college_id))")->result_array();
		}else{
			$temp=$this->db->query("select * from apply where status=$status and type=$type")->result_array();
		}
		for($i=0;$i<count($temp);$i++){
			$temp[$i]['league']=$this->db->query("select * from account where id=".$temp[$i]['account_id']." limit 1")->row_array();
			$temp[$i]['league_info']=$this->db->query("select * from league_info where id=".$temp[$i]['league']['info_id']." limit 1")->row_array();
			$temp2=$this->db->query("select name from college_info where id=".$temp[$i]['league_info']['college_id']." limit 1")->row_array();
			$temp[$i]['league_info']['college']=$temp2['name'];
			switch($type){
				case 1:
					$temp[$i]['activity']=$this->db->query("select * from activity_benbu where id=".$temp[$i]['activity_id'])->row_array();
					break;
				case 2:
					$temp[$i]['activity']=$this->db->query("select * from activity_xiaoqu where id=".$temp[$i]['activity_id'])->row_array();
					break;
				case 3:
					$temp[$i]['activity']=$this->db->query("select * from activity_daxing where id=".$temp[$i]['activity_id'])->row_array();
					break;
			}
		}
		return $temp;
	}
	
	function next_step($ids,$opinion){
		$opinion=$this->db->escape($opinion);
		$ids=explode(',',$ids);
		for($i=0;$i<count($ids)-1;$i++){
			$apply_id=$ids[$i];
			$temp=$this->db->query("select * from apply where id=$apply_id limit 1")->row_array();
			switch ($temp['status']) {
				case 0:
					$this->db->query("update apply set status=1,opinion_college=$opinion where id=$apply_id");
					break;
				case 1:
					$this->db->query("update apply set status=2,opinion_stl=$opinion where id=$apply_id");
					break;
				case 2:
					$this->db->query("update apply set status=3,opinion_xtw=$opinion where id=$apply_id");
					switch($temp['type']){
						case 0:
							$temp2=$this->db->query("select info_id from account where id=".$temp['account_id'])->row_array();
							$this->db->query("update league_info set status=2 where id=".$temp2['info_id']);
							break;
						case 1:
							$this->db->query("update activity_benbu set status=1 where id=".$temp['activity_id']);
							break;
						case 2:
							$this->db->query("update activity_xiaoqu set status=1 where id=".$temp['activity_id']);
							break;
						case 3:
							$this->db->query("update activity_daxing set status=1 where id=".$temp['activity_id']);
							break;
					}
					break;
			}
		}
		return true;
	}
}
