<?php
	class Slider_model extends CI_Model {
		public $table = 'slider_record';
		public function __construct() {
			parent::__construct();
		}
		
		public function get_slider($limit, $offset) {
			$this->db->order_by('id_slider_record', 'desc');
			$this->db->limit($limit, $offset);
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function getsearchslider($searchkey) {
			$this->db->order_by('id_slider_record', 'desc');
			$this->db->like('slider_title', $searchkey, 'both');
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function add_slider_process($_title, $_images,$_sort, $_status) {
			$sources = array('slider_title'=>$_title, 'slider_images'=>$_images, 'slider_sort'=>$_sort, 'slider_status'=>$_status);
			$this->db->insert($this->table, $sources);
		}
		
		public function edit_slider_process($_getid, $_title, $_images, $_sort, $_status) {
			$sources = array('slider_title'=>$_title, 'slider_images'=>$_images, 'slider_sort'=>$_sort, 'slider_status'=>$_status);
			$this->db->where('id_'.$this->table, $_getid);
			$this->db->update($this->table, $sources);
		}
		
		public function show_slider($val) {
			$q = $this->db->get_where($this->table, array('id_'.$this->table=>$val));
			return $q->result();
		}
		
		public function updateslider($val) {
			$q = $this->db->get_where($this->table, array('id_slider_record'=>$val));
			$result = $q->row_array();
			
			if($result['slider_status'] == 'Publish') {
				$data = array('slider_status'=>'Unpublish');
				$this->db->where('id_slider_record', $val);
				$this->db->update('slider_record', $data);
			} else {
				$data = array('slider_status'=>'Publish');
				$this->db->where('id_slider_record', $val);
				$this->db->update('slider_record', $data);
			}
		}
		public function deleteslider($val) {
			$this->db->where('id_'.$this->table, $val);
			$this->db->delete($this->table);
		}
	}
?>