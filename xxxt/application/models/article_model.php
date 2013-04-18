<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_model {
	var $id = null;
	var $title = null;
	var $content = null;

	function __construct() {
		parent::__construct();
	}

	public function get() {
		return $this->db->where("id", $this->id)->get("article");
	}

	public function get_list($type, $limit, $offset) {
		if(!$type) {
			return $this->db->get("article", $limit, $offset)->result_array();
		}
		else {
			return $this->db->where("type", $type)->get("article", $limit, $offset)->result_array();
		}
	}
	
	public function post() {
		$article = array (
			"title" => $this->title,
			"content" => $this->content,
			"ctime" => time(),
			"click_num" => 0
		);
		$this->insert("article", $article);
		return $this->db->insert_id();
	}

	public function edit() {
		$article = array (
			"title" => $this->title,
			"content" => $this->content,
		);
		$this->db->where("id", $this->id);
		$this->db->update("article", $article);
	}
	
	public function remove() {
		$this->db->where("id", $this->id);
		$this->db->delete("article");
	}
}
