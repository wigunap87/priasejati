<?php
	class Setting extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Setting_model');
		}
		
		public function view($id){
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main/login/');
			} else {
				$sources['content'] = 'backend/setting';
				$sources['name'] = 'Setting';
				$sources['title'] = 'Setting | Pria Sejati Administrator';
				$sources['show_getsetting'] = $this->Setting_model->show_getsetting($id);
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main/login/');
			} else {
				$_getid = $this->security->xss_clean($this->input->post('getid', TRUE));
				$_title = $this->security->xss_clean($this->input->post('title', TRUE));
				$_address = $this->security->xss_clean($this->input->post('address', TRUE));
				$_phone = $this->security->xss_clean($this->input->post('phone', TRUE));
				$_fax = $this->security->xss_clean($this->input->post('fax', TRUE));
				$_email = $this->security->xss_clean($this->input->post('email', TRUE));
				$_facebook = $this->security->xss_clean($this->input->post('facebook', TRUE));
				$_twitter = $this->security->xss_clean($this->input->post('twitter', TRUE));
				$_instagram = $this->security->xss_clean($this->input->post('instagram', TRUE));
				$_maps = $this->security->xss_clean($this->input->post('maps', TRUE));
				$_metakey = $this->security->xss_clean($this->input->post('metakey', TRUE));
				$_metadesc = $this->security->xss_clean($this->input->post('metadesc', TRUE));
				
				
				
				$this->Setting_model->edit_setting_process($_getid, $_title, $_address, $_phone, $_fax, $_email, $_facebook, $_twitter, $_instagram, $_maps, $_metakey, $_metadesc);
				redirect('pbackend/setting/view/1');
			}
		}
	}
?>