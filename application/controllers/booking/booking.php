<?php
class Booking extends CI_Controller {
	
	function __construct()
    {
    	parent::__construct();
    	
    	$this->load->library(array('table', 'form_validation'));
    	$this->load->helper(array('form', 'language'));
    	// load language file
		$this->lang->load('booking');
    	$this->load->model('booking/bookingmodel','',TRUE);
    	
    	
    	$this->form_validation->set_rules('booking_description', 'Description', 'trim|xss_clean');
    	$booking_amount = lang('booking_amount');
    	$this->form_validation->set_rules('booking_amount', $booking_amount, 'required|trim|xss_clean|numeric');
    	$booking_date = lang('booking_date');
    	$this->form_validation->set_rules('inputDate', $booking_date, 'required|trim|xss_clean');
    	$this->form_validation->set_rules('in_out', 'In-Out', 'xss_clean');
    	
    }
 
    function in($in_out) {
    	$this->load->model('categoriesmodel','',TRUE);
    	$this->load->model('currencymodel','',TRUE);
    	$this->load->model('accountsmodel','',TRUE);
    	
    	// check  if there are settings for at least one account, currency and category
    	$this->load->library(array('checking'));
    	$this->checking->exist_setting();
    	
    	// workaround for language within js
    	$delete = lang('delete');
    	$update = lang('update_data');
    	$delete_data = lang('delete_data');
    	$data['action'] = 'booking/booking/add';
    	$data['id'] = NULL;
    	$data['description'] = NULL;
    	$data['amount'] = NULL;
    	$data['inputDate'] = NULL;
    	$data['default_input'] = NULL;
    	$data['pending'] = NULL;
    	
    	
    	// income input 
    	if($in_out == 1){
    		$data['in_out'] = 1;
    		$data['booking_header'] = lang('booking_income_header');
    		$q = $this->categoriesmodel->list_income_categories()->result();
    	}
    	// outcome input
    	else {
    		$data['in_out'] = 0;
    		$data['booking_header'] = lang('booking_outcome_header');
    		$q = $this->categoriesmodel->list_outcome_categories()->result();
    	}
    	
    	$input_options = array();
    	foreach($q as $res){
    		$input_options["$res->id"] = ("$res->name");
    	}

    	$data['input_options'] = $input_options;
    	
    	// currencies
    	$curr = $this->currencymodel->list_all()->result();
    	
    	
    	$curr_options = array();
    	// in the case there is no default currency
    	$data['default_currency'] = NULL;
    	foreach($curr as $res1){
    		$curr_options["$res1->id"] = ("$res1->name");
    		if($res1->deff == 1){
    			$data['default_currency'] = $res1->id;
    		}
    		
    	}
    	$data['curr_options'] = $curr_options;
    	
    	// accounts
    	$acc = $this->accountsmodel->list_all()->result();
    	$acc_options = array();
    	// in the case there is no defined default accounts
    	$data['default_accounts'] = NULL;  
    	foreach($acc as$res2){
    		$acc_options["$res2->id"] = ("$res2->name");
    		if($res2->deff == 1){
    			$data['default_accounts'] = $res2->id;
    		}
    	}
    	$data['acc_options'] = $acc_options;

	
		$this->load->view('header');	
		$this->load->view('booking/booking_view', $data);
    	
    }
    
    function add() {
    	
    	// validation
    	if ($this->form_validation->run() == FALSE)  
		{
			$data['action'] = 'booking/booking/add';
			$data['booking_header'] = lang('booking_income_header');
			$data['id']	    = NULL;
			// $data['in_out']   = '';
			
			$this->load->view('header');	
			$this->load->view('booking/booking_view', $data);
		}
		else
		{
			$description = form_prep($this->input->post('booking_description'));
	    	$inputDate = form_prep($this->input->post('inputDate'));
	    	// hr language date has different format and needs to be formated in yyyy-mm-dd 
	    	$language = $this->input->post('language');
	    	if($language == 'hr'){
	    		$inputDate = $this->hrdatum($inputDate);
	    	}
	    	
	    	
	    	// income or outcome value ?
	    	$in_out = $this->input->post('in_out');
	    	if($in_out == 1){
	    		$outcome = NULL;
	    		$income = form_prep($this->input->post('booking_amount'));
	    	}
	    	else {
	    		$outcome = form_prep($this->input->post('booking_amount'));
	    		$income = NULL;
	    	}
	    	
	    	$data_entry = array('description' => $description,
	    						'idCurrency' => $this->input->post('currency'),
	    						'idAccounts' => $this->input->post('accounts'),
	    						'idInputGroup' => $this->input->post('inputGroup'),
	    						'income' => $income,
	    						'dateEntry'=>$inputDate,
	    						'outcome' => $outcome,
	    						'pending' => $this->input->post('pending')  
	    	);
	    	
	    	// insert into database
			$this->bookingmodel->add($data_entry);
			redirect('booking/booking/in/'.$in_out,'refresh');
		}
    	
    }
    
