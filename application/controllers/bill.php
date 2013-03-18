<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bill extends CI_Controller {

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
		
		// Load Model
		$this->load->model('bill_model');
		
		// Load $css and $base variables..
		$this->base = $this->config->item('base_url');
		$this->css_base = $this->config->item('css_base');
		$this->css = $this->config->item('css');
	}
	
	public function index(){
		echo "Index Page coming soon!";
		echo "<br />Try bill/enroll and bill/view";
	}
	
	public function register(){
		
		// Load the url helper...
		$this->load->helper('url');
		
		// form helper & Library for validation and input 
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['base'] = $this->base;
		$data['css_base'] = $this->css_base;
		$data['css'] = $this->css;
		
		$data['title'] = 'Register New Bill - Assembly Bills';
		
		// Set the form rules
		$this->form_validation->set_rules('bill_title', 'Title of Bill', 'required');
		
		$this->form_validation->set_rules('bill_sponsor', 'Sponsor', 'required');
		$this->form_validation->set_rules('co_sponsor', 'Co sponsor', 'required');
		$this->form_validation->set_rules('bill_contents', 'Bill Contents', 'required');
		
		/*
		 * This would allow for the form field values to be retained without the fields being required
		 * I dont know for sure if this is how its designed to work so i assume 'CODE_STATUS::HACK' ;)
		 */
		
		if($this->form_validation->run() === FALSE){
			// Load the view
			$this->load->view('templates/header', $data);
			$this->load->view('bills/enroll');
			$this->load->view('templates/footer');
		} else {
			// Insert into db here!
			$_insert = $this->bill_model->register_bill();
			$this->load->view('bills/success');
			//print_r($this->input->post());
		}
	}
	
	/*
	 * Validation callbacks to be used together with form_input->set_value()
	 * These will be put here as needed!
	 */
	public function _validate_billContents(){
		
	}
	
	/*
	 *  End Validation callbacks
	 */
	
	public function view(){
		/*
		 *  Load the url segment representing the user_id first if it exists
		 *  NOTE: we could have set $inf to be false as a parameter to the function but $this->uri->segment() returns false if no segment exists 
		 */
		$inf = $this->uri->segment(3);
		
		// Load helpers and Libraries
		$this->load->helper('url');
		
		// There will be a form on this page so the 'form helper' is needed
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['base'] = $this->base;
		$data['css_base'] = $this->css_base;
		$data['css'] = $this->css;
		
		$data['title'] = 'View Assembly Bills';
		
		if($inf !== FALSE){
			/*
			 * Populate $data array
			 */
			$data['info'] = $this->bill_model->fetch_bill($inf);
			
			$this->load->view('templates/header', $data);
			$this->load->view('bills/bill_details', $data);
			$this->load->view('templates/footer');
		}
		else {
			$data['info'] = $this->bill_model->fetch_bill();
			
			$this->load->view('templates/header', $data);
			$this->load->view('bills/view', $data);
			$this->load->view('templates/footer');
		}
		
	}
	
	public function rate_bill($id = NULL){
		// This function will be invoked from the 'view bill' page. Its for rating the bills that have been enrolled
		if($id === NULL or $id == FALSE){
			return FALSE;
		}
	}
	
}