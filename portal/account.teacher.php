<?php
	include "base.php";
	include_once "model/check.user.php";

	checkPortalUser('teacher');
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
		<div class="view usercontent">
			<div class="user_info">
				<?php
					echo '
					<div class="profile_photo">
						<img src="resources/assets/image.jpg">
						<p id="username">' . $_SESSION['fullname'] . '</p>
					</div>
					<p id="course">' . strtoupper($_SESSION['course']) . '</p>';
				?>
			</div>
			<div class="details">
				<div class="details_header">
					<p id="title">Details</p>
					<button>
						<img src="resources/assets/icons/bars-solid.svg">
					</button>
				</div>
				<div class="content">
					<div class="info">
						<?php
							echo '<div class="con">
							<img src="resources/assets/icons/circle-user-solid.svg">
							<p>Username</p></div>
							<p>@' . $_SESSION['username'] . '</p>';
						?>
					</div>
					<div class="info">
						<?php
							echo '<div class="con">
							<img src="resources/assets/icons/envelope-solid.svg">
							<p>Email</p></div>
							<p>' . $_SESSION['email'] . '</p>';
						?>
					</div>
					<div class="info">
						<?php
							echo '<div class="con">
							<img src="resources/assets/icons/id-card-regular.svg">
							<p>ID no.</p></div>
							<p>' . $_SESSION['schoolID'] . '</p>';
						?>
					</div>
					<div class="info">
						<?php
							echo '<div class="con">
							<img src="resources/assets/icons/venus-mars-solid.svg">
							<p>Gender</p></div>
							<p>' . $_SESSION['gender'] . '</p>';
						?>
					</div>
					<div class="info">
						<?php
							echo '<div class="con">
							<img src="resources/assets/icons/cake-candles-solid.svg">
							<p>Birthdate</p></div>
							<p>' . substr($_SESSION['bdate'], 0, 10) . '</p>';
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>