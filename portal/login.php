<?php
	session_start();
	
	if(isset($_SESSION['email']) || isset($_SESSION['username'])){
		header("location: dashboard.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="resources/styles/signin.css">
	<title>Login</title>
</head>
<body>
	<div class="container">
		<div class="header">
			<div class="logo">
				<img src="resources/assets/SBCA.jpg">
				<p id="school">St. Bernadette College of Alabang</p>
			</div>
			<div class="login">
				<button id="apply">Apply</button>
			</div>
		</div>
		<div class="loginContent">
			<div class="loginCard">
				<div class="header">
					<p class="title">Login</p>
				</div>
				<div class="logo">
					<img src="resources/assets/SBCA.jpg">
				</div>
				<div class="loginForm">
					<form action="model/login.inc.php" method="post" autocomplete="off">
						<div class="inp email">
							<img src="resources/assets/icons/user-solid.svg">
							<input type="text" name="email" placeholder="Email" required>
						</div>
						<div class="inp pas">
							<img src="resources/assets/icons/lock-solid.svg">
							<input type="password" name="pass" placeholder="Password" required>
						</div>
						<div class="inp" id="sub">
							<input type="submit" name="submit" id="submit" value="Login">
						</div>
						<div class="forgotpass">
							<a href="#">Forgot Password?</a>
						</div>
					</form>
				</div>
				<div class="other">
					<p>Humble Thy Spirit.</p>
				</div>
				<div class="social">
					<div class="fb">
						<img src="resources/assets/icons/facebook.svg">
						<p>Facebook</p>
					</div>
					<div class="insta">
						<img src="resources/assets/icons/instagram.svg">
						<p>Instgram</p>
					</div>
					<div class="yt">
						<img src="resources/assets/icons/youtube.svg">
						<p>YouTube</p>
					</div>
				</div>
			</div>
		</div>
		<div class="mission">
			<div class="title">
				<p>Mission</p>
			</div>
			<div class="missionContent">
				<div class="left">
					<p>We are commited to the integral formation of our students in achieving their full potential as empowered members of the society.</p>
				</div>
				<div class="right">
					<img src="resources/assets/image.jpg">
				</div>
			</div>
		</div>
		<div class="mission">
			<div class="title">
				<p>Vision</p>
			</div>
			<div class="missionContent">
				<div class="right">
					<img src="resources/assets/image.jpg">
				</div>
				<div class="left">
					<p>St. Bernadette College of Alabang is an educational institution that transform the society by forming globally competitive individuals , inspired by the motto "Humble thy Spirit".</p>
				</div>
			</div>
		</div>
		
	</div>

	<script type="text/javascript">
		document.getElementById('login').addEventListener('click', () =>{
			window.location.href = 'signin.php';
		});
	</script>
</body>
</html>