<?php
	class Gallery_model extends CI_Model {
		public $table = 'gallery_record';
		public function __construct() {
			parent::__construct();
		}
		
		public function get_gallery($limit, $offset) {
			$this->db->join('catgallery_record', 'gallery_record.category_id = catgallery_record.id_catgallery_record', 'left');
			$this->db->order_by('id_gallery_record', 'desc');
			$this->db->limit($limit, $offset);
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function getsearchgallery($searchkey) {
			$this->db->join('catgallery_record', 'gallery_record.category_id = catgallery_record.id_catgallery_record', 'left');
			$this->db->order_by('id_gallery_record', 'desc');
			$this->db->like('gallery_title', $searchkey, 'both');
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function add_gallery_process($_categoryid, $_title, $_images, $_desc, $_createdate, $_status) {
			$sources = array('category_id'=>$_categoryid, 'gallery_title'=>$_title, 'gallery_images'=>$_images, 'gallery_desc'=>$_desc, 'gallery_createdate'=>$_createdate, 'gallery_status'=>$_status);
			$this->db->insert($this->table, $sources);
		}
		
		public function edit_gallery_process($_getid, $_categoryid,  $_title, $_images, $_desc, $_status) {
			$sources = array('category_id'=>$_categoryid, 'gallery_title'=>$_title, 'gallery_images'=>$_images, 'gallery_desc'=>$_desc, 'gallery_status'=>$_status);
			$this->db->where('id_'.$this->table, $_getid);
			$this->db->update($this->table, $sources);
		}
		
		public function show_gallery($val) {
			$this->db->join('catgallery_record', 'gallery_record.category_id = catgallery_record.id_catgallery_record', 'left');
			$q = $this->db->get_where($this->table, array('id_'.$this->table=>$val));
			return $q->result();
		}
		
		public function updategallery($val) {
			$q = $this->db->get_where($this->table, array('id_gallery_record'=>$val));
			$result = $q->row_array();
			
			if($result['gallery_status'] == 'Publish') {
				$data = array('gallery_status'=>'Unpublish');
				$this->db->where('id_gallery_record', $val);
				$this->db->update('gallery_record', $data);
			} else {
				$data = array('gallery_status'=>'Publish');
				$this->db->where('id_gallery_record', $val);
				$this->db->update('gallery_record', $data);
			}
		}
		public function deletegallery($val) {
			$this->db->where('id_'.$this->table, $val);
			$this->db->delete($this->table);
		}
		
		public function getcategory() {
			$this->db->order_by('catgallery_title', 'asc');
			$q = $this->db->get_where('catgallery_record', array('catgallery_status'=>'Publish'));
			return $q->result();
		}
	}
?>