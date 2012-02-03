<?php
class Currency extends CI_Controller {
	
	function __construct()
    {
    	parent::__construct();
    	
    	$this->load->library(array('table', 'form_validation'));
    	$this->load->helper(array('form', 'language'));
    	// load language file
		$this->lang->load('currency');
		
    	$this->load->model('currencymodel','',TRUE);
    	
   	  	// validation rules
    	$curr_name = lang('currency_name');
    	$this->form_validation->set_rules('name', "$curr_name", 'required|trim|xss_clean');
    }
    
    // list all currencies, entry the new one
    function index() {
    	// workaround for language within js
    	$delete = lang('delete');
    	$update = lang('update_data');
    	$delete_data = lang('delete_data');
    	
    	// creating a table of all inserted currencies
    	$q = $this->currencymodel->list_all()->result();
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading(lang('header_name') ,lang('default'), ' ');
		
		foreach($q as $res){
			$default = $res->deff;
			if($default == 1){
				$default = lang('default_setting');
			}
			else {
				$default = NULL;
			}
			
			$this->table->add_row($res->name,
								  $default,
			anchor('currency/edit/'.$res->id, $update, array('class'=>'update')) .' | '.
			anchor('currency/delete/'.$res->id, $delete_data, array('class'=>'delete','onclick'=>"return confirm('$delete  $res->name ? ')"))	
			);
		}
		$data['table'] = $this->table->generate();	
		
		$this->load->view('header');	
		$this->load->view('currency_view', $data);
    	
    }
    
    function add() {
    	
    	// validation
    	if ($this->form_validation->run() == FALSE)
		{
			$data['action'] = 'currency/add';
			$data['id']	    = '';
			$data['name']   = '';
			$data['deff']   = '';
			
			$this->load->view('header');
			$this->load->view('currency_edit', $data);
		}
		else
		{
			$name_currency = form_prep($this->input->post('name'));
	    	$default_curency = $this->input->post('deff');
	    	
	    	// delete previous default settings if this is the new one
	    	if($default_curency == 1) {
	    		$this->currencymodel->delete_default();
	    	}
	    	$curr_entry = array('name' => $name_currency,
	    						'deff' => $default_curency
	    	);
	    	
	    	 
	    	// insert into database
			$this->currencymodel->add($curr_entry);
			redirect('currency','refresh');
		}
    	
    }
    
    function edit($id) {
		// $data['link'] = '../';
   		$data['action'] = 'currency/update';
   		
   		$curr = $this->currencymodel->get($id)->row();
   		
   		$data['id'] = $id;
   		$data['name'] = $curr->name; 
   		$data['deff'] = $curr->deff;
   		
   		$this->load->view('header');
   		$this->load->view('currency_edit', $data);	
   		
    	
    }
    
    function update(){
    	$name_currency = form_prep($this->input->post('name'));
    	$default_currency = $this->input->post('deff');
    	$id = $this->input->post('id');
    	
    	if ($this->form_validation->run() == FALSE)
		{
			$data['action'] = 'currency/update';
			$data['id'] = $id;
			$data['name']   = '';
			$data['deff'] = $default_currency;
			$this->load->view('currency_edit', $data);
		}
		else
		{
			 $data = array('name' => $name_currency,
        			  'deff' => $default_currency 
       		 ); 	
       		 
			 // if this is a new default account, remove another default acc. if exists
       		 if($default_currency == 1) {
       		 	$this->currencymodel->delete_default();
       		 }
       		 
	    	// update in database:
	    	$this->currencymodel->update($id, $data);
	    	redirect('currency','refresh');
		}
    	
    }
    
	function delete($id) {
		$this->currencymodel->delete($id);
		
		// redirect to skola list page
		redirect('currency','refresh');
	}
    
	
	
}