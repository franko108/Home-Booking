<?php

class Transactionmodel extends CI_Model {
	
	private $recording = 'recording';   // table in database
	
	function __construct()
	{
		// Call the Model constructor
	    parent::__construct();
	}
	
	function list_all()
	{
		/*
		$this->db->order_by('dateEntry');
		$this->db->where("transaction > 0");
		return $this->db->get('recording');
		*/
		$q = 'SELECT rec.id, rec.description, rec.dateEntry, 
				rec.income, rec.outcome, acc.name AS myaccount, rec.transaction,
				curr.name as currency_name  
				FROM recording rec
				INNER JOIN accounts acc ON rec.idAccounts = acc.id
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE rec.transaction > 0
				ORDER BY rec.dateEntry DESC, rec.income ASC';
		return $this->db->query($q);
	}
	
	// date format as dd.mm.YYYY
	function list_all_hr()
	{
		/*
		$this->db->order_by('dateEntry');
		$this->db->where("transaction > 0");
		return $this->db->get('recording');
		*/
		$q = 'SELECT rec.id, rec.description, DATE_FORMAT(rec.dateEntry, "%d.%m.%Y") AS dateEntry, rec.income, rec.outcome, rec.transaction, 
				acc.name AS myaccount, 
				curr.name as currency_name  
				FROM recording rec
				INNER JOIN accounts acc ON rec.idAccounts = acc.id
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE rec.transaction > 0
				ORDER BY rec.dateEntry DESC, rec.income ASC';
		return $this->db->query($q);
	}
	
	function add($data) 
	{
		$this->db->insert($this->recording, $data);
	}
	
	function get($id)
	{
		return $this->db->get_where('recording', array('transaction' => $id));
	}
	
	// delete both values of transaction, from first account outcome, second account income
	function delete($id)
	{
		$this->db->where('transaction', $id);
		$this->db->delete($this->recording);	
	}
	
}