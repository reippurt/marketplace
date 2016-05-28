<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complete_registration extends CI_Controller {

	/**
	 *
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('validate_fields');
	}

	public function init()
	{
		$this->output->set_template('main');
	}

	public function index()
	{
		$redirect = false;
		$flash = $this->custom->flashdata();

		$submit_complete_registration = $this->input->post('submit-complete-registration');

		if($submit_complete_registration)
		{

			$fields = array('address', 'postalCode', 'city', 'phone');

			$validation_response = $this->validate_fields->user($fields);
				
			if($validation_response)
			{
				$fields = array(
					'address' => $this->input->post('address'),
					'postalCode' => $this->input->post('postalCode'),
					'city' => $this->input->post('city'),
					'phone' => $this->input->post('phone'),
					'lat' => $this->input->post('lat'),
					'lng' => $this->input->post('lng')
				);
				
				
				$this->db->where('id', $this->session->userdata('userId'))->update('users', $fields);

				if($this->db->affected_rows() == 1)
				{
					$flash['class'] = "success";
					$flash['title'] = "Tillykke med første pålogning";
					$flash['msg'] = "Dine kontaktoplysninger er blevet bekræftet";
					
					$redirect = true;
				}
				else
				{
					// weird things can happen
				}

			}
			else
			{
				$flash['title'] = "Kunne ikke bekræfte kontaktoplysninger";
				$flash['msg'] = "Prøv venligst igen eller kontakt administrator af siden";
			}

			$this->session->set_flashdata('response', $flash);

		} //  <--- if submit_complete_registration

		if($redirect)
		{
			redirect('/');
		}

		$data = "";
		$this->init();
		$this->load->view('complete_registration', $data);
	}
}
