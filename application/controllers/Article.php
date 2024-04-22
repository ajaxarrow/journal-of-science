<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	public function index(){
		$data['articles'] = $this->articles_model->get_articles();
		$this->load->view('templates/header');
		$this->load->view('admin/articles', $data);
		$this->load->view('templates/footer');
	}


}
