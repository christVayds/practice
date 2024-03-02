<?php

function showCourse($year){
    include 'db.inc.php';

    $subject = "SELECT * FROM course WHERE _year = '$year';";
	$result = mysqli_query($conn, $subject);
    $array_result = [];

    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()){
            $array_result[] = [$row['name'], $row['code'], $row['_year']];
        }
    }

    $_SESSION['arrayCourse'] = $array_result;
    mysqli_close($conn);
}

function showStudentsData_title($subCode){
    include 'db.inc.php';

    $subject = "SELECT * FROM course WHERE code = '$subCode';";
	$result = mysqli_query($conn, $subject);

    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()){
            echo '<div class="header">
                    <div class="title">
                        <p id="courseName">'. $row['code'] . " - " . $row['name'] .'</p>
                    </div>
                    <div class="other">
                        <p>Year: '. $row['_year'] .'</p>
                        <p>Students: 0</p>
                    </div>
                </div>';
        }
    }
    mysqli_close($conn);
}

function showStudentsData_table($subCode){
    include 'db.inc.php';

    $subject = "SELECT * FROM account WHERE course = '$subCode';";
	$result = mysqli_query($conn, $subject);

    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()){
            echo '<tr>
                    <td id="data">'. ucwords($row['fullname']) .'</td>
                    <td id="data">'. strtoupper($row['course']) .'</td>
                    <td id="data">Year '. $row['_year'] .'</td>
                    <td id="data">'. number_format($row['balance']) .'</td>
                    <td id="action"> <p><i class="fa-regular fa-circle-xmark"></i></p></td>
                </tr>';
        }
    }
    mysqli_close($conn);
}