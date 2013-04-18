<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Msg_model extends CI_model {
	var $id = null;
	var $from = null;
	var $to = null;
	var $content = null;

	function __construct() {
		parent::__construct();
	}

	public function get() {
		return $this->db->where("id", $this->id)->get("msg");
	}

	public function post() {
		$this->db->trans_start();

		$msg = array (
			"from" => $this->from,
			"to" => $this->to,
			"content" => $this->content,
			"ctime" => time()
		);
		$this->insert("msg", $msg);
		$result = $this->db->insert_id();

		$notice = array (
                        "from" => $this->from,
                        "to" => $this->to,
                        "type" => 0,
                        "ctime" => time()
                );
                $this->insert("notice", $notice);

		$this->db->trans_complete();
		return $result;
	}
}
