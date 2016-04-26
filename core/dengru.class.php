<?php
/**
 * Dengru CMS
 *  
 * @author Dennis Grundelius
 */

// $dengru = new Dengru();
@include(dirname(dirname(__FILE__)) . '/config.core.php');//configuration

//require_once(DENGRU_CORE_PATH . '/models/User.php');
//require_once(DENGRU_CORE_PATH . '/models/Dashboard.php');
require_once(DENGRU_CORE_PATH . '/models/Page.php');
require_once(DENGRU_CORE_PATH . '/models/Request.php');
//require_once(DENGRU_CORE_PATH . '/models/Action.php');

class Dengru extends PDO {
	
	//public $user;
	//public $dash;
	public $page;
	public $request;
	//public $action;
	
	private $_is_sqlite;
	
	function __construct() {
		//$this->user = new User();
		//$this->dash = new Dashboard();
		$this->page = new Page();
		$this->request = new Request();
		//$this->action = new Action();
	}
	
	public function getDb() {
		$drivers = PDO::getAvailableDrivers();
		try {
			if (strlen(DB_USER) < 1 || strlen(DB_PASS) < 1) {
				if (!in_array('sqlite', $drivers) || strlen(SQLITE_FILE) < 1)
					die('A SQLite database connection could not be established because '. (!in_array('sqlite', $drivers) ? ' the `sqlite` driver':' SQLITE_FILE name') .' is not available!');
				parent::__construct('sqlite:'.SQLITE_FILE, '', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			else {
				if (!in_array('mysql', $drivers) || strlen(DB_HOST) < 1 || strlen(DB_NAME) < 1)
					die('A MySQL database connection could not be established because '. (!in_array('mysql', $drivers) ? 'the mysql PDO driver is not available': 'the database host or database name is empty').'.');
				parent::__construct('mysql:dbname='. DB_NAME .';host='. DB_HOST, DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
		}
		catch (PDOException $e) {				
			die('Connection failed: '. $e->getMessage());
		}
		
		$this->_is_sqlite = $this->getAttribute(PDO::ATTR_DRIVER_NAME) == 'sqlite';
	}
	
	public function initialize() {
		$this->request = new Request();
	}
}
?>