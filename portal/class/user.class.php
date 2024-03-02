<?php

class User{
	public $fname;
	public $mname;
	public $lname;

	public $userID;
	public $username;
	public $bdate;
	public $location;
	public $email;

	public $password;

	// media
	public $_profile;

	protected static function generateUsername($fname, $lname){
		$usrname = $fname[0] . $lname;
		$count = 1;

		while (self::checkUsername($usrname)) {
			$count++;
			$usrname = $fname[0] . $lname . $count;
		}
		return $usrname;
	}

	protected static function checkUsername($username){
		// here to check username if it is already exist in database
		include 'db.inc.php';

		$studentQuery = "SELECT * FROM users WHERE username = '$username';";
		$result = mysqli_query($conn, $studentQuery);

		if(mysqli_num_rows($result) > 0){
			mysqli_close($conn);
			return true;
		} else {
			mysqli_close($conn);
			return false;
		}
	}

	protected static function checkEmail($email){
		include 'db.inc.php';

		$studentQuery = "SELECT * FROM users WHERE email = '$email';";
		$result = mysqli_query($conn, $studentQuery);

		if(mysqli_num_rows($result) > 0){
			mysqli_close($conn);
			return true;
		} else {
			mysqli_close($conn);
			return false;
		}
	}

	protected static function hashPassword($password){
		$hashpwd = password_hash($password, PASSWORD_DEFAULT);
		return $hashpwd;
	}
}

class Student extends User{
	public $course;
	public $year;
	public $user = 'student';

	private $GPA; // store in GPA table
	private $BalanceList; // store in AccountBalance table

	public function __construct($fname, $mname, $lname, $bdate, $email, $password, $userID, $course, $year){
		$this->fname = $fname;
		$this->mname = $mname;
		$this->lname = $lname;
		$this->email = $email;
		$this->username = $this->generateUsername($this->fname, $this->lname);
		$this->bdate = $bdate;
		$this->password = $password;
		$this->userID = $userID;
		$this->course = $course;
		$this->year = $year;
	}

	public function Save(){
		include 'db.inc.php';

		if(parent::checkEmail($this->email) == false){
			$pwdHashed = parent::hashPassword($this->password);
			$newStudent = "INSERT INTO users (fname, mname, lname, username, email, _password, bdate, userID, course, _year, user) VALUES ('$this->fname', '$this->mname', '$this->lname', '$this->username', '$this->email', '$pwdHashed', '$this->bdate', '$this->userID','$this->course', '$this->year', '$this->user')";
			$result = mysqli_query($conn, $newStudent);
			return true;
		}

		mysqli_close($conn);
		return false;
	}
}

class Data{
	public $username;
	public $course;
	public $fullname;
	public $year;
}

class Account extends Data{
	public $sem;
	public $balance;

	public function __construct($username, $course, $fullname, $year, $sem, $balance){
		$this->username = $username;
		$this->course = $course;
		$this->fullname = $fullname;
		$this->year = $year;
		$this->sem = $sem;
		$this->balance = $balance;
	}

	public function save(){
		include 'db.inc.php';

		$sql = "INSERT INTO account (username, fullname, course, _year, sem, balance) VALUES ('$this->username', '$this->fullname', '$this->course', '$this->year', '$this->sem', '$this->balance')";
		mysqli_query($conn, $sql); //here

		mysqli_close($conn);
	}
}

class Grades extends Data{
	public $grade;

	public function __construct($username, $course, $fullname, $year, $grade){
		$this->username = $username;
		$this->course = $course;
		$this->fullname = $fullname;
		$this->year = $year;
		$this->grades = $grade;
	}

	public function save(){
		include 'db.inc.php';
		$subjects = "SELECT * FROM subject WHERE course='$this->course';";
		$result = mysqli_query($conn, $subjects);

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$subcode = $row['code'];
				$name = $row['name'];
				$sql = "INSERT INTO grades (username, fullname, course, year, grade, subcode, subject) VALUES ('$this->username', '$this->fullname', '$this->course', '$this->year', '$this->grade', '$subcode', '$name')";
				$res = mysqli_query($conn, $sql);
			}
		}

		mysqli_close($conn);
	}
}

class Teacher extends User{
	public $userID;
	public $user = "teacher";

	public function __construct($fname, $mname, $lname, $bdate, $email, $password, $userID){
		$this->fname = $fname;
		$this->mname = $mname;
		$this->lname = $lname;
		$this->email = $email;
		$this->bdate = $bdate;
		$this->username = $this->generateUsername($this->fname, $this->lname);
		$this->password = $password;
		$this->userID = $userID;
	}

	public function Save(){
		include 'db.inc.php';

		if(!parent::checkEmail($this->email)){
			$pwdHashed = parent::hashPassword($this->password);
			$newStudent = "INSERT INTO users (fname, mname, lname, username, email, _password, bdate, userID, user) VALUES ('$this->fname', '$this->mname', '$this->lname', '$this->username', '$this->email', '$pwdHashed', '$this->bdate', '$this->userID', '$this->user')";
			$result = mysqli_query($conn, $newStudent);
			mysqli_close($conn);
			return true;
		}

		mysqli_close($conn);
		return false;
	}
}

class Subjects{
	public $name;
	public $code; // primary key
	public $year;

	public function __construct($name, $code, $year){
		$this->name = $name;
		$this->code = $code;
		$this->year = $year;
	}

	public function save(){
		include 'db.inc.php';
		$newSubject = "INSERT INTO subject (name, code, _year) VALUES ('$this->name', '$this->code', '$this->year')";
		$result = mysqli_query($conn, $newSubject);
		
		mysqli_close($conn);
	}
}