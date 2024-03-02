<?php

function showGrade($username){
	include 'db.inc.php';
	$sql = "SELECT * FROM grades WHERE username='$username'";
	$result = mysqli_query($conn, $sql);
	$arrayOfData = [];

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			array_push($arrayOfData, array(ucwords($row['subject']), ucwords($row['subcode']), ucwords($row['grade'])));
		}
	}

	return $arrayOfData;
}

function computeGrade($username){
	include 'db.inc.php';
	$sql = "SELECT * FROM grades WHERE username='$username'";
	$result = mysqli_query($conn, $sql);
	$grades = [];
	$compute = true;
	$total = 0;

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			if($row['grade'] != 0){
				array_push($grades, $row['grade']);
			} else {
				$compute = false;
			}
		}
	}

	if($compute){
		foreach($grades as $grade){
			$total += $grade;
		}
		$total = $total / count($grades);
		echo '<p id="gpa">' . round($total) . '%</p>';
	} else {
		echo '<p id="gpa">0%</p>';
	}
}