<?php
/**
 * Dashboard
 * 
 * @author Dennis Grundelius
 */
require_once(DENGRU_CORE_PATH . '/models/User.php');
//require_once(DENGRU_CORE_PATH . '/models/Page.php');

class Dashboard extends Dengru {
	
	public $adminName = null;
	public $errMsg;
	//public $user;
	//public $page;
	//public $pagetitle;
	
	//private $_action;
	
	function __construct() {
		parent::getDb(); //The getDb function is called from the parent class 'Dengru'
		//$this->user = new User();
		//$this->page = new Page();
		$this->adminName = isset($_SESSION['username']);
	}
	
	public function getPage() {
		try {
			$stmt = $this->prepare("SELECT `id`, `pagetitle`, `pagealias`, `content`, `createdby`, `createdon`, `editedby`, `editedon`, `published`, `groups`, `description` FROM `pages` WHERE `id` = :id LIMIT 1");
			$stmt->execute(array(
					'id' => isset($_GET['id'])
			));
			$this->res = $stmt->fetchColumn(0);
			if ($this->res == $_GET['id']) {
				$this->pVars = $stmt->fetchAll();
			}
			if ($this->res != $_GET['id'] && $_GET['id'] >= 1) {
				$this->errMsg = 'Oops.. The page with the specified id does not seem exist. Edit some other page.. that you know exist.';
			}
			else if ($_GET['id'] != $_GET['id'] || $_GET['id'] <= 0) {
				$this->errMsg = 'Whoa!! What exactly are you trying to do here? I thought you were clever enough to realise page id\'s canno\'t contain a zero or negative value.';
			}
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public function getPages() {
		try {
			$stmt = $this->prepare("SELECT * FROM pages");
			$stmt->execute();
			$this->result = $stmt->fetchAll();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
		
	public function getUser($id) {
		try {
			$stmt = parent::prepare("SELECT `*` FROM `users` WHERE `id` = :id LIMIT 1");
			$stmt->execute(array(
					'id' => $id
			));
			$this->res = $stmt->fetchObject('User');
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public function getUsers() {
		try {
			$stmt = parent::prepare("SELECT `*` FROM `users` ORDER BY `id` DESC");
			$this->res = $stmt->fetchObject('User');
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public function getGroup($id) {
		try {
			$stmt = parent::prepare("SELECT `*` FROM `groups` WHERE `id` = :id LIMIT 1");
			$stmt->execute(array(
					'id' => $id
			));
			$this->res = $stmt->fetchObject('Group');
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public function getGroups() {
		try {
			$stmt = parent::prepare("SELECT `*` FROM `groups` ORDER BY `id` DESC");
			$this->res = $stmt->fetchObject('Group');
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
?>