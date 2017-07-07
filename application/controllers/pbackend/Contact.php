<?php
	class Contact extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Contact_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Contact | Pria Sejati Administrator';
				$sources['name'] = 'Contact';
				$sources['content'] = 'backend/contact';
				
				$this->load->library('Pagination');
				$page = $this->uri->segment(4);
				$limit = 20;
				if(!$page):
					$offset=0;
				else:
					$offset = $page;
				endif;
				$sources['showcontact'] = $this->Contact_model->getcontact($limit, $offset);
				$tot_hal = $this->db->get('contact_record');
				$config['base_url'] = base_url() . 'pbackend/contact/index';
				$sources['no'] = $offset + 1;
				$config['total_rows'] = $tot_hal->num_rows();
				$config['per_page'] = $limit;
				$config['uri_segment'] = 4;
				$config['first_link'] = 'First';
				$config['last_link'] = 'Last';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Prev';
				$this->pagination->initialize($config);
				
				$sources['paginator'] = $this->pagination->create_links();
				
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function updatecontact($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$this->Contact_model->updatecontact($val);
				redirect('pbackend/contact');
			}
		}
		
		public function deletecontact($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$this->Contact_model->deletecontact($val);
				redirect('pbackend/contact');
			}
		}
	}
?>