<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submission extends CI_Controller {

	public function index(){

		$this->load->view('templates/header');
		$this->load->view('admin/submissions');
		$this->load->view('templates/footer');
	}


}
