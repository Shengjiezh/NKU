<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("admin_model");
	}
	
	function index() {
		if($this->admin_model->is_login) {
			$this->load->model("account_model");
			$datas['me'] = $this->admin_model->me;
			$datas['leagues'] = $this->account_model->get_all_league();
			$datas['colleges'] = $this->account_model->get_all_college();
			$datas['stls'] = $this->account_model->get_all_stl();
			$datas['xtws'] = $this->account_model->get_all_xtw();
			$datas['admins'] = $this->db->get("admin")->result_array();
			$this->load->view("admin/main",$datas);
		}
		else {
			$this->load->view("admin/login");
		}
	}
}
