<?php
class Authors_model extends CI_Model{

	public function get_authors($query=FALSE){
		if($query === NULL){
			$query = $this->db->get('authors');
			return $query->result_array();
		}

		$this->db->like('author_name', $query);
		$this->db->or_like('author_email', $query);
		$query = $this->db->get('authors');
		
		return $query->result_array();
		
	}

	public function get_authors_by_id($id){
		$query = $this->db->get_where('authors', array('author_id' => $id));
		return $query->row_array();
	}
}
