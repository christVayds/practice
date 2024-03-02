<?php

include '../class/user.class.php';

$name = $_GET['name'];
$code = $_GET['code'];
$year = $_GET['year'];

if(isset($_GET['submit'])){
    $subject = new Subjects($name, $code, $year);
    $subject->save();
    header("location: {$_SERVER['HTTP_REFERER']}");
    exit();
}