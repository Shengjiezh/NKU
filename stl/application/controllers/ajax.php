<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends CI_Controller {
	var $result = array("status"=>0, "error"=>'');

    function __construct() {
        parent::__construct();
        if(!$this->input->is_ajax_request()) {
            show_404();
        }
    }

	function account() {
		$this->load->model("account_model");
		$request = $this->input->post("request", true);
		switch($request) {
			case "detail":
                $id = $this->input->post("id", true);
                $type = $this->input->post("type", true);
                switch($type) {
                    case "admin":
                        $row = $this->db->where('id', $id)->get("admin");
                        if($row->num_rows() > 0) {
                            $row = $row->row_array();
                            $data = array(
                                'title' => '管理员',
                                'username' => $row['username']
                            );
                        }
                        $this->load->view("admin/detail", $data);
                        break;
                    case "xtw":
                        $row = $this->db->where('id', $id)->get("account");
                        if($row->num_rows() > 0) {
                            $row = $row->row_array();
                            $data = array(
                                'title' => '校团委',
                                'username' => $row['username']
                            );
                        }
                        $this->load->view("admin/detail", $data);
                        break;
                    case "stl":
                        $row = $this->db->where('id', $id)->get("account");
                        if($row->num_rows() > 0) {
                            $row = $row->row_array();
                            $data = array(
                                'title' => '社团联',
                                'username' => $row['username']
                            );
                        }
                        $this->load->view("admin/detail", $data);
                        break;
                    case "league":
                        $row = $this->db->where('id', $id)->get("account");
                        if($row->num_rows() > 0) {
                            $row = $row->row_array();
                            $detail = $this->db->where("id", $row['info_id'])->get("league_info")->row_array();
                            $data = array(
                                'title' => '社团',
                                'username' => $row['username'],
                                'name' => $detail['name']
                            );
                        }
                        $this->load->view("admin/detail", $data);
                        break;
                    case "college":
                        $row = $this->db->where('id', $id)->get("account");
                        if($row->num_rows() > 0) {
                            $row = $row->row_array();
                            $detail = $this->db->where("id", $row['info_id'])->get("college_info")->row_array();
                            $data = array(
                                'title' => '依托单位',
                                'username' => $row['username'],
                                'name' => $detail['name']
                            );
                        }
                        $this->load->view("admin/detail", $data);
                        break;
                }
				break;
			case "logout":
				$this->account_model->logout();
				break;
			case "login":
				$username = $this->input->post("username", true);
				$password = $this->input->post("password", true);
				if(!validate_username($username)) {
					$result['error'] = '不合法的用户名参数';
					echo json_encode($result);
					break;
				}
				if(!validate_password($password)) {
					$result['error'] = '不合法的密码参数';
					echo json_encode($result);
					break;
				}
				$account = $this->db->where("username", $username)->get("account");
				if($account->num_rows() == 0) {
					$result['error'] = '不存在的用户';
					echo json_encode($result);
					break;
				}
				$account = $account->row();
				if($account->password == md5($password.$account->salt)) {
					$result['error'] = '错误的密码';
					echo json_encode($result);
					break;
				}
				$this->account_model->login($account->id);
				$result['status'] = 1;
				echo json_encode($result);
				break;
		}
	}

	function admin() {
		$this->load->model("admin_model");
		$this->load->model("account_model");
		$request = $this->input->post("request", true);
		switch($request) {
			case "logout":
				$this->admin_model->logout();
				break;
			case "login":
				$username = $this->input->post("username", true);
				$password = $this->input->post("password", true);
				if(!validate_username($username)) {
					$result['error'] = '不合法的用户名参数';
					echo json_encode($result);
					break;
				}
				if(!validate_password($password)) {
					$result['error'] = '不合法的密码参数';
					echo json_encode($result);
					break;
				}
				$account = $this->db->where("username", $username)->get("admin");
				if($account->num_rows() == 0) {
					$result['error'] = '不存在的用户';
					echo json_encode($result);
					break;
				}
				$account = $account->row();
				if($account->password != md5($password.$account->salt)) {
					$result['error'] = '错误的密码';
					echo json_encode($result);
					break;
				}
				$this->admin_model->login($account->id);
				$result['status'] = 1;
				echo json_encode($result);
				break;
			case "create":
				$arguments = $this->input->post(NULL, true);
				if(!validate_username($arguments['username'])) {
					$result['error'] = '不合法的用户名参数';
					echo json_encode($result);
					break;
				}
				if(!validate_password($arguments['password'])) {
					$result['error'] = '不合法的密码参数';
					echo json_encode($result);
					break;
				}
				if(isset($arguments['name']) && !validate_username($artuments['name'])) {
					$result['error'] = '不合法的名称参数';
					echo json_encode($result);
					break;
				}
				switch($arguments['type']) {
					case "league":
						$this->account_model->create_league($arguments['username'], $arguments['password'], $arguments['name']);
						break;
					case "college":
						$this->account_model->create_college($arguments['username'], $arguments['password'], $arguments['name']);
						break;
					case "stl":
						$this->account_model->create_stl($arguments['username'], $arguments['password']);
						break;
					case "xtw":
						$this->account_model->create_xtw($arguments['username'], $arguments['password']);
						break;
					case "admin":
						$this->admin_model->create($arguments['username'], $arguments['password']);
						break;
				}
				$result['status'] = 1;
				echo json_encode($result);
				break;
			case "delete":
				$arguments = $this->input->post(NULL, true);
				if(!validate_username($arguments['username'])) {
					$result['error'] = '不合法的用户名参数';
					echo json_encode($result);
					break;
				}
				switch($arguments['type']) {
					case "league":
					case "college":
						$account = $this->db->where('username', $arguments['username'])->get('account')->row_array();
						$this->account_model->remove($account['id'], $arguments['type'], $account['info_id']);
						break;
					case "stl":
					case "xtw":
						$account = $this->db->where('username', $arguments['username'])->get('account')->row_array();
						$this->account_model->remove($account['id'], $arguments['type']);
						break;
					case "admin":
						$account = $this->db->where('username', $arguments['username'])->get('admin')->row_array();
						$this->admin_model->remove($account['id']);
						break;
				}
				$result['status'] = 1;
				echo json_encode($result);
				break;
		}
	}
}
