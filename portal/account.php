<?php
	include "base.php";
	include_once "model/check.user.php";

	checkPortalUser('student');
?>
<div class="account" id="content">
	<div class="user_option" id="popup-menu">
		<div class="header">
			<div class="logo">
				<i class="fa-solid fa-image"></i>
				<p>Change Photo</p>
			</div>
			<div class="exit" id="exitpop">
			<i class="fa-solid fa-xmark"></i>
			</div>
		</div>
		<div class="openFile">
			<div class="fileopener" id="fileopener">
				<i class="fa-regular fa-file-image"></i>
				<p>Choose Photo</p>
			</div>
			<form action="model/user_profile.inc.php" method="post" enctype="multipart/form-data">
				<input type="file" name="image" id="fileinput" accept="jpeg jpg png" onchange="handleFileSelection(this)">
				<input type="submit" id="submit" name="submit">
			</form>
		</div>
	</div>
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
			<!-- cover photo -->
			<div class="coverphoto"></div>
			<div class="user_info">
				<?php
					echo '
					<div class="profile_photo">
						<img id="new-photo2" src="resources/assets/default-profile-photo2.jpg">
						<p id="username">' . $_SESSION['fullname'] . '</p>
					</div>
					<p id="course">' . strtoupper($_SESSION['course']) . '</p>';
				?>
			</div>
			<div class="details">
				<div class="details_header">
					<p id="title">Details</p>
					<button id="new-photo">
						<i class="fa-solid fa-image"></i>
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
            <div class="user_balance">
                <div class="side left_side">
                    <div class="to_pay">
                        <?php
							include 'model/check.balance.php';
						?>
                        <p id="label">Balance payable</p>
                    </div>
                    <div class="_total">
                        <div class="content">
                            <p>T.Fee</p>
                            <p>11, 340.00</p>
                        </div>
                        <div class="content">
                            <p>Penalty</p>
                            <p>240.00</p>
                        </div>
                        <div class="content">
                            <p>Lab</p>
                            <p>8, 500.00</p>
                        </div>
                        <div class="content">
                            <p>Misc.</p>
                            <p>5, 500.00</p>
                        </div>
                    </div>
                    <!-- <div class="history">
                        <div class="content">
                            <p>9, 930.00</p>
                            <p>1st Balance 2022-23</p>
                        </div>
                        <div class="content">
                            <p>16, 320.00</p>
                            <p>1st Balance 2nd sem 2022-2023</p>
                        </div>
                    </div> -->
                </div>
                <div class="side right_side">
                    <div class="payment schedule">
                        <div class="sched">
                            <p>Payments made</p>
                            <button id="view_sched_payment">
                                <img src="resources/assets/icons/bars-solid.svg" alt="">
                            </button>
                        </div>
                        <div class="timeline">
                            <p id="date">09/08/2023</p>
                            <p id="amount">2,000.00</p>
                        </div>
                    </div>
                    <div class="payment sbca_contact">
                    	<div class="sched">
                            <p>How to pay?</p>
                        </div>
						<div class="listOfAcc">
							<div class="timeline">
								<p id="date">GCash</p>
								<p id="amount">09054809630</p>
							</div>
							<div class="timeline">
                            	<p id="date">Paymaya</p>
                            	<p id="amount">09054809630</p>
                    		</div>
						</div>
						<div class="other">
							<p>Name: Felicitas C. Rabonza or St. Bernadette College of Alabang</p>
						</div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

<script src="resources/javascript/dashboard.js"></script>