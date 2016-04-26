<?php
/**
 * User
 * 
 * @author dennis
 */
class User extends Dengru {
	
	// Public variables
	public $id;
	public $username;
	public $email;
	public $gid;
	public $address;
	public $phone;
	
	// Protected variables
	protected $password;
	
	// Private variables
	private $_secure_word = 'SECUREDSALT_';
	private $_use_user_agent = true;
	private $_ip_block_length = 4;
	private $_algorithm;
	private $_cookie_name = 'deNgrU_u5eRLog1n';
	private $_cookie_expiration_days = 5;
	
	public function __construct() {
		$this->id = isset($_SESSION['uid']);
		$this->username = isset($_SESSION['username']);
		
		$this->_session_setup();
		parent::getDb(); //The getDb function is called from the parent class 'Dengru'
	}
	
	
	/**
	 * Encrypt Password
	 * 
	 * @param unknown_type $password
	 * @return multitype:string
	 */
	protected function encrypt_password($password) {
		/* Two different password encryption patterns */
		$pattern1 = str_shuffle("!@#$%^&*()_+=-';:,<.>126AaBbJjKkLlSdDsQwWeErqRtTyY");
		$pattern2 = str_shuffle("1234567890`~ZxzxCcVvBb?[]{}pP");
		$salt1 = '';
		$salt2 = '';

		/* Loop through the password encryption patterns and randomly generate a password salt */
		for ($i = 0; $i < 12; $i++) {
			$salt1 .= $pattern1[rand() % strlen($pattern1)-.04];
		}
		for ($i = 0; $i < 10; $i++) {
			$salt2 .= $pattern2[rand() % strlen($pattern2)-.07];
		}

		$part[1] = "{salt1}";
		$part[2] = "{salt2}";
		$part[3] = "{pass}";
		$psort = array_rand($part,3);
		$pattern = $part[$psort[0]].".".$part[$psort[1]].".".$part[$psort[2]];
		
		/* Lets generate the password.. yes, finally! */
		$grep = array("/{salt1}/", "/{salt2}/", "/{pass}/"); //Identify the pattern
		$repl = array($salt1, $salt2, $password); //Transform the pattern into the real thing
		
		/* Replace the pattern with some actual values */
		$repl_pattern = preg_replace($grep, $repl, $pattern);
		
		return array(
				'salt1' => $salt1,
				'salt2' => $salt2,
				'password' => sha1($repl_pattern),
				'pattern' => $pattern
		);
	}
	
	/**
	 * Validate Password
	 * 
	 * @param unknown_type $pass
	 * @param unknown_type $encrypt
	 * @return boolean
	 */
	protected function validate_password($pass, $encrypt) {
		$grep = array("/{salt1}/", "/{salt2}/", "/{pass}/"); //Identify the pattern
		$repl = array($encrypt['salt1'], $encrypt['salt2'], $pass); //Make the pattern real
		$password = preg_replace($grep, $repl, $encrypt['pattern']);
		
		if (sha1($password) != $encrypt['password']) {
			return false;
		}
		
		return true;
	}
	
	/**
	 * Login
	 * 
	 * @param unknown_type $username
	 * @param unknown_type $password
	 */
	public function login($username, $password) {
		if ($this->validate_uniquekey())
			return true;
				
		$stmt = $this->prepare("SELECT id, username, password, pattern, salt1, ". "salt2 FROM users WHERE username = :username");
		$stmt->bindParam(':username', $username, PDO::PARAM_STR, 75);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if (!$result) {
			//if (DEBUG) trigger_error('User `'. $username .'` does not exist!', E_USER_WARNING);
			echo 'Login failed!';
			$this->_destroy();
			
			return false;
		}
		
		//The password didnt match!?
		if (!$this->validate_password(trim($password), $result)) {
			if (DEBUG) trigger_error('Password for user `'. $username .'` did not validate!', E_USER_WARNING);
			$this->_destroy();
			
			return false;
		}
		
		return $this->set_session($result); //If the user was logged in, add the user data to the $_SESSION array
	}
	
	/**
	 * Logout
	 */
	public function logout() {
		$this->_destroy();
	}
	
	/**
	 * IsLoggedIn (Checks for a valid session)
	 */
	public function isLoggedIn() {
		if (!isset($_SESSION['logged_in'], $_SESSION['_UniqueKey']) || $_SESSION['logged_in'] === false)
			return false;
		
		if ($this->validate_uniqueKey())
			return true;
		else
			return false;
	}
	
	/**
	 * Set Session
	 * 
	 * @param unknown_type $values
	 */
	protected function set_session($values) {
		$this->_set_session_uniquekey();
		$_SESSION['uid'] = $values['id'];
		$_SESSION['username'] = htmlspecialchars($values['username']);
		$_SESSION['logged_in'] = true;
		
		if (!session_id() && DEBUG) trigger_error('There is no session id!', E_USER_WARNING);
		
		return true;
	}
	
	/**
	 * Session Setup
	 */
	private function _session_setup() {
		if (!isset($_SESSION)) {
			$dir_path = ini_get("session.save_path") . DIRECTORY_SEPARATOR . _SESSION_DIR;
			
			if (!is_dir($dir_path)) mkdir($dir_path);
			
			if (ini_get('session.use_trans_sid') == true) {
				ini_set('url_rewriter.tags' , '');
				ini_set('session.use_trans_sid' , false);
			}
			
			$lifetime = 60*60*24*$this->_cookie_expiration_days;
			ini_set('session.gc_maxlifetime' , $lifetime);
			ini_set('session.gc_divisor', '1');
			ini_set('session.gc_probability', '1');
			ini_set('session.cookie_lifetime', '0');
			ini_set('session.save_path', $dir_path);
			
			session_name(_SESSION_NAME);
			session_start();//begins the session
		}
			$this->_algorithm = function_exists('hash') && in_array('sha256', hash_algos()) ? 'sha256' : null;
	}
	
