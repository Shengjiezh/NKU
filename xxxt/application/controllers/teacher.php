<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$datas['teachers'] = $this->db->get("teacher")->result_array();
		$datas['nav'] = 2;
		$this->load->view("teacher", $datas);
	}
}
