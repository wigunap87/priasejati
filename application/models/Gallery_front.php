<?php


class Gallery_front extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function get_catgallery($limit, $offset) {
		$this->db->order_by('id_catgallery_record', 'desc');
		$this->db->limit($limit, $offset);
		$q = $this->db->get_where('catgallery_record', array('catgallery_status'=>'Publish'));
		return $q->result();
	}
	
	public function getsinglecategory($val) {
		$q = $this->db->get_where('catgallery_record', array('id_catgallery_record'=>$val, 'catgallery_status'=>'Publish'));
		return $q->result();
	}
	
	public function getsinglegallery($val) {
		$this->db->order_by('id_gallery_record', 'desc');
		$this->db->limit(1);
		$q = $this->db->get_where('gallery_record', array('category_id'=>$val, 'gallery_status'=>'Publish'));
		return $q->result();
	}
	
	public function getallgallery($val, $limit, $offset) {
		$this->db->order_by('id_gallery_record', 'desc');
		$this->db->limit($limit, $offset);
		$q = $this->db->get_where('gallery_record', array('category_id'=>$val, 'gallery_status'=>'Publish'));
		return $q->result();
	}
}