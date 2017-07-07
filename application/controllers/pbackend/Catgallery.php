<?php
	class Catgallery extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Catgallery_model');
			$this->load->model('Main_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Catgallery | Pria Sejati Administrator';
				$sources['name'] = 'Catgallery';
				$sources['content'] = 'backend/catgallery';
				
				$sources['no'] = 1;
				$sources['showcatgallery'] = $this->Catgallery_model->get_catgallery();
				
				
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addcatgallery() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Add Catgallery | Pria Sejati Administrator';
				$sources['name'] = 'Add Catgallery';
				$sources['content'] = 'backend/addcatgallery';
				
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addcatgallery_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_title = $this->security->xss_clean($this->input->post('title'));
					$_status = $this->security->xss_clean($this->input->post('status'));
					
					$this->Catgallery_model->add_catgallery_process($_title, $_status);
					redirect('pbackend/catgallery', 'refresh');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function editcatgallery($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Edit Catgallery | Pria Sejati Administrator';
				$sources['name'] = 'Edit Catgallery';
				$sources['content'] = 'backend/editcatgallery';
				
				$sources['show_catgallery'] = $this->Catgallery_model->show_catgallery($val);
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function editcatgallery_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_getid = $this->security->xss_clean($this->input->post('getid'));
					$_title = $this->security->xss_clean($this->input->post('title'));
					$_status = $this->security->xss_clean($this->input->post('status'));
					
					$this->Catgallery_model->edit_catgallery_process($_getid, $_title, $_status);
					redirect('pbackend/catgallery', 'refresh');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function updatecatgallery($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$this->Catgallery_model->updatecatgallery($val);
				redirect('pbackend/catgallery', 'refresh');
			}
		}
		
		public function deletecatgallery($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {				
				$this->Catgallery_model->deletecatgallery($val);
				redirect('pbackend/catgallery', 'refresh');
			}
		}
	}
?>