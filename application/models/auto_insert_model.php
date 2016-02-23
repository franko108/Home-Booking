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
		
		$q = $this->db->get('fixedPayment');
		$check = 0;
		foreach ($q->result() as $row) {
			$desc   = $row->description;
			$amount = $row->bookingAmount;
			$date_payment = $row->dateMonthPayment;
			$category_id = $row->categoryId;
			$account_id = $row->accountId;
			$currency_id = $row->currencyId;
			$in_out = $row->incomeOutcome;
			
			
			$check = $this->check_payment($desc, $amount, $date_payment, $number_days, $category_id, $account_id, $currency_id, $in_out);
			if($check == TRUE) {
				$check = $check++;
			}
		}
		
		//maybe stupid, if check > 0, controller will create alert
		return $check;
		
	}
	
	private function check_payment($desc, $amount, $date_payment, $number_days, $category_id, $account_id, $currency_id,$in_out) {
		$q = "SELECT id  FROM recording 
				WHERE description = '$desc' 
				AND dateEntry BETWEEN (SELECT DATE_ADD(CURDATE(), INTERVAL -'$number_days' DAY)) AND CURDATE() 
				AND outcome OR income = '$amount'
				LIMIT 1";
		$q1 = $this->db->query($q);
		// if null, insert data
		if($q1->num_rows() == 0) {
			// is today's date within the month for insert?
			$today_date = date('d');
			$day = date($date_payment.'-m-Y');
			
			if($date_payment >= $today_date){
				// insert current month
				$payment_day_db = $day;

			}
			// insert in previous month
			else  {
				$date = new DateTime($day);
				$payment_day_db = $date->sub(new DateInterval('P1M'));
			}
			
			// is it income (1) or outcome (0)?
			if($in_out == 0){
				$outcome = $amount;
				$income = NULL;
			}
			else {
				$outcome = NULL;
				$income = $amount;
			}
			// array for database insert
			$data = array('idCurrency' => $currency_id,
					'idAccounts' => $account_id,
					'idinputGroup' => $category_id,
					'income' => $income,
					'dateEntry' =>  $payment_day_db,
					'outcome' => $outcome,
					'pending' => NULL,
					'description' => $desc,
					'transaction' => NULL);

			$this->db->insert('recording', $data);
			return TRUE;
		}
		else {
			return FALSE;
		}
		
		
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