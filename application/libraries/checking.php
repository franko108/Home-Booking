<?php
class Checking extends CI_Controller{
	
	// check if there exist at least one currency, account and category
	function exist_setting() {
		$this->load->model('categoriesmodel','',TRUE);
    	$this->load->model('currencymodel','',TRUE);
    	$this->load->model('accountsmodel','',TRUE);
    	
    	$empty_settings = lang('empty_settings');
    	
    	
    	$currency = $this->currencymodel->list_all();
    	if($currency->num_rows() == 0) {
    		echo "<script>alert('$empty_settings ');
				</script>";
    		redirect('currency','refresh');
    		exit;
    	}
    	
    	$category = $this->categoriesmodel->list_all();
    	if($category->num_rows() == 0){
    		echo "<script>alert('$empty_settings ');
				</script>";
    		redirect('categories','refresh');
    		echo "KOJIO KURAC";
    		exit;	
    	}
    	
    	
		$account = $this->accountsmodel->list_all();
    	if($account->num_rows() == 0) {
    		echo "<script>alert('$empty_settings ');
				</script>";
    		redirect('accounts','refresh');
    		exit;
    	}
		
	}
	
	
	
}