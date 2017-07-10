<?php


class News extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('News_front');
		$this->load->model('Main_front');
		$this->load->helper('text');
	}
	
	public function index() {
		$this->load->library('Pagination');
		$page = $this->uri->segment(3);
		$limit = 5;
		if(!$page):
			$offset=0;
		else:
			$offset = $page;
		endif;
		$sources['shownews'] = $this->News_front->get_news($limit, $offset);
		$tot_hal = $this->db->get('news_record');
		$config['base_url'] = base_url() . 'news/index';
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
		$sources['title'] = 'News | Pria Sejati';
		$sources['content'] = 'frontend/news';
		
		$this->load->view('frontend/home', $sources);
	}
	
	public function view($date, $val) {
		$pot = explode('-', $val);
		$getsingle = $this->News_front->getsinglenews($pot[0]);
		foreach($getsingle as $gsing) {
			$ntitle = $gsing->news_title;
		}
		
		$sources['getsinglenews'] = $this->News_front->getsinglenews($pot[0]);
		$sources['othernews'] = $this->News_front->othernews($pot[0]);
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
		$sources['content'] = 'frontend/newsdetail';
		
		$this->load->view('frontend/home', $sources);
	}
}