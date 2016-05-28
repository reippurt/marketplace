<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Custom
{

	public function __construct()
	{
	    $this->CI =& get_instance();
	}
	
	public function loggedIn()
	{
		
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

			'class'		=> 'danger',
			'type' 		=> 0,
			'code' 		=> 0,
			'title' 	=> 'Hov, der er sket en fejl.',
			'msg' 		=> 'En uforklaring hændelse er sket, kontakt venligst administrator af' . $this->salt(),
			'extra' 	=> ''
		
		);

		return $flashdata;
	}

	public function salt()
	{
		return "dentaspotter";
	}

	public function login($email, $password, $remember_me)
	{
		
		$this->CI->load->library('session');
		$this->CI->load->model('get');

		$response = $this->CI->get->login_token($email, $password, $remember_me);

		return $response;
	}

	public function user_page_url(){
		return "user";
	}


	public function appOptions($optionName)
	{
		$return = false;

		//$this->CI->load->library('database');

		$query = $this->CI->db->get_where('appOptions', array('optionName' => $optionName));

		if($query->num_rows() == 1)
		{
			$return = $query->row();
		}
		
		return $return;
	}

	public function slugify($text)
	{
		//foreign characters
		// $text = str_replace('æ', 'ae', $text);
		// $text = str_replace('ø', 'oe', $text);
		// $text = str_replace('å', 'aa', $text);

		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text))
		{
		return 'n-a';
		}

		return $text;
	}

	public function unslugify($text)
	{
		//foreign characters
		/*$text = str_replace('ae', 'æ', $text);
		$text = str_replace('oe', 'ø', $text);
		$text = str_replace('aa', 'å', $text);*/

		// replace non letter or digits by -
		//$text = preg_replace('-', ' ', $text);

		// transliterate
		//$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		//$text = preg_replace('~[^-\w]+~', '', $text);

		// remove duplicate -
		$text = preg_replace('~-+~', ' ', $text);

		// Capital letter
		$text = ucfirst($text);

		return $text;
	}

	public function parseNameSlug($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '', $text);

		// trim
		$trim = trim($text, ' ');

		$text = strtolower($text);

		$table = "users"; 
		$column = "nameSlug";

		$name_slug_exists = $this->check_for_duplicate_entry($table, $column, $text);

		if(!$name_slug_exists)
		{	
			for ($i=0; $i < 9999 ; $i++) { 
				
				if($this->check_for_duplicate_entry($table, $column, $text . $i))
				{
					$text = $text . $i;
					break;
				}		
			}
		}


		return $text;
	}

	public function check_for_duplicate_values($table, $params){

		$return = false;

		// query the database with given input
		$query = $this->CI->db->get_where($table, $params);

		// if number of rows returned is 0, the are no duplicate entries
		if($query->num_rows() == 0)
		{
			$return = true;
		}

		return $return;
	}

	public function check_for_duplicate_entry($table, $column, $value)
	{
		$return = false;

		// query the database with given input
		$query = $this->CI->db->get_where($table, array($column => $value));

		// if number of rows returned is 0, the are no duplicate entries
		if($query->num_rows() == 0)
		{
			$return = true;
		}

		return $return;
	}

	public function displayAttribute($type, $title, $jsonValues)
	{

		switch ($type) {
			
			case 'checkbox':
				$this->getCheckboxHtml($title, $jsonValues);
				break;

			case 'select':
				$this->getSelectHtml($title, $jsonValues);
				break;

			case 'text':
				$this->getTextHtml($title, $jsonValues);
				break;
			
			default:
				# code...
				break;
		}


	}

	public function getCheckboxHtml($title, $json)
	{

		$array = json_decode($json);
		
		?>
			<div class="form-group <?php //if(form_error('product')){ echo "has-error"; } ?>">

				<label for="" class="col-sm-4 control-label"><?php echo $title ?> <span class="color-red">*</span></label>
				<div class="col-sm-6">

					<?php foreach ($array as $value) { ?>
						<label class="checkbox-inline"><input type="checkbox" value="<?php echo $value ?>"><?php echo $value ?></label>
					<?php } ?>
				</div>
			</div>
		<?php

	}

	public function getSelectHtml($title, $json)
	{

		$array = json_decode($json);
		
		?>
			<div class="form-group <?php //if(form_error('product')){ echo "has-error"; } ?>">

				<label for="" class="col-sm-4 control-label"><?php echo $title ?> <span class="color-red">*</span></label>
				<div class="col-sm-2">

					<select class="form-control mb0" name="">
						<?php foreach ($array as $value) { ?>
							<option value="<?php echo $value ?>">
								<?php echo $value ?>
							</option>
						<?php } ?>
					</select>
				</div>
			</div>
		<?php

	}


	public function getTextHtml($title, $json)
	{

		if($json){ $array = json_decode($json); };
		
		?>
			<div class="form-group <?php //if(form_error('product')){ echo "has-error"; } ?>">

				<label for="" class="col-sm-4 control-label"><?php echo $title ?> <span class="color-red">*</span></label>
				<div class="col-sm-4">

					<input type="text" class="form-control" value="" placeholder="" name="<?php echo $title ?>">
					
				</div>
			</div>
		<?php

	}


	public function debugging()
	{
		$query = $this->CI->db->get_where('appOptions', array('optionName' => 'debugging'))->row()->value2;
		if($query == "true"){
			return true;
		}
		else
		{
			return false;
		}
	}


	public function facebookLogin()
	{
		$app = $this->facebook_app_credentials();
	
		$path = realpath($_SERVER["DOCUMENT_ROOT"]) . $app['autoload_path'];
		
		require_once $path;
		
		$fb = new Facebook\Facebook([
		  'app_id' =>  $app['app_id'], // Replace {app-id} with your app id
		  'app_secret' => $app['app_secret'],
		  'default_graph_version' => 'v2.2',
		  ]);

		$helper = $fb->getRedirectLoginHelper();

		$permissions = ['email']; // Optional permissions
		$loginUrl = $helper->getLoginUrl(base_url() . $app['callback_url'], $permissions);

		
		// load view
		$data['loginUrl'] = $loginUrl;

		return $data['loginUrl'];
	}


	public function facebook_app_credentials()
	{

		$app_id = $this->appOptions('fb_app_id')->value2;
		$app_secret = $this->appOptions('fb_app_secret')->value2;
		$callback_url = $this->appOptions('fb_callback_url')->value2;
		$autoload_path = $this->appOptions('fb_autoload')->value2;

		$facebook_app_credentials = array(
			'app_id' => $app_id,
			'app_secret' => $app_secret,
			'callback_url' => $callback_url, //login/fb_callback",
			'autoload_path' => $autoload_path //"/vendor/autoload.php"
		);

		return $facebook_app_credentials;

	}

}
?>