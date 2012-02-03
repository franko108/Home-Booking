<?php
class Currency extends CI_Controller {
	
	function __construct()
    {
    	parent::__construct();
    	
    	$this->load->library(array('table', 'form_validation'));
    	$this->load->helper(array('form'));
    	$this->load->model('currencymodel','',TRUE);
    }
    
    // list all 
    function index() {
    	
    	// creating a table of all inserted 
    	$q = $this->currencymodel->list_all()->result();
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('NAME' ,'DEFAULT', ' ');
		
		foreach($q as $res){
			$this->table->add_row($res->name,
								  $res->deff,
			anchor('currency/edit/'.$res->id,'Izmjena',array('class'=>'linkslova')) .'|'.
			anchor('currency/delete/'.$res->id,'Brisanje',array('class'=>'linkslova','onclick'=>"return confirm('Želite li obrisati valutu $res->name ? ')"))	
			);
		}
		$data['table'] = $this->table->generate();	
	
		$this->load->view('currency_view', $data);
    	
    }
    
    function add() {
    	
    	// validation
    	if ($this->form_validation->run('currency') == FALSE)
		{
			$data['action'] = 'currency/add';
			$data['id']	    = '';
			$data['name']   = '';
			$data['deff']   = '';
			
			$this->load->view('currency_edit', $data);
		}
		else
		{
			$name_currency = form_prep($this->input->post('name'));
	    	$default_curency = $this->input->post('deff');
	    	
	    	$curr_entry = array('name' => $name_currency,
	    						'deff' => $default_curency
	    	);
	    	
	    	// insert into database
			$this->currencymodel->add($curr_entry);
			redirect('currency','refresh');
		}
    	
    }
    
    function edit($id) {
    	$data['title'] = 'IZMJENA PODATAKA O VALUTI';   		
		// $data['link'] = '../';
   		$data['action'] = 'currency/update';
   		
   		$curr = $this->currencymodel->get($id)->row();
   		
   		$data['id'] = $id;
   		$data['name'] = $curr->name; 
   		$data['deff'] = $curr->deff;
   		
   		$this->load->view('currency_edit', $data);	
   		
    	
    }
    
    function update(){
    	$name_currency = form_prep($this->input->post('name'));
    	$default_curency = $this->input->post('deff');
    	$id = $this->input->post('id');
    	
    	if ($this->form_validation->run('currency') == FALSE)
		{
			$data['action'] = 'currency/update';
			$data['name']   = '';
			$this->load->view('currency_edit', $data);
		}
		else
		{
			 $data = array('name' => $name_currency,
        			  'deff' => $default_curency 
       		 ); 	
	    	// update in database:
	    	$this->currencymodel->update($id, $data);
	    	redirect('currency','refresh');
		}
    	
    }
    
	function delete($id) {
		$this->currencymodel->delete($id);
		
		redirect('currency','refresh');
	}
	
}