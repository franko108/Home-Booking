<?php
class Transaction extends CI_Controller {
	
	function __construct()
    {
    	parent::__construct();
    	
    	$this->load->library(array('table', 'form_validation'));
    	$this->load->helper(array('form'));
    	
    	// load language file
		$this->lang->load('booking');
    	$this->load->model('booking/transactionmodel','',TRUE);
    	
    	$transaction_amount = lang('booking_amount');
    	$this->form_validation->set_rules('transaction_amount', $transaction_amount, 'required|trim|xss_clean');
    	$transaction_date = lang('booking_date');
    	$this->form_validation->set_rules('inputDate', $transaction_date, 'required|trim|xss_clean');
    }
    
    /*
     * Form for transaction from one account to another 
     * and list of all transactions
     */
    function index() {
    	$this->load->model('accountsmodel','',TRUE);
    	$this->load->model('currencymodel','',TRUE);
    	$language = $this->lang->lang(); 
    	
    	$data['action'] = 'booking/transaction/add';
    	$data['id'] = NULL;  // because of edit
    	
    	// accounts dropdown menu
    	$acc = $this->accountsmodel->list_all()->result();
    	
    	// currencies dropdown menu
    	$curr = $this->currencymodel->list_all()->result();
    	
    	$curr_options = array();
    	foreach($curr as $res1){
    		$curr_options["$res1->id"] = ("$res1->name");
    		if($res1->deff == 1){
    			$data['default_currency'] = $res1->id;
    		}
    		
    	}
    	$data['curr_options'] = $curr_options;
    	
    	// acounts dropdown menu
    	$acc_options = array();
    	foreach($acc as$res2){
    		$acc_options["$res2->id"] = ("$res2->name");
    		if($res2->deff == 1){
    			$data['default_accounts'] = $res2->id;
    		}
    	}
    	$data['acc_options'] = $acc_options;
    	
    	// for table with listed records of transaction
    	if($language == 'hr'){
    		$data['transaction_query'] = $this->transactionmodel->list_all_hr();
    	}
    	else {
    		$data['transaction_query'] = $this->transactionmodel->list_all();
    	}	
    	
		$this->load->view('header');  
		$this->load->view('booking/transaction_view', $data);
    }
    
    function add() {
    	// validation 
    	$a = 1; // TODO ovo maknuti i napraviti pravu validaciju
    	// if ($this->form_validation->run() == FALSE)
    	if($a < 1)
		{
			$data['action'] = 'booking/transaction/add';
			$data['id']	    = NULL;
			$data['name']   = NULL;
			$data['deff']   = NULL;
			
			$this->load->view('header');
			$this->load->view('booking/transaction_view', $data);
		}
		else
		{
			// if edit, delete previous entry and then add new one
			if($this->input->post('id')){
				$id = $this->input->post('id');
				$this->transactionmodel->delete($id);
			}
			
			$date_transaction = form_prep($this->input->post('inputDate'));
	    	$amount = $this->input->post('transaction_amount');
	    	
		 	// hr language date has a different format and needs to be formated in yyyy-mm-dd 
	    	$language = $this->input->post('language');
	    	if($language == 'hr'){
	    		$date_transaction = $this->hrdatum($date_transaction);
	    	}
	    	
	    	$outAccount = $this->input->post('outAccount');
	    	$inAccount = $this->input->post('inAccount');
	    	$inputGroup = NULL; // ? is this ok ?? There will be no groups on reports for transactions...
	    	$pending =  0;
	    	 
	    	// allways the same entry for description: Transfer
	    	$description = lang('transaction_description');

	    	// get id for transaction... maybe will change and put on separate table
	    	$q = $this->transactionmodel->last_transaction_id()->row();
			if(isset($q)){
				$transaction_id = ($q->transaction) + 1;
				
			}
			else {
				$transaction_id = 1;
			}
	    
	    	// 2 entries in database, first is amount taken from one account, goes as outcome 
	    	$data_entry = array('description' => $description,
	    						'idCurrency' => $this->input->post('currency'),
	    						'idAccounts' => $outAccount,
	    						'idInputGroup' => $inputGroup,
	    						'income' => NULL,
	    						'dateEntry'=>$date_transaction,
	    						'outcome' => $amount,
	    						'pending' => $pending,
	    						'transaction' => $transaction_id
	    	);
	    	
	    	// insert into database
			$this->transactionmodel->add($data_entry);
			
			// second entries as income into another account
			$data_entry1 = array('description' => $description,
	    						'idCurrency' => $this->input->post('currency'),
	    						'idAccounts' => $inAccount,
	    						'idInputGroup' => $inputGroup,
	    						'income' => $amount,
	    						'dateEntry'=>$date_transaction,
	    						'outcome' => NULL,
	    						'pending' => $pending,
								'transaction' => $transaction_id  
	    	);
	    	
	    	// insert into database
			$this->transactionmodel->add($data_entry1);
			
			echo "<script>alert('Upisani podaci o transakciji u bazu')</script>";
			
			redirect('booking/transaction','refresh');
		}
    	
    }
    
    function edit($id) {
    	$this->load->model('accountsmodel','',TRUE);
    	$this->load->model('currencymodel','',TRUE);
    	$language = $this->lang->lang(); 
    	
    	$data['action'] = 'booking/transaction/add';

    	// data for editing
    	if($language == 'hr'){
    		$transaction = $this->transactionmodel->get_hr($id)->result();
    	}
    	else {
    		$transaction = $this->transactionmodel->get($id)->result();	
    	}
    	
    	// fill values from previous entry
    	foreach($transaction as $res) {
    		$data['inputDate'] = $res->dateEntry;
    		if($res->income == 0 || $res->income == NULL){
    			$data['transaction_amount'] = $res->outcome;  
    			$data['default_currency'] = $res->idCurrency;   
    			$data['outcome_account'] = $res->idAccounts;  
    		}
    		else {
    			$data['income_account'] = $res->idAccounts;  
    		}
    	}
    	
    	$data['id'] = $id; 
    	
    	// accounts dropdown menu
    	$acc = $this->accountsmodel->list_all()->result();
    	
    	// currencies dropdown menu
    	$curr = $this->currencymodel->list_all()->result();
    	
    	$curr_options = array();
    	foreach($curr as $res1){
    		$curr_options["$res1->id"] = ("$res1->name");
    	}
    	$data['curr_options'] = $curr_options;
    	
    	// acounts dropdown menu
    	$acc_options = array();
    	foreach($acc as$res2){
    		$acc_options["$res2->id"] = ("$res2->name");
    	}
    	
    	$data['acc_options'] = $acc_options;
    	
    	$this->load->view('header');  
		$this->load->view('booking/transaction_edit', $data);
    		
    }
    
    
    function delete($idTransaction){

    	$this->transactionmodel->delete($idTransaction);
		redirect('booking/transaction','refresh');
    }
    
	// dd.mm.yyyy date in format yyyy-mm-dd		
	function hrdatum($datum_b){
  		$datum_conv = explode(".", $datum_b);
		$datum = strftime("%Y-%m-%d",mktime(0,0,0,$datum_conv[1],$datum_conv[0],$datum_conv[2]));
		return $datum;
	}
    
	
}