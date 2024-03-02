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
            <p>Add new Teacher</p>
            <div class="exit_add" id="exit_add">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="options">
            <div class="action">
                <a href="new.teacher.php">New Teacher</a>
            </div>
            <div class="action" id="add_es">
                <p>Add Existing Teacher</p>
            </div>
        </div>
    </div>
	<!---- Add existing student pop up --->
	<div class="popup_add_es" id="popup_add_es">
		<div class="header">
		<p>Add existing Teacher</p>
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

	<div class="std_tch">
		<div class="tab studenttab">
			<a href="students.all.php">Students</a>
		</div>
		<div class="tab teachertab active">
			<a href="#">Teacher</a>
		</div>
	</div>
	<div class="students_view">
		<div class="subjects">
			<div class="title">
				<h2>Courses</h2>
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
					<a href="teachers.all.php?view=1">1st year</a>
					<a href="teachers.all.php?view=2">2nd year</a>
					<a href="teachers.all.php?view=3">3rd year</a>
					<a href="teachers.all.php?view=4">4th year</a>
				</div>
			</div>
			<?php
				// show subjects in left side 

				include 'model/subjects.inc.php';
				showSubject($view);
				if(isset($_SESSION['arraySub'])){
					$Array = $_SESSION['arraySub'];
					foreach($Array as $result){
						echo '<a href="teachers.all.php?view='.$view.'&subject='.$result[1].'"><div class="table">
						<div class="subject_name">
							<p id="name">' . $result[0] . '</p>
						</div>
						<div class="info">
							<p>' . $result[1] . '</p>
							<p>Year: ' . $result[2] . '</p>
							<p>Students: 0</p>
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
						<p>New Teacher</p>
					</div>
					<div class="action">Sort: Name</div>
					<div class="action">Save Data</div>
				</div>
			</div>
			<?php
				if(isset($_GET['subject'])){
					$sub = $_GET['subject'];
					showStudentsData_title($sub);
				}
			?>
			<div class="student_table">
				
			</div>
			<div class="new_section_close" id="popup">
				<div class="header_">
					<p class="title_">New Subject</p>
					<div id="exitpop" class="exit">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
				</div>
				<div class="user_input">
					<form method="post" action="model/new.subject.php" autocomplete="off">
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