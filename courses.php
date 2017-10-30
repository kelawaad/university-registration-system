<?php
	session_start();
	if(!isset($_SESSION["username"]) || !isset($_SESSION["dept_id"]))
	{
		header("Location: registration.php");
		//echo '<script type="text/javascript">window.location.href="registration.php"</script>';
	}

	$username = $_SESSION["username"];
	$dept_id = $_SESSION["dept_id"];

	// Set up the connection to the database
	$servername = "localhost";
	$db_username   = "root";
	$db_password   = "";
	$dbname     = "registrationsystem";

	$conn = new mysqli($servername, $db_username, $db_password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// Get the list of courses offered by the department of the user
	$getCoursesQuery1 = "SELECT * from course WHERE dept_id = '$dept_id'";
	$result1 = mysqli_query($conn, $getCoursesQuery1);	
	$num_rows1 = mysqli_num_rows($result1);

	$getCoursesQuery2 = "SELECT * from course WHERE dept_id = 6";
	$result2 = mysqli_query($conn, $getCoursesQuery2);
	$num_rows2 = mysqli_num_rows($result2);

	$conn->close();

?>


<html>
	<head> 
		<title>Courses</title>
		<link rel="stylesheet"  href="css/courses.css">
	</head>
	
	<body>
		<header id="main-header">
			<div class="container">
				<h2 unselectable="on" onselectstart="return false;" onmousedown="return false;"  id="main-title"><?php echo 'Welcome '.$username; ?></h2>
			</div>
		</header>
		
		<div id="courses-table-div">
			<table id="courses-table" unselectable="on" onselectstart="return false;" onmousedown="return false;">

				<tbody>
					<tr><th id="table-header" colspan="4">Courses</th></tr>
					<tr id="table-head">
						<th>Code</th>
						<th>Course</th>
						<th>Instructor</th>
						<th>CHs</th>
					</tr>
					<?php 
						for($i = 0;$i < $num_rows1; $i++) {
							$row = mysqli_fetch_assoc($result1);
							echo '<tr><td>'.$row["course_code"].'</td>';
							echo '<td>'.$row["course_name"].'</td>';
							echo '<td>'.$row["instructor_name"].'</td>';
							echo '<td>'.$row["credit_hours"].'</td></tr>';
						}

						for($i = 0; $i < $num_rows2; $i++) {
							$row = mysqli_fetch_assoc($result2);
							echo '<tr><td>'.$row["course_code"].'</td>';
							echo '<td>'.$row["course_name"].'</td>';
							echo '<td>'.$row["instructor_name"].'</td>';
							echo '<td>'.$row["credit_hours"].'</td></tr>';
						}
					?>
				</tbody>

			</table>
		</div>	
	</body>
</html>

