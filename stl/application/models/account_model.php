<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class account_model extends CI_model {
	var $is_login = false;

	function __construct() {
		parent::__construct();
		$session_id = $this->session->userdata('id');
		$cookie_id = $this->input->cookie('id', true);
		if(!empty($session_id) && !empty($cookie_id)) {
			$temp = $this->db->where("id", $session_id)->get("account");
			if($temp->num_rows() > 0 && $temp->row()->id == $cookie_id) {
				$this->is_login = true;
			}
		}
	}

	function login($id) {
		$this->input->set_cookie('id', $id, 0);
		$this->session->set_userdata('id', $id);
		$this->is_login = true;
	}

	function logout() {
		$this->input->set_cookie('id', '', null);
		$this->session->sess_destroy();
		$this->is_login = false;
	}

	function create_league($username, $password, $league_name) {
		$salt = substr(uniqid(), -10);
		$password = md5($password.$salt);
		$this->db->insert("league_info", array("name"=>$league_name));
		$this->db->insert("account", array("username"=>$username, "password"=>$password, "salt"=>$salt, "type"=>0, "info_id"=>$this->db->insert_id()));
	}

	function create_college($username, $password, $college_name) {
		$salt = substr(uniqid(), -10);
		$password = md5($password.$salt);
		$this->db->insert("college_info", array("name"=>$college_name));
		$this->db->insert("account", array("username"=>$username, "password"=>$password, "salt"=>$salt, "type"=>1, "info_id"=>$this->db->insert_id()));
	}
	
	function create_stl($username, $password) {
		$salt = substr(uniqid(), -10);
		$password = md5($password.$salt);
		$this->db->insert("account", array("username"=>$username, "password"=>$password, "salt"=>$salt, "type"=>2, "info_id"=>-1));
	}
	
	function create_xtw($username, $password) {
		$salt = substr(uniqid(), -10);
		$password = md5($password.$salt);
		$this->db->insert("account", array("username"=>$username, "password"=>$password, "salt"=>$salt, "type"=>3, "info_id"=>-1));
	}
	
	function remove($id, $type, $info_id=-1) {
		if($type == 0) {
			$this->db->where("id", $info_id)->delete("league_info");
		}
		if($type == 1) {
			$this->db->where("id", $info_id)->delete("college_info");
		}
		$this->db->where("id", $id)->where("type", $type)->delete("account");
	}

	function edit_account($id, $account) {
		$this->db->where("id", $id)->update("account", $account);
	}

	function edit_info($id, $type, $info) {
		if($type == 0) {
			$this->db->where("id", $id)->update("league_info", $info);
		}
		else {
			$this->db->where("id", $id)->update("college_info", $info);
		}
	}
	
	function get_all_league() {
		$leagues = $this->db->where("type", 0)->get("account")->result_array();
		foreach($leagues as &$league) {
			$league['info'] = $this->db->where("id", $league['info_id'])->get("league_info")->row_array();
		}
		return $leagues;
	}
	
	function get_all_college() {
		$colleges = $this->db->where("type", 1)->get("account")->result_array();
		foreach($colleges as &$college) {
			$college['info'] = $this->db->where("id", $college['info_id'])->get("college_info")->row_array();
		}
		return $colleges;
	}
	
	function get_all_stl() {
		return $this->db->where("type", 2)->get("account")->result_array();
	}
	
	function get_all_xtw() {
		return $this->db->where("type", 3)->get("account")->result_array();
	}
}
