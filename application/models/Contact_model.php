<?php
	class Contact_model extends CI_Model {
		public $table = 'contact_record';
		public function __construct() {
			parent::__construct();
		}
		
		public function getcontact($limit, $offset) {
			$this->db->order_by('id_contact_record', 'desc');
			$this->db->limit($limit, $offset);
			$q = $this->db->get('contact_record');
			return $q->result();
		}
		
		public function updatecontact($val) {
			$q = $this->db->get_where($this->table, array('id_contact_record'=>$val));
			$result = $q->row_array();
			
			if($result['contact_status'] == 'New') {
				$data = array('contact_status'=>'Done');
				$this->db->where('id_contact_record', $val);
				$this->db->update('contact_record', $data);
			} else {
				$data = array('contact_status'=>'New');
				$this->db->where('id_contact_record', $val);
				$this->db->update('contact_record', $data);
			}
		}
		
		public function deletecontact($val) {
			$this->db->where('id_contact_record', $val);
			$this->db->delete('contact_record');
		}
	}