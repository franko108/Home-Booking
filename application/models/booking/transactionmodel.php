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
				ORDER BY rec.dateEntry DESC, rec.transaction ASC, rec.income ASC';
		return $this->db->query($q);
	}
	
	// date format as dd.mm.YYYY
	function list_all_hr()
	{
	
		$q = 'SELECT rec.id, rec.description, DATE_FORMAT(rec.dateEntry, "%d.%m.%Y") AS dateEntry, rec.income, rec.outcome, rec.transaction, 
				acc.name AS myaccount, 
				curr.name as currency_name  
				FROM recording rec
				INNER JOIN accounts acc ON rec.idAccounts = acc.id
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE rec.transaction > 0
				ORDER BY rec.dateEntry DESC, rec.transaction ASC, rec.income ASC';
		return $this->db->query($q);
	}
	
	function add($data) 
	{
		$this->db->insert($this->recording, $data);
	}
	
	function get($id)
	{
		$q = "SELECT rec.id, rec.income, rec.dateEntry, rec.outcome, rec.description, rec.idCurrency, rec.idAccounts,
				 curr.name AS currency, acc.name AS account
				FROM recording rec 
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				INNER JOIN accounts acc ON rec.idAccounts = acc.id
				WHERE rec.transaction = '$id' ";
		return $this->db->query($q);
	}
	
	function get_hr($id)
	{
		// return $this->db->get_where('recording', array('transaction' => $id));
		$q = "SELECT rec.id, rec.income, DATE_FORMAT(rec.dateEntry, '%d.%m.%Y') AS dateEntry, rec.outcome, rec.description, rec.idCurrency, rec.idAccounts, 
				curr.name AS currency, acc.name AS account
				FROM recording rec 
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				INNER JOIN accounts acc ON rec.idAccounts = acc.id
				WHERE rec.transaction = '$id' ";
		return $this->db->query($q);
	}
	
	// maybe stupid method, but since transaction is not in a separated table, it needs to be created
	function last_transaction_id() 
	{
		$this->db->select_max('transaction');
		$this->db->limit(1);
		return $this->db->get('recording');	
	}
	
	// delete both values of transaction, from first account outcome, second account income
	function delete($id)
	{
		$this->db->where('transaction', $id);
		$this->db->delete($this->recording);	
	}
	
}