    /*
     *  using jquery for sort table
     */
    function all_records(){
		
    	$language = $this->lang->lang();
				
		$dateFrom = $this->input->post('dateFrom');
		$dateTo = $this->input->post('dateTo');
				
		// data within date range date, if entered
		if($dateFrom && $dateTo) {
				if($language == 'hr') {
					$dateFrom = $this->hrdatum($dateFrom);
					$dateTo = $this->hrdatum($dateTo);
				}
			$data['minDate'] = $dateFrom;
			$data['maxDate'] = $dateTo;
		}
		// data without data range
		else {
			$dateDb = $this->bookingmodel->min_max_date()->row();
			$dateFrom = $dateDb->minDate;
			$dateTo= $dateDb->maxDate; 
			
			if($language == 'hr') {
				// $dateFrom = $this->hrdatum($dateFrom); TODO -hr datum
				// $dateTo = $this->hrdatum($dateTo);
				
			}
			$data['minDate'] = $dateFrom;
			$data['maxDate'] = $dateTo;
		}
			
		if($language == 'hr') {
			$data['query'] = $this->bookingmodel->list_all_hr($dateFrom, $dateTo);
		}
		else {
			$data['query'] = $this->bookingmodel->list_all($dateFrom, $dateTo);
		}
		
		$data['account_amount_query'] = $q = $this->bookingmodel->account_amount($dateTo);
	   	
    	$this->load->view('header');	
		$this->load->view('booking/allRecords_view', $data);
    }
    
    function edit($in_out, $id) {
    	$this->load->model('categoriesmodel','',TRUE);
    	$this->load->model('currencymodel','',TRUE);
    	$this->load->model('accountsmodel','',TRUE);
    	$language = $this->lang->lang();
    	
   		$data['action'] = 'booking/booking/update';
   		$data['id'] = $id;
   		$data['in_out'] = $in_out;
   		
   		// results of booking from table booking
   		$records = $this->bookingmodel->get($id)->result();
   		foreach($records as $booking) {
   			$data['description'] = $booking->description;
   			$income = $booking->income;
   			$outcome = $booking->outcome;
   			$inputDate = $booking->dateEntry;
   			$idCurrency = $booking->idCurrency;
   			$idAccounts = $booking->idAccounts;
   			$idinputGroup = $booking->idinputGroup;
   			$data['pending'] = $booking->pending;
   		}
   		
   		$data['inputDate'] = $inputDate; 
   		// eng or hr language ?
   		if($language == 'hr'){
   			$data['inputDate'] = $this->formatDate($inputDate);
   		}
   		
   		
   		// 1 is income, 0 outcome
   		if($in_out == 1){
   			$data['booking_header'] = lang('booking_edit_income_header');
   			$q = $this->categoriesmodel->list_income_categories()->result();
   			// amount is name of text box in booking_view
   			$data['amount'] = $income;
   		}
   		else {
   			$data['booking_header'] = lang('booking_edit_outcome_header');
   			$q = $this->categoriesmodel->list_outcome_categories()->result();
   			$data['amount'] = $outcome;	
   		}
   		
   		// select options for categories income or outcome
      	$input_options = array();
    	foreach($q as $res){
    		$input_options["$res->id"] = ("$res->name");
    		if($res->id == $idinputGroup) {
    			$data['default_input'] = $idinputGroup;  // Here is default_input previously inserted input type of income/outcome
    		}
    	}
    	$data['input_options'] = $input_options;
   		
    	// data for currencies
    	$curr = $this->currencymodel->list_all()->result();
    	
    	$curr_options = array();
    	foreach($curr as $res1){
    		$curr_options["$res1->id"] = ("$res1->name");
    		if($res1->id == $idCurrency){
    			$data['default_currency'] = $idCurrency;   // Here is default_currency previously inserted currency
    		}
    	}
    	$data['curr_options'] = $curr_options;
    	
    	// accounts
    	$acc = $this->accountsmodel->list_all()->result();
    	$acc_options = array();
    	foreach($acc as$res2){
    		$acc_options["$res2->id"] = ("$res2->name");
    		if($res2->id == $idAccounts){
    			$data['default_accounts'] = $idAccounts;
    		}
    	}
    	$data['acc_options'] = $acc_options;
   		
   		
   		$this->load->view('header');	
   		$this->load->view('booking/booking_view', $data);	
    	
    }
    
