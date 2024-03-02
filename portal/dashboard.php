<?php
	include "base.php";
	include "model/dashboard.inc.php";
	include_once "model/check.user.php";

	checkPortalUser('student');
?>

<div class="dboard" id="content">
	<div class="conts">
		<div class="userTab">

			<div class="user">
				<div class="photo">
					<img id="img" src="resources/assets/default-profile-photo2.jpg">
				</div>
				<div class="info">
					<?php
						echo '<p class="name">' .$_SESSION['fullname'] . '</p>';
						echo '<p class="course">' . strtoupper($_SESSION['course']) . '</p>';
					?>
				</div>
			</div>
			
			<div class="gpa_view">
				<div class="gpa">
					<?php
						computeGrade($_SESSION['username']);
					?>
				</div>
				<div class="title">
					<p id="title">Total GPA</p>
					<p id="description">If you have concerns about the result, please visit the admin office or send an email to our school administrator for assistance.</p>
				</div>
			</div>

		</div>
		<div class="dashboardTab">
			<div class="top">
				<div class="schoolYear">
					<p class="SY">S.Y. 2023 - 2024</p>
				</div>
				<div class="semester">
					<p class="SY">3rd year 1st sem</p>
				</div>
			</div>
			<div class="grades">
				<div class="gpa">
					<p class="title">Updated: 11/12/23</p>
				</div>

				<!--- Card --->
				<div class="courses">

					<?php
					foreach (showGrade($_SESSION['username']) as $grade) {
						echo '<div class="subject">
								<div class="grade">
									<p id="subgrade">' . $grade[2] . '%</p>
								</div>
								<div class="name">
									<p id="subjectName">' . $grade[0] . '</p>
									<p id="subjectId">' . $grade[1] . '</p>
								</div>
							</div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>