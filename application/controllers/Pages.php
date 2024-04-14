<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function view($page = 'index')
	{
		$this->load->view('templates/header');
		$this->load->view('global/'.$page);
		$this->load->view('templates/footer');
	}

}

