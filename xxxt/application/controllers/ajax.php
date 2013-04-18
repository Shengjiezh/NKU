<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	var $result = array("status"=>0, "error"=>'');

	function __construct() {
		parent::__construct();
		if(!$this->input->is_ajax_request()) {
			show_404();
		}
	}

	function msg() {
		if(!$this->user_model->is_login) {
			$this->result['error'] = "请登录";
			echo json_encode($this->result);return;
		}
		$me = $this->user_model->id;
		$request = $this->input->post("request", true);
		switch($request) {
			case "get":
				$teacher = $this->input->post("teacher", true);
				$datas['msgs'] = $this->db->query("select * from msg where (from = $teacher and to $me) or (from = $me and to = $teacher)")->result_array();
				$datas['to_id'] = $teacher;
				echo $this->load->view("block/ajax_msg.php", $datas);
				break;
			case "post":
				$teacher = $this->input->post("teacher", true);
				break;
		}
	}

	function admin() {
		$request = $this->input->post("request", true);
		switch($request) {
			case "login":
				$password = $this->input->post("password", true);
				$username = $this->input->post("username", true);
				if(!validate_pwd($username)) {
					$this->result['error'] = "用户名不能包含特殊字符";
					echo json_encode($this->result);return;
				}
				if(!validate_pwd($password)) {
					$this->result['error'] = "密码不能包含特殊字符";
					echo json_encode($this->result);return;
				}
				$validate = $this->db->where("username", $username)->get("teacher");
				if($validate->num_rows() == 0) {
					$this->result['error'] = "用户不存在，请确认用户名大小写正确";
					echo json_encode($this->result);return;
				}
				$validate = $validate->row_array();
				if(md5($password.$validate['salt']) != $validate['password']) {
					$this->result['error'] = "密码错误，请确认密码大小写正确";
					echo json_encode($this->result);return;
				}

				$this->admin_model->login($validate['id'], $username);
				$this->result['status'] = 1;
				echo json_encode($this->result);
				break;
		}
	}

	function user() {
		$request = $this->input->post("request", true);
		switch($request) {
			case "refresh_nav":
				echo $this->load->view("block/ajax_nav.php");
				break;
			case "register":
				$nickname = $this->input->post("nickname", true);
				$password = $this->input->post("pwd", true);
				$username = $this->input->post("username", true);
				$mail = $this->input->post("mail", true);
				if(!validate_nickname($nickname)) {
					$this->result['error'] = "昵称不能包含特殊字符";
					echo json_encode($this->result);return;
				}
				if(!validate_username($username)) {
					$this->result['error'] = "学号只能是数字";
					echo json_encode($this->result);return;
				}
				if(!validate_pwd($password)) {
					$this->result['error'] = "密码不能包含特殊字符";
					echo json_encode($this->result);return;
				}
				if(!validate_mail($mail)) {
					$this->result['error'] = "邮箱格式错误";
					echo json_encode($this->result);return;
				}
				$validate = $this->db->where('nickname', $nickname)->or_where("username", $username)->get("user");
				if($validate->num_rows() > 0) {
					$this->result['error'] = "重复的学号或者昵称";
					echo json_encode($this->result);return;
				}

				$this->user_model->nickname = $nickname;
				$this->user_model->mail = $mail;
				$this->user_model->register($username, $password);
				$this->result['status'] = 1;
				echo json_encode($this->result);
				break;
			case "logout":
				$this->user_model->logout();
				break;
			case "login":
				$password = $this->input->post("pwd", true);
				$username = $this->input->post("username", true);
				if(!validate_username($username)) {
					$this->result['error'] = "学号只能是数字";
					echo json_encode($this->result);return;
				}
				if(!validate_pwd($password)) {
					$this->result['error'] = "密码不能包含特殊字符";
					echo json_encode($this->result);return;
				}
				$validate = $this->db->where("username", $username)->get("user");
				if($validate->num_rows() == 0) {
					$this->result['error'] = "用户不存在，请确认用户名大小写正确";
					echo json_encode($this->result);return;
				}
				$validate = $validate->row_array();
				if(md5($password.$validate['salt']) != $validate['password']) {
					$this->result['error'] = "密码错误，请确认密码大小写正确";
					echo json_encode($this->result);return;
				}

				$this->user_model->login($validate['id'], $username);
				$this->result['status'] = 1;
				echo json_encode($this->result);
				break;
		}
	}
}
