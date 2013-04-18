<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msg extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if($this->user_model->is_login) {
			$datas['teachers'] = $this->db->get("teacher")->result_array();
			$datas['nav'] = 5;
			$this->load->view("msg", $datas);
		}
		else {
			$this->load->view("not_login");
		}
	}
}
