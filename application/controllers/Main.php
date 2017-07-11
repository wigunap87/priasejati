<?php


class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Main_front');
		$this->load->helper('text');
	}
	
	public function index() {
		$sources['getslider'] = $this->Main_front->getslider();
		$sources['getcatgallery'] = $this->Main_front->getcatgallery();
		$sources['getabout'] = $this->Main_front->getpage($pos='About Us');
		$sources['getpartner'] = $this->Main_front->getpartner();
		$sources['getnews'] = $this->Main_front->getnews();
		
		
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
			$sources['slogo'] = $gset->setting_logo;
		}
		$sources['title'] = 'Pria Sejati';
		$sources['content'] = 'frontend/main';
		
		$this->load->view('frontend/home', $sources);
	}
	
	public function contact() {
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
			$sources['smaps'] = $gset->setting_map;
			$sources['smetakey'] = $gset->setting_metakey;
			$sources['smetadesc'] = $gset->setting_metadesc;
			$sources['slogo'] = $gset->setting_logo;
		}
		$sources['title'] = 'Contact | Pria Sejati';
		$sources['content'] = 'frontend/contact';
		
		$this->load->view('frontend/home', $sources);
	}
	
	public function contactprocess() {
		if($this->input->post('submit')) {
			$configform = array(
				array('field'=>'fullname', 'name'=>'Name', 'rules'=>'required|max_length[150]'),
				array('field'=>'email', 'name'=>'Email', 'rules'=>'required|valid_email|max_length[150]'),
				array('field'=>'subject', 'name'=>'Subject', 'rules'=>'required|max_length[150]'),
				array('field'=>'message', 'name'=>'Message', 'rules'=>'required')
			);
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules($configform);
			if($this->form_validation->run() != true) {
				$this->session->set_flashdata('errorcontact', '<font color="red">All field required.</font>');
				redirect('contact', 'refresh');
			} else {
				$_fullname = $this->security->xss_clean($this->input->post('fullname', true));
				$_email = $this->security->xss_clean($this->input->post('email', true));
				$_subject = $this->security->xss_clean($this->input->post('subject', true));
				$_message = htmlentities($this->security->xss_clean($this->input->post('message', true)));
				$_createdate = date('Y-m-d H:i:s');
				
				$this->Main_front->insertcontact($_fullname, $_email, $_subject, $_message, $_createdate);
				$this->session->set_flashdata('errorcontact', '<font color="green">Terima kasih, data anda sudah kami simpan.</font>');
				redirect('contact', 'refresh');
			}
		} else {
			$this->session->set_flashdata('errorcontact', '<font color="red">All field required.</font>');
			redirect('contact', 'refresh');
		}
	}
	
	public function about() {
		$sources['getabout'] = $this->Main_front->getpage($pos='About Us Text');
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
			$sources['slogo'] = $gset->setting_logo;
		}
		$sources['title'] = 'About Us | Pria Sejati';
		$sources['content'] = 'frontend/about';
		
		$this->load->view('frontend/home', $sources);
	}
	
	public function search() {
		if($this->input->post('submit')) {
			$searchkey = $this->security->xss_clean($this->input->post('searchkey', true));
			
			$sources['getnews'] = $this->Main_front->get_table($tables='news', $searchkey);
			$sources['getpartner'] = $this->Main_front->get_table($tables='partner', $searchkey);
			$sources['getgallery'] = $this->Main_front->get_table($tables='gallery', $searchkey);
			
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
				$sources['slogo'] = $gset->setting_logo;
			}
			$sources['title'] = 'About Us | Pria Sejati';
			$sources['content'] = 'frontend/search';
			
			$this->load->view('frontend/home', $sources);
		} else {
			$this->session->set_flashdata('errorsearch', '<font color="red">Required</font>');
			redirect('main', 'refresh');
		}
	}
}