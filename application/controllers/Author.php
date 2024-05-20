<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function index(){
		$query = $this->input->get('query');
		$data['authors'] = $this->authors_model->get_authors($query);
		$this->load->view('templates/header');
		$this->load->view('admin/authors/index', $data);
		$this->load->view('templates/footer');
	}
	public function view_author($id){
		$data['author'] = $this->authors_model->get_author_by_id($id);
		$this->load->view('templates/header');
		$this->load->view('admin/authors/view_author', $data);
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
					$data['error'] = $error;
					$this->load->view('templates/header');
					$this->load->view('admin/authors/new_author', $data);
					$this->load->view('templates/footer');
			}
		}
	}
	

	public function edit_author($id){
		$data['author'] = $this->authors_model->get_author_by_id($id);
		$this->load->view('templates/header');
		$this->load->view('admin/authors/edit_author', $data);
		$this->load->view('templates/footer');
	}

	public function update_author($id){
		$this->form_validation->set_rules('author_name','Author Name','required');
		$this->form_validation->set_rules('author_title','Author Title','required');
		$this->form_validation->set_rules('author_email','Author Email','required');
		$this->form_validation->set_rules('author_contact','Author Contact','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
			$this->load->view('admin/authors/new_author');
			$this->load->view('templates/footer');
		}else{
			if (!empty($_FILES['author_image']['name'])) {
				$config['upload_path'] = './public/profile-images/';
				$config['allowed_types'] = 'jpeg|png|jpg'; 
				$config['max_size'] = 4096; 
				$config['file_name'] = uniqid(); 
	
				$this->upload->initialize($config);

				if ($this->upload->do_upload('author_image')) {
					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];	
				} else {
						$error = $this->upload->display_errors();
						echo $error;
				}
				$data = array(
					'author_name' => $this->input->post('author_name'),
					'author_title' => $this->input->post('author_title'),
					'author_email' => $this->input->post('author_email'),
					'author_contact' => $this->input->post('author_contact'),
					'author_image' => $file_name 
				);
			} else {
				$data = array(
					'author_name' => $this->input->post('author_name'),
					'author_title' => $this->input->post('author_title'),
					'author_email' => $this->input->post('author_email'),
					'author_contact' => $this->input->post('author_contact'),
				);
			}

			$this->authors_model->update_author($id, $data);
			redirect('admin/authors');
		}
	}


	public function delete_author($id){
		$this->authors_model->delete_author($id);
		redirect('admin/authors');
	}


}
