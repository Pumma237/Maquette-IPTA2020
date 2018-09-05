<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>IPTA 2020 - Paris</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/my.css">
	<script src="assets/js/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
				    <!-- Menu mobile -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Navigation mobile</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#">IPTA 2020</a>
				    </div>

				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li><a href="index.php">Home</a></li>
				        <li><a href="call-for-papers.php">Call For Papers</a></li>
				        <li><a href="committee.php">Committees</a></li>
				      </ul>
				      <ul class="nav navbar-nav navbar-right">
				        <li><a href="registration.php">Registration</a></li>
				        <li><a href="special-sessions.php">Special sessions</a></li>
				        <li><a href="publication.php">Publications</a></li>
				        <li><a href="sponsors.php">Sponsors</a></li>
								<?php 
									if(isset($_SESSION['login']) && $_SESSION['login'] == "admin"): ?>
										<li><a href="back_office.php">Back-office</a></li>
										<li><a href="logout.php">Logout</a></li>
								<?php
									elseif (isset($_SESSION['login'])): ?>
										<li><a href="my_account.php">Connected as : <?php echo $_SESSION['login']; ?></a> </li>
										<li><a href="logout.php">Logout</a></li>
								<?php 
									else: ?>
										<li><a href="login.php">Login</a></li>
									<?php endif; 
								?>

				      </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
			</div>		
		</div>
		<div class="row">
			<div class="col-lg-12">
				<img class="home-banniere" src="assets/img/img-banner.png" alt="logo-ipta-2020-paris">
			</div>
		</div>
