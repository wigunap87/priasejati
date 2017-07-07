<?php
	class Setting_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		
		public function show_getsetting($id) {
			$this->db->where('id_setting_record', $id);
			$q = $this->db->get('setting_record');
			return $q->result();
		}
		
		public function edit_setting_process($_getid, $_title, $_address, $_phone, $_fax, $_website, $_metakey, $_metadesc) {
			$sources = array('setting_title'=>$_title, 'setting_address'=>$_address, 'setting_phone'=>$_phone, 'setting_fax'=>$_fax, 'setting_website'=>$_website, 'setting_metakey'=>$_metakey, 'setting_metadesc'=>$_metadesc);
			$this->db->where('id_setting_record', $_getid);
			$this->db->update('setting_record', $sources);
		}
	}
?>