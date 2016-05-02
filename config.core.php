<?php

// Paths
define('DENGRU_CORE_PATH', dirname(__FILE__) . '/core');
define('DENGRU_DASH_PATH', dirname(__FILE__) . '/dashboard');
//define('DENGRU_MANAGER_URL', '/dashboard');
define('DENGRU_TEMPLATE_PATH', DENGRU_CORE_PATH . '/tpl');

// Base constants
define('DENGRU_SITE_PROTOCOL', 'http://');
define('DENGRU_SITE_HOST', 'dengru');
define('DENGRU_SITE_URL', DENGRU_SITE_PROTOCOL . DENGRU_SITE_HOST);

// Dashboard constants
define('DENGRU_DASH_PROTOCOL', 'http://');
define('DENGRU_DASH_HOST', 'dashboard.dengru');
define('DENGRU_DASH_URL', DENGRU_DASH_PROTOCOL . DENGRU_DASH_HOST);

// Database
define('DB_HOST', 'localhost');
define('DB_NAME', 'dbname');
define('DB_USER', 'dbuser');
define('DB_PASS', 'dbpass');

define('SQLITE_FILE', './test.sdb');

// Debugging
define('DEBUG', true);

// Session constants
define('_SESSION_SALT', $_SERVER['HTTP_HOST']);
define('_SESSION_NAME', preg_replace('#[^a-z0-9]#i', '', $_SERVER['HTTP_HOST']));
define('_SESSION_DIR', str_replace('.', '_', $_SERVER['HTTP_HOST']) . '_sessiondata');

?>
