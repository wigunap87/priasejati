<?php
	class Partner_model extends CI_Model {
		public $table = 'partner_record';
		public function __construct() {
			parent::__construct();
		}
		
		public function get_partner($limit, $offset) {
			$this->db->order_by('id_partner_record', 'desc');
			$this->db->limit($limit, $offset);
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function getsearchpartner($searchkey) {
			$this->db->order_by('id_partner_record', 'desc');
			$this->db->like('partner_title', $searchkey, 'both');
			$q = $this->db->get($this->table);
			return $q->result();
		}
		
		public function add_partner_process($_title, $_images, $_url, $_createdate, $_status) {
			$sources = array('partner_title'=>$_title, 'partner_images'=>$_images, 'partner_url'=>$_url, 'partner_createdate'=>$_createdate, 'partner_status'=>$_status);
			$this->db->insert($this->table, $sources);
		}
		
		public function edit_partner_process($_getid, $_title, $_images, $_url, $_status) {
			$sources = array('partner_title'=>$_title, 'partner_images'=>$_images, 'partner_url'=>$_url, 'partner_status'=>$_status);
			$this->db->where('id_'.$this->table, $_getid);
			$this->db->update($this->table, $sources);
		}
		
		public function show_partner($val) {
			$q = $this->db->get_where($this->table, array('id_'.$this->table=>$val));
			return $q->result();
		}
		
		public function updatepartner($val) {
			$q = $this->db->get_where($this->table, array('id_partner_record'=>$val));
			$result = $q->row_array();
			
			if($result['partner_status'] == 'Publish') {
				$data = array('partner_status'=>'Unpublish');
				$this->db->where('id_partner_record', $val);
				$this->db->update('partner_record', $data);
			} else {
				$data = array('partner_status'=>'Publish');
				$this->db->where('id_partner_record', $val);
				$this->db->update('partner_record', $data);
			}
		}
		public function deletepartner($val) {
			$this->db->where('id_'.$this->table, $val);
			$this->db->delete($this->table);
		}
	}
?>