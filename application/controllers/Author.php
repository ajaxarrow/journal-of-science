<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function index(){
		$data['authors'] = $this->authors_model->get_authors();
		$this->load->view('templates/header');
		$this->load->view('admin/authors', $data);
		$this->load->view('templates/footer');
	}


}
