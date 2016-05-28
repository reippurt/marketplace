<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 *
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('googlemaps');
		$this->load->model('validate_fields');
		$this->load->model('get');
		$this->load->model('ad');
		$this->session->set_userdata('referer', current_url());

		if(!$this->session->userdata('loggedIn')){ redirect('login'); }
	}

	public function init()
	{
		$this->output->set_template('dashboard');
	}

	public function index()
	{

		$data = "hej";
		
		$this->init();
		
		$this->load->view('dashboard/main', $data);
	
	}

	public function ads()
	{
		

    	$this->init();
	}

	public function settings()
	{

		$data['user'] = $this->db->get_where('users', array('id'=>$this->session->userdata('userId')))->row();
		$this->load->view('dashboard/settings', $data);

		$this->init();
	}

	public function favorites()
	{

		$data['ads_available'] = $this->ad->get_available();
		
		$data['breadcrumbs'] = $this->get->breadcrumbs();

		$data['selectList'] = $this->get->category_listing();
			
		$this->init();
		$this->load->view('dashboard/favorites', $data);
	}

	public function password()
	{
		
		$data['user'] = $this->db->get_where('users', array('id' => $this->session->userdata('userId')))->row();

		$this->load->view('dashboard/change_password', $data);
		$this->init();
	}



}
