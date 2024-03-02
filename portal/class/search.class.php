<?php

class Search{
	public $arrayOfResult = [];
	public $keyword;

	// types: student, teacher, course
	public function __construct($keyword, $type){
		include 'db.inc.php';
		$this->keyword = $keyword;

		$studentQuery = "SELECT * FROM users WHERE email = '$keyword' OR username = '$keyword' OR CONCAT(fname, ' ', lname) = '$keyword' OR course LIKE '%$keyword%';";
		$result = mysqli_query($conn, $studentQuery);

		if(mysqli_num_rows($result) > 0){
			while($row = $result->fetch_assoc()){
				$fullname = ucwords($row['fname'] . ' ' . $row['lname']);
				switch ($type) {
					case 'student':
						if($row['user'] == $type){
							$this->arrayOfResult[] = [$fullname, $row['course'], $row['username'], $row['email'], substr($row['bdate'], 0, 10)];
						}
						break;
					case 'teacher':
						if($row['user'] == $type){
							$this->arrayOfResult[] = [$fullname, 'SBCA Professor', $row['username'], $row['email'], substr($row['bdate'], 0, 10)];
						}
						break;
					default:
						echo 'error';
						break;
				}
			}
			return true;
		}
		return false;
		mysql_close($conn);
	}
}