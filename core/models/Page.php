<?php
/**
 * Page
 * 
 * @author 	Dennis Grundelius
 */
require_once(DENGRU_CORE_PATH . '/models/User.php');

class Page extends Dengru {
	
	public $id;
	public $pagetitle = null;
	public $pagealias;
	public $content;
	public $author;
	public $created;
	public $modified;
	public $active;
	public $description;
	
	public $pageVars;

	
	public function __construct() {	
		parent::getDb(); //The getDb function is called from the parent class 'Dengru'
	}
	
	/**
	 * Get Page
	 */
	public function getPageContents($pagealias) {
		try {
			$stmt = parent::prepare("SELECT `id`, `pagetitle`, `alias`, `content`, `description` FROM `pages` WHERE `alias` = :pagealias LIMIT 1");
			$stmt->execute(array('pagealias' => $pagealias));
			
			$this->pageVars = $stmt->fetchObject('Page');
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	/**
	 * Is Page Real
	 * 
	 * @param unknown_type $id
	 */
	public function isPageReal($pagealias) {
		$stmt = $this->prepare("SELECT `pagealias` FROM `pages` WHERE `pagealias` = :pagealias LIMIT 1 ");
		$stmt->bindParam(':pagealias', $pagealias);
		$stmt->execute();
		
		return ($stmt->rowCount() > 0);
	}
	
	
	/* Manager functions */
	
	public function update() {
		
	}
	
	public function delete() {
		
	}
	
	public function insert() {
		
	}
	
}
?>