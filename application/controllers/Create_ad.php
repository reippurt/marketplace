<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_ad extends CI_Controller {

	/**
	 *
	 */

	public function __construct()
	{

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->library('upload');
		$this->load->model('insert');
		$this->load->model('get');
		
		$referer = current_url();
		if($this->uri->total_segments() > 3){
			$referer = base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $this->uri->segment(3));
		}

		$this->session->set_userdata('referer', $referer);
	}

	public function init()
	{

		$this->output->set_template('main');

	}


	
	public function images()
	{

		$data['cookieImages'] = json_decode($this->input->cookie('images'));

		$this->init();
		$this->load->view('static/ad_images', $data);

	}

	public function categories()
	{
		$data['newArray'] = $this->db->select('*')->from('subcategories')
												  ->join('categories', 'categories.categoryId = subcategories.categoryId')
												  ->join('types', 'types.typeId = subcategories.typeId')->group_by('subcategories.subcategoryId')
												  ->get()->result();
		
		$data['types'] = $this->db->get('types')->result();
		$data['categories'] = $this->db->get('categories')->result();
		$data['subcategories'] = $this->db->get('subcategories')->result();
		
		$this->init();

		$this->load->view('static/ad_categories', $data);
	}

	public function information($subcategoryId = false, $flowFacebookLogin = false)
	{	
		$data['set_value'] = $this->session->flashdata('set_value');
		
		$classification = explode('-', $this->uri->segment(3));

		$product_classification = array(
			'typeId' => $classification[0],
			'categoryId' => $classification[1],
			'subcategoryId' => $classification[2]
		);


		$data['hidden'] = $product_classification;
		// make sure that product_classification valules contains valid and existing ID's - if not - redirect or give error message
		// set cookie
	
		set_cookie(array('name' => 'classification', 'value' => json_encode($product_classification), 'domain' => base_url(), 'expire' => 3600));
				









		// below is old code



















		if($flowFacebookLogin){
			//redirect($this->custom->facebookLogin());
	
			echo $this->input->post('email');
		}

		$create_ad = false;
		// defining user type
		$userType = $this->input->post('user');

		// user is new and need to register account before creating ad
		if($userType == "new")
		{
			// insert user, await response
			$insertUser = $this->insert->user("login");

			// if user account is created start creating ad
			if($insertUser)
			{
				$create_ad = true;		
			}
		}
		else if($userType == "existing" || $this->input->post('submit-create-ad'))
		{
			$create_ad = true;
		}
		
		// create ad if user is loggedIn or sucessfully created an account
		if($create_ad)
		{
			//create ad
			$create_ad_response = $this->insert->ad();

			// check response of creating ad
			if($create_ad_response)
			{
				$create_ad = true;
				redirect('ad/id/' . $create_ad_response);
			}
		}

		
		$this->init();	

		$url =  $this->uri->segment(3);

		$url_param = explode('-', $url);

		$data['category'] = $this->db->get_where('categories', array('categoryId' => $url_param[1]))->row();
		$data['subcategory'] = $this->db->get_where('subcategories', array('subcategoryId' => $url_param[2]))->row();

		$data['attributes'] = $this->db->select('*')
									   ->from('attributes')
									   ->join('relAtt', 'attributes.attId = relAtt.attId')
									   ->where('relAtt.subcategoryId', $url_param[2])
									   ->get()->result();

		// get facebook loginUrl
		//$data['loginUrl'] = $this->custom->facebookLogin();
		
		$this->load->view('static/ad_information', $data);


		// remove session set_value if user has been using facebook flow login
		$this->session->unset_userdata('set_value');

	}



}