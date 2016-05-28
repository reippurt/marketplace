<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	/**
	 *
	 */

	public function __construct()
	{

		parent::__construct();
		$this->session->set_userdata('referer', current_url());	
		$this->load->library('pagination');
		
		$this->load->model('get');
		$this->load->model('ad');
	
	}

	public function init()
	{

		$this->output->set_template('main');

	}

	public function default_method()
	{

		$url = $this->uri->segment(2);

		return $url;
	}

	public function _remap($method)
	{
	    if ($method == 'some_method')
	    {
	        $this->$method();
	    }
	    else
	    {

	    	$data['ads_available'] = $this->ad->get_available();
	    				
			$data['breadcrumbs'] = $this->get->breadcrumbs();
	
			$data['selectList'] = $this->get->category_listing();
	    		
	    	$this->init();	    	
	 		$this->load->view('category', $data); 
	 	}  	
	}

}
