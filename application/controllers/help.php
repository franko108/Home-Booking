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
	
	
}