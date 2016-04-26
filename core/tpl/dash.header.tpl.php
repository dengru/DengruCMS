<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $this->_dashPageTitle; ?> :: Dengru</title>
	
	<base href="<?php echo DENGRU_DASH_URL; ?>" />
	<link href="static/css/dengru-all.css" rel="stylesheet">
	<link href="static/css/dengru.css" rel="stylesheet">
</head>
<body>
	<!-- begin masthead -->
	<header class="dashHead">
		<div class="inside group row center">
			<div class="left">
				<nav class="uts-nav">
					<div class="uts-nav-usr-btn">
						<a class="uts-nav-usr-btn-usrname" href="account">
							<h1><?php echo $this->adminName; ?></h1>
						</a>
						<div class="uts-nav-usr-btn-menu">
							<div class="wrapper">
								<ul class="m-usr-options">
									<li>
										<a href="account">View Account Settings</a>
									</li>
									<li>
										<a href="logout">Logout</a>
									</li>
								</ul>
							</div>
						</div>
						
					</div>
					
				</nav>
			</div>
			
			<nav class="left primaryNav">
				<ul class="horizList">
					<li class="home<?php if ($_GET['q'] == 'home') echo ' active'; ?>">
						<a href="home">
							<span></span>
							Home
						</a>
					</li>
					<li class="pages<?php if ($_GET['q'] == 'pages') echo ' active'; ?>">
						<a href="pages">
							<span></span>
							Pages
						</a>
					</li>
					<li class="settings<?php if ($_GET['q'] == 'settings') echo ' active'; ?>">
						<a href="settings">
							<span></span>
							Settings
						</a>
					</li>
					<li class="groups<?php if ($_GET['q'] == 'groups') echo ' active'; ?>">
						<a href="groups">
							<span></span>
							Groups
						</a>
					</li>
					<li class="users<?php if ($_GET['q'] == 'users') echo ' active'; ?>">
						<a href="users">
							<span></span>
							Users
						</a>
					</li>
				</ul>
			</nav>
			
			<a class="new-page-btn" href="page/new">
				New Page
			</a>
			
			<div class="header-right">
				<div class="group">
					<a class="logout-btn right" href="logout">
						Logout
					</a>
				</div>
			</div>			
		</div>		
	</header>