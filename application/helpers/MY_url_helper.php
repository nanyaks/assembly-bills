<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * My refresh function that does the function of the system url_helper redirect function with some tweaks
 */

if( ! function_exists('refresh_to'))
{
	function refresh_to($uri = '', $timeout = 3, $msg = 'You are now being redirected!')
	{
		if ( ! preg_match('#^https?://#i', $uri))
		{
			$uri = site_url($uri);
		}
		
		header("Refresh: 3; url=$uri");	#	Might not meet standards <-- to adjust
		echo $msg;
	}
}