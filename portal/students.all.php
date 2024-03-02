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
	<div class="addnew" id="popup_option">
        <div class="header">
            <p>Add new Student</p>
            <div class="exit_add" id="exit_add">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="options">
            <div class="action">
                <a href="new.student.php">New Student</a>
            </div>
            <div class="action" id="add_es">
                <p>Add Existing Student</p>
            </div>
        </div>
    </div>

	<!---- Add existing student pop up --->
	<!-- for eregular students -->
	<div class="popup_add_es" id="popup_add_es">
		<div class="header">
		<p>Add existing Student</p>
            <div class="exit_add" id="exit_add_es">
                <i class="fa-solid fa-xmark"></i>
            </div>
		</div>
		<div class="search_field">
			<form action="model/search.students.inc.php" method="get">
				<input type="text" name="search_username" placeholder="Enter username">
			</form>
		</div>
	</div>

	<!-- add teacher -->
	<div class="popup_assign_teacher" id="popup_assign_teacher">
		<div class="header">
		<p>Assign Teacher</p>
            <div class="exit_add" id="exit_add_t">
                <i class="fa-solid fa-xmark"></i>
            </div>
		</div>
		<div class="search_field">
			<form action="model/search.students.inc.php" method="get">
				<input type="text" name="search_username" placeholder="Enter username">
			</form>
		</div>
	</div>
	<div class="students_view">
		<div class="subjects">
			<div class="title">
				<h2>Subjects</h2>
				<button id="add">New</button>
			</div>
			<div class="searchCourse">
				<i class="fa-solid fa-magnifying-glass"></i>
				<input type="text" name="searchCourse" id="searchCourse" placeholder="Search">
			</div>
			<div class="dropdown">
				<?php
					echo '<button id="year">Year: ' . $view . '</button>';
				?>
				<div class="dropdown_content">
					<a href="students.all.php?view=1">1st year</a>
					<a href="students.all.php?view=2">2nd year</a>
					<a href="students.all.php?view=3">3rd year</a>
					<a href="students.all.php?view=4">4th year</a>
				</div>
			</div>
			<?php
				// show subjects in left side 

				include 'model/subjects.inc.php';
				showSubject($view);
				if(isset($_SESSION['arraySub'])){
					$Array = $_SESSION['arraySub'];
					foreach($Array as $result){
						echo '<a href="students.all.php?view='.$view.'&subject='.$result[1].'"><div class="table">
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
					<div class="action" id="add_people">
						<p>New Student</p>
					</div>
					<div class="action" id="add_t">
						<p>Teacher</p>
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
							showStudentsData_table($sub);
						}
					?>
				</table>
			</div>
			<div class="new_section_close" id="popup">
				<div class="header_">
					<p class="title_">New Subject</p>
					<div id="exitpop" class="exit">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
				</div>
				<div class="user_input">
					<form method="get" action="model/new.subject.inc.php" autocomplete="off">
						<input type="text" name="name" placeholder="Subject name" id="data">
						<input type="text" name="code" placeholder="Subject id" id="data">
						<input type="number" name="year" placeholder="Year" id="data">
						<div class="action">
							<input type="submit" name="submit" value="Save" id="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="resources/javascript/pop.up.js"></script>