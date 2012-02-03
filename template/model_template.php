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
		$this->db->insert($this->currency, $curr_data);
		echo "<script>alert('Upisani podaci o valuti u bazu')</script>";
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
	
	function delete($id)
	{
		// TODO - ako je taj default, neki drugi treba postati default
		$this->db->where('id', $id);
		$this->db->delete($this->currency);	
	}
	
}