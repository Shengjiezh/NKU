<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class activity_model extends CI_model {
	function __construct() {
		parent::__construct();
	}
	
	function get_info($id,$type) {
		switch($type){
			case 0:
				$temp=$this->db->query("select * from activity_benbu where id=$id limit 1")->row_array();
				break;
			case 1:
				$temp=$this->db->query("select * from activity_xiaoqu where id=$id limit 1")->row_array();
				break;
			case 2:
				$temp=$this->db->query("select * from activity_large where id=$id limit 1")->row_array();
				break;
		}
		return $temp;
	}
	
	function benbu($account_id,$theme,$host_high,$host_low,$time,$location,$chief,$chief_phone,$money_from,$scale,$needs,$intro,$hengfu,$haibao,$date){
		$theme=$this->db->escape($theme);
		$host_high=$this->db->escape($host_high);
		$host_low=$this->db->escape($host_low);
		$location=$this->db->escape($location);
		$chief=$this->db->escape($chief);
		$chief_phone=$this->db->escape($chief_phone);
		$money_from=$this->db->escape($money_from);
		$needs=$this->db->escape($needs);
		$intro=$this->db->escape($intro);
		$date=$this->db->escape($date);
		$scale=$this->db->escape($scale);
		$time=$this->db->escape($time);
		if($hengfu!=false){
			$hengfu=json_encode($hengfu);
		}else{
			$hengfu="";
		}
		if($haibao!=false){
			$haibao=json_encode($haibao);
		}else{
			$haibao="";
		}
		$this->db->query("insert into activity_benbu(date,theme,host_high,host_low,time,location,chief,chief_phone,money_from,scale,needs,intro,hengfu,haibao) values($date,$theme,$host_high,$host_low,$time,$location,$chief,$chief_phone,$money_from,$scale,$needs,$intro,'$hengfu','$haibao')");
		$id=$this->db->insert_id();
		$this->db->query("insert into apply(account_id,activity_id,type) values($account_id,$id,1)");
	}

	function xiaoqu($account_id,$theme,$host_high,$host_low,$time,$location,$chief,$chief_phone,$money_from,$scale,$needs,$intro,$hengfu,$haibao,$date){
		$theme=$this->db->escape($theme);
		$host_high=$this->db->escape($host_high);
		$host_low=$this->db->escape($host_low);
		$location=$this->db->escape($location);
		$chief=$this->db->escape($chief);
		$chief_phone=$this->db->escape($chief_phone);
		$money_from=$this->db->escape($money_from);
		$needs=$this->db->escape($needs);
		$intro=$this->db->escape($intro);
		$date=$this->db->escape($date);
		$scale=$this->db->escape($scale);
		$time=$this->db->escape($time);
		if($hengfu!=false){
			$hengfu=json_encode($hengfu);
		}else{
			$hengfu="";
		}
		if($haibao!=false){
			$haibao=json_encode($haibao);
		}else{
			$haibao="";
		}
		$this->db->query("insert into activity_xiaoqu(date,theme,host_high,host_low,time,location,chief,chief_phone,money_from,scale,needs,intro,hengfu,haibao) values($date,$theme,$host_high,$host_low,$time,$location,$chief,$chief_phone,$money_from,$scale,$needs,$intro,'$hengfu','$haibao')");
		$id=$this->db->insert_id();
		$this->db->query("insert into apply(account_id,activity_id,type) values($account_id,$id,2)");
	}

	function large($account_id,$theme,$host_high,$host_low,$time,$location,$chief,$chief_phone,$money_from,$scale,$needs,$intro,$hengfu,$haibao,$date){
		$theme=$this->db->escape($theme);
		$host_high=$this->db->escape($host_high);
		$host_low=$this->db->escape($host_low);
		$location=$this->db->escape($location);
		$chief=$this->db->escape($chief);
		$chief_phone=$this->db->escape($chief_phone);
		$money_from=$this->db->escape($money_from);
		$needs=$this->db->escape($needs);
		$intro=$this->db->escape($intro);
		$date=$this->db->escape($date);
		$scale=$this->db->escape($scale);
		$time=$this->db->escape($time);
		if($hengfu!=false){
			$hengfu=json_encode($hengfu);
		}else{
			$hengfu="";
		}
		if($haibao!=false){
			$haibao=json_encode($haibao);
		}else{
			$haibao="";
		}
		$this->db->query("insert into activity_large(date,theme,host_high,host_low,time,location,chief,chief_phone,money_from,scale,needs,intro,hengfu,haibao) values($date,$theme,$host_high,$host_low,$time,$location,$chief,$chief_phone,$money_from,$scale,$needs,$intro,'$hengfu','$haibao')");
		$id=$this->db->insert_id();
		$this->db->query("insert into apply(account_id,activity_id,type) values($account_id,$id,3)");
	}
	
	function get_league_activity($league_id){
		$result['benbu']=$this->db->query("select * from apply where account_id=$league_id and type=1")->result_array();
		for($i=0;$i<count($result['benbu']);$i++){
			$result['benbu'][$i]['activity']=$this->db->query("select * from activity_benbu where id=".$result['benbu'][$i]['activity_id'])->row_array();
		}
		$result['xiaoqu']=$this->db->query("select * from apply where account_id=$league_id and type=2")->result_array();
		for($i=0;$i<count($result['xiaoqu']);$i++){
			$result['xiaoqu'][$i]['activity']=$this->db->query("select * from activity_xiaoqu where id=".$result['xiaoqu'][$i]['activity_id'])->row_array();
		}
		$result['large']=$this->db->query("select * from apply where account_id=$league_id and type=3")->result_array();
		for($i=0;$i<count($result['large']);$i++){
			$result['large'][$i]['activity']=$this->db->query("select * from activity_large where id=".$result['large'][$i]['activity_id'])->row_array();
		}
		return $result;
	}
}
