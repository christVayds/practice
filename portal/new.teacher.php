<?php
	include 'base.php';
	include_once "model/check.user.php";

	checkPortalUser('admin');
?>

<div class="new-students" id="content">
	<div class="new_student_view">
		<div class="card">
			<div class="header">
				<!-- Title and actions-->
				<div class="title">
					<p>New Teacher</p>
				</div>
				<div class="action">
					<!-- action -->
					<button class="action-btn" id="clear">Clear</button>
					<button class="action-btn" id="cancel">Cancel</button>
					<button class="action-btn" id="next">Next</button>
				</div>
			</div>
			<div class="form">
				<form action="model/signin.inc.php" method="post" autocomplete="off">
					<div class="top">
						<div class="side one">
							<input type="text" id="ifname" name="fname" placeholder="First Name">
							<input type="text" id="imname" name="mname" placeholder="Middle Name">
							<input type="text" id="ilname" name="lname" placeholder="Last Name">
							<input type="email" id="iemail" name="email" placeholder="Email">
							<input type="text" id="ipass" name="ipass" placeholder="Password">
							<input type="date" id="ibdate" name="bdate" placeholder="Birth date">
							<input type="hidden" id="icourse" name="course" placeholder="Departement">
							<input type="text" id="ischoolID" name="schoolID" placeholder="School ID">
							<input type="hidden" id="iyear" name="year" placeholder="Year"> 
						</div>
						<div class="side two">
							<p id="first">First name: </p>
							<p id="middle">Middle name: </p>
							<p id="last">Last name: </p>
							<p id="email">Email: </p>
							<p id="passw">Password: </p>
							<p id="bdate">Birth date: </p>
							<p id="schoolID">School ID: </p>
						</div>
					</div>
					<div class="bottom">
						<input type="submit" name="submit" value="Add Teacher">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="resources/javascript/signin.js"></script>