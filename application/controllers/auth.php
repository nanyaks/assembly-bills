<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	/**
	 * @author 	Nanyak Loknan S.
	 * @version	1.0 for the hackathon. 2012
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
		
		#	Load User Model
		$this->load->model('auth_model');
		
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
	public function _static(){
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;
		$data['less'] = $this->less;
	
		return $data;
	}
	
	/**
	 * @author Nanyak Loknan S.
	 * @return bool
	 * 
	 */
	public function login(){
		$data = $this->_static();
		$data['title'] = "Login";
		
		#	Load helpers
		$this->load->helper(array('url',));
		
		if($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('login')){
			
			#	Prep and Assign the username and password appropriately
			$u = mysql_real_escape_string($this->input->post('username'));
			$p = md5(mysql_real_escape_string($this->input->post('password')));
			
			$_auth = $this->auth_model->_check_login($u, $p);
			
			#	If the $_auth var is true -> int(1), generate session and redirect
			if ($_auth){
				$_a = $_auth;
				
				#	Register the user session
				//print_r($_a['username']); die();
				$sess_d = array(
						'username' => $_a['username'],
						'logged_in' => TRUE,
				);
				$this->session->set_userdata($sess_d);
				
				redirect("user/register");	# redirect to the proper page -> user/profile
			}
			else {
				#	Error with login params
				echo "No user with these parameters!";
			}
		}
		else {
			$this->load->view('templates/header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('templates/footer');
		}
	}
	
	
	
	/**
	 * @param	string
	 */
	public function logout($sess_var = NULL)
	{
		if( isset($sess_var))
		{
			$this->session->unset_userdata($sess_var);
		}
	}
}