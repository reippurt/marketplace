<?php

Class Get extends CI_Model
{

	public function minMaxValues($array, $key)
	{
		$result = array('min' => 0, 'max' => 0);

		$collection = array();

		if($array)
		{
		    foreach( $array as $k => $v )
		    {
		    	$collection[] = $v->$key;
		    }
	   
		    $result['min'] = min($collection);
		    $result['max'] = max($collection);
	   }

	   return $result;
	
	}


	public function google_maps_listing($adsObject)
	{
		
		
		$config['zoom'] = 'auto';
		$config['sensor'] = false;
		$config['map_height'] = '350';
		$this->googlemaps->initialize($config);
	
		
		foreach ($adsObject as $ad) {

			$marker = array();
			
			$marker['position'] =  $ad->lat . ', ' . $ad->lng;
			$marker['infowindow_content'] = '<img height="75px" width="75px" src="'.base_url('assets/img/' . $ad->adFeaturedImage ).'">';
			$marker['infowindow_content'] .= '<div class="mb10 mt10"><hr></div>';
			$marker['infowindow_content'] .= '<a href="'.base_url('ad/id/' . $ad->adId ).'">' . $ad->productName . '</a>';
			$this->googlemaps->add_marker($marker);
		
		}

		$maps = $this->googlemaps->create_map();

		return $maps;

	}

	public function sorting()
	{
		$sorting = array();
		$sort_is_set = $this->input->get('sort');

		$param = explode('-', $sort_is_set);

		if($sort_is_set){
			$sorting['price'] = $param[1];
		}
		else
		{
			$sorting = false;
		}

		return $sorting;
	}

	public function filters()
	{
		$filters = array();
		$price_is_set = $this->input->get('price');
	


    	// RETRIEVE ANY URL PARAMS AND USE IN WHERE CLAUSE
    	$filter_is_set = $this->input->get('filter');
    	if($filter_is_set)
    	{

    		
    		if($price_is_set){
	    		
	    		// prepping the url values for sql where statement	
	    		$price = explode('-', preg_replace('/\s+/', '', $this->input->get('price')));
	    		
	    		$filters['lower_price_limit'] = $price[0];
	    		$filters['upper_price_limit'] = $price[1];

    			$filters['urlFilters'] = "price > '".$price[0]."' AND price < '".$price[1]."'";
	    	
    		}

    	}

    	return $filters;

	}

	public function generate_where_clause()
	{
		$where_clause = "";
		$categories_array = array(
			'type' => urldecode($this->uri->segment(2)),
			'category' => urldecode($this->uri->segment(3)),
			'subcategory' => urldecode($this->uri->segment(4))
		);
			
		
		foreach ($categories_array as $key => $value) {
			
			if($value != ""){

				switch ($key) {
					case 'type':
						$where_clause = $where_clause . "types.typeSlug = '".$value."'";
						break;
					case 'category':
						$where_clause = $where_clause . " AND categories.categorySlug = '".$value."'";
						break;
					case 'subcategory':
						$where_clause = $where_clause . " AND subcategories.subcategorySlug = '".$value."'";
						break;
					
					default:
						# code...
						break;
				}


			}

		}
		return $where_clause;
	}

	public function ads($filter_array)
	{
		$result = false;
		$filter = $filter_array;
		$where_clause = "";//$this->generate_where_clause($filter['categories']);
		$sorting = $this->sorting();
		
		$this->db->select('regionCode, regionPostalCode, users.postalCode, productName, nameSlug, t1.adId as adId, t1.title as adTitle, price, typeName, categoryName, subcategoryName, adFeaturedImage, lat, lng')
				 ->from('ads as t1')
				 ->join('types', 't1.typeId = types.typeId')
				 ->join('categories', 't1.categoryId = categories.categoryId')
				 ->join('subcategories', 't1.subcategoryId = subcategories.subcategoryId')
				 ->join('users', 'users.id = t1.userId')
				 ->join('regions', 'regions.regionPostalCode = users.postalCode')
				 ->join('favorites', 'favorites.adId = t1.hashAdId', 'left')
				 ->group_by('t1.adId');

		
		if($sorting)
		{

			foreach ($sorting as $key => $value) {
			
				$this->db->order_by($key, $value);

			}

		}

		$this->db->order_by('postDate', 'DESC');
		


		if(array_key_exists('regions', $filter))
		{

			$i = 1;
			$regionCode = "";
			$whereClause_regions = "(";
			foreach ($filter['regions'] as $value) {
				
			
			
				switch ($value) {
					case 'koebenhavn':
						$regionCode = "1";
						break;

					case 'sjaelland':
						$regionCode = "2";
						break;
					case 'syddanmark':
						$regionCode = "3";
						break;
					case 'midtjylland':
						$regionCode = "4";
						break;

					case 'nordjylland':
						$regionCode = "5";
						break;
					
					default:
						# code...
						break;

				}

				if($i == 1){
						$whereClause_regions .= "regionCode = '".$regionCode."'";
				}else{
					$whereClause_regions .= "OR regionCode = '".$regionCode."'"; 			
		
				}
				$i++;
				
			}
			$whereClause_regions .= ")";

			$this->db->where($whereClause_regions);

		}	




		
		if($this->uri->total_segments() > 1 && $this->uri->segment(1) == "category"){

			$this->db->where($this->generate_where_clause());

		}


		if(array_key_exists('urlFilters', $filter) && $filter['urlFilters'] != ""){

			$this->db->where($filter['urlFilters']);
		}
		
		
		if(array_key_exists('limit', $filter)){

			$this->db->limit($filter['limit']);
		}


		if(array_key_exists('nameSlug', $filter)){

			$this->db->where('users.nameSlug', $filter['nameSlug']);

		}	

		if(array_key_exists('query', $filter)){

			$this->db->like('t1.title', $filter['query'])
				 ->or_like(' t1.productName ', $filter['query'])
				 ->or_like('CONCAT(t1.productName, " ", t1.title)', $filter['query'])
				 ->or_like(' t1.description ', $filter['query'])
				 ->or_like(' types.typeName ', $filter['query'])
				 ->or_like(' categories.categoryName ', $filter['query'])
				 ->or_like(' subcategories.subcategoryName ', $filter['query']);

		}


		if(array_key_exists('page', $filter) && array_key_exists('limit', $filter)){
			
			
			$offset = ($filter['page']-1) * $filter['limit'];

			$this->db->limit($filter['limit'], $offset);

		}


		if(array_key_exists('favorites', $filter)){

			$this->db->where('favorites.userId', md5($this->session->userdata('userId')));

		}

		if(array_key_exists('status', $filter))
		{
			$this->db->where('t1.status', $filter['status']);
		}
		else
		{
			$this->db->where('t1.status', 1);
		}


		$result = $this->db->get();

		if(array_key_exists('result', $filter)){

			$result = $result->result();

		}

		return $result;

	}

	public function login_token($email, $password, $remember_me)
	{

		$return = false;
		$flash = $this->custom->flashdata();

		$query = $this->db->get_where('users', array('email' => $email));

		// email has been indentified in database
		if($query->num_rows() == 1)
		{
			// get user details
			$user = $query->row();

			// get password
			$db_password = $user->password;
			
			// decode password
			$db_password_decoded = $this->encrypt->decode($db_password, $this->custom->appOptions('siteName')->value2);

			// validate password match
			if($db_password_decoded == $password || $this->session->userdata('fb_access_token'))
			{

				$profileImage = base_url('assets/img/'.$user->profile_image);
				if($user->fb_id != ""){ $profileImage = $user->profile_image; }

				// collect session data
				$sessiondata = array(
					'loggedIn' => 1,
					'userId' => $user->id,
					'nameSlug' => $user->nameSlug,
					'name' => $user->name,
					'email' => $user->email,
					'profileImage' => $profileImage
				);
				
				// start session
				$this->session->set_userdata($sessiondata);

				// set success response
				$flash['class'] = 'success';
				$flash['title'] = 'Du er nu logget ind';
				$flash['msg'] = "";//"Se dine oplysninger under 'mit ".$this->custom->appOptions('siteName')->value2."'";
				
				// return true
				$return = true;
			}
			else // passwords did not match
			{
				// set error respose
				$flash['title'] = "Password matchede ikke";
				$flash['msg'] = "Den indtastede adgangskode matcher ikke adgangskoden tilknyttet " . $email;
			}
		}
		else // email was not identified in database
		{
			// set error response
			$flash['title'] = "Vi kunne ikke finde email'en i vores system";
			$flash['msg'] = "Du er velkommen til at oprette en konto</a>";
		}

		// set flashdata
		$this->session->set_flashdata('response', $flash);

		return $return;
	}
	
	public function categorySearchResults($query)
	{
		$result = $this->db->select('*, CONCAT(ads.productName, " ", ads.title) AS searchTerm', FALSE)
				 ->from('ads')
				 ->join('types', 'types.typeId = ads.typeId')
				 ->join('categories', 'categories.categoryId = ads.categoryId')
				 ->join('subcategories', 'subcategories.subcategoryId = ads.subcategoryId')
				 ->like(' ads.title ', $query)
				 ->or_like(' ads.productName ', $query)
				 ->or_like('CONCAT(ads.productName, " ", ads.title)', $query)
				 ->or_like(' ads.description ', $query)
				 ->or_like(' types.typeName ', $query)
				 ->or_like(' categories.categoryName ', $query)
				 ->or_like(' subcategories.subcategoryName ', $query)
				 ->group_by('subcategoryName')
				 ->get()
				 ->result();

		return $result;
	}


	public function pagination_init($total_rows, $per_page)
	{
		
		$config['base_url'] = current_url();
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['reuse_query_string'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        return $config;
	}

	public function category_listing()
	{
		$result = false;
		
		switch ($this->uri->total_segments()) {
			
			case '2':
				$result = $this->categories(urldecode($this->uri->segment(2)));
				break;
			case '3':
				$result = $this->subcategories(urldecode($this->uri->segment(3)));
				break;
			case '4':
				$result = $this->subcategories(urldecode($this->uri->segment(3)));
				break;
		
			default:
				$result = $this->types();
				break;
		}
		
		return $result;
	}

	public function types()
	{
		return $this->db->select('typeName as listName, typeSlug as href')->from('types')->get()->result();
	}

	public function categories($typeSlug)
	{
		$this->db->select('categoryName as listName, categorySlug as href')
				 ->from('categories')
				 ->join('types', 'types.typeId = categories.typeId')
				 ->where('types.typeSlug', $typeSlug);
		
		$result = $this->db->get()->result();

		return $result;

	}

	public function subcategories($categorySlug)
	{
		$this->db->select('subcategoryName as listName, subcategorySlug as href')
				 ->from('subcategories')
				 ->join('categories', 'categories.categoryId = subcategories.categoryId')
				 ->where('categories.categorySlug', $categorySlug);

		$result = $this->db->get()->result();

		return $result;
	}

	public function breadcrumbs()
	{
		$urlParamCount = $this->uri->total_segments();

		$href = "";
		for ($i=1; $i < ($urlParamCount+1) ; $i++) { 
			if($i == 1){
				$title = "<i class='fa fa-home'></i>";
				
			} else {
				$title = $this->custom->unslugify(urldecode($this->uri->segment($i)));
			}
			
			$href = $href . $this->uri->segment($i) . "/";
			$breadcrumbs[] = (object)array(
			
				'href' => base_url($href),
				'title' => $title
			
			);
		}
	
		return $breadcrumbs;	
	
	}

	public function pagination()
	{

	}

}

?>