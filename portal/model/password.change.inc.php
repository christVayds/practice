<?php

include "../class/password.change.class.php";
include "db.inc.php";

$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if(isset($_POST['submit'])){
	session_start();
	$security = new Security($pass1, $pass2);
	if($security){
		$hashpwd = password_hash($pass1, PASSWORD_DEFAULT);
		$username = $_SESSION['username'];
		$sql = "UPDATE users SET _password = '$hashpwd' WHERE username = '$username'";
		$result = mysqli_query($conn, $sql);
		header("location: ../password.change.php?message=successfull");
		msql_close();
		exit();
	}
	header("location: ../password.change.php?message=input_error");
	exit();
}