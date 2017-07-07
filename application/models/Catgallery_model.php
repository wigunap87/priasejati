<?php
	class Catgallery_model extends CI_Model {
		public $table = 'catgallery_record';
		public function __construct() {
			parent::__construct();
		}
		
		public function get_catgallery() {
			$this->db->order_by('id_catgallery_record', 'desc');
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		
		public function add_catgallery_process($_title, $_status) {
			$sources = array('catgallery_title'=>$_title, 'catgallery_status'=>$_status);
			$this->db->insert($this->table, $sources);
		}
		
		public function edit_catgallery_process($_getid, $_title, $_status) {
			$sources = array('catgallery_title'=>$_title, 'catgallery_status'=>$_status);
			$this->db->where('id_'.$this->table, $_getid);
			$this->db->update($this->table, $sources);
		}
		
		public function show_catgallery($val) {
			$q = $this->db->get_where($this->table, array('id_catgallery_record'=>$val));
			return $q->result();
		}
		
		public function updatecatgallery($val) {
			$q = $this->db->get_where($this->table, array('id_catgallery_record'=>$val));
			$result = $q->row_array();
			
			if($result['catgallery_status'] == 'Publish') {
				$data = array('catgallery_status'=>'Unpublish');
				$this->db->where('id_catgallery_record', $val);
				$this->db->update('catgallery_record', $data);
			} else {
				$data = array('catgallery_status'=>'Publish');
				$this->db->where('id_catgallery_record', $val);
				$this->db->update('catgallery_record', $data);
			}
		}
		public function deletecatgallery($val) {
			$this->db->where('id_'.$this->table, $val);
			$this->db->delete($this->table);
		}
	}
?>