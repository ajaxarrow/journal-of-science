<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		$query = $this->input->get('query');
		$data['users'] = $this->user_model->get_users($query);
		$this->load->view('templates/header');
		$this->load->view('admin/users', $data);
		$this->load->view('templates/footer');
	}


}
