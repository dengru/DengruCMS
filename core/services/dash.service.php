<?php
/**
 * Manager Service
 * 
 * Validates and handles requests & inputs made by admins
 * 
 * @author 	Dennis Grundelius
 */
@include_once(dirname(dirname(__FILE__)) . '/config.core.php');
//require_once(DENGRU_CORE_PATH . '/models/Manager.php');

class DashService extends Dashboard {
	
	private $_dashPageTitle;
	private $_dashErrorMsg;
	private $_dashErrorTitle;
	
	public function dashHome() {
		echo 'home';
		$this->_dashPageTitle = 'Dashboard';
		/*$this->getData('Page', 0);
		$this->getData('User', 0);
		$this->getData('Group', 0);*/
		$this->getTpl('dash.header');
		$this->getTpl('dash.home');
		$this->getTpl('dash.footer');
	}
	
	public function dashLogin() {
		$this->getTpl('dash.header.login');
		$this->getTpl('dash.login');
		$this->getTpl('dash.footer.login');
	}
	
	public function viewPages() {
		$this->_dashPageTitle = 'Pages';
		$this->getPages();
		$this->getTpl('dash.header');
		$this->getTpl('dash.pages');
		$this->getTpl('dash.footer');
	}
	
	public function viewGroups() {
		$this->_dashPageTitle = 'Groups';
		$this->getTpl('dash.header');
		$this->getTpl('dash.groups');
		$this->getTpl('dash.footer');
	}
	
	public function viewUsers() {
		$this->_dashPageTitle = 'Users';
		$this->getTpl('dash.header');
		$this->getTpl('dash.users');
		$this->getTpl('dash.footer');
	}
	
	public function manageSettings() {
		$this->_dashPageTitle = 'Settings';
		$this->getTpl('dash.header');
		$this->getTpl('dash.settings');
		$this->getTpl('dash.footer');
	}
	
	public function newPage() {
		$this->_dashPageTitle = 'New Page';
		$this->getTpl('dash.header');
		$this->getTpl('dash.new.page');
		$this->getTpl('dash.footer');
	}
	
	public function newGroup() {
		$this->_dashPageTitle = 'New Group';
		$this->getTpl('dash.header');
		$this->getTpl('dash.new.group');
		$this->getTpl('dash.footer');
	}
	
	public function newUser() {
		$this->_dashPageTitle = 'New User';
		$this->getTpl('dash.header');
		$this->getTpl('dash.new.user');
		$this->getTpl('dash.footer');
	}
	
	public function editPage() {
		$this->_dashPageTitle = 'Edit Page';
		$this->getPage();
		$this->getTpl('dash.header');
		$this->getTpl('dash.edit.page');
		$this->getTpl('dash.footer');
	}
	
	public function editGroup() {
		$this->_dashPageTitle = 'Edit Group';
		$this->getTpl('dash.header');
		$this->getTpl('dash.edit.group');
		$this->getTpl('dash.footer');
	}
	
	public function editUser() {
		$this->_dashPageTitle = 'Edit User';
		$this->getTpl('dash.header');
		$this->getTpl('dash.edit.user');
		$this->getTpl('dash.footer');
	}
	
	public function manageAccount() {
		$this->_dashPageTitle = 'Account';
		$this->getTpl('dash.header');
		$this->getTpl('dash.account');
		$this->getTpl('dash.footer');
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
	 * Create Page Object
	 * 
	 * @param unknown_type $values
	 */
	/*public function createPage($values) {
		$pagetitle = $values['pagetitle'];
		$alias = $values['alias'];
		$content = $values['content'];
		$author = $values['author'];
		//$created
		//$modified
		$active = $values['active'];
		$description = $values['description'];
		
		return $this->page->insert(array(
				'pagetitle' => $pagetitle,
				'alias' => $alias,
				'content' => $content,
				'author' => $author,
				'active' => $active,
				'description' => $description
		));
	}*/
	
	/**
	 * Update Page Object
	 * 
	 * (non-PHPdoc)
	 * @see Page::update()
	 */
	/*public function updatePage($values) {
		$pagetitle = $values['pagetitle'];
		$alias = $values['alias'];
		$content = $values['content'];
		$author = $values['author'];
		//$created
		//$modified
		$active = $values['active'];
		$description = $values['description'];
		
		$updates = array();
		
		if ($pagetitle) {
			$updates['pagetitle'] = $pagetitle;
		}
		
		if ($alias) {
			$updates['alias'] = $alias;
		}
		
		if ($content) {
			$updates['content'] = $content;
		}
		
		if ($author) {
			$updates['author'] = $author;
		}
		
		if ($active) {
			$updates['active'] = $active;
		}
		
		if ($description) {
			$updates['description'] = $description;
		}
		
		$this->page->update($this->page->id, $updates);
		
		return true;
	}
	*/
}
?>