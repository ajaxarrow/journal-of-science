<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function view($page = 'index')
	{
		if($page === 'articles'){
			$data['volumes'] = $this->volume_model->get_volume();
			$data['articles'] = $this->articles_model->get_articles();
			$this->load->view('templates/header');
			$this->load->view('global/articles.php',  $data);
			$this->load->view('templates/footer');
			return;
		}
		$this->load->view('templates/header');
		$this->load->view('global/'.$page);
		$this->load->view('templates/footer');
	}

}

