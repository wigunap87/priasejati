<?php


class News_front extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function get_news($limit, $offset) {
		$this->db->order_by('id_news_record', 'desc');
		$this->db->limit($limit, $offset);
		$q = $this->db->get_where('news_record', array('news_status'=>'Publish'));
		return $q->result();
	}
	
	public function getsinglenews($val) {
		$q = $this->db->get_where('news_record', array('id_news_record'=>$val, 'news_status'=>'Publish'));
		return $q->result();
	}
	
	public function othernews($val) {
		$this->db->order_by('id_news_record', 'desc');
		$this->db->limit(9);
		$q = $this->db->get_where('news_record', array('id_news_record !='=>$val, 'news_status'=>'Publish'));
		return $q->result();
	}
}