<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {
	
	#	Constructor
	public function __construct()
	{
		$this->load->database();
	}
	
	
	/**
	 *	Check user login parameters
	 *
	 *	@param	String
	 *	@return array
	 */
	public function _check_login($u, $p)
	{
		$qdata = array(
					"username"=>$u,
					"password"=>$p,
				);
		#	Optional thrid parameter sets the limit of the db query.
		$query = $this->db->get_where('user_details', array('username'=>$qdata['username'], 'password'=>$qdata['password']), 1);
		
		$res = (array)$query->row();	//	Typecasting as it doesnt allow referencing an object - instanceof(StdClass) - as an array
		
		return $res;
	}
}