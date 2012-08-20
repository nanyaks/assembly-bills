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
	public function __construct(){		
		parent::__construct();
		
		// Load User Model
		$this->load->model('user_model');
		
		// Load $css and $base variables..
		$this->base = $this->config->item('base_url');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		$this->img = $this->config->item('img');
		$this->less = $this->config->item('less');
	}
	
	public function _init_locations(){
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;
		$data['less'] = $this->less;
		
		return $data;
	}
	
	public function index(){
		echo "Index Page coming soon!";
		echo "<br />Try user/register";
	}
	
	public function register(){
		$data = $this->_init_locations();
		
		// Load the url helper...
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'New User Registration -- Assembly Bills';
		
		// Set the form rules
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('email', 'User Email', 'callback_email_check');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');		
		
		// If form is !(validated), load form with error messages
		if($this->form_validation->run() === FALSE){
			// Load the view
			$this->load->view('templates/header', $data);
			$this->load->view('user/registration');
			$this->load->view('templates/footer');
		} else {
			// Insert into db here!
			$_insert = $this->user_model->register_user();
			$this->load->view('user/success');
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
	
	public function email_check($email){
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