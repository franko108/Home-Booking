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
		 
		// validation rules
		$curr_name = lang('currency_name');
		$this->form_validation->set_rules('name', "$curr_name", 'required|trim|xss_clean');
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
		$data['action'] = 'booking/booking/add';
		$data['id'] = NULL;
		$data['description'] = NULL;
		$data['amount'] = NULL;
		$data['inputDate'] = NULL;
		$data['default_input'] = NULL;
		$data['pending'] = NULL;
		 
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
	
		
		$data['action'] = 'add';
		
		$this->load->model('categoriesmodel','',TRUE);
		$this->load->model('currencymodel','',TRUE);
		$this->load->model('accountsmodel','',TRUE);
		
		$this->load->view('header');
		$this->load->view('autoinsert_view', $data);
	}
	
	public function add() {
		
	}
	
	// all defined categories from db
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