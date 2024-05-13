<?php
class Articles_model extends CI_Model{

	public function fetch_articles($query=NULL){
		if ($query !== NULL ) {
			$this->db->like('title', $query);
			$this->db->or_like('keywords', $query);
			$this->db->like('abstract', $query);
		}
		$query = $this->db->get('articles');
		return $query->result_array();
	}

	public function get_articles($query=NULL){
		$this->db->select('authors.*, articles.*');
		$this->db->from('article_author');
		$this->db->join('articles', 'article_author.article_id = articles.article_id', 'inner');
		$this->db->join('authors', 'article_author.authid = authors.author_id', 'inner');
		$this->db->order_by('articles.date_published', 'DESC');
		if ($query !== NULL ) {
			$this->db->like('title', $query);
			$this->db->or_like('keywords', $query);
			$this->db->like('abstract', $query);
		}

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_article_by_id($id){
		$article = $this->db->get_where('articles', array('article_id' => $id))->row_array();
		$articleauthors = $this->volume_model->get_authors_by_article_id($article['article_id']);
			$article['authors'] = [];
			foreach ($articleauthors as &$author) {
					$article['authors'][] =  $this->volume_model->get_authors_by_id($author['authid']);
			}
		return $article;
	}

	public function get_articles_by_volume_id($id){
		$this->db->select('authors.*, articles.*');
		$this->db->from('article_author');
		$this->db->join('articles', 'article_author.article_id = articles.article_id', 'inner');
		$this->db->join('authors', 'article_author.authid = authors.author_id', 'inner');
		$this->db->order_by('articles.date_published', 'DESC');
		$this->db->where('articles.volumeid', $id);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function add_article($data){
    $this->db->insert('articles', $data);
	}

	public function update_article($id, $data){
			$this->db->where('article_id', $id);
			$this->db->update('articles', $data);
	}

	public function delete_article($id){
			$this->db->where('article_id', $id);
			$this->db->delete('articles');
	}

}
