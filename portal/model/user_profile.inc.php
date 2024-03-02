<?php

include 'db.inc.php';
session_start();

if(isset($_POST['submit']) || isset($_FILES['image']) && $_FILES['image']['error'] == 0){
    $name = $_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $data = base64_encode(file_get_contents($_FILES['image']['tmp_name'])); // encode to base64

    $username = $_SESSION['username'];
    $sql = "UPDATE users SET profilePicture = '$data' WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);
	header("location: ../dashboard.php?message=uploaded_successfull");
	msql_close();
	exit();
}