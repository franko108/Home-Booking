<?php

class Currencymodel extends CI_Model {
	
	private $currency = 'currency';   // table in database
	
	function __construct()
	{
		// Call the Model constructor
	    parent::__construct();
	}
	
	function list_all()
	{
		$this->db->order_by('name');
		return $this->db->get('currency');	
	}
	
	function add($curr_data) 
	{
		$data_inserted = lang('data_inserted');
		$this->db->insert($this->currency, $curr_data);
		echo "<script>alert('$data_inserted')</script>";
	}
	
	function get($id)
	{
		return $this->db->get_where('currency', array('id' => $id));
	}
	
	function update($id, $curr_data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->currency, $curr_data);	
	}
	
	function delete_default() 
	{
		$data = array(
        	'deff' => 0 
        );
		
		$this->db->update('currency', $data);
	}
	
	function delete($id)
	{
		$this->db->where('idCurrency', $id);
		$q = $this->db->get('recording');
		
		// validation - can't be deleted if exits in booking (recording table)
		if($q->num_rows() > 0)
		{
			$delete_error = lang('currency_notdeleted');
			echo "<script>alert('$delete_error');
			window.history.back()</script>";
		}
		else
		{
			$this->db->where('id', $id);
			$this->db->delete($this->currency);
			$this->set_default();
		}
		
	}
	
	// if default curr. is deleted, set another currency as default	
	function set_default() {
		$data = array(
        	'deff' => 1 
        );

		$this->db->limit(1);
        $this->db->update('currency', $data);
	}
	
}