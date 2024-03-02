<?php

class Grade{
	public username;
	public subjectName;
	public course;
	public grade;
	public year;

	public function __construct(username, subjectName, course, grade, year){
		$this->username = $username;
		$this->subjectName = $subjectName;
		$this->course = $course;
		$this->grade = $grade;
		$this->year = $year;
	}

	public function insert(){
		include "db.inc.php";

		$gradeQuery = "INSERT INTO grade (?, ?, ?, ?, ?) value (?, ?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $userQuery)){
			header("location: ../login.pract.php?message=sql_error");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "sssdi", $this->username, $this->subjectName, $this->course, $this->grade, $this->year);
			mysqli_stmt_execute($stmt);
			exit()
		}

		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
}