<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Checks if user session is valid
 * @access	public
 * @param	string
 * @return	void
 */
if ( ! function_exists('is_auth'))
{
	function is_auth($userId) // NOT TESTED YET!!
	{
		$CI =& get_instance();
		if( ! $CI->session->userdata($userId))
		{
			//redirect('auth/login');	// takes over control from the calling script!!
			return FALSE;	#	so we can redirect on the calling script
		}
		
		return TRUE;
	}	
}


/**
 * Test function for my custom helper
 */
if( ! function_exists('testy'))
{
	function testy(){
		print "Hello i am from the custom helper";
	}
}