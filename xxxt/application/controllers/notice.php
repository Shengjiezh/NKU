<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if($this->user_model->is_login) {
			$datas['nav'] = 6;
			$this->load->view("notice", $datas);
		}
		else {
			$this->load->view("not_login");
		}
	}
}
