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
	 * inserts captured data into the database
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
	 * 
	 * @param	integer
	 * @return	array
	 * 
	 */
	public function get_view($user_id = NULL)
	{
		/*
		 * @TODO: Check the purpose of this function; if only for login, then there is no use getting all the users' details, is there?
		 */
		if(!isset($user_id) || $user_id === NULL){
			$query = $this->db->get('user_details');	#	Cant figure out why im getting all the users' details!
			
			return $query->result_array();		#	I really should just return FALSE if !isset(user_id)
		}
		else {
			$query = $this->db->get_where('user_details', array('id'=>$user_id));
			
			return $query->row_array();
		}
	}
	
	/**
	 * Ajax utility
	 * @param string $email
	 * @return boolean
	 */
	public function email_exists($email = ''){
		if ($email == ''){
			return FALSE;
		}
		
		$query = $this->db->get_where('user_details', array('email'=>$email));
		
		if($query->row_array()){
			return TRUE;
		}
	}

	/**
	 * Ajax utility
	 * @param string $username
	 * @return boolean
	 */
	public function username_exists($username = ''){
		if ($username == ''){
			return FALSE;
		}
	
		$query = $this->db->get_where('user_details', array('username'=>$username));
	
		if($query->row_array()){
			return TRUE;
		}
	}
	
}