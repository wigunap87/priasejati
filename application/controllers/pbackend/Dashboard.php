<?php
	class Dashboard extends CI_Controller {
		public function __construct() {
			parent::__construct();
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('abackend/main', 'refresh');
			} else {
				$sources['name'] = '';
				$sources['title'] = 'Dashboard | Pria Sejati Administrator';
				$sources['content'] = 'backend/dashboard';
				
				$this->load->view('backend/home', $sources);
			}
		}
	}
?>