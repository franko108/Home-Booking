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
    	
    	$this->load->view('header');	
		$this->load->view('help/help_view');
		
    }
	
	
}