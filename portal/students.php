<?php
	include 'base.php';
	include_once "model/check.user.php";

	checkPortalUser('teacher');
?>

<div class="students" id="content">
	<div class="students_view">
		<div class="subjects">
			<div class="title">
				<h2>Subjects</h2>
			</div>
			<div class="searchCourse">
				<input type="text" name="searchCourse" id="searchCourse" placeholder="Search subject">
			</div>
			<?php
				// show subjects in left side 

				include 'model/subjects.inc.php';
				showSubject(3);
				if(isset($_SESSION['arraySub'])){
					$Array = $_SESSION['arraySub'];
					foreach($Array as $result){
						echo '<a href="students.php?subject='.$result[1].'"><div class="table">
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
				<form action="model/update.grade.php?subject=<?php if(isset($_GET['subject'])){echo $_GET['subject'];} ?>" method="post">
					<div class="side right">
						<div class="action">Remove Subject</div>
						<div class="action">
							<input type="submit" name="submit" value="Save Data" id="inputaction">
						</div>
					</div>
				</div>
				<?php
					if(isset($_GET['subject'])){
						$sub = $_GET['subject'];
						showStudentsData_title($sub); // the header
					}
				?>
				<div class="student_table">
					<table class="table" id="studentTables">
					<?php
						if(isset($_GET['subject'])){
							$sub = $_GET['subject'];
							echo '<tr>
									<th id="header">Name</th>
									<th id="header">Course</th>
									<th id="header">Year</th>
									<th id="header">Grade</th>
								</tr>';
							editStudentsData_table($sub);
							}
						?>
					</table>
				</div>
				</form>
		</div>
	</div>
</div>
