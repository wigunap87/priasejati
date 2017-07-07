<?php
	class Gallery extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Gallery_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Gallery | Pria Sejati Administrator';
				$sources['name'] = 'Gallery';
				$sources['content'] = 'backend/gallery';
				
				$this->load->library('Pagination');
				$page = $this->uri->segment(4);
				$limit = 20;
				if(!$page):
					$offset=0;
				else:
					$offset = $page;
				endif;
				$sources['showgallery'] = $this->Gallery_model->get_gallery($limit, $offset);
				$tot_hal = $this->db->get('gallery_record');
				$config['base_url'] = base_url() . 'pbackend/gallery/index';
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
		
		public function searchgallery() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Search Gallery | Pria Sejati Administrator';
				$sources['name'] = 'Search Gallery';
				$sources['content'] = 'backend/searchgallery';
				
				$sources['no'] = 1;
				$searchkey = $this->security->xss_clean($this->input->post('searchkey'));
				$sources['showgallery'] = $this->Gallery_model->getsearchgallery($searchkey);
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addgallery() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Add Gallery | Pria Sejati Administrator';
				$sources['name'] = 'Add Gallery';
				$sources['content'] = 'backend/addgallery';
				
				$sources['getcategory'] = $this->Gallery_model->getcategory();
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addgallery_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_categoryid = $this->security->xss_clean($this->input->post('category_id'));
					$_title = $this->security->xss_clean($this->input->post('title'));
					$_desc = htmlentities($this->security->xss_clean($this->input->post('desc')));
					$_createdate = date('Y-m-d H:i:s');
					$_status = $this->security->xss_clean($this->input->post('status'));
					
					if(!empty($_FILES['_userfile']['name'])) {
						$config = array(
							'allowed_types' => 'jpg|jpeg|png', // allowed type of images
							'upload_path' => './media/gallery',
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
					
					$this->Gallery_model->add_gallery_process($_categoryid, $_title, $_images, $_desc, $_createdate, $_status);
					
					redirect('pbackend/gallery', 'refresh');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function editgallery($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Edit Gallery | Pria Sejati Administrator';
				$sources['name'] = 'Edit Gallery';
				$sources['content'] = 'backend/editgallery';
				
				$sources['show_gallery'] = $this->Gallery_model->show_gallery($val);
				$sources['getcategory'] = $this->Gallery_model->getcategory();
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function editgallery_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_getid = $this->security->xss_clean($this->input->post('getid'));
					$_categoryid = $this->security->xss_clean($this->input->post('category_id'));
					$_title = $this->security->xss_clean($this->input->post('title'));
					$_desc = htmlentities($this->security->xss_clean($this->input->post('desc')));
					$_createdate = date('Y-m-d H:i:s');
					$_status = $this->security->xss_clean($this->input->post('status'));
					
					$quer = $this->Gallery_model->show_gallery($this->security->xss_clean($this->input->post('getid', TRUE)));
					foreach($quer as $query) {
						$shimages = $query->gallery_images;
					}
							
					if(!empty($_FILES['_userfile']['name'])) {
						$config = array(
							'allowed_types' => 'jpg|jpeg|png', // allowed type of images
							'upload_path' => './media/gallery',
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
					
					
					$this->Gallery_model->edit_gallery_process($_getid, $_categoryid, $_title, $_images, $_desc, $_status);
					redirect('pbackend/gallery', 'refresh');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function updategallery($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$this->Gallery_model->updategallery($val);
				redirect('pbackend/gallery', 'refresh');
			}
		}
		
		public function deletegallery($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$quer = $this->Gallery_model->show_gallery($val);
				foreach($quer as $query) {
					unlink("./media/gallery/".$query->gallery_images);
				}
				
				$this->Gallery_model->deletegallery($val);
				redirect('pbackend/gallery', 'refresh');
			}
		}
	}
?>