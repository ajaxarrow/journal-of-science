<?php
class Authors_model extends CI_Model{

	public function get_authors($id=FALSE){
		if($id === FALSE){
			$query = $this->db->get('authors');
			return $query->result_array();
		}

		$query = $this->db->get_where('authors', array('author_id' => $id));
		return $query->row_array();
	}
}
