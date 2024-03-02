<?php
	
	if(session_start() === PHP_SESSION_NONE){
		session_start();
	}

	include_once 'model/login_check.inc.php';
	include 'model/check.user.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="resources/styles/main.css">
	<script src="https://kit.fontawesome.com/9515269a08.js" crossorigin="anonymous"></script>
	<title>SBCA portal</title>
</head>
<body>
	<div class="container">
		<div class="navbar">
			<div class="logo">
				<img src="resources/assets/SBCA.jpg">
				<p class="title">St. Bernadette College of Alabang</p>
			</div>
			<div class="nav">
				<?php
					NavigationBar($_SESSION['user']);
				?>
			</div>
			<div class="option">
				<button id="option" id="btn">
					<img src="resources/assets/icons/bars-solid.svg">
				</button>
			</div>
		</div>
		<div class="hidden" id="nav">
			<?php
				NavigationBarMobile($_SESSION['user']);
			?>
		</div>
	</div>
	<script type="text/javascript" src="resources/javascript/main.js"></script>