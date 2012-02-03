<?php
class Accounts extends CI_Controller {
	
	function __construct()
    {
    	parent::__construct();
    	
    	$this->load->library(array('table', 'form_validation'));
    	$this->load->helper(array('form', 'language'));
    	// load language file
		$this->lang->load('accounts');
    	$this->load->model('accountsmodel','',TRUE);
    	
    	// validation rules
    	$acc_name = lang('accounts_name');
    	$this->form_validation->set_rules('name', "$acc_name", 'required|trim|xss_clean');
    }
    
    // list all 
    function index() {
    	// workaround for language within js
    	$delete = lang('delete');
    	$update = lang('update_data');
    	$delete_data = lang('delete_data');
    	
    	// creating a table of all inserted data 
    	$q = $this->accountsmodel->list_all()->result();
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
			anchor('accounts/edit/'.$res->id, $update,array('class'=>'update')) .'|'.
			anchor('accounts/delete/'.$res->id, $delete_data, array('class'=>'delete','onclick'=>"return confirm('$delete $res->name ? ')"))	
			);
		}
		$data['table'] = $this->table->generate();	
	
		$this->load->view('header');	
		$this->load->view('accounts_view', $data);
    	
    }
    
    function add() {
    	
    	
    	if ($this->form_validation->run() == FALSE)
		{
			$data['action'] = 'accounts/add';
			$data['id']	    = '';
			$data['name']   = '';
			$data['deff']   = '';
			
			$this->load->view('header');	
			$this->load->view('accounts_edit', $data);
		}
		else
		{
			$name_accounts = form_prep($this->input->post('name'));
	    	$default_accounts = $this->input->post('deff');
	    	
	    	$accounts_entry = array('name' => $name_accounts,
	    						'deff' => $default_accounts
	    	);
	    	
	    	// insert into database
			$this->accountsmodel->add($accounts_entry);
			redirect('accounts','refresh');
		}
    	
    }
    
    function edit($id) {
   		$data['action'] = 'accounts/update';
   		
   		$curr = $this->accountsmodel->get($id)->row();
   		
   		$data['id'] = $id;
   		$data['name'] = $curr->name; 
   		$data['deff'] = $curr->deff;
   		
   		$this->load->view('header');	
   		$this->load->view('accounts_edit', $data);	
    	
    }
    
    function update(){
    	$name_accounts = form_prep($this->input->post('name'));
    	$default_accounts = $this->input->post('deff');
    	$id = $this->input->post('id');
    	
    	if ($this->form_validation->run() == FALSE)
		{
			$data['action'] = "accounts/update";
			$data['id'] = $id;
			$data['name']   = '';
			$data['deff'] = $default_accounts;
			$this->load->view('header');
			$this->load->view('accounts_edit', $data);
		}
		else
		{
			 $data = array('name' => $name_accounts,
        			  'deff' => $default_accounts 
       		 ); 	
       		 
       		 // if this is a new default account, remove another default acc. if exists
       		 if($default_accounts == 1) {
       		 	$this->accountsmodel->removeDefault();
       		 }
       		 
	    	// update in database:
	    	$this->accountsmodel->update($id, $data);
	    	redirect('accounts','refresh');
		}
    	
    }
    
	function delete($id) {
		$this->accountsmodel->delete($id);
		
		redirect('accounts','refresh');
	}
	
	
}