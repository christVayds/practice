<?php

include "../class/user.class.php";

if(isset($_POST['submit'])){
	if($_POST['submit'] == "Add Student"){
		// name
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mname = $_POST['mname'];
		$fullname = $fname . ' ' . $lname;

		// email and password
		$email = $_POST['email'];
		$pass = $_POST['ipass'];

		// more user info
		$schoolID = $_POST['schoolID'];
		$bdate = $_POST['bdate'];
		$course = $_POST['course'];
		$year = $_POST['year'];

		// new student
		$student = new Student($fname, $mname, $lname, $bdate, $email, $pass, $schoolID, $course, $year);
		$account = new Account($student->username, $course, $fullname, $year, '1', 22000);
		$grades = new Grades($student->username, $course, $fullname, $year, 0);

		// check user email
		if($student->save()){
			$account->save();
			$grades->save();
			header("location: ../students.all.php?message=added_successfull");
			exit();
		} else {
			header("location: ../new.student.php?message=email_error");
			exit();
		}
	} else if($_POST['submit'] == "Add Teacher"){
		// name
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mname = $_POST['mname'];

		// email and password
		$email = $_POST['email'];
		$pass = $_POST['ipass'];

		// more user info
		$schoolID = $_POST['schoolID'];
		$bdate = $_POST['bdate'];

		// new student
		$teacher = new Teacher($fname, $mname, $lname, $bdate, $email, $pass, $schoolID);

		// check user email
		if(!$teacher->save()){
			header("location: ../signin.php?message=email_error");
			exit();
		}
	}
}