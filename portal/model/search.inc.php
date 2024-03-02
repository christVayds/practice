<?php

include '../class/search.class.php';
session_start();

$keyword = $_GET['course_search'];

if(isset($_GET['search'])){
	if($_GET['search'] == 'Student'){
		$search = new Search($keyword, 'student');
		if($search->arrayOfResult > 0){
			$_SESSION['arrayOfResult'] = $search->arrayOfResult;
			$queryValue = $_SERVER['QUERY_STRING'];
			header("location: ../student.sbca.php?$queryValue");
			exit();	
		} else {
			header("location: ../student.sbca.php?message=notfound");	
			exit();
		}
	} else if($_GET['search'] == 'Teacher'){
		$search = new Search($keyword, 'teacher');
		if($search->arrayOfResult > 0){
			$_SESSION['arrayOfResult'] = $search->arrayOfResult;
			$queryValue = $_SERVER['QUERY_STRING'];
			header("location: ../teacher.sbca.php?$queryValue");
			exit();	
		} else {
			header("location: ../teacher.sbca.php?message=notfound");	
			exit();
		}

	}
}

