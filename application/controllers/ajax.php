<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	/**
	 * Ajax functions for the Assembly bills application
	 * 
	 * @author 	Nanyak Loknan S.
	 * @version	1.0 for the hackathon
	 */
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	/**
	 * function to check if email exists -- Ajax utility
	 */
	public function check_email_exists()
	{
		$this->load->model('user_model');
		
		$email = trim($_POST['email']);
		
		// email exists, echo 1
		if($this->user_model->email_exists($email))
		{
			echo '1';
		}
	}
	
	/**
	 * function to check if username exists -- Ajax utility
	 */
	public function check_username_exists(){
		$this->load->model('user_model');
		
		$username = trim($_POST['username']);
		//if username exists, echo 1
		if($this->user_model->username_exists($username))
		{
			echo '1';
		}
	}
	
}