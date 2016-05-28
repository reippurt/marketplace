<?php

Class Insert extends CI_Model
{

	public function adData($array)
	{
		$result = false;
		$images_cookie = $this->input->cookie('images');
		
		// $array containes validated fields of [productName, title, description, price]

		// now we need to add the last set of data in order to complete insertion

		$user_id = $this->session->userdata('userId');

		$array['userId'] = $user_id;
		//$array['hashUserId'] = md5($user_id);

		$images_cookie = $this->input->cookie('images');

		$array['adFeaturedImage'] = json_decode($images_cookie)[0];

		$array['adImages'] = $images_cookie;

		$classification = (array)(json_decode($this->input->cookie('classification')));


		if(is_array($classification))
		{
			$array = array_merge($array, $classification);
		}
		
		
		$this->db->insert('ads', $array);

		if($this->db->affected_rows() == 1)
		{
			
			$adId = $this->db->insert_id();

			$hashAdId = md5($adId);

			$this->db->where('adId', $adId)->update('ads', array('hashAdId' => $hashAdId));

			if($this->db->affected_rows() == 1)
			{
				$result = $adId;
			}

		}
		
		/*echo "<pre>";
		print_r($array);
		echo "</pre>";		*/
		
		return $result;
	}

	public function subcategory($typeName, $categoryName, $subcategoryName)
	{	
		$typeId = 0;
		$categoryId = 0;
		
		// count number of rows returned when quering types for typeName		
		$typeNameQuery = $this->db->get_where('types', array('typeName' => $typeName));
		$typeNameCount = $typeNameQuery->num_rows();

		// if rows count == 0 -> insert new row
		if($typeNameQuery->num_rows() == 0){

			$this->db->insert('types', array('typeName' => $typeName, 'typeSlug' => $this->custom->slugify($typeName)));
			$typeId = $this->db->insert_id();
		}
		else
		{
			// typeName already exists - reuse the typeId for the new subcategory
			$typeId = $typeNameQuery->row()->typeId;
		
		}

		// count number of rows returned when querying categories for categoryName		
		$categoryNameQuery = $this->db->get_where('categories', array('typeId' => $typeId, 'categoryName' => $categoryName));
		$categoryNameCount = $categoryNameQuery->num_rows();
		
		
		
		// if rows count == 0 -> insert new row
		if($categoryNameCount == 0){
			
			$this->db->insert('categories', array('typeId' => $typeId, 'categoryName' => $categoryName, 'categorySlug' => $this->custom->slugify($categoryName)));
			$categoryId = $this->db->insert_id();

		}
		else
		{
			$categoryId = $categoryNameQuery->row()->categoryId;
		}		

		$this->db->insert('subcategories', array('typeId' => $typeId, 'categoryId' => $categoryId, 'subcategoryName' => $subcategoryName, 'subcategorySlug' => $this->custom->slugify($subcategoryName)));

		$this->session->set_userdata('typeSession', "typeCount: ".$typeNameCount." || categoryCount: ". $categoryNameCount);

	}

	public function user($proceed_to_login = false)
	{

		$return = false;
		$flash = $this->custom->flashdata();
		$createUser = false;
		$login_response = false;
		
		$this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('name', 'navn', 'trim|required');
		$this->form_validation->set_rules('signup-password', 'adgangskode', 'trim|required|matches[repeat-password]');
		$this->form_validation->set_rules('repeat-password', 'gentag adganskode', 'trim|required');
		$this->form_validation->set_rules('address', 'adresse', 'trim|required');
		$this->form_validation->set_rules('postalCode', 'postnummer', 'trim|required');
		$this->form_validation->set_rules('city', 'By', 'trim|required');
		$this->form_validation->set_rules('phone', 'telefon', 'trim|required');

		if($this->form_validation->run() == true)
		{
			// collect userdata
			$userdata = array(
				'name' => $this->input->post('name'),
				'nameSlug' => $this->custom->parseNameSlug($this->input->post('name')),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'postalCode' => $this->input->post('postalCode'),
				'city' => $this->input->post('city'),
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng'),
				'password' => $this->encrypt->encode($this->input->post('signup-password'), $this->custom->appOptions('siteName')->value2)
			);

			$createUser = true;				
		}
		else
		{
			// if form_validation was false	
			$flash['msg'] = "Vi kunne ikke oprette dig som bruger.";
			$flash['extra'] = validation_errors();
			
			$set_value = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'postalCode' => $this->input->post('postalCode'),
				'city' => $this->input->post('city'),
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng'),
				'phone' => $this->input->post('phone')
			);
			// set flashdata to set input values on register form
			$this->session->set_flashdata('set_value', $set_value);
		}

		
		// insert user if form_validation was true
		if($createUser == true)
		{
			$this->db->insert('users', $userdata);
		}

		
		if($proceed_to_login)
		{
			// check if user was created
			if($this->db->affected_rows() == 1)
			{
				$login_response = $this->get->login_token($this->input->post('email'), $this->input->post('signup-password'), false);
					
				if($login_response == true)
				{
					$flash = array('title' => "Tillykke", 'class' => "success", 'msg' => "Du er blevet medlem af " . $this->custom->appOptions('siteName')->value2, 'extra' => '' );
					$return = true;
				}
			}
		}
		else
		{
			// user was created but not logged in
			$flash = array('class' => 'success', 'title' => 'Din konto blev oprettet', 'msg' => '', 'extra' => '');
			$return = true;
		}
	

		$this->session->set_flashdata('response', $flash);
		return $return;

	}


	public function ad()
	{

		$flash = $this->custom->flashdata();
		$image_file_name = "default_feat_image.png";
		$return = false;
		$uploadAd = false;
		$uploadAdFeaturedImage = false;

		$this->form_validation->set_rules('productName', 'produkt', 'trim|required');
		$this->form_validation->set_rules('title', 'overskrift', 'trim|required');
		$this->form_validation->set_rules('description', 'beskrivelse', 'trim|required');
		$this->form_validation->set_rules('price', 'pris', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim');

		if($this->form_validation->run() == true)
		{

			$adImages = json_decode($this->input->cookie('images'));

			// getting typeIp, categoryId and subcategoryId from url parameter
			$url_param = explode('-', $this->uri->segment(3));

			// collection ad-data
			$addata = array(
				'userId' => $this->session->userdata('userId'),
				'typeId' => $url_param[0],
				'categoryId' => $url_param[1],
				'subcategoryId' => $url_param[2],
				'productName' => $this->input->post('productName'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'adFeaturedImage' => $adImages[0],
				'adImages' => $this->input->cookie('images')
			);			
		
			$uploadAd = true;
		
		}
		else
		{
			$flash['title'] = "Det var ikke muligt at oprette annoncen";
			$flash['msg'] = "Gennemgå venligst følgende fejl";
			$flash['extra'] = validation_errors();
		}

		
		// if form_validation && file_upload was successful
		if($uploadAd == true)
		{

			// insert ad
			$this->db->insert('ads', $addata);

			// set success response
			$flash['class'] = "success";
			$flash['title'] = "Annoncen er blevet oprettet";
			$flash['msg'] = "";
			$return = $this->db->insert_id();	// do nothing, but let function return false.

			$this->db->where('adId', $return)->update('ads', array('hashAdId' => md5($return)));

			// delete cookies holding image names chosen at step 1.
			delete_cookie('images');

		}

		
		
		$this->session->set_flashdata('response', $flash);

		

		return $return;
	}

	public function featured_image()
	{

		$flash = $this->custom->flashdata();
		$return = false;
		
		// check if file input is empty. If empty return true and proceed with ad
		if(empty($_FILES['adFeaturedImage']['name']))
		{
			// user has decided not to attach an image to the ad -> proceed to create the ad
			$return = true;
		}
		else
		{
			// configure rules for file upload			
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = '*';
			$config['max_size']	= '999999';
			$config['max_width'] = '5000';
			$config['max_height'] = '5000';
			$config['file_name'] = $this->input->post('title') . " " . time();

			//initialize
			$this->upload->initialize($config);

			// start upload
			$upload = $this->upload->do_upload('adFeaturedImage');

			if ( ! $upload )
			{

				// set error response
				$flash['title'] = "Fejl ved upload af billede";
				$flash['msg'] = "Gennemgå venligst fejlen:";
				$flash['extra'] = json_encode($this->upload->display_errors());
				$this->session->set_flashdata('response', $flash);
				$return = false;
			}
			else
			{
				// return file_name for ad()
				$return =  $this->upload->data('file_name');
			}
		}
		return $return;
	}
	
}

?>