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
	
	function list_all($dateFrom, $dateTo)
	{
			$q = "SELECT rec.id, rec.description, rec.dateEntry, 
				categ.name AS type, rec.income, rec.outcome, acc.name AS myaccount, rec.pending,
				curr.name as currency_name  
				FROM recording rec
				INNER JOIN accounts acc ON rec.idAccounts = acc.id
				INNER JOIN  inputCategory categ ON rec.idInputGroup = categ.id 
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE rec.transaction IS NULL AND 
				rec.dateEntry BETWEEN '$dateFrom'  AND '$dateTo'
				ORDER BY rec.dateEntry DESC";
		return $this->db->query($q);
	}
	
	function list_all_hr($dateFrom, $dateTo)
	{
			$q = "SELECT rec.id, rec.description, DATE_FORMAT(rec.dateEntry, '%d.%m.%Y')AS dateEntry, 
			categ.name AS type, rec.income, rec.outcome, acc.name AS myaccount, rec.pending,
				curr.name as currency_name  
				FROM recording rec
				INNER JOIN accounts acc ON rec.idAccounts = acc.id
				INNER JOIN  inputCategory categ ON rec.idInputGroup = categ.id 
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE rec.transaction IS NULL AND 
				rec.dateEntry BETWEEN '$dateFrom'  AND '$dateTo'
				ORDER BY rec.dateEntry DESC";		
		
		return $this->db->query($q);
	}
	
	function account_amount($dateTo)
	{
			$q = "SELECT  acc.name AS myaccount, 
	  			COALESCE(SUM(rec.income), 0) - COALESCE(SUM(rec.outcome), 0)  as amount,
	  			curr.name AS currency_name
				FROM recording rec
				INNER JOIN accounts acc ON rec.idAccounts = acc.id 
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE rec.pending = 0 
				AND rec.dateEntry <= '$dateTo'
				GROUP BY rec.idAccounts, rec.idCurrency
				ORDER BY myaccount";

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
	
	function sum_by_categories($dateFrom, $dateTo)
	{
		$q = "SELECT SUM(rec.income) AS sum_income, SUM(rec.outcome) AS sum_outcome, ic.name AS input_category, curr.name AS currency_name, ic.id AS category_id  
				FROM recording rec
				INNER JOIN inputCategory ic ON rec.idinputGroup = ic.id
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE rec.pending = 0
				AND dateEntry BETWEEN '$dateFrom' AND '$dateTo'
				GROUP BY rec.idInputGroup , rec.idCurrency
				ORDER BY sum_income DESC";
		return $this->db->query($q);
	}
	
	/*
	 * sum by categories in defined period, if there is no period defined, give back all data
	 */
	function sum_by_categories_period($category_id, $dateFrom, $dateTo) {
		if($dateFrom == 0 || $dateTo == 0) {
			$dateFrom 	= 'SELECT MIN(rec.dateEntry) FROM recording';
			$dateTo		= 'SELECT MAX(rec.dateEntry) FROM recording';
		}
		$q = "SELECT rec.id, rec.description, DATE_FORMAT(rec.dateEntry, '%d.%m.%Y')AS dateEntry, 
			categ.name AS type, rec.income, rec.outcome, acc.name AS myaccount, rec.pending,
				curr.name as currency_name  
				FROM recording rec
				INNER JOIN accounts acc ON rec.idAccounts = acc.id
				INNER JOIN  inputCategory categ ON rec.idInputGroup = categ.id 
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE rec.dateEntry BETWEEN '$dateFrom'  AND '$dateTo'
				AND categ.id = '$category_id'
				ORDER BY rec.dateEntry DESC";
		
		return $this->db->query($q);
	}
	
	function sum_income_outcome($dateFrom, $dateTo)
	{
		$q = "SELECT SUM(rec.income) AS total_income , SUM(rec.outcome) AS total_outcome, curr.name AS currency_name  
			FROM recording rec
			INNER JOIN inputCategory ic ON rec.idinputGroup = ic.id
			INNER JOIN currency curr ON rec.idCurrency = curr.id
			WHERE rec.pending = 0
			AND dateEntry BETWEEN '$dateFrom' AND '$dateTo'
			GROUP BY rec.idCurrency
			ORDER BY total_income DESC";
		return $this->db->query($q);
	}
	
	function min_max_date()
	{
			$q = "SELECT MIN(dateEntry) AS minDate, MAX(dateEntry) AS maxDate FROM recording";
			return $this->db->query($q);
	}
	
	function min_max_date_hr()
	{
			$q = "SELECT MIN(DATE_FORMAT(dateEntry, '%d.%m.%Y')) AS minDate, 
					MAX(DATE_FORMAT(dateEntry, '%d.%m.%Y')) AS maxDate
					FROM recording";
			return $this->db->query($q);
	}
	
	function search_result($value)
	{
		$q = "SELECT rec.id AS id, rec.dateEntry, catt.name, rec.income, rec.outcome, rec.description AS description,  curr.name AS currency 
				FROM recording rec 
				INNER JOIN inputCategory catt ON rec.idinputGroup = catt.id
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE description LIKE '%$value%' OR catt.name LIKE '%$value%' ";
		return $this->db->query($q);
	}
	
	function search_result_hr($value)
	{
		$q = "SELECT rec.id AS id, DATE_FORMAT(rec.dateEntry, '%d.%m.%Y')AS dateEntry, catt.name, rec.income, rec.outcome, rec.description AS description,  curr.name AS currency 
				FROM recording rec 
				INNER JOIN inputCategory catt ON rec.idinputGroup = catt.id
				INNER JOIN currency curr ON rec.idCurrency = curr.id
				WHERE description LIKE '%$value%' OR catt.name LIKE '%$value%' ";
		return $this->db->query($q);
	}
	
}