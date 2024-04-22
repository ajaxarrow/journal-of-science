<?php
class Submissions_model extends CI_Model{

	public function get_submissions($id=FALSE){
		if($id === FALSE){
			$query = $this->db->get('article_submission');
			return $query->result_array();
		}

		$query = $this->db->get_where('article_submission', array('submission_id' => $id));
		return $query->row_array();
	}
}
