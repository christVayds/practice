<?php

function showSubject($year){
    include 'db.inc.php';

    $subject = "SELECT * FROM subject WHERE _year = '$year';";
	$result = mysqli_query($conn, $subject);
    $array_result = [];

    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()){
            $array_result[] = [$row['name'], $row['code'], $row['_year']];
        }
    }

    $_SESSION['arraySub'] = $array_result;
    mysqli_close($conn);
}

function showStudentsData_title($subCode){
    include 'db.inc.php';

    $subject = "SELECT * FROM subject WHERE code = '$subCode';";
	$result = mysqli_query($conn, $subject);

    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()){
            $teacher = $row['teacher'];
            $teachername = "SELECT * FROM users WHERE username = '$teacher';";
            $result2 = mysqli_query($conn, $teachername);
            $row2 = $result2->fetch_assoc();

            echo '<div class="header">
                    <div class="title">
                        <p id="courseName">'. $row['code'] . " - " . $row['name'] .'</p>
                    </div>
                    <div class="other">
                        <p>Year: '. $row['_year'] .'</p>
                        <p>Students: 0</p>
                        <p>Teacher: '. ucwords($row2['fname'] . " " . $row2['lname']) .'</p>
                    </div>
                </div>';
        }
    }
    mysqli_close($conn);
}

function showStudentsData_table($subCode){
    include 'db.inc.php';

    $subject = "SELECT * FROM grades WHERE subcode = '$subCode';";
	$result = mysqli_query($conn, $subject);

    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()){
            echo '<tr>
                    <td id="data">'. ucwords($row['fullname']) .'</td>
                    <td id="data">'. strtoupper($row['course']) .'</td>
                    <td id="data">Year '. $row['year'] .'</td>
                    <td id="data">'. $row['grade'] .'</td>
                </tr>';
        }
    }
    mysqli_close($conn);
}

function editStudentsData_table($subCode){
    include 'db.inc.php';

    $subject = "SELECT * FROM grades WHERE subcode = '$subCode';";
	$result = mysqli_query($conn, $subject);

    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()){
            $username = $row['username'];
            echo '<tr>
                    <td id="data">'. ucwords($row['fullname']) .'</td>
                    <td id="data">'. strtoupper($row['course']) .'</td>
                    <td id="data">Year '. $row['year'] .'</td>
                    <td id="data">
						<input type="text" name="'. $username .'" placeholder="Grade" id="grade" value="'.$row['grade'].'">
					</td>
                </tr>';
        }
    }
    mysqli_close($conn);
}