<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	public function index(){
		$query = $this->input->get('query');
		$data['articles'] = $this->articles_model->fetch_articles($query);
		$this->load->view('templates/header');
		$this->load->view('admin/articles/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($id){
		$data['article'] = $this->articles_model->get_article_by_id($id);
		$data['volume'] = $this->volume_model->get_volume_by_id($data['article']['volumeid']);
		$this->load->view('templates/header');
		$this->load->view('global/view_article', $data);
		$this->load->view('templates/footer');
	}

	public function view_article($id){
		$data['article'] = $this->articles_model->get_article_by_id($id);
		$data['volume'] = $this->volume_model->get_volume_by_id($data['article']['volumeid']);
		$this->load->view('templates/header');
		$this->load->view('admin/articles/view_article', $data);
		$this->load->view('templates/footer');
	}

	public function new_article(){
		$data['volumes'] = $this->volume_model->fetch_volume();
		$this->load->view('templates/header');
		$this->load->view('admin/articles/new_article', $data);
		$this->load->view('templates/footer');
	}

	public function add_article(){

    // Set validation rules
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('keywords', 'Keywords', 'required');
    $this->form_validation->set_rules('abstract', 'Abstract', 'required');
    $this->form_validation->set_rules('doi', 'DOI', 'required');
    $this->form_validation->set_rules('date-published', 'Date Published', 'required');
    $this->form_validation->set_rules('volume_id', 'Volume', 'required');

    // Check if form is submitted and validated
    if($this->form_validation->run() == FALSE){
        // Validation failed, load view with validation errors
        $data['volumes'] = $this->volume_model->fetch_volume();
        $this->load->view('templates/header');
        $this->load->view('admin/articles/new_article', $data);
        $this->load->view('templates/footer');
    } else {
        $config['upload_path'] = './public/articles/';
        $config['allowed_types'] = 'pdf|doc|docx'; 
        $config['max_size'] = 2048; // 2MB maximum file size
        $config['file_name'] = uniqid(); // Unique file name

        $this->upload->initialize($config);

        if ($this->upload->do_upload('filename')) {
  
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            $data = array(
                'title' => $this->input->post('title'),
                'keywords' => $this->input->post('keywords'),
                'abstract' => $this->input->post('abstract'),
                'doi' => $this->input->post('doi'),
                'date_published' => date('Y-m-d H:i:s', strtotime($this->input->post('date-published'))),
                'published' => $this->input->post('published') ? 1 : 0, 
                'volumeid' => $this->input->post('volume_id'),
                'filename' => $file_name 
            );

            $this->articles_model->add_article($data);

            // Redirect after successful insertion
            redirect('admin/articles');
        } else {
            // File upload failed, display error
            $error = $this->upload->display_errors();
						$data['volumes'] = $this->volume_model->fetch_volume();
						$data['error'] = $error;
						$this->load->view('templates/header');
						$this->load->view('admin/articles/new_article', $data);
						$this->load->view('templates/footer');
        }
    }
	}

	public function edit_article($id){
		$data['volumes'] = $this->volume_model->fetch_volume();
		$data['article'] = $this->articles_model->get_article_by_id($id);
		$this->load->view('templates/header');
		$this->load->view('admin/articles/edit_article', $data);
		$this->load->view('templates/footer');
	}

	public function update_article($id){
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('keywords', 'Keywords', 'required');
		$this->form_validation->set_rules('abstract', 'Abstract', 'required');
		$this->form_validation->set_rules('doi', 'DOI', 'required');
		$this->form_validation->set_rules('date-published', 'Date Published', 'required');
		$this->form_validation->set_rules('volume_id', 'Volume', 'required');
	
		// Check if form is submitted and validated
		if($this->form_validation->run() == FALSE){
			// Validation failed, load view with validation errors
			$data['volumes'] = $this->volume_model->fetch_volume();
			$this->load->view('templates/header');
			$this->load->view('admin/articles/new_article', $data);
			$this->load->view('templates/footer');
		} else {
			// Check if file input has data
			if (!empty($_FILES['filename']['name'])) {
				$config['upload_path'] = './public/articles/';
				$config['allowed_types'] = 'pdf|doc|docx'; 
				$config['max_size'] = 2048; // 2MB maximum file size
				$config['file_name'] = uniqid(); // Unique file name
	
				$this->upload->initialize($config);
	
				if ($this->upload->do_upload('filename')) {
					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];
				} else {
					// File upload failed, display error
					$error = $this->upload->display_errors();
					echo $error;
					return; // Exit function if file upload fails
				}

				$data = array(
					'title' => $this->input->post('title'),
					'keywords' => $this->input->post('keywords'),
					'abstract' => $this->input->post('abstract'),
					'doi' => $this->input->post('doi'),
					'date_published' => date('Y-m-d H:i:s', strtotime($this->input->post('date-published'))),
					'published' => $this->input->post('published') ? 1 : 0, 
					'volumeid' => $this->input->post('volume_id'),
					'filename' => $file_name 
				);
			} else {
				$data = array(
					'title' => $this->input->post('title'),
					'keywords' => $this->input->post('keywords'),
					'abstract' => $this->input->post('abstract'),
					'doi' => $this->input->post('doi'),
					'date_published' => date('Y-m-d H:i:s', strtotime($this->input->post('date-published'))),
					'published' => $this->input->post('published') ? 1 : 0, 
					'volumeid' => $this->input->post('volume_id')
				);
			}
	
			// Prepare data for article update
			
	
			// Update article
			$this->articles_model->update_article($id, $data);
	
			// Redirect after successful insertion
			redirect('admin/articles');
		}
	}
	

	public function download($filename) {
		$file_path = FCPATH . 'public/articles/' . $filename;
	
		// Check if file exists
		if (file_exists($file_path)) {
			// Load the download helper
			$this->load->helper('download');
	
			// Set the file MIME type
			$mime = mime_content_type($file_path);
	
			// Generate the server response for the file download
			force_download($filename, file_get_contents($file_path), $mime);
		} else {
			// File not found, handle the error
			echo "File not found!";
		}
	}
	


	public function delete_article($id){
		$this->articles_model->delete_article($id);
		redirect('admin/articles');
	}


}
