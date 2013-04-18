<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_model {
	var $id = null;

	function __construct() {
		parent::__construct();
	}

	public function get() {
		$this->db->where("id", $this->id);
		return $this->db->get("teacher");
	}

	public function get_all() {
		return $this->db->get("teacher");
	}
	
	public function remove() {
		$this->db->where("id", $this->id);
		$this->db->delete("teacher");
	}

	public function create($teacher) {
		$this->db->insert("teacher", $teacher);
	}
}
