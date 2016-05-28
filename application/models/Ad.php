<?php

Class Ad extends CI_Model
{

	public function __construct()
	{

		parent::__construct();
			
		$this->load->library('pagination');
		$this->load->library('googlemaps');
		$this->load->model('get');

	}

	public function get($criteria = false, $filter = false)
	{
		
		
		$this->db
			->select('regionCode, regionPostalCode, users.postalCode, productName, nameSlug, t1.adId as adId, t1.title as adTitle, price, typeName, categoryName, subcategoryName, adFeaturedImage, lat, lng')
			->from('ads as t1')
			->join('types', 't1.typeId = types.typeId')
			->join('categories', 't1.categoryId = categories.categoryId')
			->join('subcategories', 't1.subcategoryId = subcategories.subcategoryId')
			->join('users', 'users.id = t1.userId')
			->join('regions', 'regions.regionPostalCode = users.postalCode')
			->join('favorites', 'favorites.adId = t1.hashAdId', 'left')
			->group_by('t1.adId');

			if(!empty($criteria['sorting']) ){

				foreach ($criteria['sorting'] as $key => $value) {
					
					$this->db->order_by($key, $value);
				
				}
			}

			if(array_key_exists('favorites', $criteria['page'])){

				$this->db->where('favorites.userId', md5($this->session->userdata('userId')));
			}

			if(array_key_exists('status', $criteria['page'])){

				$this->db->where('t1.status', $criteria['page']['status']);
			}

			if(array_key_exists('category', $criteria['page']) && $criteria['page']['category'] != ""){

				$this->db->where($criteria['page']['category']);
			}
			
			if(array_key_exists('user', $criteria['page'])){

				$this->db->where('users.nameSlug', $criteria['page']['user']);	
			}


			if(!empty($criteria['region'])){

				$this->db->where($criteria['region']);
			}

			if($filter)
			{

				if(!empty($criteria['price'])){
					
					$this->db->where($criteria['price']['range']);		
				}
			
			}

			$this->db->where('t1.status', 1);

			if(array_key_exists('query', $criteria['page'])){

				$keyword = $criteria['page']['query'];

				$this->db->like(	'CONCAT(t1.productName, " ", 
										t1.title, " ", 
										t1.description, " ", 
										types.typeName, " ", 
										categories.categoryName, " ", 
										subcategories.subcategoryName)',
									$keyword, 
									'both');
			}

			
			// initial order
			$this->db->order_by('postDate', 'DESC');

			
			//  RUN THE QUERY //
			$query = $this->db->get();
			$unfold_query = $query->result();

			
			if(!$filter){
				$endpoints = $this->get->minMaxValues($unfold_query, 'price');
				$result['endpoints'] = array('min' => $endpoints['min'] - 1, 'max' => $endpoints['max'] + 1  );
			}

			if($filter){

				$result['total_ads'] = $query->num_rows();

				$offset = $criteria['page']['offset'];
				$limit = $criteria['page']['limit'];	
				$sliced_array = array_slice($unfold_query, $offset, $limit, true);
				
				$result['list'] = $sliced_array;
			}

			return $result;

	}



	public function get_available()
	{
	
		$criteria = array(

			'page' => $this->get_page_filter(),
			'price' => $this->get_price_filter(),
			'region' => $this->get_region_filter(),
			'sorting' => $this->get_sorting(),
			
		);


		$criteria['filter'] = $this->get($criteria);

		$ads = $this->get($criteria, 'filter');


		$result['ads'] = $ads;

		$result['pagination'] = $this->get_pagination($ads['total_ads'], $criteria['page']['limit']);

		$result['criteria'] = $criteria;
		
		$result['google_maps'] = $this->get->google_maps_listing($ads['list']);

		return $result;

	}

	public function get_page_filter()
	{
		$filter = array('page' => 1, 'limit' => 6, 'status' => 1);

		if($this->input->get('page')){
			$filter['page'] = $this->input->get('page');
		}

		$page_name = $this->uri->segment(1);

		switch ($page_name) {
			case '' :

				$filter['limit'] = 3;
				break;

			case 'search':

				$filter['query'] = $this->uri->segment(3);
				break;

			case 'category':

				$filter['category'] = $this->get_category_filter();
				$filter['limit'] = 12;
				break;

			case 'user':

				$filter['user'] = $this->uri->segment(2);
				break;
			
			case 'dashboard':

				$filter['favorites'] = true;
				break;
			
			default:
				# code...
				break;
		}
		
		$filter['offset'] = ($filter['page'] - 1) * $filter['limit'];

		return $filter;
	
	}

	public function get_category_filter()
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


	public function get_price_filter()
	{
		$filter = array();

		$price_is_set = $this->input->get('filter');

		if($price_is_set)
		{

			// prepping the url values for sql where statement	
    		$price = explode('-', preg_replace('/\s+/', '', $this->input->get('price')));
    		
    		$filter['lower_price_limit'] = $price[0];
    		$filter['upper_price_limit'] = $price[1];

			$filter['range'] = "t1.price > '".$price[0]."' AND t1.price < '".$price[1]."'";

		}

		return $filter;

	}

	public function get_region_filter()
	{
		$filter = "";

		$regions_is_set = $this->input->get('reg');

		if($regions_is_set){

			$regions = explode(',', $regions_is_set);
		
			$i = 1;
			$regionCode = "";
			$filter = "(";
			foreach ($regions as $value) {
					
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
						$filter .= "regionCode = '".$regionCode."'";
				}else{
					$filter .= " OR regionCode = '".$regionCode."'"; 			
		
				}
				$i++;
				
			}
		
			$filter .= ")";
		
		}
	
		return $filter;
	}

	public function get_sorting()
	{
		$sorting = array();
		$sorting_is_set = $this->input->get('sort');

		$param = explode('-', $sorting_is_set);

		if($sorting_is_set){
			$sorting['price'] = $param[1];
		}
		else
		{
			$sorting = false;
		}

		return $sorting;
	}

	public function get_pagination($total_ads, $ads_per_page)
	{

		$config = $this->pagination_init($total_ads, $ads_per_page);

		$this->pagination->initialize($config); 
		
		return $this->pagination->create_links();

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


}

?>