<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 *
	 */
	public function __construct()
	{

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	}
	
	public function fb_callback_path()
	{

	}
	
	public function init()
	{

		$this->output->set_template('main');

	}



	public function index()
	{

		if($this->input->post('submit-create-account')){
			$this->insert->user("login");
		}

		
		/*
			get all details for running facebook canvas login

				appId
				secrect
				autoload.php path
				callback_url
		*/
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
		
		$this->init();
		$this->load->view('login', $data);
	}

	public function facebook_app_credentials()
	{

		$app_id = $this->custom->appOptions('fb_app_id')->value2;
		$app_secret = $this->custom->appOptions('fb_app_secret')->value2;
		$callback_url = $this->custom->appOptions('fb_callback_url')->value2;
		$autoload_path = $this->custom->appOptions('fb_autoload')->value2;

		$facebook_app_credentials = array(
			'app_id' => $app_id,
			'app_secret' => $app_secret,
			'callback_url' => $callback_url, //login/fb_callback",
			'autoload_path' => $autoload_path //"/vendor/autoload.php"
		);

		return $facebook_app_credentials;

	}

	public function fb_callback()
	{
		$app = $this->facebook_app_credentials();

		$path = realpath($_SERVER["DOCUMENT_ROOT"]) . $app['autoload_path'];
		
		require_once $path;

		$fb = new Facebook\Facebook([
		  'app_id' => $app['app_id'], // Replace {app-id} with your app id
		  'app_secret' => $app['app_secret'],
		  'default_graph_version' => 'v2.2',
		  ]);

		$helper = $fb->getRedirectLoginHelper();

		try {
		  $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		if (! isset($accessToken)) {
		  if ($helper->getError()) {
		    header('HTTP/1.0 401 Unauthorized');
		    echo "Error: " . $helper->getError() . "\n";
		    echo "Error Code: " . $helper->getErrorCode() . "\n";
		    echo "Error Reason: " . $helper->getErrorReason() . "\n";
		    echo "Error Description: " . $helper->getErrorDescription() . "\n";
		  } else {
		    header('HTTP/1.0 400 Bad Request');
		    echo 'Bad request';
		  }
		  exit;
		}

		// Logged in
		//echo '<h3>Access Token</h3>';
		//var_dump($accessToken->getValue());

		// The OAuth 2.0 client handler helps us manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();

		// Get the access token metadata from /debug_token
		$tokenMetadata = $oAuth2Client->debugToken($accessToken);
		//echo '<h3>Metadata</h3>';
		//var_dump($tokenMetadata);

		// Validation (these will throw FacebookSDKException's when they fail)
		$tokenMetadata->validateAppId($app['app_id']); // Replace {app-id} with your app id
		// If you know the user ID this access token belongs to, you can validate it here
		//$tokenMetadata->validateUserId('123');
		$tokenMetadata->validateExpiration();

		if (! $accessToken->isLongLived()) {
		  // Exchanges a short-lived access token for a long-lived one
		  try {
		    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		  } catch (Facebook\Exceptions\FacebookSDKException $e) {
		    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
		    exit;
		  }

		  echo '<h3>Long-lived</h3>';
		  var_dump($accessToken->getValue());
		}
		
		$_SESSION['fb_access_token'] = (string) $accessToken;
		

		try {
		  // Returns a `Facebook\FacebookResponse` object
		  $requestProfilePicture = $fb->get('/me/picture?redirect=false&type=large', $_SESSION['fb_access_token']);
		  $response = $fb->get('/me?fields=id,name, email', $_SESSION['fb_access_token']);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		$user = $response->getGraphUser();
		$profilePicture = $requestProfilePicture->getGraphUser();

		$profilePicture = json_decode($profilePicture);

		$profilePicture = $profilePicture->url;

		// start custom code for login procedure

		// variables
		$first_login = false;

		// collect fb data
		$fb_userdata = array(
			'fb_id' => (string)$user['id'],
			'name' => $user['name'],
			'nameSlug' => $this->custom->parseNameSlug($user['name']),
			'email' => $user['email'],
			'profile_image' => $profilePicture
		);

		// check if user already exists in database
		$query_db = $this->db->get_where('users', array('email' => $user['email']));

		// if user exists
		if($query_db->num_rows() != 0)
		{
			
		}
		else 
		// first time user is logging in
		{
		
			$this->db->insert('users', $fb_userdata);

			if($this->db->affected_rows() == 1)
			{
				$first_login = true;
				$this->session->set_userdata('first_login', $first_login);
			}
			else
			{
				echo "Failed inserting userdata";
			}
		
		}

		$user = $this->db->get_where('users', array('email' => $user['email']))->row();

		$login_reposponse = $this->custom->login($user->email, $user->password, false);
		
		if($first_login)
		{
			redirect('complete-registration');
		}
		else if($login_reposponse)
		{
			redirect($this->session->userdata('referer'));
		} 
		else
		{
			redirect('login');
		}
		
		// User is logged in with a long-lived access token.
		// You can redirect them to a members-only page.
		//header('Location: https://example.com/members.php');
	}

	public function logout()
	{
		$this->session->sess_destroy();

		$flash = $this->custom->flashdata();

		$flash['class'] = "success";
		$flash['title'] = "Tak for besøget";
		$flash['msg'] = "På snarligt gensyn";

		$this->session->set_flashdata('response', $flash);
		$this->session->keep_flashdata('response');
		redirect('/');
	}

}
