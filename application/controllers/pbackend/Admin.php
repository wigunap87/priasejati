<?php
	class Admin extends CI_Controller {
	
		function __construct() {
			parent::__construct();
			$this->load->model('Admin_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['content'] = 'backend/admin';
				$this->load->library('Pagination');
				$page = $this->uri->segment(4);
				$limit = 20;
				if(!$page):
					$offset = 0;
				else:
					$offset = $page;
				endif;
				$sources['getadmin'] = $this->Admin_model->get_model($limit, $offset);
				$tot_hal = $this->db->get('admin_record');
				$config['base_url'] = base_url() . 'pbackend/admin/index';
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
				$sources['name'] = 'Manage Admin';
				$sources['title'] = 'Manage Admin | Pria Sejati Administrator';
				
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addadmin() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['content'] = 'backend/addadmin';
				$sources['name'] = 'Add Admin';
				$sources['title'] = 'Add Admin | Pria Sejati Administrator';
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addadmin_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_fullname = $this->security->xss_clean($this->input->post('fullname', TRUE));
					$_email = $this->security->xss_clean($this->input->post('email', TRUE));
					$_password = $this->security->xss_clean($this->input->post('password', TRUE));
					$_passwd = sha1($_password);
					$_permission = $this->security->xss_clean($this->input->post('permission', TRUE));
					$_status = $this->security->xss_clean($this->input->post('status', TRUE));
					
					$this->Admin_model->add_admin_process($_fullname, $_email, $_passwd, $_permission, $_status);
					redirect('pbackend/admin', 'refresh');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function editadmin($id) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['content'] = 'backend/editadmin';
				$sources['name'] = 'Edit Admin';
				$sources['title'] = 'Edit Admin | Pria Sejati Administrator';
				$sources['editadmin'] = $this->Admin_model->show_getadmin($id);
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function editadmin_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_getid = $this->security->xss_clean($this->input->post('getid', TRUE));
					$_fullname = $this->security->xss_clean($this->input->post('fullname', TRUE));
					$_email = $this->security->xss_clean($this->input->post('email', TRUE));
					$_password = $this->security->xss_clean($this->input->post('password', TRUE));
					$_permission = $this->security->xss_clean($this->input->post('permission', TRUE));
					$_status = $this->security->xss_clean($this->input->post('status', TRUE));
					
					if(empty($_password)) {
						$quer = $this->Admin_model->show_getadmin($_getid);
						foreach($quer as $query) {
							$_passwd = $query->admin_password;
						}
					} else {
						$_passwd = sha1($_password);
					}
					$this->Admin_model->edit_admin_process($_getid, $_fullname, $_email, $_passwd, $_permission, $_status);
					redirect('pbackend/admin');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function update_admin($id) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$this->Admin_model->update_admin($id);
				redirect('pbackend/admin');
			}
		}
		
		public function deleteadmin($id) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
 				$this->Admin_model->delete_admin($id);
				redirect('pbackend/admin');
			}
		}
	}
?>