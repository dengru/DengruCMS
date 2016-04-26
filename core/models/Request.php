<?php
/**
 * Request
 * 
 * @desc: Handles user requests (form submissions, logins, logouts etc)
 * @author Dennis Grundelius
 */

@include_once(dirname(dirname(__FILE__)) . '/config.core.php');
//require_once(DENGRU_CORE_PATH . '/services/user.service.php');
//require_once(DENGRU_CORE_PATH . '/services/dash.service.php');
require_once(DENGRU_CORE_PATH . '/services/page.service.php');

class Request {
	
	//public $userService;
	//public $dashService;
	public $pageService;
	
	public $queryString;
	public $argString;
	public $idString;
	
	public $hostString = 'HTTP_HOST';
	
	public function __construct() {
		
		//$this->userService = new UserService();
		//$this->dashService = new DashService();
		$this->pageService = new PageService();
		
		$this->queryString = 'q';
		$this->argString = 'a';
		$this->idString = 'id';
		
		// Dashboard or site requests?
		/*if ($_SERVER[$this->hostString] == DENGRU_DASH_HOST) {
			if (isset($_POST['login'])) {
				$this->userService->login($_POST);
			}
			if ($this->userService->isAdmin()) {
				$this->parseDashRequest();
			}
			else if (!$this->userService->isAdmin()) {
				$this->dashService->dashLogin();
				//header('location: ' . DENGRU_DASH_URL . '/login/');
				//$this->pageService->errorForbidden();
			}
		}*/
		if ($_SERVER[$this->hostString] == DENGRU_SITE_HOST) {
			$this->parseSiteRequest();
		}
	}
	
	/**
	 * Parse Site Requests
	 */
	public function parseSiteRequest() {
		if (isset($_GET['q']) && (!isset($_GET['id']))) {
		
			if ($this->pageService->isPageReal((string)($_GET['q']))) {
				$this->pageService->getPage((string)($_GET['q']));
			}
			else {
				$this->pageService->errorNotFound(); //call this if the requested page was not found
			}
				
		}
	}
	
	/**
	 * Parse Dashboard Requests
	 */
	public function parseDashRequest() {
		
		/* Page requests by "?q=x" */
		if ($this->userService->isAdmin()) {
			if (!isset($_GET[$this->queryString]) || empty($_GET[$this->queryString])) {
				header('location: ' . DENGRU_DASH_URL . '/home');
			}
			if (isset($_GET[$this->queryString]) && !isset($_GET[$this->argString])) {
				switch ($_GET[$this->queryString]) {
					case 'home':
						$this->dashService->dashHome();
					break;
					
					case 'pages':
						$this->dashService->viewPages();
					break;
						
					case 'users':
						$this->dashService->viewUsers();
					break;
						
					case 'groups':
						$this->dashService->viewGroups();
					break;
						
					case 'settings':
						$this->dashService->manageSettings();
						if (isset($_POST['update-settings'])) {
							$this->dashService->updateSettings($_POST);
						}						
					break;
						
					case 'account':
						$this->dashService->manageAccount();
						if (isset($_POST['update-account'])) {
							$this->dashService->updateAccount($_POST);
						}
					break;
					
					case 'logout':
						//$this->userService->logout();
						echo 'logout?';
					break;
						
					default:
						$this->dashService->dashHome();
					break;
				}
			}
			
			if (isset($_GET[$this->queryString]) && isset($_GET[$this->argString])) {
				switch ($_GET[$this->queryString]) {
					case 'page':
						switch ($_GET[$this->argString]) {
							case 'new':
								$this->dashService->newPage();
								if (isset($_POST['create-page'])) {
									$this->dashService->createPage($_POST);
								}
							break;
						}
					break;
					
					case 'user':
						switch ($_GET[$this->argString]) {
							case 'new':
								$this->dashService->newUser();
								if (isset($_POST['create-user'])) {
									$this->dashService->createUser($_POST);
								}
							break;
						}
					break;
					
					case 'group':
						switch ($_GET[$this->argString]) {
							case 'new':
								$this->dashService->newGroup();
								if (isset($_POST['create-group'])) {
									$this->dashService->createGroup($_POST);
								}
							break;
						}
					break;
					
					default:
						$this->dashService->dashHome();
					break;
				}
				
				if (isset($_GET[$this->queryString]) && isset($_GET[$this->argString]) && isset($_GET[$this->idString])) {					
					switch ($_GET[$this->queryString]) {
						case 'page':
							switch ($_GET[$this->argString]) {
								case 'edit':
									$this->dashService->editPage();
									echo $_GET[$this->idString];
									if (isset($_POST['update-page'])) {
										$this->dashService->updatePage($_POST);
									}
								break;
								
								case 'delete':
									echo $_GET[$this->idString];
								break;
							}
						break;
							
						case 'user':
							switch ($_GET[$this->argString]) {
								case 'edit':
									$this->dashService->editUser();
									echo $_GET[$this->idString];
									if (isset($_POST['update-user'])) {
										$this->dashService->updateUser($_POST);
									}
								break;
								
								case 'delete':
									echo $_GET[$this->idString];
								break;
							}
						break;
							
						case 'group':
							switch ($_GET[$this->argString]) {
								case 'edit':
									$this->dashService->editGroup();
									echo $_GET[$this->idString];
									if (isset($_POST['update-group'])) {
										$this->dashService->updateGroup($_POST);
									}
								break;
								
								case 'delete':
									echo $_GET[$this->idString];
								break;
							}
						break;
							
						default:
							$this->dashService->dashHome();
						break;
					}
				}
			}

			/*else if (!$this->userService->isAdmin()) {
				header('location: ' . DENGRU_DASH_URL . '/login/');
			}*/
		}
	}
}
?>