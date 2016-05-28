<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_ad extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('get');
		$this->load->library('form_validation');
		$this->session->set_userdata('referer', current_url());
		
	}

	public function init()
	{

		$this->output->set_template('main');

	}

	public function id($adId = false)
	{
		$newEdit = false;
		if($this->session->userdata('editActive') == "" || $this->uri->segment(3) != $this->session->userdata('editActive')){
			$newEdit = true;

		}
	
		$adData = $this->db->select('*, ads.title as adTitle, ads.description as description')->from('ads')
										->join('users', 'users.id = ads.userId')
										->join('categories', 'categories.categoryId = ads.categoryId')
										->join('subcategories', 'subcategories.subcategoryId = ads.subcategoryId')
										->where('adId', $adId)
										->where('userId', $this->session->userdata('userId'))->get();

		if($adData->num_rows() == 0){
		
			$flash = $this->custom->flashdata();
			$flash['title'] = "Uautoriseret område";
			$flash['msg'] = "Det er kun muligt at redigere i egne annoncer";
			$this->session->set_flashdata('response', $flash);
		
			redirect('/');
		
		} else {

			$adData = $adData->row();

		}


		$data['adData'] = $adData;

		
		// fresh page load, start cookie to let user being able to edit images
		if($newEdit){
			delete_cookie('images');
			$new_cookie = array('name' => 'images', 'value' => $adData->adImages, 'expire' => 1200);
			set_cookie($new_cookie);
			$this->session->set_userdata('editActive', $adData->adId);

			redirect(current_url());		
		}

		$data['cookieImages'] = json_decode($this->input->cookie('images'));

		$data['category'] = (object)array('categoryName' => $adData->categoryName);
		$data['subcategory'] = (object)array('subcategoryName' => $adData->subcategoryName);

		$this->init();
		$this->load->view('static/ad_information', $data);

		
	}

}


?>
