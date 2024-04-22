<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function dashboard()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/dashboard');
		$this->load->view('templates/footer');
	}

	public function users()
	{
		$data['users'] = $this->user_model->get_users();
		$this->load->view('templates/header');
		$this->load->view('admin/users', $data);
		$this->load->view('templates/footer');
	}

	public function articles()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/articles');
		$this->load->view('templates/footer');
	}

	public function submissions()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/submissions');
		$this->load->view('templates/footer');
	}

	public function authors()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/authors');
		$this->load->view('templates/footer');
	}

	public function volumes()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/volumes');
		$this->load->view('templates/footer');
	}


}

