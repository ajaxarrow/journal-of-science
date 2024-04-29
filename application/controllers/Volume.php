<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volume extends CI_Controller {

	public function index(){
		$query = $this->input->get('query');
		$data['volumes'] = $this->volume_model->fetch_volume($query);
		$this->load->view('templates/header');
		$this->load->view('admin/volumes/volumes', $data);
		$this->load->view('templates/footer');
	}

	public function new_volume(){
		$this->load->view('templates/header');
		$this->load->view('admin/volumes/new_volume');
		$this->load->view('templates/footer');
	}


	public function add_volume(){
		$this->form_validation->set_rules('vol_name', 'Volume Name', 'required');
    $this->form_validation->set_rules('vol_desc', 'Volume Description', 'required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
			$this->load->view('admin/volumes/new_volume');
			$this->load->view('templates/footer');
		} else {
			$data = array (
				'vol_name'=> $this->input->post('vol_name'),
				'vol_description'=> $this->input->post('vol_desc'),
				'published' => $this->input->post('published') ? 1 : 0, 
				'archived' => $this->input->post('archived') ? 1 : 0, 
			);

			$this->volume_model->add_volume($data);

			redirect('admin/volumes');
		}
	}

	public function edit_volume($id){
		$data['volume'] = $this->volume_model->get_volume_by_id($id);
		$this->load->view('templates/header');
		$this->load->view('admin/volumes/edit_volume', $data);
		$this->load->view('templates/footer');
	}

	public function update_volume($id){
		// Form validation rules
		$this->form_validation->set_rules('vol_name', 'Volume Name', 'required');
		$this->form_validation->set_rules('vol_desc', 'Volume Description', 'required');

		if($this->form_validation->run() == FALSE){
				// If validation fails, reload the edit form with errors
				$this->load->view('templates/header');
				$this->load->view('admin/volumes/edit_volume');
				$this->load->view('templates/footer');
		} else {
				// If validation passes, update volume in database
				$data = array (
						'vol_name'=> $this->input->post('vol_name'),
						'vol_description'=> $this->input->post('vol_desc'),
						'published' => $this->input->post('published') ? 1 : 0, 
						'archived' => $this->input->post('archived') ? 1 : 0, 
				);

				$this->volume_model->update_volume($id, $data);

				redirect('admin/volumes');
		}
}

	public function delete_volume($id){
		$this->volume_model->delete_volume($id);
		redirect('admin/volumes');
	}
}
