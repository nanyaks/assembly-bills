<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * @author 	Nanyak Loknan S.
	 * @version	1.0 for the hackathon
	 */
	
	var $base;
	var $css_base = NULL;
	var $css = NULL;
	
	/*
	 * Function __construct
	 * Set all init variables here to be loaded when the controller is initialized.
	 */
	public function __construct()
	{		
		parent::__construct();
		
		#	Load User Model
		$this->load->model('user_model');
		
		#	Load libraries
		$this->load->library('session');
		
		#	Load $css and $base variables..
		$this->base = $this->config->item('base_url');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		$this->img = $this->config->item('img');
		$this->less = $this->config->item('less');
	}
	
	/*
	 * Load static file locations for use within the controller
	 */
	public function _static()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;
		$data['less'] = $this->less;
		
		return $data;
	}
	
	public function index()
	{
		$this->load->helper('url');
		
		echo "User Home coming soon!";
		echo "<br />Try <a href=" . site_url('user/register') . ">user/register</a>";
	}
	
	/**
	 * Show all the bills the user has shown interest in. This will have different views - one for logged in user and the other
	 * for 'not logged in' user -- I guess
	 * 
	 * @param	string
	 */
	public function _showbills($userid = NULL)
	{
		/*
		 * if $usrid = null, show all the bills else show only my bills --> bills/$usrid
		 */
	}
	
	
	
	
	/**
	 * 	Register the user
	 */
	public function register()
	{
		$data = $this->_static();
		
		#	Load ...
		$this->load->helper(array('url', 'form', 'security'));
		$this->load->library(array('encrypt', 'form_validation', 'session'));
		
		$data['title'] = 'New User Registration -- Assembly Bills';
		
		//print_r($this->session->userdata); 
		
		#	Set the form rules
		$this->form_validation->set_rules('firstname', 'First Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('email', 'User Email', 'trim|xss_clean|is_unique[user_details.email]|callback_email_check');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
		
		#	If the button was clicked
		if(($this->input->server('REQUEST_METHOD') === 'POST') && $this->input->post('register'))
		{
			if($this->form_validation->run() == FALSE)
			{
				$data['error'] = 'Ensure all fields are filled!';
				
				$this->load->view('templates/header', $data);
				$this->load->view('user/registration', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				#	Work on the params to be sent to the db:
				/*
				 * @TODO: have to do some 'data prepping' if $this->input->post() does not.
				 * 		$this->input->post(): second parameter allows for XSS filtering
				 * 		do we need mysql_real_escape_string?
				 */ 
				$_params = array(
						'id' => NULL,
						'username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('passwd', TRUE)),
						'fname' => $this->input->post('firstname', TRUE),
						'lname'=>$this->input->post('lastname', TRUE),
						'dateReg' => NULL,
						'email' => $this->input->post('email', TRUE),
						'isDeleted' => 0,
					);
				$_insert = $this->user_model->enroll($_params);
				
				if($_insert)
				{
					/*
					 * @TODO: set flash message to be displayed on this page and then redirect to '$referal' page
					 */
					redirect('user/success', 'refresh');
				}
				else
				{
					/*
					 * @TODO: Test error message if displayed properly
					 */
					$this->session->set_flashdata('message', 'An Error occured while registering.');
					redirect('user/register', 'refresh');
				}
				
			}
		}
		else {
			// Load the view when form hasn't been submitted at all
			$this->load->view('templates/header', $data);
			$this->load->view('user/registration', $data);
			$this->load->view('templates/footer');
		}
	}
	
	
	/**
	 * 	Show the user profile
	 */
	public function profile()
	{
		$data = $this->_static();
	
		
		#	Load ...
		$this->load->helper(array('url', 'form', 'security'));
		//$this->load->library(array('encrypt', 'form_validation', 'session'));
		
		//echo "<pre>";
		//print_r($this->session->all_userdata()); die();
		
		#	set title
		$data['title'] = "Profile page";
		
		/*if( !  isset($this->session->userdata['userid'])){
			refresh_to('auth/login');
			exit();
		}*/
		
		#	Set user environment --> query userid
		
		#	Display page
		$this->load->view('templates/header', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('templates/footer');
	}
	
	
	/*
	 * Send invitations to friends to use the app
	 */
	public function invites(){
		#	Load
		$this->load->helper(array('url', 'form', 'security'));
		$this->load->library(array('encrypt', 'form_validation', 'session'));
		
		#	set title
		$data['title'] = "Invite friends";
		
		if( !  isset($this->session->userdata['userid'])){
			redirect('home');
			exit();
		}
		
		#	 Set user environment --> query userid
	}
	
	
	/*
	 * View and change my settings
	 */
	public function settings(){
		#	Load
		$this->load->helper(array('url', 'form', 'security'));
		$this->load->library(array('encrypt', 'form_validation', 'session'));
		
		#	set title
		$data['title'] = "Invite friends";
		
		//print_r($this->session->all_userdata()); die();
		if( !  isset($this->session->userdata['userid'])){
			refresh_to('auth/login');
			exit();
		}
		
		echo "Settings page!";
	}
	
	
	/*
	 * 	I think this function should be integrated into the register method somehow
	 */
	public function edit()
	{
		$data = $this->_static();
		
		// Load the url helper...
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		
		$data['title'] = 'Edit profile -- Assembly Bills';
		
		// Set the form rules
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('email', 'User Email', 'callback_email_check');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		// If form is !(validated), load form with error messages
		if($this->form_validation->run() === FALSE)
		{
			// Load the view
			$this->load->view('templates/header', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			// Insert into db here!
			$_insert = $this->user_model->register_user();
			$this->load->view('user/success');
		}
	}
	
	public function bills()
	{
		$data = $this->_static();
		
		// Load the url helper...
		$this->load->helper('url');
		
		$data['title'] = 'My Bills Watchlist';
		
		// Load information about user bills from the database
		#$data['bills'] = $this->user_model->fetch_my_bills();
		
		if(1){
			$this->load->view('templates/header', $data);
			$this->load->view('user/mybills', $data);
			$this->load->view('templates/footer');
		}
	}
	
	
	/**
	 * function success()
	 */
	public function success(){
		$data = $this->_static();
		
		#	Load ...
		$this->load->helper(array('url',));
		$this->load->library(array('session',));
		
		$data['title'] = "Enrollment Success | Assembly Bills";
		
		redirect('user/home', 'refresh');
		
	}
	
	public function tests(){
		$val = 'nanyaks';
		// if email exists, return 1
		if($this->user_model->username_exists($val))
		{
			echo '1 ' . $val . " exists!";
		}
	}
	/*
	 * Validation callbacks to be used together with form_input->set_value()
	 * 
	 ****************************************************************************************/
	
	/**
	 * function validate_email()
	 * @param $email string
	 * @return bool
	 * 
	 * Validate an email address. Provide email address (raw input)
	 * Returns true if the email address has the email address format and the domain exists.
	 * 
	 * @author: Douglas Lovell
	 * @url: http://www.linuxjournal.com/article/9585 
	 */
	public function _validate_email($email)
	{
		$isValid = true;
		$atIndex = strrpos($email, "@");
		if (is_bool($atIndex) && !$atIndex) {
			$isValid = false;
		}
		else {
			$domain = substr($email, $atIndex+1);
			$local = substr($email, 0, $atIndex);
			$localLen = strlen($local);
			$domainLen = strlen($domain);
			if ($localLen < 1 || $localLen > 64) {
				// local part length exceeded
				$isValid = false;
			}
			else if ($domainLen < 1 || $domainLen > 255) {
				// domain part length exceeded
				$isValid = false;
			}
			else if ($local[0] == '.' || $local[$localLen-1] == '.') {
				// local part starts or ends with '.'
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $local)){
				// local part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
				// character not valid in domain part
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $domain)){
				// domain part has two consecutive dots
				$isValid = false;
			}
			else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))){
				// character not valid in local part unless
				// local part is quoted
				if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))){
					$isValid = false;
				}
			}
			// Verify the email domain
			/*if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))){
			 // domain not found in DNS
			$isValid = false;
			}*/
		}
		return $isValid;
	}
	
	public function email_check($email)
	{
		// Regex function returns false when $email NOT EMAIL!
		if(!$this->_validate_email($email)){
			$this->form_validation->set_message('email_check', 'The %s is invalid');
			
			return FALSE;
		}
		elseif(empty($email) || $email == '') {
			$this->form_validation->set_message('email_check', 'The %s field cannot be empty');
			
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	
}