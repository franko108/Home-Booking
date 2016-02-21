<?php
class Auto_insert_model extends CI_Model {

	private $fixedPayment = 'fixedPayment';   // table in database

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function list_all() {
		$q = "SELECT fp.id, fp.description, fp.bookingAmount, fp.dateMonthPayment, fp.numberDays, fp.incomeOutcome, ic.name AS category, cur.name AS currency, acc.name AS account
			FROM fixedPayment fp INNER JOIN inputCategory ic ON fp.categoryId = ic.id 
			INNER JOIN accounts acc ON fp.accountId = acc.id
			INNER JOIN currency cur ON fp.currencyId = cur.id";
		return $this->db->query($q);
	}
	
	public function add($data){
		$data_inserted = lang('data_inserted');
		$this->db->insert($this->fixedPayment, $data);
		echo "<script>alert('$data_inserted')</script>";
	}
	
	public function get($id){
		return $this->db->get_where('fixedPayment', array('id' => $id));
	}
	
	
	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->accounts, $data);
	}
	
	public function delete($id)	{
		$this->db->where('id', $id);
		$this->db->delete($this->fixedPayment);
	}

}