<?php
class User_model extends CI_Model{

	public function get_users($query=NULL){
		if($query === NULL){
			$this->db->order_by('complete_name', 'ASC');
			$query = $this->db->get('users');
			return $query->result_array();
		}
		$this->db->order_by('complete_name', 'ASC');
		$this->db->like('complete_name', $query);
		$this->db->or_like('email', $query);
		$query = $this->db->get('users');
		
	
		return $query->result_array();
	}

	public function get_users_by_articles($id){
		$article_authors = $this->db->get_where('article_author', array('article_id' => $id))->result_array();
		foreach ($article_authors as &$article_author) { 
			$article_author['author'] = $this->volume_model->get_authors_by_id($article_author['authid']);
		}
		return $article_authors;
	}


	public function get_user_by_id($id){
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row_array();
	}

	public function add_user($data){
		$this->db->insert('users', $data);
	}

	public function update_user($id, $data){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	public function delete_user($id){
			$this->db->where('id', $id);
			$this->db->delete('users');
	}


}
