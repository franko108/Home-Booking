<?php

class Bookingmodel extends CI_Model {
	
	private $recording = 'recording';   // table in database
	
	function __construct()
	{
	    parent::__construct();
	}
	
	// treba li uopce ??
	function list_all_out()
	{
		$this->db->order_by('income_outcome', 'name');
		return $this->db->get('inputCategory');	
	}
	
	
	function add($data) 
	{
		$data_inserted = lang('data_inserted');
		$this->db->insert($this->recording, $data);
		echo "<script>alert('$data_inserted')</script>";
	}
	
	function get($id)
	{
		return $this->db->get_where('recording', array('id' => $id));
	}
	
	function list_all()
	{
		$q = 'SELECT rec.id, rec.description, rec.dateEntry, 
				categ.name AS type, rec.income, rec.outcome, acc.name AS myaccount, rec.pending,
				curr.name as currency_name  
				FROM recording rec
				INNER JOIN accounts acc ON rec.idAccounts = acc.id
				INNER JOIN  inputCategory categ ON rec.idInputGroup = categ.id 
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				ORDER BY rec.dateEntry DESC';
		return $this->db->query($q);
	}
	
	function list_all_hr()
	{
		$q = 'SELECT rec.id, rec.description, DATE_FORMAT(rec.dateEntry, "%d.%m.%Y")AS dateEntry, 
			categ.name AS type, rec.income, rec.outcome, acc.name AS myaccount, rec.pending,
				curr.name as currency_name  
				FROM recording rec
				INNER JOIN accounts acc ON rec.idAccounts = acc.id
				INNER JOIN  inputCategory categ ON rec.idInputGroup = categ.id 
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				ORDER BY rec.dateEntry DESC';
		return $this->db->query($q);
	}
	
	function account_amount()
	{
		$q = 'SELECT  acc.name AS myaccount, 
	  			COALESCE(SUM(rec.income), 0)- COALESCE(SUM(rec.outcome), 0)  as amount,
	  			curr.name AS currency_name
				FROM recording rec
				INNER JOIN accounts acc ON rec.idAccounts = acc.id 
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE rec.pending = 0
				GROUP BY rec.idAccounts, rec.idCurrency
				ORDER BY myaccount';
		return $this->db->query($q);
	}
	
	
	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->recording, $data);	
	
	}
	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->recording);	
		
	}
	
	function sum_by_categories()
	{
		$q = "SELECT SUM(rec.income) AS sum_income, SUM(rec.outcome) AS sum_outcome, ic.name AS input_category, curr.name AS currency_name  
				FROM recording rec
				INNER JOIN inputCategory ic ON rec.idinputGroup = ic.id
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE rec.pending = 0
				GROUP BY rec.idInputGroup , rec.idCurrency
				ORDER BY sum_income DESC";
		return $this->db->query($q);
	}
	
	function sum_income_outcome()
	{
		$q = "SELECT SUM(rec.income) AS total_income , SUM(rec.outcome) AS total_outcome, curr.name AS currency_name  
			FROM recording rec
			INNER JOIN inputCategory ic ON rec.idinputGroup = ic.id
			INNER JOIN currency curr ON rec.idCurrency = curr.id
			WHERE rec.pending = 0
			GROUP BY rec.idCurrency
			ORDER BY total_income DESC";
		return $this->db->query($q);
	}
	
	function min_max_date()
	{
			// to continue TODO
			//$q = "SELECT MIN(dateEntry) AS min, MAX(dateEntry) AS max FROM recording; ";
			$this->db->select_max('dateEntry');
			$this->db->select_min('dateEntry');
			$query = $this->db->get('recording');
	}
	
	function search_result($value)
	{
		$q = "SELECT rec.dateEntry, catt.name, rec.income, rec.outcome, rec.description AS description,  curr.name AS currency 
				FROM recording rec 
				INNER JOIN inputCategory catt ON rec.idinputGroup = catt.id
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE description LIKE '%$value%' OR catt.name LIKE '%$value%' ";
		return $this->db->query($q);
	}
	
	function search_result_hr($value)
	{
		$q = "SELECT DATE_FORMAT(rec.dateEntry, '%d.%m.%Y')AS dateEntry, catt.name, rec.income, rec.outcome, rec.description AS description,  curr.name AS currency 
				FROM recording rec 
				INNER JOIN inputCategory catt ON rec.idinputGroup = catt.id
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE description LIKE '%$value%' OR catt.name LIKE '%$value%' ";
		return $this->db->query($q);
	}
	
}