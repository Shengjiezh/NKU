<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if($this->user_model->is_login) {
                        $datas['nav'] = 4;
                        $this->load->view("user", $datas);
                }
                else {
                        $this->load->view("not_login");
                }

	}
}
