<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("account_model");
	}
	
	function index() {
		if(!$this->account_model->is_login) {
			$this->load->view("user/login");
		}
		else {
			$this->load->model("apply_model");
			$this->load->model("activity_model");
			switch($user['type']){
				case 0:
					$user['league']=$this->db->query("select * from league_info where id=".$user['info_id']." limit 1")->row_array();
					switch($user['league']['status']){
						case 0:
							$user['college']=$this->account_model->get_all_college();
							break;
						case 1:
							$user['apply']=$this->apply_model->get_info($user['id'],0);
							break;
						case 2:
							$user['apply']=$this->apply_model->get_info($user['id'],0);
							$user['activity_list']=$this->activity_model->get_league_activity($user['id']);
							break;
					}
					break;
				case 1:
					$user['apply_register']=$this->apply_model->get_apply(0,0,$user['info_id']);
					$user['apply_benbu']=$this->apply_model->get_apply(0,1,$user['info_id']);
					$user['apply_xiaoqu']=$this->apply_model->get_apply(0,2,$user['info_id']);
					$user['apply_large']=$this->apply_model->get_apply(0,3,$user['info_id']);
					break;
				case 2:
					$user['apply_register']=$this->apply_model->get_apply(1,0);
					$user['apply_benbu']=$this->apply_model->get_apply(1,1);
					$user['apply_xiaoqu']=$this->apply_model->get_apply(1,2);
					$user['apply_large']=$this->apply_model->get_apply(1,3);
					break;
				case 3:
					$user['apply_register']=$this->apply_model->get_apply(2,0);
					$user['apply_benbu']=$this->apply_model->get_apply(2,1);
					$user['apply_xiaoqu']=$this->apply_model->get_apply(2,2);
					$user['apply_large']=$this->apply_model->get_apply(2,3);
					break;
			}
			$this->load->view("user/main",$user);
		}
	}
}
