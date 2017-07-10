<?php


class Gallery extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Main_front');
		$this->load->model('Gallery_front');
	}
	
	public function index() {
		$this->load->library('Pagination');
		$page = $this->uri->segment(3);
		$limit = 16;
		if(!$page):
			$offset=0;
		else:
			$offset = $page;
		endif;
		$sources['showgallery'] = $this->Gallery_front->get_catgallery($limit, $offset);
		$tot_hal = $this->db->get('catgallery_record');
		$config['base_url'] = base_url() . 'gallery/index';
		$sources['no'] = $offset + 1;
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
			
		$sources['paginator'] = $this->pagination->create_links();
		
		// Setting Home
		$sources['arrayseo'] = array('~','`','!','@','#','$','%','^','&','*','(',')','_','+','=','[',']','{','}','|',':',';','"',"'",'<',',','>','.','?','/',' ','<br/>');
		$getsetting = $this->Main_front->getsetting();
		foreach($getsetting as $gset) {
			$sources['saddress'] = $gset->setting_address;
			$sources['sphone'] = $gset->setting_phone;
			$sources['sfax'] = $gset->setting_fax;
			$sources['semail'] = $gset->setting_email;
			$sources['sfacebook'] = $gset->setting_facebook;
			$sources['stwitter'] = $gset->setting_twitter;
			$sources['sinstagram'] = $gset->setting_instagram;
			$sources['smetakey'] = $gset->setting_metakey;
			$sources['smetadesc'] = $gset->setting_metadesc;
		}
		$sources['title'] = 'Gallery | Pria Sejati';
		$sources['content'] = 'frontend/gallery';
		
		$this->load->view('frontend/home', $sources);
	}
	
	public function view($val) {
		$pot = explode('-', $val);
		$getsingle = $this->Gallery_front->getsinglecategory($pot[0]);
		foreach($getsingle as $gsing) {
			$ntitle = $gsing->catgallery_title;
		}
		
		$sources['singlecat'] = $this->Gallery_front->getsinglecategory($pot[0]);
		
		$this->load->library('Pagination');
		$page = $this->uri->segment(4);
		$limit = 16;
		if(!$page):
			$offset=0;
		else:
			$offset = $page;
		endif;
		$sources['showgallery'] = $this->Gallery_front->getallgallery($pot[0], $limit, $offset);
		$tot_hal = $this->db->get_where('gallery_record', array('category_id'=>$pot[0], 'gallery_status'=>'Publish'));
		$config['base_url'] = base_url() . 'gallery/view/'.$pot[0];
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
		
		// Setting Home
		$sources['arrayseo'] = array('~','`','!','@','#','$','%','^','&','*','(',')','_','+','=','[',']','{','}','|',':',';','"',"'",'<',',','>','.','?','/',' ','<br/>');
		$getsetting = $this->Main_front->getsetting();
		foreach($getsetting as $gset) {
			$sources['saddress'] = $gset->setting_address;
			$sources['sphone'] = $gset->setting_phone;
			$sources['sfax'] = $gset->setting_fax;
			$sources['semail'] = $gset->setting_email;
			$sources['sfacebook'] = $gset->setting_facebook;
			$sources['stwitter'] = $gset->setting_twitter;
			$sources['sinstagram'] = $gset->setting_instagram;
			$sources['smetakey'] = $gset->setting_metakey;
			$sources['smetadesc'] = $gset->setting_metadesc;
		}
		$sources['title'] = $ntitle.' | Pria Sejati';
		$sources['content'] = 'frontend/gallerydetail';
		
		$this->load->view('frontend/home', $sources);
	}
}