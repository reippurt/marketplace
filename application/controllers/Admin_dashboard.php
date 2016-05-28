<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

	/**
	 *
	 */

	public function __construct()
	{

		parent::__construct();
		$this->load->library('custom');
		

		
	}

	public function init()
	{

		$this->output->set_template('admin');

	}

	public function index()
	{
		if($this->input->post('submit-delete-ad'))
		{
			$adId = $this->input->post('adId');

			$this->db->where('adId', $adId)->delete('ads');

			$flash = $this->custom->flashdata();
			$flash['title'] = "Annonce slettet";
			$flash['class'] = "success";
			$flash['extra'] = "Kan ikke fortrydes, tænk over det.";
		}

		if($this->input->post('submit-generate-ads'))
		{
			echo "der er trykket";
			echo "<br>";
			echo "<h1>Der ønskes ".$this->input->post('number')." nye tilfældige annoncer</h1>";

			
			$typesQuery = $this->db->get('types');
			$typesResult = $typesQuery->result();
			$typesCount = $typesQuery->num_rows();
			

			for ($i=1; $i < $this->input->post('number') + 1; $i++) { 
				
				// pick index numnber on types array.
				$typePick= rand(1, $typesCount)-1;

				?>
				<h1 class="mb0 mt0">typeId & typeName: <small><?php echo $typesResult[$typePick]->typeId . " & " . $typesResult[$typePick]->typeName ?></small></h1>
				<?php

				$typeId = $typesResult[$typePick]->typeId;

				$catQuery = $this->db->get_where('categories', array('typeId' => $typeId));
				$catResult = $catQuery->result();
				$catCount = $catQuery->num_rows();

				$categoryId = 0;
				if($catCount == 0){
					//$this->db->where('typeId', $typeId)->delete('types');
					$categoryId = "Intet resultat";
					$categoryName = "Er slettet nu";
				}
				else if($catCount == 1)
				{
					$categoryId = $catQuery->row()->categoryId;
				}
				else
				{
					$categoryIndex = rand(1, $catCount)-1;
					$categoryId = $catResult[$categoryIndex]->categoryId;
					$categoryName = $catResult[$categoryIndex]->categoryName;
				}

				?>
				<h2 class="mb0 mt0">categoryId & categoryName: <small> <?php echo $categoryId. " & " . $categoryName ?></small></h2>
				<?php


				$subQ = $this->db->get_where('subcategories', array('categoryId' => $categoryId));
				$subResult = $subQ->result();
				$subCount = $subQ->num_rows();

				if($subCount == 0)
				{
					$this->db->where('categoryId', $categoryId)->delete('categories');
					$subcategoryId = 0;
					$subcategoryName = "intet resultet";

				}
				else if($subCount == 1)
				{
					$subcategoryId = $subQ->row()->subcategoryId;
					$subcategoryName = $subQ->row()->subcategoryName;
				}
				else
				{
					$subcategoryIndex = rand(1, $subCount) - 1;
					$subcategoryId = $subResult[$subcategoryIndex]->subcategoryId;
					$subcategoryName = $subResult[$subcategoryIndex]->subcategoryName;
				}

				?>
				
				<h4class="mb50 mt0">subecategoryId & subcategoryName <small><?php echo $subcategoryId . " " . $subcategoryName ?></small></h4>
				<br>
				<br>
				<br>
				<br>
				<?php

				$newAd = array(

					'userId' => 37,
					'typeId' => $typeId,
					'categoryId' => $categoryId,
					'subcategoryId' => $subcategoryId,
					'title' => "Random titel",
					'Description' => "Lorem Ipsum Delanar ickball figurus Lorem Ipsum Delanar ickball figurus Lorem Ipsum Delanar ickball figurus Lorem Ipsum Delanar ickball figurus Lorem Ipsum Delanar ickball figurus Lorem Ipsum Delanar ickball figurus Lorem Ipsum Delanar ickball figurus Lorem Ipsum Delanar ickball figurus Lorem Ipsum Delanar ickball figurus Lorem Ipsum Delanar ickball figurus ",
					'price' => 1259

					);
				$this->db->insert('ads', $newAd);
/*
				$randomTypeName = $this->generateRandomString(10);
				$insertNewType = $this->db->insert('categories', array('typeId' => $typeId, 'categoryName' => $randomTypeName));
				$newCategoryId = $this->db->insert_id();

				$newSubcategory = $this->db->insert('subcategories', array('typeId' => $typeId, 'categoryId' => $categoryId, 'subcategoryName' => $this->generateRandomString(8)));
			*/

			}

		}

		$data['types'] = $this->db->get('types')->result();
		$data['categories'] = $this->db->get('categories')->result();
		$data['subcategories'] = $this->db->get('subcategories')->result();

		$data['ads'] = $this->db->select('*')->from('ads')->limit(10)->get()->result();

		$this->init();
		$this->load->view('admin/main', $data);
	}

	public function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
    	return $randomString;
	}

}
