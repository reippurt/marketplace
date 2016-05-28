<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	/**
	 *
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->library('custom');	
		$this->load->library('pagination');	
		$this->load->model('get');

		$this->load->model('ad');

		$this->session->set_userdata('referer', current_url());

	}

	public function init()
	{
		$this->output->set_template('main');
	}

	public function index()
	{
		$searchString = $this->input->post('search');
		if(empty($searchString)){
			redirect('/');
		}else{
			$this->session->set_flashdata('searchString', $searchString);
			redirect(base_url() . 'search/str/'.urlencode(strtolower($this->input->post('search'))));
		}

	}

	public function str($string)
	{
		$string = urldecode($string);
		$data['query'] = $string;

		$data['ads_available'] = $this->ad->get_available();
		
		$data['breadcrumbs'] = $this->get->breadcrumbs();
		$data['selectList'] = $this->get->category_listing();
		
		$this->init();
		$this->load->view('search', $data);
	}

}
