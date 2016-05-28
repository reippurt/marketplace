<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Custom
{
	
	public function loggedIn()
	{
		$CI =& get_instance();
		$CI->load->library('session');

		if($CI->session->userdata('loggedIn'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function href()
	{
		$href = [
			'opret-annonce',
			'noget-andet'
		];

		return $href;
	}

	public function flashdata()
	{
		$flashdata = array(
			'type' => 0,
			'msg' => '',
			'extra' => ''
		);

		return $flashdata;
	}
}

?>