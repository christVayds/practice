<?php
	include "base.php";
?>
<div class="account" id="content">
	<div class="account_view">
		<div class="view options">
			<div class="logo">
				<img src="resources/assets/security.png">
			</div>
			<div class="table">
				<div class="title">
					<p>Security</p>
				</div>
				<div class="content">
					<img src="resources/assets/icons/lock-solid.svg">
					<a href="password.change.php">Change Password</a>
				</div>
			</div>
			<div class="table">
				<div class="title">
					<p>Theme</p>
				</div>
				<div class="content">
					<img src="resources/assets/icons/moon-solid.svg">
					<a href="#">Dark mode</a>
				</div>
			</div>
			<div class="table">
				<div class="title">
					<p>More info</p>
				</div>
				<div class="content">
					<img src="resources/assets/icons/circle-question-solid.svg">
					<a href="#">About Portal</a>
				</div>
				<div class="content">
					<img src="resources/assets/icons/graduation-cap-solid.svg">
					<a href="courses.php">Courses</a>
				</div>
				<div class="content">
					<img src="resources/assets/icons/user-solid.svg">
					<a href="student.sbca.php">Student</a>
				</div>
				<div class="content">
					<img src="resources/assets/icons/user-solid.svg">
					<a href="teacher.sbca.php">Teachers</a>
				</div>
			</div>
			<div class="table">
				<div class="title">
					<p>Contact SBCA</p>
				</div>
				<div class="content">
					<img src="resources/assets/icons/comment-solid.svg">
					<a href="#">SBCA Admision</a>
				</div>
			</div>
			<div class="table">
				<div class="title">
					<p>Visit SBCA Website</p>
				</div>
				<div class="content">
					<img src="resources/assets/icons/globe-solid.svg">
					<a href="#">www.sbca.edu.ph</a>
				</div>
			</div>
			<div class="table">
				<div class="title">
					<p>Logout</p>
				</div>
				<div class="content">
					<img src="resources/assets/icons/right-from-bracket-solid.svg">
					<a href="model/logout.inc.php">Logout</a href="#">
				</div>
			</div>
		</div>
		<div class="courses_view">
			<div class="Header">
				<div class="title">
					<h2>Students</h2>
				</div>
			</div>
			<div class="course_lists">
				<div class="search">
					<form method="get" action="model/search.inc.php" autocomplete="off">
						<input type="text" name="course_search" placeholder="Search..." id="search_course">
						<input type="submit" name="search" value="Student" id="search_btn">
					</form>
				</div>

				<?php
					if(isset($_SESSION['arrayOfResult'])){
						$Array = $_SESSION['arrayOfResult'];
						foreach($Array as $result){
							echo '<div class="student_card">
									<div class="header">
										<div class="profile">
											<img src="resources/assets/image.jpg">
											<a href="#" id="studentname">' . $result[0] . '</a>
										</div>
										<p id="course">' . strtoupper($result[1]) . '</p>
									</div>
									<div class="content">
										<div class="dtl">
											<img src="resources/assets/icons/circle-user-solid.svg">
											<p id="username">Username: ' . $result[2] . '</p>
										</div>
										<div class="dtl">
											<img src="resources/assets/icons/envelope-solid.svg">
											<p id="email">Email: ' . $result[3] . '</p>
										</div>
										<div class="dtl">
											<img src="resources/assets/icons/cake-candles-solid.svg">
											<p id="bdate">Birthdate: ' . $result[4] . '</p>
										</div>
									</div>
								</div>';
						}
						unset($_SESSION['arrayOfResult']);
					}
				?>

				<!--
				<div class="student_card">
					<div class="header">
						<a href="#" id="studentname">Christian Vaydal</a>
						<p id="course">BSIT</p>
					</div>
					<div class="content">
						<p id="username">Username: cvaydal</p>
						<p id="email">Email: cvaydal@sbca.edu.ph</p>
						<p id="bdate">Birthdate: 11/10/2000</p>
					</div>
				</div>
				<div class="student_card">
					<div class="header">
						<a href="#" id="studentname">Genie Matteo</a>
						<p id="course">BSBA</p>
					</div>
					<div class="content">
						<p id="username">Username: gmatteo</p>
						<p id="email">Email: gmatteo@sbca.edu.ph</p>
						<p id="bdate">Birthdate: 04/24/2001</p>
					</div>
				</div> --->

			</div>
		</div>
	</div>
</div>