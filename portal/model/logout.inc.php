<?php

// for logout

function logout(){
	session_start();
	session_unset();
	session_destroy();
	header("location: ../login.php");
	exit();
}

logout();