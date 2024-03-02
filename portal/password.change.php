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
		<div class="view usercontent">
			<div class="user_info">
				<?php
					echo '<p id="username">' . $_SESSION['fullname'] . '</p>
					<p id="course">' . $_SESSION['course'] . '</p>';
				?>
			</div>
			<div class="changepass">
				<div class="card">
					<div class="logo">
						<img src="resources/assets/images.png">
					</div>
					<div class="title">
						<p>Change password</p>
					</div>
					<div class="advice">
						<p>Password must 8 characters or more.</p>
					</div>
					<div class="passwordCard">
						<form action="model/password.change.inc.php" method="post" autocomplete="off">
							<input type="password" name="pass1" placeholder="Password" required>
							<input type="password" name="pass2" placeholder="Re-enter password" required>
							<input type="submit" name="submit" value="Change Password" id="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>