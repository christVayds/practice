<?php

$email = $_POST['email'];
$pass = $_POST['pass'];

function login($email, $pass){
	include 'db.inc.php';

	$userQuery = "SELECT * FROM users WHERE email=? or username=?;";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $userQuery)){
		header("location: ../login.php?message=sql_error");
		exit();
	} else {
		mysqli_stmt_bind_param($stmt, "ss", $email, $email);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($result)) {
			$pwdCheck = password_verify($pass, $row['_password']);
			if($pwdCheck == false){
				header("location: ../login.php?message=wrong_password");
				exit();
			} else if($pwdCheck == true) {
				session_start();
				$_SESSION['username'] = $row['username'];
				$_SESSION['email'] = $row['email'];
				$_SESSION["fullname"] = ucwords($row['fname']) . " " . ucwords($row['lname']);
				$_SESSION['course'] = $row['course'];
				$_SESSION['year'] =  $row['_year'];
				$_SESSION['user'] = $row['user']; // add this to database
				$_SESSION['schoolID'] = $row['userID'];
				$_SESSION['gender'] = $row['gender'];
				$_SESSION['bdate'] = $row['bdate'];
				if($_SESSION['user'] == 'student'){
					header("location: ../dashboard.php?username=".$_SESSION['username']);
				} else if ($_SESSION['user'] == 'teacher'){
					header("location: ../students.php?username=".$_SESSION['username']);
				} else if ($_SESSION['user'] == 'admin'){
					header("location: ../students.all.php?username=".$_SESSION['username']);
				} else {
					header("location: ../login.php?message=error_page_navigation");
				}
				exit();
			} else {
				header("location: ../login.php?message=wrong_password");
				exit();
			}
		} else {
			header("location: ../login.php?message=user_not_found");
			exit();
		}
	}
}

if(isset($_POST['submit'])){
	login($email, $pass);
	exit();
} else {
	header("location: ../login.php");
	exit();
}