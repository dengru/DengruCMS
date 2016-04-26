<?php
/**
 * User Service
 * 
 * Validates and handles requests & inputs made by clients
 * 
 * @author 	Dennis Grundelius
 */
@include_once(dirname(dirname(__FILE__)) . '/config.core.php');
require_once(DENGRU_CORE_PATH . '/models/User.php');

class UserService extends User {
	
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Create User Object
	 * 
	 * @param unknown_type $values
	 */
	public function register($values) {
		$username = $values['username'];
		$email = $values['email'];
		$address = $values['address'];
		$phone = $values['phone'];
		$password = $values['password'];
		
		return $this->insert(array(
				'username' => $username,
				'email' => $email,
				'address' => $address,
				'phone' => $phone,
				'password' => $password
		));
	}
	
	/**
	 * Authenticate User Object
	 * 
	 * (non-PHPdoc)
	 * @see User::login()
	 */
	public function login() {
		//@todo: sanitize variables
		$username = isset($_POST['username']);
		$password = isset($_POST['password']);
		
		User::login($_POST['username'], $_POST['password']);
	}
	
	/**
	 * Destroy User Object
	 * 
	 * (non-PHPdoc)
	 * @see User::logout()
	 */
	public function logout() {
		User::logout();
	}
	
	/**
	 * Get User Object
	 * @param unknown_type $id
	 */
	public function getUser($id) {
		$userinfo = $this->get($id);
		if ($userinfo) {
			return $userinfo;
		}
		
		return false;
	}
	
	/**
	 * Update User Object
	 * 
	 * (non-PHPdoc)
	 * @see User::update()
	 */
	private function _update($values) {
		$username = $values['username'];
		$email = $values['email'];
		$address = $values['address'];
		$phone = $values['phone'];
		$password = $values['password'];
		$newPassword = $values['newpassword'];
		
		$updates = array();
		
		if ($username) {
			$updates['username'] = $username;
		}
		
		if ($email) {
			$updates['email'] = $email;
		}
		
		if ($address) {
			$updates['address'] = $address;
		}
		
		if ($phone) {
			$updates['phone'] = $phone;
		}
		
		$this->update($this->id, $updates);
		
		return true;
	}
}
?>