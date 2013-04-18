<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notice_model extends CI_model {
	var $id = null;

	function __construct() {
		parent::__construct();
	}

	public function get() {
		$this->db->where("id", $this->id);
		return $this->db->get("notice");
	}

	public function get_about($user_id) {
		$this->db->where("to", $user_id);
		return $this->db->get("notice");
	}
	
	public function remove() {
		$this->db->where("id", $this->id);
		$this->db->delete("notice");
	}
}
