<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ad extends CI_Controller {

	/**
	 *
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');	
	}

	public function init()
	{
		$this->output->set_template('main');
	}

	public function id($adId = false)
	{
		$favorites = "star";
		$data['lower_price_limit'] = "";
		$data['upper_price_limit'] = "";
		$data['reg'] = array();


		$data['ad'] = $this->db->select('*, ads.description as description, ads.title as title')
							   ->from('ads')->join('types', 'types.typeId = ads.typeId')
							   ->join('users', 'users.id = ads.userId')
							   ->join('categories','categories.categoryId = ads.categoryId')
							   ->join('subcategories', 'subcategories.subcategoryId = ads.subcategoryId')
							   ->where('adId', $adId)
							   ->get()
							   ->row();


		$data['images'] = json_decode($data['ad']->adImages);

		if($this->session->userdata('loggedIn')){

			$query = $this->db->get_where('favorites', array('adId' => md5($adId), 'userId' => md5($this->session->userdata('userId'))));

			if($query->num_rows() > 0){
				$favorites = "check";
			}

		}
		
		$data['favorites'] = $favorites;
		
		$this->init();
		
		$this->load->view('ad_single_display', $data);
	
	}

}
