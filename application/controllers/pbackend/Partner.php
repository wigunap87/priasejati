<?php
	class Partner extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Partner_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Partner | Pria Sejati Administrator';
				$sources['name'] = 'Partner';
				$sources['content'] = 'backend/partner';
				
				$this->load->library('Pagination');
				$page = $this->uri->segment(4);
				$limit = 20;
				if(!$page):
					$offset=0;
				else:
					$offset = $page;
				endif;
				$sources['showpartner'] = $this->Partner_model->get_partner($limit, $offset);
				$tot_hal = $this->db->get('partner_record');
				$config['base_url'] = base_url() . 'pbackend/partner/index';
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
		
		public function searchpartner() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Search Partner | Pria Sejati Administrator';
				$sources['name'] = 'Search Partner';
				$sources['content'] = 'backend/searchpartner';
				
				$sources['no'] = 1;
				$searchkey = $this->security->xss_clean($this->input->post('searchkey'));
				$sources['showpartner'] = $this->Partner_model->getsearchpartner($searchkey);
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addpartner() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Add Partner | Pria Sejati Administrator';
				$sources['name'] = 'Add Partner';
				$sources['content'] = 'backend/addpartner';
				
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addpartner_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_title = $this->security->xss_clean($this->input->post('title'));
					$_url = $this->security->xss_clean($this->input->post('url'));
					$_createdate = date('Y-m-d H:i:s');
					$_status = $this->security->xss_clean($this->input->post('status'));
					
					if(!empty($_FILES['_userfile']['name'])) {
						$config = array(
							'allowed_types' => 'jpg|jpeg|png', // allowed type of images
							'upload_path' => './media/partner',
							'max_size' => 3048
						);
						$this->load->library('upload',$config);
							
						$acak = rand(000000, 999999);
						$upload = $this->upload->do_upload('_userfile');
						$data = array('upload_data' => $this->upload->data());
						$filepath = $data['upload_data']['file_name'];
						$image_data = $this->upload->data();
						$image_config = array (
								'source_image' => $image_data['full_path'],
								'new_image' => $config['upload_path'],
								'file_name' => $image_data['file_name'],
								'maintain_ratio' => true,
								'width' => 1500,
								'height' => 530,
							);
								
						$this->load->library('image_lib');
						//rename uploaded file
						rename($image_config['new_image'] . "/" . $filepath, $image_config['new_image'] . "/" . $acak . $image_config['file_name']);
						//unlink($image_config['new_image'] . "/" . $shimages);
						$folder = $acak . "" .$image_config['file_name'];
							
						$_images = $folder;
					} else if(empty($_FILES['_userfile']['name'])) {
						$_images = '';
					}
					
					$this->Partner_model->add_partner_process($_title, $_images, $_url, $_createdate, $_status);
					
					redirect('pbackend/partner', 'refresh');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function editpartner($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Edit Partner | Pria Sejati Administrator';
				$sources['name'] = 'Edit Partner';
				$sources['content'] = 'backend/editpartner';
				
				$sources['show_partner'] = $this->Partner_model->show_partner($val);
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function editpartner_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_getid = $this->security->xss_clean($this->input->post('getid'));
					$_title = $this->security->xss_clean($this->input->post('title'));
					$_url = $this->security->xss_clean($this->input->post('url'));
					$_createdate = date('Y-m-d H:i:s');
					$_status = $this->security->xss_clean($this->input->post('status'));
					
					$quer = $this->Partner_model->show_partner($this->security->xss_clean($this->input->post('getid', TRUE)));
					foreach($quer as $query) {
						$shimages = $query->partner_images;
					}
							
					if(!empty($_FILES['_userfile']['name'])) {
						$config = array(
							'allowed_types' => 'jpg|jpeg|png', // allowed type of images
							'upload_path' => './media/partner',
							'max_size' => 3048
						);
						$this->load->library('upload',$config);
							
						$acak = rand(000000, 999999);
						$upload = $this->upload->do_upload('_userfile');
						$data = array('upload_data' => $this->upload->data());
						$filepath = $data['upload_data']['file_name'];
						$image_data = $this->upload->data();
						$image_config = array (
								'source_image' => $image_data['full_path'],
								'new_image' => $config['upload_path'],
								'file_name' => $image_data['file_name'],
								'maintain_ratio' => true,
								'width' => 1500,
								'height' => 530,
							);
								
						$this->load->library('image_lib');
						//rename uploaded file
						rename($image_config['new_image'] . "/" . $filepath, $image_config['new_image'] . "/" . $acak . $image_config['file_name']);
						unlink($image_config['new_image'] . "/" . $shimages);
						$folder = $acak . "" .$image_config['file_name'];
							
						$_images = $folder;
					} else if(empty($_FILES['_userfile']['name'])) {
						$_images = $shimages;
					}
					
					
					$this->Partner_model->edit_partner_process($_getid, $_title, $_images, $_url, $_status);
					redirect('pbackend/partner', 'refresh');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function updatepartner($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$this->Partner_model->updatepartner($val);
				redirect('pbackend/partner', 'refresh');
			}
		}
		
		public function deletepartner($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$quer = $this->Partner_model->show_partner($val);
				foreach($quer as $query) {
					unlink("./media/partner/".$query->partner_images);
				}
				
				$this->Partner_model->deletepartner($val);
				redirect('pbackend/partner', 'refresh');
			}
		}
	}
?>