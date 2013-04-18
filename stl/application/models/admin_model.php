<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_model {
	var $is_login = false;
	var $me = null;

        function __construct() {
                parent::__construct();
                $session_id = $this->session->userdata('admin_id');
                $cookie_id = $this->input->cookie('admin_id', true);
                if(!empty($session_id) && !empty($cookie_id)) {
                        $temp = $this->db->where("id", $session_id)->get("admin");
                        if($temp->num_rows() > 0 && $temp->row()->id == $cookie_id) {
                                $this->is_login = true;
				$this->me = $temp->row_array();
                        }
                }
        }

	function login($id) {
		$this->input->set_cookie('admin_id', $id, 0);
		$this->session->set_userdata('admin_id', $id);
                $this->is_login = true;
		$this->me = $this->db->where("id", $id)->get("admin")->row_array();
	}
	
	function logout() {
		$this->input->set_cookie('admin_id', '', null);
		$this->session->sess_destroy();
                $this->is_login = false;
		$this->me = null;
	}
	
	function create($username, $password) {
		$salt = substr(uniqid(),-10);
		$password = md5($password.$salt);
		$this->db->insert("admin", array("username"=>$username, "password"=>$password, "salt"=>$salt));
	}
	
	function remove($id) {
		$this->db->where("id", $id)->delete("admin");
	}

	function edit($id, $admin) {
		$this->db->where("id", $id)->update("admin", $admin);
	}
}
