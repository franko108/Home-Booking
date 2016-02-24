<?php
class Help extends CI_Controller {
	
function __construct()
    {
    	parent::__construct();
    	
    	$this->load->helper(array('form', 'language'));
    	// load language file
		$this->lang->load('booking');
		
    	
    }
    
    public function index() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/help_view");
		
    }
    
    public function install() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/install_view");
		
    }
    
    public function guide() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/guide_view");
    	
    }
    
	public function recording() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/recording_view");
    	
    }
    
	public function transaction() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/transaction_view");
    }
    
    public function allRecords() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/allRecords_view");
    }
    
	public function categories() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/categories_view");
    }
    
    public function autoinsert() {
    	$language = $this->lang->lang();
    	 
    	$this->load->view('header');
    	$this->load->view("help/$language/autoinsert_view");
    }
    
	public function search() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/search_view");
    }
    
	public function backup() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/backup_view");
    }
	
	
}