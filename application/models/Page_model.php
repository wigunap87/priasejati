<?php
	class Page_model extends CI_Model {
	
		public $table = "page_record";
		public function __construct() {
			parent::__construct();
		}
		
		public function get_model() {
			$q = $this->db->get('page_record');
			return $q->result();
		}
		
		public function add_page_process($_title, $_description, $_type, $_status) {
			$data = array('page_title'=>$_title, 'page_desc'=>$_description, 'page_type'=>$_type, 'page_status'=>$_status);
			$this->db->insert('page_record', $data);
		}
		
		public function edit_page_process($_getid, $_title, $_description, $_type, $_status) {
			$data = array('page_title'=>$_title, 'page_desc'=>$_description, 'page_type'=>$_type, 'page_status'=>$_status);
			$this->db->where('id_page_record', $_getid);
			$this->db->update('page_record', $data);
		}
		
		public function show_getpage($id) {
			$this->db->where('id_page_record', $id);
			$q = $this->db->get('page_record');
			return $q->result();
		}
		
		public function del_image($val) {
			$this->db->where('id_page_record', $val);
			$q = $this->db->get('page_record');
			return $q->result();
		}
		
		public function update_page($id) {
			$q = $this->db->get_where($this->table, array('id_page_record'=>$id));
			$result = $q->row_array();
			
			if($result['page_status'] == 'Publish') {
				$data = array('page_status'=>'Unpublish');
				$this->db->where('id_page_record', $id);
				$this->db->update('page_record', $data);
			} else {
				$data = array('page_status'=>'Publish');
				$this->db->where('id_page_record', $id);
				$this->db->update('page_record', $data);
			}
		}
		
		public function delete_page($id) {
			$this->db->where('id_page_record', $id);
			$this->db->delete('page_record');
		}
	}
?>