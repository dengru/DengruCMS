<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<title><?php echo $this->pagetitle; ?></title>
	<base href="<?php echo $dengru->settings->site_url . DENGRU_MANAGER_URL;?>" />
	
	<link href="/assets/static/css/manager.css" rel="stylesheet">
</head>
<body>

	<div class="header-container">
		<header class="wrapper clearfix">
			<h1 class="title">Hi, <?php echo $dengru->user->username; ?></h1>
			
			<nav>
				<ul>
					<li><a href="site_url">View Site</a></li>
					<li><a href="?a=edit-account">Account</a></li>
					<li><a href="?a=logout">Logout</a></li>
				</ul>
			</nav>
			
		</header>
	</div>
	
	<div class="main-container">
		<div class="main wrapper clearfix">
			<div class="left-container">
				<ul id="manager-nav">
					<li><a href="?a=pages">Pages</a></li>
					<li><a href="?a=users">Users</a></li>
					<li><a href="?a=groups">Groups</a></li>
					<li><a href="?a=settings">Settings</a></li>
					<li><a href="?a=banlist">Banlist</a></li>
				</ul>
			</div>