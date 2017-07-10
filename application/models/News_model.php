<?php
	class News_model extends CI_Model {
		public $table = 'news_record';
		public function __construct() {
			parent::__construct();
		}
		
		public function get_news($limit, $offset) {
			$this->db->order_by('id_news_record', 'desc');
			$this->db->limit($limit, $offset);
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function getsearchnews($searchkey) {
			$this->db->order_by('id_news_record', 'desc');
			$this->db->like('news_title', $searchkey, 'both');
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function add_news_process($_title, $_images, $_desc, $_createdate, $_status) {
			$sources = array('news_title'=>$_title, 'news_images'=>$_images, 'news_desc'=>$_desc, 'news_createdate'=>$_createdate, 'news_status'=>$_status);
			$this->db->insert($this->table, $sources);
		}
		
		public function edit_news_process($_getid, $_title, $_images, $_desc, $_status) {
			$sources = array('news_title'=>$_title, 'news_images'=>$_images, 'news_desc'=>$_desc, 'news_status'=>$_status);
			$this->db->where('id_'.$this->table, $_getid);
			$this->db->update($this->table, $sources);
		}
		
		public function show_news($val) {
			$q = $this->db->get_where($this->table, array('id_'.$this->table=>$val));
			return $q->result();
		}
		
		public function updatenews($val) {
			$q = $this->db->get_where($this->table, array('id_news_record'=>$val));
			$result = $q->row_array();
			
			if($result['news_status'] == 'Publish') {
				$data = array('news_status'=>'Unpublish');
				$this->db->where('id_news_record', $val);
				$this->db->update('news_record', $data);
			} else {
				$data = array('news_status'=>'Publish');
				$this->db->where('id_news_record', $val);
				$this->db->update('news_record', $data);
			}
		}
		public function deletenews($val) {
			$this->db->where('id_'.$this->table, $val);
			$this->db->delete($this->table);
		}
	}
?>