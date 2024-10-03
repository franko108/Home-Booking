<?php
class Categories extends CI_Controller {
	
	public function __construct()
    {
    	parent::__construct();
    	
    	$this->load->library(array('table', 'form_validation'));
    	$this->load->helper(array('form', 'language'));
    	// load language file
		$this->lang->load('categories');
    	$this->load->model('categoriesmodel','',TRUE);
    }
    
    public function index() {
    	// workaround for language within js
    	$delete = lang('delete');
    	$update = lang('update_data');
    	$delete_data = lang('delete_data');
    	$language = $this->lang->lang();
    	
    	// creating a table of all inserted data 
    	$q = $this->categoriesmodel->list_all()->result();
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading(lang('header_name') ,lang('cat_income_outcome'), ' ');  
		
		foreach($q as $res){
			$income_outcome = $res->income_outcome;
			if($income_outcome == 1){
				$income_outcome = lang('cat_income'); 
			}
			else {
				$income_outcome = lang('cat_outcome');
			}
			$this->table->add_row($res->name,
								  $income_outcome,
			anchor('categories/edit/'.$res->id, $update,  array('class'=>'update')) .'|'.
			anchor('categories/delete/'.$res->id, $delete_data , array('class'=>'delete','onclick'=>"return confirm('$delete $res->name ? ')"))	
			);
			
			// anchor('person/update/'.$person->id,'update',array('class'=>'update')).' '.
		}
		$data['table'] = $this->table->generate();	
	
		$this->load->view('header');	
		$this->load->view('categories_view', $data);
    	
    }
    
    public function add() {
    	
    	// validation
    	if ($this->form_validation->run('categories') == FALSE)  
		{
			$data['action'] = 'categories/add';
			$data['id']	    = '';
			$data['name']   = '';
			$data['in_out']   = '';
			
			$this->load->view('header');	
			$this->load->view('categories_edit', $data);
		}
		else
		{
			$name_categories = form_prep($this->input->post('name'));
	    	$default_categories = $this->input->post('income_outcome');
	    	
	    	$categories_entry = array('name' => $name_categories,
	    						'income_outcome' => $default_categories 
	    	);
	    	
	    	// insert into database
			$this->categoriesmodel->add($categories_entry);
			redirect('categories','refresh');
		}
    	
    }
    
    public function edit($id) {
   		$data['action'] = 'categories/update';
   		
   		$curr = $this->categoriesmodel->get($id)->row();
   		
   		$data['id'] = $id;
   		$data['name'] = $curr->name; 
   		$data['in_out'] = $curr->income_outcome; 
   		
   		$this->load->view('header');	
   		$this->load->view('categories_edit', $data);	
   		
    	
    }
    
    public function update(){
    	$name_categories = form_prep($this->input->post('name'));
    	$type_categories = $this->input->post('income_outcome');  
    	$id = $this->input->post('id');
    	
    	if ($this->form_validation->run('categories') == FALSE)  // form validation za categories
		{
			$data['action'] = 'categories/update';
			$data['name']   = '';
			$this->load->view('categories_edit', $data);
		}
		else
		{
			 $data = array('name' => $name_categories,
        			  'income_outcome' => $type_categories 
       		 ); 	
	    	// update in database:
	    	$this->categoriesmodel->update($id, $data);
	    	redirect('categories','refresh');
		}
    	
    }
    
	public function delete($id) {
		$this->categoriesmodel->delete($id);
		
		redirect('categories','refresh');
	}
	
}