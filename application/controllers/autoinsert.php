<?php
class Autoinsert extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		 
		$this->load->library(array('table', 'form_validation'));
		$this->load->helper(array('form', 'language'));
		// load language file
		$this->lang->load('autoinsert');
		$this->lang->load('booking');
		
		$this->load->model('booking/bookingmodel','',TRUE);
		$this->load->model('categoriesmodel','',TRUE);
		$this->load->model('currencymodel','',TRUE);
		$this->load->model('accountsmodel','',TRUE);
		$this->load->model('auto_insert_model','',TRUE);
		 
		// validation rules
		$book_desc = lang('booking_description');
		$book_amount = lang('booking_amount');
		$num_days = lang('number_days');
		$day_month = lang('day_in_month');

		$this->form_validation->set_rules('booking_description', $book_desc, 'required|trim|xss_clean');
		$this->form_validation->set_rules('booking_amount', $book_amount, 'required|trim|xss_clean|numeric');
		$this->form_validation->set_rules('day_in_month', $num_days, 'required|trim|xss_clean|numeric');
		$this->form_validation->set_rules('number_days', $day_month, 'required|trim|xss_clean|numeric');
		$this->form_validation->set_rules('input_group', 'Input group', 'required|trim|xss_clean');
		$this->form_validation->set_rules('accounts', 'Accounts', 'required|trim|xss_clean');
		$this->form_validation->set_rules('currency', 'Currency', 'required|trim|xss_clean');
		//$this->form_validation->set_rules('income_outcome', 'Income/outcome', 'required|trim|xss_clean');
		
	}

	// list all currencies, entry the new one
	public function index() {
		// check  if there are settings for at least one account, currency and category
		$this->load->library(array('checking'));
		$this->checking->exist_setting();
		
		// workaround for language within js
		$delete = lang('delete');
		$update = lang('update_data');
		$delete_data = lang('delete_data');
		$data['action'] = 'autoinsert/add';
		$data['id'] = NULL;
		$data['description'] = NULL;
		$data['amount'] = NULL;
		$data['inputDate'] = NULL;
		$data['default_input'] = NULL;
		$data['pending'] = NULL;
		
		// default number of days
		$data['number_days'] = 30;
		 
		// method categories, default for outgoing (expenses)
		$input_options = $this->categories(0);
		$data['input_options'] = $input_options;
			

		// method currencies returns all curtrencies
		$data['default_currency'] = NULL;
		$currency_arr = $this->currencies();
		$data['default_currency'] = $currency_arr[0];
		$data['curr_options'] = $currency_arr[1];
			
			
		// accounts  /////
		// in the case there is no defined default accounts
		$data['default_accounts'] = NULL;
			
		$accounts_arr = $this->accounts();
		$data['default_accounts'] = $accounts_arr[0];
		$data['acc_options'] = $accounts_arr[1];
		
		$data['auto_insert_query'] = $this->auto_insert_model->list_all();
		
		$this->load->view('header');
		$this->load->view('autoinsert_view', $data);
	}
	
	// ajax metoda stvara dropdown izbor kategorija troškova ili prihoda - hmmm, možda ovo spojiti u postojeću metodu categories, hoćemo DRY, jel'te
	public function ajax_income_outcome($in_out, $i) {
		if($in_out == 1){
			$data['in_out'] = 1;
			$q = $this->categoriesmodel->list_income_categories()->result();
		}
		// outcome input
		else {
			$data['in_out'] = 0;
			$q = $this->categoriesmodel->list_outcome_categories()->result();
		}
		
		$cat = lang('booking_input');
	
		echo "$cat <select name='input_group'> ";
		foreach($q as $row) {
			echo "<option value='".$row->id."'>$row->name</option>";
		}
		echo "</select>";
	
	}
	
	public function add() {
		// validation
		if ($this->form_validation->run() == FALSE)	{
			$data['action'] = 'autoinsert/add';
			$data['id'] = NULL;
			$data['booking_description'] = NULL;
			$data['booking_amount'] = NULL;
			$data['number_days'] = NULL;
			$data['day_in_month'] = NULL;
			$data['input_group'] = NULL;
			$data['accounts'] = NULL;
			$data['currency'] = NULL;
			$data['income_outcome'] = NULL;
			
			$this->load->view('header');
			$this->load->view('autoinsert_edit', $data);
		}
		// input data in database
		else {
			$data_entry = array('description' => form_prep($this->input->post('booking_description')),
					'bookingAmount' => form_prep($this->input->post('booking_amount')),
					'dateMonthPayment' => form_prep($this->input->post('day_in_month')),
					'numberDays' => form_prep($this->input->post('number_days')),
					'categoryId' => form_prep($this->input->post('input_group')),
					'accountId' => form_prep($this->input->post('accounts')),
					'currencyId' => form_prep($this->input->post('currency')),
					'incomeOutcome' => form_prep($this->input->post('income_outcome')));
			
			// insert into database
			$this->auto_insert_model->add($data_entry);
			redirect('autoinsert','refresh');
		}

		
	}
	public function edit($id) {
		$data['action'] = 'autoinsert/update';
		$data['id'] = $id;
		
		$payment = $this->auto_insert_model->get($id)->row();
			$data['booking_description'] = $payment->description;
			$data['booking_amount'] = $payment->bookingAmount;
			$data['number_days'] = $payment->numberDays;
			$data['day_in_month'] = $payment->dateMonthPayment;
			$data['booking_description'] = $payment->description;
			
			$id_category = $payment->categoryId;
			$id_currency = $payment->currencyId;
			$id_accounts = $payment->accountId;
			
			$in_out = $payment->incomeOutcome;	
			$data['income_outcome'] = $in_out;
		
		// 1 is income, 0 outcome
		if($in_out == 1){
			$data['booking_header'] = lang('booking_edit_income_header');
			$q = $this->categoriesmodel->list_income_categories()->result();
		}
		else {
			$data['booking_header'] = lang('booking_edit_outcome_header');
			$q = $this->categoriesmodel->list_outcome_categories()->result();
		}
		// select options for categories income or outcome
		$input_options = array();
		foreach($q as $res){
			$input_options["$res->id"] = ("$res->name");
			if($res->id == $id_category) {
				$data['default_input'] = $id_category;  // Here is default_input previously inserted input type of income/outcome
			}
		}
		$data['input_options'] = $input_options;
		 
		// data for currencies
		$curr = $this->currencymodel->list_all()->result();
		 
		$curr_options = array();
		foreach($curr as $res1){
			$curr_options["$res1->id"] = ("$res1->name");
			if($res1->id == $id_currency ){
				$data['default_currency'] = $id_currency ;   // Here is default_currency previously inserted currency
			}
		}
		$data['curr_options'] = $curr_options;
		 
		// accounts
		$acc = $this->accountsmodel->list_all()->result();
		$acc_options = array();
		foreach($acc as $res2){
			$acc_options["$res2->id"] = ("$res2->name");
			if($res2->id == $id_accounts ){
				$data['default_accounts'] = $id_accounts ;
			}
		}
		$data['acc_options'] = $acc_options;
		

		$this->load->view('header');
		$this->load->view('autoinsert_edit', $data);
	}
	
	public function update() {
		// validation
		
		if ($this->form_validation->run() == FALSE)	{
			$data['action'] = 'autoinsert/update';
			$data['id'] = NULL;
			$data['booking_description'] = NULL;
			$data['booking_amount'] = NULL;
			$data['number_days'] = NULL;
			$data['day_in_month'] = NULL;
			$data['input_group'] = NULL;
			$data['accounts'] = NULL;
			$data['currency'] = NULL;
			$data['income_outcome'] = NULL;
				
			$this->load->view('header');
			$this->load->view('autoinsert_edit', $data);
		}
		
		// input data in database
		else {
			$id = form_prep($this->input->post('id'));
			$desc =  $this->input->post('booking_description');
			$am = form_prep($this->input->post('booking_amount')); 
			//echo "UNOS: ID - $id, opis: $desc, iznos: $am ";
			
			
			$data_entry = array('description' => form_prep($this->input->post('booking_description')),
					'bookingAmount' => form_prep($this->input->post('booking_amount')),
					'dateMonthPayment' => form_prep($this->input->post('day_in_month')),
					'numberDays' => form_prep($this->input->post('number_days')),
					'categoryId' => form_prep($this->input->post('input_group')),
					'accountId' => form_prep($this->input->post('accounts')),
					'currencyId' => form_prep($this->input->post('currency')),
					'incomeOutcome' => form_prep($this->input->post('income_outcome')));
				
			// insert into database
			$this->auto_insert_model->update($id, $data_entry);
			redirect('autoinsert','refresh');
		}
	}
	
	public function delete($id) {
		$this->auto_insert_model->delete($id);
		redirect('autoinsert','refresh');
	}
	
	// all defined categories from database
	private function categories($in_out){
		// income input
		if($in_out == 1){
			$data['in_out'] = 1;
			$q = $this->categoriesmodel->list_income_categories()->result();
		}
		// outcome input
		else {
			$data['in_out'] = 0;
			$q = $this->categoriesmodel->list_outcome_categories()->result();
		}
		 
		$input_options = array();
		foreach($q as $res){
			$input_options["$res->id"] = ("$res->name");
		}
	
		return $input_options;
	}
	
	// used by add, edit methods and error handling
	private function currencies() {
		// currencies
		$curr = $this->currencymodel->list_all()->result();
		 
		$default_currency = NULL;
		$curr_options = array();
		foreach($curr as $res1){
			$curr_options["$res1->id"] = ("$res1->name");
			if($res1->deff == 1){
				$default_currency = $res1->id;
			}
	
		}
	
		$all_data = array($default_currency, $curr_options);
		 
		return $all_data;
		 
	}
	

	// used by add, edit methods and error handling
	private function accounts() {
	
		$acc = $this->accountsmodel->list_all()->result();
		$default_accounts = NULL;
		$acc_options = array();
		foreach($acc as$res2){
			$acc_options["$res2->id"] = ("$res2->name");
			if($res2->deff == 1){
				$default_accounts = $res2->id;
			}
		}
		$all_data = array($default_accounts, $acc_options);
		return $all_data;
	
	}
	
	
	
	// hr date in format yyyy-mm-dd
	private function hrdatum($datum_b){
		$datum_conv = explode(".", $datum_b);
		$datum = strftime("%Y-%m-%d",mktime(0,0,0,$datum_conv[1],$datum_conv[0],$datum_conv[2]));
		return $datum;
	}
	
	private function formatDate($hrDate) {
		$datum_conv = explode("-", $hrDate);
		$datum = "$datum_conv[2].$datum_conv[1].$datum_conv[0]";
		return $datum;
	}
	
}