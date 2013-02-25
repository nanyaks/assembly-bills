<?php
class User_model extends CI_Model{
	/*
	 * Call constructor to handle loading the database
	 */
	public function __construct(){
		$this->load->database();
	}
	
	/*
	 * function enroll_customer
	 * Uses the codeigniter api to capture the $_POST array and inserts into the database
	 */
	public function register_user(){		
		$data = array(
                'id' => NULL,
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('passwd')),
				'fname' => $this->input->post('f_name'),
				'lname'=>$this->input->post('lastname'),
                'dateReg' => NULL,
				'email' => $this->input->post('email'),
				//'address' => $this->input->post('address'),
				//'city' => $this->input->post('city'),
				//'state' => $this->input->post('state'),
				'isDeleted' => 0,
				);
		
		return $this->db->insert('user_details', $data);
	}
	
	
	/*
	 * function get_view($id)
	 * It gets customer info from the database; if !isset($id), all the users are got else only $id is retrieved
	 */
	public function get_view($user_id = NULL){
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