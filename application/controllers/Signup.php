<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	/**
	 *
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->session->set_userdata('referer', current_url());
	
	}

	public function init()
	{
		$this->output->set_template('main');
	}

	public function index()
	{
		$data = "na";

		

		$this->init();
		$this->load->view('signup', $data);
	}

}
