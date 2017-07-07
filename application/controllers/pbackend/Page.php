<?php
	class Page extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Page_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['content'] = 'backend/page';
				$sources['getpage'] = $this->Page_model->get_model();
				$sources['name'] = 'Dynamic Page';
				$sources['title'] = 'Dynamic Page | Pria Sejati Administrator';
				$sources['no'] = 1;
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addpage() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['content'] = 'backend/addpage';
				$sources['name'] = 'Add Dynamic Page';
				$sources['title'] = 'Add Dynamic Page | Pria Sejati Administrator';
				
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addpage_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_title = $this->security->xss_clean($this->input->post('title', TRUE));
					$_description = $this->security->xss_clean($this->input->post('description', TRUE));
					$_type = $this->security->xss_clean($this->input->post('type', TRUE));
					$_status = $this->security->xss_clean($this->input->post('status', TRUE));
						
					$this->Page_model->add_page_process($_title, $_description, $_type, $_status);
					redirect('pbackend/page');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function editpage($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['content'] = 'backend/editpage';
				$sources['name'] = 'Edit Page';
				$sources['title'] = 'Edit Dynamic Page | Pria Sejati Administrator';
				$sources['editpage'] = $this->Page_model->show_getpage($val);
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function editpage_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_getid = $this->security->xss_clean($this->input->post('getid', TRUE));
					$_title = $this->security->xss_clean($this->input->post('title', TRUE));
					$_description = $this->security->xss_clean($this->input->post('description', TRUE));
					$_type = $this->security->xss_clean($this->input->post('type', TRUE));
					$_status = $this->security->xss_clean($this->input->post('status', TRUE));
					
					$this->Page_model->edit_page_process($_getid, $_title, $_description, $_type, $_status);
					redirect('pbackend/page');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function updatepage($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$this->Page_model->update_page($val);
				redirect('pbackend/page');
			}
		}
		
		public function deletepage($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$this->Page_model->delete_page($val);
				redirect('pbackend/page');
			}
		}
		
	}
?>