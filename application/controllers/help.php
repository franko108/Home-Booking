<?php
class Help extends CI_Controller {
	
function __construct()
    {
    	parent::__construct();
    	
    	$this->load->helper(array('form', 'language'));
    	// load language file
		$this->lang->load('booking');
		
    	
    }
    
    function index() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/help_view");
		
    }
    
    function install() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/install_view");
		
    }
    
    function guide() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/guide_view");
    	
    }
    
	function recording() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/recording_view");
    	
    }
    
	function transaction() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/transaction_view");
    }
    
    function allRecords() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/allRecords_view");
    }
    
	function categories() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/categories_view");
    }
    
	function backup() {
    	$language = $this->lang->lang();
    	
    	$this->load->view('header');	
		$this->load->view("help/$language/backup_view");
    }
	
	
}