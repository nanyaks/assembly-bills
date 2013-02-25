<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * @author 	Nanyak Loknan S.
	 * @version	1.0
	 * 
	 * Default controller for the assembly bills application.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/home
	 *	- or -  
	 * 		http://example.com/index.php/home/index
	 *
	 *
	 * Note any other public methods not prefixed with an underscore will
	 * map to /index.php/register/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	var $base;
	var $css_base = NULL;
	var $css = NULL;
	
	/*
	 * Function __construct
	 * Set all init variables here to be loaded when the controller is initialized.
	 */
	public function __construct(){		
		parent::__construct();	//	Load parent constructor
		
		$this->base = $this->config->item('base_url');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		$this->img = $this->config->item('img');
		$this->less = $this->config->item('less');
		
		#$this->load->helper('init');
		#load_();
		
		// Load the url helper
		$this->load->helper('url');
	}
	
	/*
	 * Index page for the Home controller
	 * This is the page that will be displayed by default when the default controller is loaded 
	 */
	public function index()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;
		$data['less'] = $this->less;
		
		$data['title'] = 'Assembly Bills | Welcome';
		
		$this->load->view('templates/header.php', $data);
		$this->load->view('home.php', $data);
		$this->load->view('templates/footer.php');
	}
}

/* End of file register.php */
/* Location: ./application/controllers/register/register.php */