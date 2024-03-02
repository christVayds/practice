<?php

include 'db.inc.php';
$subcode = $_GET['subject'];

$subject = "SELECT * FROM grades WHERE subcode = '$subcode';";
$result = mysqli_query($conn, $subject);

if(mysqli_num_rows($result) > 0){
    while($row = $result->fetch_assoc()){
        $username = $row['username'];
        $grade = $_POST[$username];
        $sql = "UPDATE grades SET grade = '$grade' WHERE username = '$username' AND subcode = '$subcode'";
		$yey = mysqli_query($conn, $sql);
        header("location: {$_SERVER['HTTP_REFERER']}");
    }
} else {
    echo 'none';
    echo 'subcode: '. $subcode;
}