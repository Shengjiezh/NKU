<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_model {
	var $is_login = false;
	var $id = null;

	function __construct() {
		parent::__construct();
		$username = $this->session->userdata('username');
		$id = $this->session->userdata('id');
		if(!empty($id) && !empty($username)) {
			$this->db->where("id", $id);
			$query = $this->db->get("admin");
			if($query->row()->username == $username) {
				$this->is_login = true;
				$this->id = $id;
			}
		}
	}

	public function change_pwd($password) {
		if($this->is_login) {
			$this->db->select("salt");
			$this->db->where("id", $this->id);
			$query = $this->db->get("admin");
			$datas = array (
				"password" => md5($password.$query->row()->salt)
			);
			$this->db->where("id", $this->id);
			$this->db->update("admin", $datas);
		}
	}
	
	public function login($id, $username) {
		$this->id = $id;
		$this->is_login = true;
		$this->session->set_userdata('username', $username);
		$this->session->set_userdata('id', $this->id);
		$this->db->where("id", $this->id);
		$this->db->update("admin", $datas);
	}
	
	public function logout() {
		$this->session->sess_destroy();
		$this->is_login = false;
	}

	public function register($username, $password) {
		$salt = substr(uniqid(),-10);
		$datas = array (
			"salt" => $salt,
			"username" => $username,
			"password" => md5($password.$salt),
			"ctime" => time()
		);
		$this->db->insert("admin", $datas);
		$this->login($this->db->insert_id(), $username);
	}
}
