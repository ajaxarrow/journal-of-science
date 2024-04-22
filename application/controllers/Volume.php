<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volume extends CI_Controller {

	public function index(){
		$data['volumes'] = $this->volume_model->get_volume();
		$this->load->view('templates/header');
		$this->load->view('admin/volumes', $data);
		$this->load->view('templates/footer');
	}


}
