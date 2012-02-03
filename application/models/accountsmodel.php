<?php

class Accountsmodel extends CI_Model {
	
	private $accounts = 'accounts';   // table in database
	
	function __construct()
	{
		// Call the Model constructor
	    parent::__construct();
	}
	
	function list_all()
	{
		$this->db->order_by('name');
		return $this->db->get('accounts');	
	}
	
	function add($data) 
	{
		$data_inserted = lang('data_inserted');
		$this->db->insert($this->accounts, $data);
		echo "<script>alert('$data_inserted')</script>";
	}
	
	function get($id)
	{
		return $this->db->get_where('accounts', array('id' => $id));
	}
	
	
	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->accounts, $data);	
	}
	
	function removeDefault()
	{
		$data = array(
        	'deff' => 0 
        );
		
		$this->db->update('accounts', $data);
	}
	
	function delete($id)
	{
		// validation - can't be deleted if exits in booking (recording table)
		$this->db->where('idAccounts', $id);
		$q = $this->db->get('recording');
		
		if($q->num_rows() > 0)
		{
			$delete_error = lang('accounts_notdeleted');
			echo "<script>alert('$delete_error');
			window.history.back()</script>";
		}
		else
		{
			$this->db->where('id', $id);
			$this->db->delete($this->accounts);	
		}
	}
	
}