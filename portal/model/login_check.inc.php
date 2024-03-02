<?php

if(!isset($_SESSION['email'])){
	header("location: ../portal/login.php?message=loginfirst");
	exit();
}