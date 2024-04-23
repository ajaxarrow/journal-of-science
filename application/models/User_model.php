<?php
class User_model extends CI_Model{

	public function get_users($query=NULL){
		if($query === NULL){
			$query = $this->db->get('users');
			return $query->result_array();
		}
		$this->db->like('complete_name', $query);
		$this->db->or_like('email', $query);
		$query = $this->db->get('users');
		
		return $query->result_array();
	}

	public function get_user_by_id($id){
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row_array();
	}
}
