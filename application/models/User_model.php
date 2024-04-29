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
