<?php
	class Slider extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Slider_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Slider | Pria Sejati Administrator';
				$sources['name'] = 'Slider';
				$sources['content'] = 'backend/Slider';
				
				$this->load->library('Pagination');
				$page = $this->uri->segment(4);
				$limit = 20;
				if(!$page):
					$offset=0;
				else:
					$offset = $page;
				endif;
				$sources['showslider'] = $this->Slider_model->get_slider($limit, $offset);
				$tot_hal = $this->db->get('slider_record');
				$config['base_url'] = base_url() . 'pbackend/slider/index';
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
		
		public function searchslider() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Search Slider | Pria Sejati Administrator';
				$sources['name'] = 'Search Slider';
				$sources['content'] = 'backend/searchslider';
				
				$sources['no'] = 1;
				$searchkey = $this->security->xss_clean($this->input->post('searchkey'));
				$sources['showslider'] = $this->Slider_model->getsearchslider($searchkey);
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addslider() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Add Slider | Pria Sejati Administrator';
				$sources['name'] = 'Add Slider';
				$sources['content'] = 'backend/addslider';
				
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addslider_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_title = $this->security->xss_clean($this->input->post('title'));
					$_sort = $this->security->xss_clean($this->input->post('sort'));
					$_link = $this->security->xss_clean($this->input->post('link'));
					$_status = $this->security->xss_clean($this->input->post('status'));
					
					if(!empty($_FILES['_userfile']['name'])) {
						$config = array(
							'allowed_types' => 'mp4', // allowed type of images
							'upload_path' => './media/slider',
							'max_size' => 100000
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
						//rename uploaded file
						rename($image_config['new_image'] . "/" . $filepath, $image_config['new_image'] . "/" . $acak . $image_config['file_name']);
						//unlink($image_config['new_image'] . "/" . $shimages);
						$folder = $acak . "" .$image_config['file_name'];
							
						$_images = $folder;
					} else if(empty($_FILES['_userfile']['name'])) {
						$_images = '';
					}
					
					$this->Slider_model->add_slider_process($_title, $_images, $_sort, $_status);
					
					redirect('pbackend/slider', 'refresh');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function editslider($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Edit Slider | Pria Sejati Administrator';
				$sources['name'] = 'Edit Slider';
				$sources['content'] = 'backend/editslider';
				
				$sources['show_slider'] = $this->Slider_model->show_slider($val);
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function editslider_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_getid = $this->security->xss_clean($this->input->post('getid'));
					$_title = $this->security->xss_clean($this->input->post('title'));
					$_sort = $this->security->xss_clean($this->input->post('sort'));
					$_link = $this->security->xss_clean($this->input->post('link'));
					$_status = $this->security->xss_clean($this->input->post('status'));
					
					$quer = $this->Slider_model->show_slider($this->security->xss_clean($this->input->post('getid', TRUE)));
					foreach($quer as $query) {
						$shimages = $query->slider_images;
					}
							
					if(!empty($_FILES['_userfile']['name'])) {
						$config = array(
							'allowed_types' => 'mp4', // allowed type of images
							'upload_path' => './media/slider',
							'max_size' => 100000
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
								
						//rename uploaded file
						rename($image_config['new_image'] . "/" . $filepath, $image_config['new_image'] . "/" . $acak . $image_config['file_name']);
						unlink($image_config['new_image'] . "/" . $shimages);
						$folder = $acak . "" .$image_config['file_name'];
							
						$_images = $folder;
					} else if(empty($_FILES['_userfile']['name'])) {
						$_images = $shimages;
					}
					
					
					$this->Slider_model->edit_slider_process($_getid, $_title, $_images, $_sort, $_status);
					redirect('pbackend/slider', 'refresh');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function updateslider($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$this->Slider_model->updateslider($val);
				redirect('pbackend/slider', 'refresh');
			}
		}
		
		public function deleteslider($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$quer = $this->Slider_model->show_slider($val);
				foreach($quer as $query) {
					unlink("./media/slider/".$query->slider_images);
				}
				
				$this->Slider_model->deleteslider($val);
				redirect('pbackend/slider', 'refresh');
			}
		}
	}
?>