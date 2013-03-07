<?php
class User_model extends CI_Model{
	/*
	 * Call constructor to handle loading the database
	 */
	public function __construct()
	{
		$this->load->database();
	}
	
	/**
	 * function enroll()
	 * Uses the codeigniter api to capture the $_POST array and inserts into the database
	 */
	public function enroll($insert = NULL)
	{
		if($insert === NULL || ! is_array($insert)){
			return FALSE;
		}	
		
		return $this->db->insert('user_details', $insert);
	}
	
	
	/**
	 * function get_view($id)
	 * It gets customer info from the database; if !isset($id), all the users are got else only $id is retrieved
	 */
	public function get_view($user_id = NULL)
	{
		// If $user_id exists and is set,
		if(!isset($user_id) || $user_id === FALSE){
			$query = $this->db->get('user_details');
			
			return $query->result_array();
		}
		else {
			$query = $this->db->get_where('user_details', array('id'=>$user_id));
			
			return $query->row_array();
		}
	}
	
}