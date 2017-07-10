<?php
	class News extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('News_model');
		}
		
		public function index() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'News | Pria Sejati Administrator';
				$sources['name'] = 'News';
				$sources['content'] = 'backend/news';
				
				$this->load->library('Pagination');
				$page = $this->uri->segment(4);
				$limit = 20;
				if(!$page):
					$offset=0;
				else:
					$offset = $page;
				endif;
				$sources['shownews'] = $this->News_model->get_news($limit, $offset);
				$tot_hal = $this->db->get('news_record');
				$config['base_url'] = base_url() . 'pbackend/news/index';
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
		
		public function searchnews() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Search News | Pria Sejati Administrator';
				$sources['name'] = 'Search News';
				$sources['content'] = 'backend/searchnews';
				
				$sources['no'] = 1;
				$searchkey = $this->security->xss_clean($this->input->post('searchkey'));
				$sources['shownews'] = $this->News_model->getsearchnews($searchkey);
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addnews() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Add News | Pria Sejati Administrator';
				$sources['name'] = 'Add News';
				$sources['content'] = 'backend/addnews';
				
				
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function addnews_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_title = $this->security->xss_clean($this->input->post('title'));
					$_desc = htmlentities($this->security->xss_clean($this->input->post('desc')));
					$_createdate = date('Y-m-d H:i:s');
					$_status = $this->security->xss_clean($this->input->post('status'));
					
					if(!empty($_FILES['_userfile']['name'])) {
						$config = array(
							'allowed_types' => 'jpg|jpeg|png', // allowed type of images
							'upload_path' => './media/news',
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
						
						$path = $image_config['new_image'] . "/" .$folder;
						$cofiguration['image_library'] = 'gd2';
						$cofiguration['source_image'] = $path;
						$cofiguration['create_thumb'] = FALSE;
						$cofiguration['maintain_ratio'] = FALSE;
						
						if ($data['upload_data']['image_width'] > $data['upload_data']['image_height']) {
							$cofiguration['width'] = $data['upload_data']['image_height'];
							$cofiguration['height'] = $data['upload_data']['image_height'];
							$cofiguration['x_axis'] = (($data['upload_data']['image_width'] / 2) - ($cofiguration['width'] / 2));
							
						} else {
							$cofiguration['height'] = $data['upload_data']['image_width'];
							$cofiguration['width'] = $data['upload_data']['image_width'];
							$cofiguration['y_axis'] = (($data['upload_data']['image_height'] / 2) - ($cofiguration['height'] / 2));
							
						}
						
						$this->image_lib->clear();
						$this->image_lib->initialize($cofiguration);
						$this->image_lib->crop();
						
						$_images = $folder;
					} else if(empty($_FILES['_userfile']['name'])) {
						$_images = '';
					}
					
					$this->News_model->add_news_process($_title, $_images, $_desc, $_createdate, $_status);
					
					redirect('pbackend/news', 'refresh');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function editnews($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$sources['title'] = 'Edit News | Pria Sejati Administrator';
				$sources['name'] = 'Edit News';
				$sources['content'] = 'backend/editnews';
				
				$sources['show_news'] = $this->News_model->show_news($val);
				$this->load->view('backend/home', $sources);
			}
		}
		
		public function editnews_process() {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				if($this->input->post('submit')) {
					$_getid = $this->security->xss_clean($this->input->post('getid'));
					$_title = $this->security->xss_clean($this->input->post('title'));
					$_desc = htmlentities($this->security->xss_clean($this->input->post('desc')));
					$_createdate = date('Y-m-d H:i:s');
					$_status = $this->security->xss_clean($this->input->post('status'));
					
					$quer = $this->News_model->show_news($this->security->xss_clean($this->input->post('getid', TRUE)));
					foreach($quer as $query) {
						$shimages = $query->news_images;
					}
							
					if(!empty($_FILES['_userfile']['name'])) {
						$config = array(
							'allowed_types' => 'jpg|jpeg|png', // allowed type of images
							'upload_path' => './media/news',
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
						$path = $image_config['new_image'] . "/" .$folder;
						$cofiguration['image_library'] = 'gd2';
						$cofiguration['source_image'] = $path;
						$cofiguration['create_thumb'] = FALSE;
						$cofiguration['maintain_ratio'] = FALSE;
						
						if ($data['upload_data']['image_width'] > $data['upload_data']['image_height']) {
							$cofiguration['width'] = $data['upload_data']['image_height'];
							$cofiguration['height'] = $data['upload_data']['image_height'];
							$cofiguration['x_axis'] = (($data['upload_data']['image_width'] / 2) - ($cofiguration['width'] / 2));
							
						} else {
							$cofiguration['height'] = $data['upload_data']['image_width'];
							$cofiguration['width'] = $data['upload_data']['image_width'];
							$cofiguration['y_axis'] = (($data['upload_data']['image_height'] / 2) - ($cofiguration['height'] / 2));
							
						}
						
						$this->image_lib->clear();
						$this->image_lib->initialize($cofiguration);
						$this->image_lib->crop();
						
						$_images = $folder;
					} else if(empty($_FILES['_userfile']['name'])) {
						$_images = $shimages;
					}
					
					
					$this->News_model->edit_news_process($_getid, $_title, $_images, $_desc, $_status);
					redirect('pbackend/news', 'refresh');
				} else {
					redirect('pbackend/main', 'refresh');
				}
			}
		}
		
		public function updatenews($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$this->News_model->updatenews($val);
				redirect('pbackend/news', 'refresh');
			}
		}
		
		public function deletenews($val) {
			if($this->session->userdata('adminLogin') != TRUE) {
				redirect('pbackend/main', 'refresh');
			} else {
				$quer = $this->News_model->show_news($val);
				foreach($quer as $query) {
					unlink("./media/news/".$query->news_images);
				}
				
				$this->News_model->deletenews($val);
				redirect('pbackend/news', 'refresh');
			}
		}
	}
?>