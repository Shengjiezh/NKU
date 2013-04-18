<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("article_model");
	}

	public function index() {
		$article = $this->input->get("article", true);
		$datas['nav'] = 1;
		if(!$article) {
			$this->load->view("article", $datas);
		}
		else {
			if(preg_match("/^\d+$/", $article)) {
				$this->article_model->id = $article;
				$validate = $this->article_model->get();
				if($validate->num_rows() > 0) {
					$datas['article'] = $validate->row_array();
					$this->load->view("article_view", $datas);
				}
				else {
					show_404();
				}
			}
			else {
				show_404();
			}
		}
	}
}
