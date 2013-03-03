<?php 

class Auth_model extends CI_Model {
	/*
	 * 	call constructor
	 */
	public function __construct(){
		$this->load->database();
	}
	
	/*
	 *	@function:	Check user login parameters
	 */
	public function _check_login($u, $p){
		$qdata = array(
					"username"=>$u,
					"password"=>$p,
				);
		#	Optional thrid parameter is the limit of the db query.
		$query = $this->db->get_where('user_details', array('username'=>$qdata['username'], 'password'=>$qdata['password']), 1);
		
		return $query->num_rows();
	}
}