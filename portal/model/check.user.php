<?php

// check if user is student, teacher, or admin

function checkPortalUser($user){

	if($_SESSION['user'] != $user){
		switch($_SESSION['user']){
			case("student"):
				header("location: dashboard.php");
				break;
			case("teacher"):
				header("location: students.php");
				break;
			case("admin"):
				header("location: students.all.php");
				break;
			default:
				echo "Error";
				break;
			exit();
		}
	}
}

function NavigationBar($user){
	switch($user){
		case("student"):
			echo '<div class="dashboard">
					<a class="dashboard" href="dashboard.php">Dashboard</a>
				</div>
				<div class="profile">
					<a class="profile" href="account.php">Account</a>
				</div>';
			break;
		case("teacher"):
			echo '<div class="dashboard">
					<a class="dashboard" href="students.php">Dashboard</a>
				</div>
				<div class="profile">
					<a class="profile" href="account.teacher.php">Account</a>
				</div>';
			break;
		case("admin"):
			echo '<div class="dashboard">
					<a class="dashboard" href="students.all.php">Dashboard</a>
				</div>
				<div class="profile">
					<a class="profile" href="account.admin.php">Account</a>
				</div>
				<div class="settings">
					<a class="profile" href="courses.php">Settings</a>
				</div>';
			break;
		default:
			echo "Error";
			break;
	}
}

function NavigationBarMobile($user){
	switch($user){
		case ('student'):
			echo '<div class="dashboard">
					<a class="dashboard" href="dashboard.php">Dashboard</a>
				</div>
				<div class="profile">
					<a class="profile" href="account.php">Account</a>
				</div>
				<div class="setting">
					<a class="profile" href="settings.mobile.php">Settings</a>
				</div>
				<div class="logout">
					<a class="logout" href="model/logout.inc.php">Log out</a>
				</div>';
			break;
		case ('teacher'):
			echo '<div class="dashboard">
				<a class="dashboard" href="students.php">Dashboard</a>
			</div>
			<div class="profile">
				<a class="profile" href="account.teacher.php">Account</a>
			</div>
			<div class="setting">
				<a class="profile" href="settings.mobile">Settings</a>
			</div>
			<div class="logout">
				<a class="logout" href="model/logout.inc.php">Log out</a>
			</div>';
			break;
		case ('admin'):
			echo '<div class="dashboard">
				<a class="dashboard" href="students.all.php">Dashboard</a>
			</div>
			<div class="profile">
				<a class="profile" href="account.admin.php">Account</a>
			</div>
			<div class="setting">
				<a class="profile" href="settings.mobile.php">Settings</a>
			</div>
			<div class="logout">
				<a class="logout" href="model/logout.inc.php">Log out</a>
			</div>';
			break;
		default:
			echo "error";
			break;
	}
}