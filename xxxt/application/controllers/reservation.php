<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservation extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$datas['nav'] = 3;
		$this->load->view("reservation", $datas);
	}
}
