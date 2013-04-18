<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reservation_model extends CI_model {
	var $id = null;
	var $from = null;
	var $to = null;
	var $date = null;
	var $place = null;
	var $remark = null;
	var $read = null;
	var $status = null;

	function __construct() {
		parent::__construct();
	}

	public function get() {
		$this->db->where("id", $this->id);
		return $this->db->get("reservation");
	}

	public function post() {
		$this->db->trans_start();

		$reservation = array (
			"from" => $this->from,
			"to" => $this->to,
			"date" => $this->date,
			"place" => $this->place,
			"ctime" => time(),
			"remark" => $this->remark
		);
		$this->insert("reservation", $reservation);
		$result = $this->db->insert_id();

		$notice = array (
                        "from" => $this->from,
                        "to" => $this->to,
                        "type" => 1,
                        "ctime" => time()
                );
                $this->insert("notice", $notice);

		$this->db->trans_complete();
                return $result;
	}

	public function edit_read() {
		$datas = array (
			"read" => $this->read
		);
		$this->db->where("id", $this->id);
		$this->db->update("reservation", $datas);
	}

	public function edit_status() {
		$this->db->trans_start();

		$datas = array (
			"status" => $this->status
		);
		$this->db->where("id", $this->id);
		$this->db->update("reservation", $datas);

		$this->db->where("id", $this->id);
		$this->db->select("from,to");
		$query = $this->db->get("reservation");
		$this->from = $query->row()->from;
		$this->to = $query->row()->to;

		$notice = array (
                        "from" => $this->from,
                        "to" => $this->to,
                        "type" => $this->status+1,
                        "ctime" => time()
                );
                $this->insert("notice", $notice);

		$this->db->trans_complete();
	}
}
