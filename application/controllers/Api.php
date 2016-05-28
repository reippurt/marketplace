<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 *
	 */

	public function __construct()
	{

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('insert');
		$this->load->model('get');
		$this->load->model('validate_fields');

		

	}

	public function createAd()
	{
		$hej = 1;
		$flash = $this->custom->flashdata();
		$redirect = $this->session->userdata('referer');
		$fields = array('productName', 'title', 'description', 'price');

		$fields_validated = $this->validate_fields->ad($fields);

		if($fields_validated)
		{
			
			$insert_response = $this->insert->adData($fields_validated);
			
			if($insert_response)
			{
			
				//$redirect = base_url('ad/id/' . $insert_response);
			}

			$flash['class'] = "success";
			$flast['title'] = "Annoncen blev oprettet";
			$flash['msg'] = "";
			
		
		}
		else
		{
			$flash['title'] = "Annoncen blev ikke gemt";
			$flash['msg'] = "Gennemgå venligst følgende fejl";
			$flash['extra'] = validation_errors();
		
			$this->session->set_flashdata('set_value', $this->input->post());
		}
		
		$this->session->set_flashdata('response', $flash);

		//redirect($redirect);
	}

	public function getUserInfo($requested_string = false)
	{
		$response = array('response' => false);
		$hashUserId = $this->input->post('hashUserId');

		// sanitize, check for existance
		// skip it for now

		$user_query = $this->db->select($requested_string)->from('users')->where('hashUserId', $hashUserId)->get();

		if($user_query->num_rows() == 1)
		{
			$response['response'] = true;
			$response['msg'] = $user_query->row()->$requested_string;
		}
		else
		{
			$response['msg'] = "Brugeren eksisterer ikke";
		}

		echo json_encode($response);

	}

	public function deleteAd($adId){

		$this->db->where('adId', $adId)->update('ads', array('status' => '3', 'closure' => $this->input->post('closure')));
		
		if($this->db->affected_rows() == 1)
		{
			$flash = $this->custom->flashdata();

			$flash['class'] = "success";
			$flash['title'] = "Annoncen blev slettet";
			$flash['msg'] = "";
			$this->session->set_flashdata('response', $flash);
		}

		redirect('/');

	}

	public function validateCurrentPassword($current_password)
	{
		$result = false;

		$password_query = $this->db->get_where('users', array('id' => $this->session->userdata('userId')))->row();

		$db_password = $this->encrypt->decode($password_query->password, $this->custom->appOptions('siteName')->value2);

		if($db_password == $current_password)
		{	
			$result = true;
		}
		else
		{
			$this->form_validation->set_message('validateCurrentPassword', '%s matcher ikke din eksisterende adgangskode');
		}
		
		return $result;
	
	}

	public function changePassword()
	{
		$flash = $this->custom->flashdata();

		$fields = array('current-password', 'password', 'password-repeat');

		$fields_validated = $this->validate_fields->user($fields);

		if($fields_validated){

			$this->db->where('id', $this->session->userdata('userId'))->update('users', $fields_validated);
			if($this->db->affected_rows() == 1)
			{
				$flash['class'] = "success";
				$flash['title'] = "Adgangskode er blevet skiftet";
				$flash['msg'] = "";

			}
			else
			{
				$flash['class'] = "warning";
				$flash['title'] = "weird things can happen";
				$flash['msg'] = "Du har formentlig forsøgt at skifte adgangskode til den allerede eksisterende";
			}
		}
		else
		{
			$flash['title'] = "Adgangskoden blev ikke skiftet";
			$flash['msg'] = "Gennemgå venligst følgende fejl";
			$flash['extra'] = validation_errors();

			$this->session->set_flashdata('set_value', $fields_validated);
		}

		$this->session->set_flashdata('response', $flash);
		redirect($this->session->userdata('referer'));

	}

	public function addFavorites()
	{
		$response = array('response' => false, 'html' => 'Favorit <i class="fa fa-star"></i>');

		if($this->session->userdata('loggedIn')){


			$userId = md5($this->session->userdata('userId'));

			$favoritesData = array(

				'favoriteType' => $this->input->post('favoriteType'),
				'adId' => $this->input->post('adId'),
				'userId' => $userId

			);
			
			// validate these standard fields? sure np, but lets do it another time

			$query = $this->db->get_where('favorites', array('adId' => $this->input->post('adId'), 'userId' => $userId));

			if($query->num_rows() > 0){

				$this->db->where('userId', $userId)->delete('favorites', array('adId' => $this->input->post('adId')));
				$response['response'] = true;
				$response['html'] = "Favorit <i class='fa fa-star'></i>";

			}else{

				$this->db->insert('favorites', $favoritesData);

				if($this->db->affected_rows() == 1){
					$response['response'] = true;
					$response['html'] = "Favorit <i class='fa fa-check'></i>";
				}

			}

		} else {



		}

		echo json_encode($response);

	}

	public function facebookLoginUrl()
	{
		echo $this->custom->facebookLogin();
	}

	public function setValues()
	{
	
		$this->session->set_userdata('set_value', $this->input->post());
		
	}

	public function update_ad($adId)
	{
		$redirect = $this->session->userdata('referer');
		$flash = $this->custom->flashdata();
		$fields = array('productName', 'title', 'description', 'price', 'adFeaturedImage', 'adImages');

		$fields_validated = $this->validate_fields->ad($fields);

		if(!$fields_validated)
		{
			$flash['title'] = "Annoncen blev ikke gemt";
			$flash['msg'] = "gennemgå venligst følgende fejl";
			$flash['extra'] = validation_errors();
		}
		else
		{
			$this->db->where('adId', $adId)->update('ads', $fields_validated);
			if($this->db->affected_rows() == 1)
			{
				$flash['class'] = "success";
				$flash['title'] = "Annoncen er opdateret";
				$flash['msg'] = "";
			}
			else
			{
				$flash['class'] = "warning";
				$flash['title'] = "Weird things can happen";
				$flash['msg'] = "Du har formentlig forsøgt at gemme annoncen uden at foretage nogen ændringer";
			}

			$redirect = base_url('ad/id/' . $adId);

		}


		$this->session->set_flashdata('response', $flash);
		redirect($redirect);

	}

	public function deleteCookies($cookieName = false, $cookieValue = false)
	{
		
		// if cookieId exists, unset that array element
		if($cookieValue)
		{
			// handle cookieValue input key_0, key_1, key_2 etc
			$cookieValue = explode('_', $cookieValue);
			$cookieId = $cookieValue[1];
			
			$cookieArray = json_decode($this->input->cookie($cookieName));

			
			if(array_key_exists($cookieId, $cookieArray))
			{

				unset($cookieArray[$cookieId]);
			
				$new_cookie = json_encode(array_values($cookieArray));

				$this->input->set_cookie(array('name' => $cookieName, 'value' => $new_cookie, 'expire' => 1200));
			}

		}
		else
		{
			// delete the whole cookie, if no cookieId has been set
			delete_cookie($cookieName);
		}

		redirect($this->session->userdata('referer'));

	}

	public function updateUser()
	{
		$flash = $this->custom->flashdata();

		$fields = array('email', 'name', 'nameSlug' ,'address', 'postalCode', 'city', 'phone');
		$fields_validated = $this->validate_fields->user($fields);

		if($fields_validated)
		{
			
			$this->db->where('id', $this->session->userdata('userId'))->update('users', $fields_validated);

			if($this->db->affected_rows() == 1){

				$this->session->set_userdata($fields_validated);
				$flash['class'] = "success";
				$flash['title'] = "Brugeroplysninger opdateret";
				$flash['msg'] = "";
			}
			else
			{
				$flash =  array(
					'class' => "warning",
					'title' => "Weird things can happen",
					'msg' => "Du har formentlig ikke foretaget dig nogle ændringer",
					'extra' => ""
				);
			}

		}
		else
		{
			$flash['title'] = "Opdatering mislykkedes";
			$flash['msg'] = validation_errors();
		}
		
		$this->session->set_flashdata('response', $flash);
		redirect($this->session->userdata('referer'));
	}


	public function setFilters()
	{
		$url_params = "";
		// THIS IS FOR RETRIEVING POST DATA
    	$filter_submit = $this->input->post('submit-set-filter');
    	$region_is_set = $this->input->post('region');
    	$price_is_set = $this->input->post('price');
    	$sort_price = $this->input->post('sort-price');

    	// someone pressed the set filter button, lets do something about that
    	if($filter_submit)
    	{

    		// create URL parameters if price is set
    		if($price_is_set){

    			$url_params = $url_params . "&price=" . preg_replace('/\s+/', '', $this->input->post('price'));
    		
    		}
    		
    		// create URL parameters if region is set
    		if($region_is_set){

    			$url_params = $url_params . "&reg=" . implode(',', $region_is_set);
    		
    		}

    		if($sort_price){

    			$url_params = $url_params . "&sort=price-" . $this->input->post('sort-price');
    		}

    		// SET CREATED URL PARAMETERS IN URL STRING
    		redirect($this->session->userdata('referer') ."?filter=set".$url_params);
    	}
	
	}

	public function generalSearch()
	{
		$term = $this->input->post('term');

		$query = $this->get->categorySearchResults($term);
		
		echo json_encode($query);
	}

	public function upload_single_image()
	{
		$fileName = $_FILES["image"]['name'];
		$fileTmpLoc = $_FILES["image"]['tmp_name'];
		$fileType = $_FILES["image"]['type'];
		$fileSize = $_FILES["image"]['size'];
		$fileErrorMsg = $_FILES["image"]['error'];

		$insert_fileName = time() . "_" . $fileName;
	
		if(!$fileTmpLoc){

			echo "error, brows again";
			exit();
		}

		if(move_uploaded_file($fileTmpLoc, "./assets/img/" . $insert_fileName)){

			
			$cookieArray = json_decode($this->input->cookie('images'));

			$cookieArray[] = $insert_fileName;

			$new_cookie = json_encode($cookieArray);


			$this->input->set_cookie(array('name' => 'images', 'value' => $new_cookie, 'expire' => 24000));
			
			echo "<i class='fa fa-check fs20'></i>";

			
		}
		else
		{
			echo "Det mislykkedes at uploade filen";
		}

	}

	public function flowLogin()
	{
		$response = array('response' => false, 'msg' => "");
		

		$this->form_validation->set_rules('email', 'e-mail', 'trim|required');
		$this->form_validation->set_rules('password', 'adgangskode', 'trim|required');
		
		if($this->form_validation->run() == true)
		{
			$login_response = $this->custom->login($this->input->post('email'), $this->input->post('password'), false);
				
			if($login_response)
			{
				$response = array(
					'response' => "true",
					'user' => $this->session->userdata(),
				);

				
			}
			else
			{
				$response['msg'] = $this->session->flashdata('response')['title'] . ". " . $this->session->flashdata('response')['msg'];
			}

		}
		else
		{
			$response['msg'] =  validation_errors();
		}

		echo json_encode($response);

	}

	public function login()
	{
		
		$redirect = "login";
		// validate login form
		$this->form_validation->set_rules('login-email', 'Email', 'trim|required');
		$this->form_validation->set_rules('login-password', 'Adgangskode', 'trim|required');
		
		// if form validation is true
		if($this->form_validation->run() == true)
		{
			// get login token and session
			$login_response = $this->get->login_token($this->input->post('login-email'), $this->input->post('login-password'), false);

			if($login_response){ $redirect = "/"; }
		}
		else
		{

			// if form validation was false, set up flashdata
			$flash = $this->custom->flashdata();
			$flash['title'] = "Vi kunne ikke logge dig ind";
			$flash['msg'] = "Gennemgå venligst følgende fejl og prøv igen";
			$flash['extra'] = validation_errors();
			$redirect = "login";
			$this->session->set_flashdata('response',$flash);

		}
	
		redirect($redirect);		
	
	}

	public function signup()
	{
		$insert_user_response = false;
		$flash = $this->custom->flashdata();
		$validate_fields = array('name', 'email', 'address', 'postalCode', 'city', 'lat', 'lng', 'phone');

		$fields_validated = $this->validate_fields->user($validate_fields);
		if($fields_validated)
		{

			$insert_user_response = $this->insert->user('login');

		}
		else
		{
			$flash['title'] = "Vi kunne ikke oprette dig";
			$flash['msg'] = "Gennemgå venligst følgende fejl";
			$flash['extra'] = validation_errors();
		}

		$this->session->set_flashdata('response', $flash);

		if($insert_user_response){
			redirect('/');
		}
		else
		{
			redirect($this->session->userdata('referer'));
		}

	}


	public function createSubcategory()
	{
		$flash = $this->custom->flashdata();

		$this->form_validation->set_rules('type', 'Type', 'trim|required');
		$this->form_validation->set_rules('category', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('subcategory', 'Underkategori', 'trim|required');
		
		if($this->form_validation->run() == false)
		{
			$flash['title'] = "Kunne oprette din kategori";
			$flash['msg'] = "Gennemgå venligst følgende fejl";
			$flash['extra'] = validation_errors();
		}
		else
		{
			$type = $this->input->post('type');
			$category = $this->input->post('category');
			$subcategory = $this->input->post('subcategory');

			$this->insert->subcategory($type, $category, $subcategory);
			
			$flash['class'] = "success";
			$flash['title'] = "Kategori oprettet, tak for dit input";
			$flash['msg'] = "Du kan nu vælge din kategori og gå videre med din annonce";
		}

		$this->session->set_flashdata('response', $flash);

		redirect($this->session->userdata('referer'));
	}


	public function getRows($tableColumn)
	{
		$tableColumn = explode('_', $tableColumn);
		
		$value = $this->input->get('term');
		$table = $tableColumn[0];
		$column = $tableColumn[1];


		
		$queryResult = $this->db->select($column . ' as id, '.$column.' as label, '.$column.' as value')
								->from($table)
								->like($column, $value)
								->group_by($column)
								->get()->result();
		

		echo json_encode($queryResult);
	}

}
