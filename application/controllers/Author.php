<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function index(){
		$query = $this->input->get('query');
		$data['authors'] = $this->authors_model->get_authors($query);
		$this->load->view('templates/header');
		$this->load->view('admin/authors/authors', $data);
		$this->load->view('templates/footer');
	}

	public function new_author(){
		$this->load->view('templates/header');
		$this->load->view('admin/authors/new_author');
		$this->load->view('templates/footer');
	}

	public function add_author(){
		$this->form_validation->set_rules('author_name','Author Name','required');
		$this->form_validation->set_rules('author_title','Author Title','required');
		$this->form_validation->set_rules('author_email','Author Email','required');
		$this->form_validation->set_rules('author_contact','Author Contact','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
			$this->load->view('admin/authors/new_author');
			$this->load->view('templates/footer');
		}else{
			$config['upload_path'] = './public/profile-images/';
			$config['allowed_types'] = 'jpeg|png|jpg'; 
			$config['max_size'] = 4096; // 2MB maximum file size
			$config['file_name'] = uniqid(); // Unique file name

			$this->upload->initialize($config);

			if ($this->upload->do_upload('author_image')) {

					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];

					$data = array(
							'author_name' => $this->input->post('author_name'),
							'author_title' => $this->input->post('author_title'),
							'author_email' => $this->input->post('author_email'),
							'author_contact' => $this->input->post('author_contact'),
							'author_image' => $file_name 
					);

					$this->authors_model->add_author($data);

					redirect('admin/authors');
			} else {
					$error = $this->upload->display_errors();
					echo $error;
			}
		}
	}

	public function delete_author($id){
		$this->authors_model->delete_author($id);
		redirect('admin/authors');
	}


}
