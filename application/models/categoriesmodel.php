<?php

class Categoriesmodel extends CI_Model {
	
	private $category = 'inputCategory';   // table in database
	
	function __construct()
	{
		// Call the Model constructor
	    parent::__construct();
	}
	
	function list_all()
	{
		$this->db->order_by('income_outcome, name');
		return $this->db->get('inputCategory');	
	}
	
	function list_income_categories()
	{
		$this->db->where('income_outcome', 1);
		$this->db->order_by('name');
		return $this->db->get('inputCategory');	
	}
	
	function list_outcome_categories()
	{
		$this->db->where('income_outcome', 0);
		$this->db->order_by('name');
		return $this->db->get('inputCategory');	
	}
	
	function add($data) 
	{
		$data_inserted = lang('data_inserted');
		$this->db->insert($this->category, $data);
		echo "<script>alert('$data_inserted')</script>";
	}
	
	function get($id)
	{
		return $this->db->get_where('inputCategory', array('id' => $id));
	}
	
	
	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->category, $data);	
	}
	
	function delete($id)
	{
		// validation - can't be deleted if data exits in booking (recording table)
		$this->db->where('idinputGroup', $id);
		$q = $this->db->get('recording');
		
		if($q->num_rows() > 0)
		{
			$delete_error = lang('categories_notdeleted');
			echo "<script>alert('$delete_error');
			window.history.back()</script>";
		}
		else
		{
			$this->db->where('id', $id);
			$this->db->delete($this->category);
		}
			
	}
	
}