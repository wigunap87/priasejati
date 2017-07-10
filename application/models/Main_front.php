<?php


class Main_front extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function getsetting() {
		$this->db->order_by('id_setting_record', 'desc');
		$this->db->limit(1);
		$q = $this->db->get('setting_record');
		return $q->result();
	}
	
	public function getslider() {
		$this->db->order_by('slider_sort', 'asc');
		$q = $this->db->get_where('slider_record', array('slider_status'=>'Publish'));
		return $q->result();
	}
	
	public function getpage($pos) {
		$this->db->order_by('id_page_record', 'desc');
		$this->db->limit(1);
		$q = $this->db->get_where('page_record', array('page_type'=>$pos, 'page_status'=>'Publish'));
		return $q->result();
	}
	
	public function getcatgallery() {
		$this->db->order_by('id_catgallery_record', 'desc');
		$q = $this->db->get_where('catgallery_record', array('catgallery_status'=>'Publish'));
		return $q->result();
	}
	
	public function getpartner() {
		$this->db->order_by('id_partner_record', 'desc');
		$this->db->limit(8);
		$q = $this->db->get_where('partner_record', array('partner_status'=>'Publish'));
		return $q->result();
	}
	
	public function getnews() {
		$this->db->order_by('id_news_record', 'desc');
		$this->db->limit(4);
		$q = $this->db->get_where('news_record', array('news_status'=>'Publish'));
		return $q->result();
	}
	
	public function insertcontact($_fullname, $_email, $_subject, $_message, $_createdate) {
		$sources = array('contact_fullname'=>$_fullname, 'contact_email'=>$_email, 'contact_subject'=>$_subject, 'contact_message'=>$_message, 'contact_createdate'=>$_createdate);
		$this->db->insert('contact_record', $sources);
	}
	
	public function get_table($tables, $searchkey) {
		$this->db->order_by('id_'.$tables.'_record', 'desc');
		$this->db->like($tables.'_title', $searchkey, 'both');
		$q = $this->db->get_where($tables.'_record', array($tables.'_status'=>'Publish'));
		return $q->result();
		
	}
	
	public function getsinglegallery($val) {
		$this->db->order_by('id_gallery_record', 'desc');
		$this->db->limit(1);
		$q = $this->db->get_where('gallery_record', array('category_id'=>$val, 'gallery_status'=>'Publish'));
		return $q->result();
	}
}