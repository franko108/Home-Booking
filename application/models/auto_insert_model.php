<?php
class Auto_insert_model extends CI_Model {

	private $fixedPayment = 'fixedPayment';   // table in database
	private $recording = 'recording';

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	public function get_all(){
		return $this->db->get('fixedPayment');
	}
	
	// check if regular entry exist in this month 
	public  function check_payment($desc, $amount, $payment_day_db, $category_id, $account_id, $currency_id, $in_out) {
		$q = "SELECT id  FROM recording WHERE description = '$desc'
			AND dateEntry = '$payment_day_db'
			AND outcome OR income = '$amount'
			LIMIT 1";
		return $this->db->query($q);
	}
	
	// insert automatic income/outcome
	public function insert_automatic ($data) {
		$this->db->insert($this->recording, $data);
	}
	
	public function list_all() {
		$q = "SELECT fp.id, fp.description, fp.bookingAmount, fp.dateMonthPayment, fp.incomeOutcome, ic.name AS category, cur.name AS currency, acc.name AS account
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
	
	
	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->fixedPayment, $data);
	}
	
	public function delete($id)	{
		$this->db->where('id', $id);
		$this->db->delete($this->fixedPayment);
	}

}