	/**
	 * Make Uniquekey
	 */
	private function _make_uniquekey() {
		$uniquekey = $this->_secure_word;
		if ($this->_use_user_agent) {
			$uniquekey .= $_SERVER['HTTP_USER_AGENT'];
		}
		
		$uniquekey .= implode('.', array_slice(explode('.', $_SERVER['REMOTE_ADDR']), 0, $this->_ip_block_length));
		if ($this->_algorithm === null)
			return function_exists('sha1') ? sha1($uniquekey) : md5($uniquekey);
		
		return hash($this->_algorithm, $uniquekey);
	}
	
	/**
	 * Regenerate Session ID
	 */
	private function _regenerate_session_id() {
		session_regenerate_id(true);
	}
	
	/**
	 * Set Session Uniquekey
	 */
	private function _set_session_uniquekey() {
		$this->_regenerate_session_id();
		$_SESSION['_UniqueKey'] = $this->_make_uniquekey();
	}
	
	/**
	 * Validate Uniquekey
	 */
	protected function validate_uniquekey() {
		$this->_regenerate_session_id();
		if (isset($_SESSION['_UniqueKey']))
			return $_SESSION['_UniqueKey'] === $this->_make_uniquekey();
		
		if (DEBUG) echo '_UniqueKey is not set!'; //Tell the user that the uniquekey isn't initiated
		
		return false;
	}
	
	/**
	 * Destroy
	 */
	private function _destroy() {
		if (isset($_SESSION)) $_SESSION = array();
		if (isset($_COOKIE[session_name()])) setcookie(session_name(), '', time() - 40000);
		@session_destroy();
		
		return;
	}
	
	/**
	 * Username Taken
	 * 
	 * @param unknown_type $username
	 * @return boolean
	 */
	public function usernameTaken($username) {
		$stmt = $this->prepare("SELECT `id` FROM `users` WHERE `username` = ':username' LIMIT 1 ");
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		
		return ($stmt->rowCount() > 0);
	}

	
	/**
	 * Create
	 */
	public function create($username, $password) {
		$username = trim($username); //remove any whitespace
		if (strlen($username) < 1 || strlen($password) < 1)
			return false;
		
		try {
			$stmt = parent::prepare("SELECT username FROM users WHERE username = :username");
			$stmt->bindParam(':username', $username);
			$stmt->execute();
			
			if (!$stmt->rowCount() > 0) {//if user does not exist
			
				extract($this->encrypt_password($password));
				
				$stmt = parent::prepare("INSERT INTO users(username, password, pattern, salt1, salt2) VALUES ". "(:username, :password, :pattern, :salt1, :salt2)");
				$stmt->bindParam(':username', $username, PDO::PARAM_STR, 75);
				$stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
				$stmt->bindParam(':pattern', $pattern, PDO::PARAM_STR, 22);
				$stmt->bindParam(':salt1', $salt1, PDO::PARAM_STR, 12);
				$stmt->bindParam(':salt2', $salt2, PDO::PARAM_STR, 10);
						
				$result = $stmt->execute();
				
				return $result;
			}
			else {
				echo 'That username is already taken!';
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	/**
	 * isAdmin
	 */
	public function isAdmin() {
		$stmt = $this->prepare("SELECT `gid` FROM `users` WHERE `id` = :id");
		$stmt->execute(array(
				'id' => $_SESSION['uid']
		));
		$res = $stmt->fetchObject('User');
		
		if ($res->gid == '1') {
			return true;
		}
		else {
			return false;
		}
		
		return false;
	}
	
	/**
	 * Get
	 */
	public function get($id) {
		$stmt = $this->prepare("SELECT * FROM `users` WHERE `id` = :id LIMIT 1 ");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if ($stmt->rowCount() > 0) {
			return $stmt->fetch();
		}
		
		return false;
	}
	
	/*public function update() {
		$stmt = $this->prepare("UPDATE `users` SET  WHERE `id` = :id");
		$stmt->execute(array(
				'id' => $_SESSION['uid']
		));
	}*/
	
	/**
	 * Update
	 * 
	 * @param unknown_type $id
	 * @param array $values
	 */
	public function update($id, array $values) {
		$sql = "UPDATE users SET ";
		$fields = array_keys($values);
		$vals = array_values($values);
		
		foreach ($fields as $i => $f) {
			$fields[$i] .= ' = ? ';
		}
		
		$sql .= implode(',', $fields);
		$sql .= " WHERE id = " . (int)$id ." LIMIT 1 ";
		
		$stmt = $this->prepare($sql);
		foreach ($vals as $i => $v) {
			$stmt->bindValue($i+1, $v);
		}
		
		$stmt->execute();
	}
	
	/**
	 * Insert
	 * 
	 * @param array $values
	 */
	public function insert(array $values) {
		$sql = "INSERT INTO users ";
		$fields = array_keys($values);
		$vals = array_values($values);
		
		$sql .= '('.implode(',', $fields).') ';
		
		$arr = array();
		foreach ($fields as $f) {
			$arr[] = '?';
		}
		$sql .= 'VALUES ('.implode(',', $arr).') ';
		
		$stmt = $this->prepare($sql);
		
		foreach ($vals as $i => $v) {
			$stmt->bindValue($i + 1, $v);
		}
		
		return $stmt->execute();
	}
}
?>