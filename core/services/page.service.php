<?php
/**
 * Page Service
 * 
 * Validates and handles requests & inputs made by clients
 * 
 * @author 	Dennis Grundelius
 */
/**
 * @todo: excessive "F5 refresh" causes fault and destroys a user session
 */
@include_once(dirname(dirname(__FILE__)) . '/config.core.php');

class PageService extends Page {
	
	private $_pagetitle;
	private $_errorMsg;
	private $_errorTitle;
	
	public function editAccount() {
		$this->_pagetitle = 'Account Settings';
		$this->getTpl('page.header');
		$this->getTpl('page.account.settings');
		$this->getTpl('page.footer');
	}
	
	public function viewAccount() {
		$this->_pagetitle = 'Account';
		$this->getTpl('page.header');
		$this->getTpl('page.account');
		$this->getTpl('page.footer');
	}
	
	public function login() {
		$this->_pagetitle = 'Login';
		$this->getTpl('page.header');
		$this->getTpl('page.login');
		$this->getTpl('page.footer');
	}
	
	public function register() {
		$this->_pagetitle = 'Register';
		$this->getTpl('page.header');
		$this->getTpl('page.register');
		$this->getTpl('page.footer');
	}
	
	public function errorNotFound() {
		$this->_pagetitle = 'Oops.. Page Not Found';
		$this->_errorTitle = 'Oops!';
		$this->_errorMsg = "It seems like you may have taken a wrong turn.\nDon't worry... it happens to the best of us.";
		$this->getTpl('page.header');
		$this->getTpl('page.error');
		$this->getTpl('page.footer');
	}
	
	public function errorForbidden() {
		$this->_pagetitle = 'Oops.. Access Denied';
		$this->_errorTitle = 'Oops!';
		$this->_errorMsg = "It seems like you're not the right man for the job.\nAre you trying to access something you're not allowed to maybe?";
		$this->getTpl('page.header');
		$this->getTpl('page.error');
		$this->getTpl('page.footer');
	}
	
	
	/**
	 * Get Template File
	 * 
	 * @param unknown_type $tplfile
	 */	
	public function getTpl($tplfile) {
		@include(DENGRU_TEMPLATE_PATH . '/' . $tplfile . '.tpl.php');
	}
	
	/**
	 * Get Page Object
	 * 
	 * @param unknown_type $id
	 */
	public function getPage($pagealias) {
		//validation here
		parent::getPageContents($pagealias); //get the page objects
		$this->_pagetitle = $this->pageVars->pagetitle;
		$this->getTpl('page.header');
		$this->getTpl('page');
		$this->getTpl('page.footer');
	}
}
?>