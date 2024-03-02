<?php
	include 'base.php';
	include_once "model/check.user.php";

	checkPortalUser('admin');
	$view = 3;
	if(isset($_GET['view'])){
		$view = $_GET['view'];
	}
?>

<div class="students" id="content">
	<div class="students_view">
		<div class="subjects">
			<div class="title">
				<h2>Courses</h2>
			</div>
			<div class="searchCourse">
				<input type="text" name="searchCourse" id="searchCourse" placeholder="Search">
			</div>
			<div class="dropdown">
				<?php
					echo '<button id="year">Year: ' . $view . '</button>';
				?>
				<div class="dropdown_content">
					<a href="account.admin.php?view=1">1st year</a>
					<a href="account.admin.php?view=2">2nd year</a>
					<a href="account.admin.php?view=3">3rd year</a>
					<a href="account.admin.php?view=4">4th year</a>
				</div>
			</div>
			<?php
				// show course in left side 

				include 'model/course.inc.php';
				showCourse($view);
				if(isset($_SESSION['arrayCourse'])){
					$Array = $_SESSION['arrayCourse'];
					foreach($Array as $result){
						echo '<a href="account.admin.php?view='.$view.'&course='.$result[1].'"><div class="table">
						<div class="subject_name">
							<p id="name">' . $result[0] . '</p>
						</div>
						<div class="info">
							<p>' . $result[1] . '</p>
							<p>Year: ' . $result[2] . '</p>
						</div>
					</div></a>';
					}
				}
			?>
		</div>
		<div class="controls">
			<div class="controlpanel">
				<div class="side left">
					<input type="text" name="search" placeholder="Search..." id="search">
					<input type="submit" name="submit" value="Search" id="btn">
				</div>
				<div class="side right">
					<div class="action">
						<a href="new.student.php?course=<?php if(isset($_GET['course'])){echo $_GET['course'];} ?>">New Student</a>
					</div>
					<div class="action">Options</div>
					<div class="action">Save Data</div>
				</div>
			</div>
			<?php
				if(isset($_GET['course'])){
					$sub = $_GET['course'];
					showStudentsData_title($sub);
				}
			?>
			<div class="student_table">
				<table class="table" id="studentTables">
					<?php
						if(isset($_GET['course'])){
							$sub = $_GET['course'];
							echo '<tr>
									<th id="header">Name</th>
									<th id="header">Course</th>
									<th id="header">Year</th>
									<th id="header">Total Balance</th>
									<th id="header">Paid</th>
								</tr>';
							showStudentsData_table($sub);
						}
					?>
				</table>
			</div>
		</div>
	</div>
</div>