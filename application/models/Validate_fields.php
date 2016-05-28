<?php

Class Validate_fields extends CI_Model
{

	public function ad($array)
	{
		$fields = $array;
		$validated_fields = array();
		$result = false;

		if(in_array('productName', $fields))
		{
			$this->form_validation->set_rules('productName', 'produkt','trim|required');
			$validated_fields['productName'] = $this->input->post('productName');
		}

		if(in_array('title', $fields))
		{
			$this->form_validation->set_rules('title', 'overskrift','trim|required');
			$validated_fields['title'] = $this->input->post('title');
		}

		if(in_array('description', $fields))
		{
			$this->form_validation->set_rules('description', 'supplerende tekst','trim|required');
			$validated_fields['description'] = $this->input->post('description');
		}

		if(in_array('price', $fields))
		{
			$this->form_validation->set_rules('price', 'pris','trim|required|integer');
			$validated_fields['price'] = $this->input->post('price');
		}
		
		if(in_array('adImages', $fields))
		{
			// need sanitizing
			$validated_fields['adImages'] = $this->input->cookie('images');
		}

		if(in_array('adFeaturedImage', $fields))
		{
			// need sanitizing
			$images_in_cookies = json_decode($this->input->cookie('images'));
			if($images_in_cookies){
				$adFeaturedImage = $images_in_cookies[0];
			} else { $adFeaturedImage = ""; }
			$validated_fields['adFeaturedImage'] = $adFeaturedImage;
		}

		
		if($this->form_validation->run() == true)
		{
			$result = $validated_fields;
		}
		
		return $result;

	}

	public function user($array)
	{
		$fields = $array;
		$validated_fields = array();

		// validate email
		if(in_array('email', $fields) && $this->input->post('email') != $this->session->userdata('email'))
		{
			$this->form_validation->set_rules('email', 'e-mail', 'trim|required|is_unique[users.email]');
			$validated_fields['email'] = $this->input->post('email');
		}

		// validate nameSlug
		if(in_array('nameSlug', $fields) && $this->input->post('nameSlug') != $this->session->userdata('nameSlug'))
		{
			$this->form_validation->set_rules('nameSlug', 'brugernavn', 'trim|required|is_unique[users.nameSlug]');
			$validated_fields['nameSlug'] = $this->input->post('nameSlug');
		}

		// validate name
		if(in_array('name', $fields))
		{
			$this->form_validation->set_rules('name', 'navn', 'trim|required');
			$validated_fields['name'] = $this->input->post('name');
		}

		// validate address
		if(in_array('address', $fields))
		{
			$this->form_validation->set_rules('address', 'Vejnavn', 'required|trim');
			$validated_fields['address'] = $this->input->post('address');
		}
		
		// validate postalCode
		if(in_array('postalCode', $fields))
		{
			$this->form_validation->set_rules('postalCode', 'Postnummer', 'required|trim|exact_length[4]|integer');
			$validated_fields['postalCode'] = $this->input->post('postalCode');
		}


		// validate city
		if(in_array('city', $fields))
		{
			$this->form_validation->set_rules('city', 'By', 'required|trim');
			$validated_fields['city'] = $this->input->post('city');
		}

		// validate phone number
		if(in_array('phone', $fields))
		{
			$this->form_validation->set_rules('phone', 'Telefon', 'required|trim|exact_length[8]|integer');
			$validated_fields['phone'] = $this->input->post('phone');
		}

		// for changing password - user need to submit current password
		if(in_array('current-password', $fields)){
			$this->form_validation->set_rules('current-password', '"Nuværende adgangskode"', 'trim|required|min_length[6]|callback_validateCurrentPassword');
		}

		// validate password
		if(in_array('password', $fields)){
			$this->form_validation->set_rules('password', '"Ny adgangskode"', 'trim|required|min_length[6]');
			$validated_fields['password'] = $this->encrypt->encode($this->input->post('password'), $this->custom->appOptions('siteName')->value2);

		}

		// validate password repeat
		if(in_array('password-repeat', $fields)){
			$this->form_validation->set_rules('password-repeat', '"Gentag ny adgangskode"', 'trim|required|min_length[6]|matches[password]');
		}

		if($this->form_validation->run() == true)
		{
			return $validated_fields;
		}
		else
		{
			return false;
		}
	

	}
	
}

?>