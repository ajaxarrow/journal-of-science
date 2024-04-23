<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volume extends CI_Controller {

	public function index(){
		$query = $this->input->get('query');
		$data['volumes'] = $this->volume_model->fetch_volume($query);
		$this->load->view('templates/header');
		$this->load->view('admin/volumes', $data);
		$this->load->view('templates/footer');
	}


}
