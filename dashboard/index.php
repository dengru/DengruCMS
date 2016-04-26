<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

@include(dirname(dirname(__FILE__)) . '/config.core.php');

@include_once(DENGRU_CORE_PATH . '/dengru.class.php');
if (!@include_once(DENGRU_CORE_PATH . '/dengru.class.php')) {
	header('HTTP/1.1 503 Service Unavailable');
	echo "<html><title>Error 503: Site temporarily unavailable</title><body><h1>Error 503</h1><p>Site temporarily unavailable</p></body></html>";
	exit();
}

$dengru = new Dengru();

$dengru->dash->initialize();
/**echo $dengru->user->isAdmin();
echo $dengru->user->isLoggedIn();**/
?>