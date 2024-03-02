<?php

include '../class/search.class.php';

if(isset($_GET['search_username'])){
    $search = new Search($_GET['search_username'], 'student');
    if($search->arrayOfResult > 0){
        $_SESSION['arrayOfResult'] = $search->arrayOfResult;
        $queryValue = $_SERVER['QUERY_STRING'];
        header("location: {$_SERVER['HTTP_REFERER']}");
        exit();	
    } else {
        header("location: ../student.all.php?message=notfound");	
        exit();
    }
}