    function update(){
    	 
    	$id = $this->input->post('id');
    	
    	if ($this->form_validation->run('booking') == FALSE)  // form validation za booking
		{
			$data['action'] = 'booking/update';
			$data['name']   = '';
			$this->load->view('booking/booking_edit', $data);
		}
		else
		{
			$description = form_prep($this->input->post('booking_description'));
	    	$inputDate = form_prep($this->input->post('inputDate'));
	    	// hr language date has different format and needs to be formated in yyyy-mm-dd 
	    	$language = $this->input->post('language');
	    	if($language == 'hr'){
	    		$inputDate = $this->hrdatum($inputDate);
	    	}
	    	
	    	
	    	// income or outcome value ?
	    	$in_out = $this->input->post('in_out');
	    	if($in_out == 1){
	    		$outcome = NULL;
	    		$income = form_prep($this->input->post('booking_amount'));
	    	}
	    	else {
	    		$outcome = form_prep($this->input->post('booking_amount'));
	    		$income = NULL;
	    	}
	    	
	    	
	    	$data_entry = array('description' => $description,
	    						'idCurrency' => $this->input->post('currency'),
	    						'idAccounts' => $this->input->post('accounts'),
	    						'idInputGroup' => $this->input->post('inputGroup'),
	    						'income' => $income,
	    						'dateEntry'=>$inputDate,
	    						'outcome' => $outcome,
	    						'pending' => $this->input->post('pending')  
	    	);	
	    	// update in database:
	    	$this->bookingmodel->update($id, $data_entry);
	    	redirect('booking/booking/in/'.$in_out,'refresh');
		}
    	
    }
    
	function delete($id) {
		$this->bookingmodel->delete($id);
		
		redirect('booking/booking/all_records','refresh');
	}
	
	function category_sum() {
		
		$data['category_sum_query'] = $this->bookingmodel->sum_by_categories();
		
    	$data['sum_query'] = $this->bookingmodel->sum_income_outcome();
    	
    	$this->load->view('header');	
		$this->load->view('booking/categoryInput_view', $data);
	}
	
	function search() {
		
		$value = $this->input->post('search');
		$language = $this->input->post('language');
		
		if($language == 'hr'){
			$data['query_search'] = $this->bookingmodel->search_result_hr($value);  // nije ok !!!
		}
		else {
			$data['query_search'] = $this->bookingmodel->search_result($value);	
		}
		
		$this->load->view('header');	
		$this->load->view('booking/search_view', $data);
	}
	
	// vjerojatno brisanje -sta je ovo 
	function currencies_accounts() {
		 // currencies
    	$curr = $this->currencymodel->list_all()->result();
    	
    	$curr_options = array();
    	foreach($curr as $res1){
    		$curr_options["$res1->id"] = ("$res1->name");
    		if($res1->deff == 1){
    			$data['default_currency'] = $res1->id;
    		}
    		
    	}
    	$data['curr_options'] = $curr_options;
    	
    	// accounts
    	$acc = $this->accountsmodel->list_all()->result();
    	$acc_options = array();
    	foreach($acc as$res2){
    		$acc_options["$res2->id"] = ("$res2->name");
    		if($res2->deff == 1){
    			$data['default_accounts'] = $res2->id;
    		}
    	}
    	$data['acc_options'] = $acc_options;
		
	}
	

	
	// hr date in format yyyy-mm-dd		
	function hrdatum($datum_b){
  		$datum_conv = explode(".", $datum_b);
		$datum = strftime("%Y-%m-%d",mktime(0,0,0,$datum_conv[1],$datum_conv[0],$datum_conv[2]));
		return $datum;
	}
	
	function formatDate($hrDate) {
		$datum_conv = explode("-", $hrDate);
        $datum = "$datum_conv[2].$datum_conv[1].$datum_conv[0]";
		return $datum;
	}
	
}