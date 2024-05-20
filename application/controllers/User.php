<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		$query = $this->input->get('query');
		$data['users'] = $this->user_model->get_users($query);
		$this->load->view('templates/header');
		$this->load->view('admin/users/index', $data);
		$this->load->view('templates/footer');
	}

	public function view_user($id){
		$data['user'] = $this->user_model->get_user_by_id($id);
		$this->load->view('templates/header');
		$this->load->view('admin/users/view_user', $data);
		$this->load->view('templates/footer');
	}

	public function new_user(){
		$this->load->view('templates/header');
		$this->load->view('admin/users/new_user');
		$this->load->view('templates/footer');
	}

	public function add_user(){
		$this->form_validation->set_rules('user_name','User Name','required');
		$this->form_validation->set_rules('user_email','User Email','required');
		$this->form_validation->set_rules('user_password','User Password','required');
		$this->form_validation->set_rules('user_title','User Title','required');
		$this->form_validation->set_rules('user_role','User Role','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
			$this->load->view('admin/users/new_user');
			$this->load->view('templates/footer');
		}else{
			$config['upload_path'] = './public/profile-images/';
			$config['allowed_types'] = 'jpeg|png|jpg'; 
			$config['max_size'] = 4096; // 2MB maximum file size
			$config['file_name'] = uniqid(); // Unique file name

			$this->upload->initialize($config);

			if ($this->upload->do_upload('user_image')) {

					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];

					$data = array(
							'complete_name' => $this->input->post('user_name'),
							'email' => $this->input->post('user_email'),
							'password' => $this->input->post('user_password'),
							'title' => $this->input->post('user_title'),
							'role' => $this->input->post('user_role'),
							'status' => $this->input->post('user_status') ? 1 : 0, 
							'profile_pic' => $file_name 
					);

					$this->user_model->add_user($data);

					redirect('admin/users');
			} else {
					$error = $this->upload->display_errors();
					$data['error'] = $error;
					$this->load->view('templates/header');
					$this->load->view('admin/users/new_user', $data);
					$this->load->view('templates/footer');
			}
		}
	}

	public function edit_user($id){
		$data['user'] = $this->user_model->get_user_by_id($id);
		$this->load->view('templates/header');
		$this->load->view('admin/users/edit_user', $data);
		$this->load->view('templates/footer');
	}

	public function update_user($id){
		$this->form_validation->set_rules('user_name','User Name','required');
		$this->form_validation->set_rules('user_email','User Email','required');
		$this->form_validation->set_rules('user_password','User Password','required');
		$this->form_validation->set_rules('user_title','User Title','required');
		$this->form_validation->set_rules('user_role','User Role','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
			$this->load->view('admin/users/new_user');
			$this->load->view('templates/footer');
		}else{
			if (!empty($_FILES['user_image']['name'])) {
				$config['upload_path'] = './public/profile-images/';
				$config['allowed_types'] = 'jpeg|png|jpg'; 
				$config['max_size'] = 4096; // 2MB maximum file size
				$config['file_name'] = uniqid(); // Unique file name

				$this->upload->initialize($config);

				if ($this->upload->do_upload('user_image')) {

						$upload_data = $this->upload->data();
						$file_name = $upload_data['file_name'];
						
				} else {
						$error = $this->upload->display_errors();
						echo $error;
				}
				$data = array(
					'complete_name' => $this->input->post('user_name'),
					'email' => $this->input->post('user_email'),
					'password' => $this->input->post('user_password'),
					'title' => $this->input->post('user_title'),
					'role' => $this->input->post('user_role'),
					'status' => $this->input->post('user_status') ? 1 : 0, 
					'profile_pic' => $file_name 
				);	
			} else {
				$data = array(
					'complete_name' => $this->input->post('user_name'),
					'email' => $this->input->post('user_email'),
					'password' => $this->input->post('user_password'),
					'title' => $this->input->post('user_title'),
					'role' => $this->input->post('user_role'),
					'status' => $this->input->post('user_status') ? 1 : 0, 
				);
			}
			


			$this->user_model->update_user($id, $data);

			redirect('admin/users');
		}
	}


	public function delete_user($id){
		$this->user_model->delete_user($id);
		redirect('admin/users');
	}




}
