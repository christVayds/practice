<?php

include 'db.inc.php';

$username = $_SESSION['username'];
$subjects = "SELECT * FROM account WHERE username='$username';";
$result = mysqli_query($conn, $subjects);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    echo '<p id="amount">PHP '.number_format($row['balance']).'</p>';
}