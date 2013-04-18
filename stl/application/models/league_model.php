<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class league_model extends CI_model{
	function __construct(){
		parent::__construct();
	}
	
	function register($account_id,$league_id,$type,$college,$creatime,$mail,$register_time,$register_man,$summary,$plan,$intro,$purpose,$json_boss,$json_txy,$json_tzb,$json_teacher){
		$creatime=$this->db->escape($creatime);
		$mail=$this->db->escape($mail);
		$register_time=$this->db->escape($register_time);
		$register_man=$this->db->escape($register_man);
		$summary=$this->db->escape($summary);
		$plan=$this->db->escape($plan);
		$intro=$this->db->escape($intro);
		$purpose=$this->db->escape($purpose);
		$json_boss=$this->db->escape($json_boss);
		$json_txy=$this->db->escape($json_txy);
		$json_tzb=$this->db->escape($json_tzb);
		$json_teacher=$this->db->escape($json_teacher);
		$this->db->query("update league_info set status=1,type=$type,college_id=$college,creatime=$creatime,mail=$mail,register_time=$register_time,register_man=$register_man,summary=$summary,plan=$plan,introduction=$intro,purpose=$purpose,json_boss=$json_boss,json_tongxunyuan=$json_txy,json_tuanzhibu=$json_tzb,json_teacher=$json_teacher where id=$league_id");
		$this->db->query("insert into apply(account_id,type) values($account_id,0)");
	}
	
	function get_detail($account_id){
		$res['account']=$this->db->query("select * from account where id=$account_id limit 1")->row_array();
		$res['league_info']=$this->db->query("select * from league_info where id=".$res['account']['info_id'])->row_array();
		$res['college_info']=$this->db->query("select * from college_info where id=".$res['league_info']['college_id'])->row_array();
		return $res;
	}
}
