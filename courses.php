<?php
	session_start();
	$username = $_SESSION["username"];
	$dept_id = $_SESSION["dept_id"];

	echo 'PHP';

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
	$getCoursesQuery = "SELECT * from course WHERE dept_id = '$dept_id'";
	$result = mysqli_query($conn, $getCoursesQuery);	

	$num_rows = mysqli_num_rows($result);
	echo 'Num rows: '.$num_rows.'<br/>';
	for($i = 0; $i < $num_rows; $i++) {
		$row = mysqli_fetch_assoc($result);
		echo 'Course ID: '.$row["course_id"].'</br>Course Name: '.$row["course_name"].'<br/>Instuctor: '.$row["instructor_name"].'<br/>Credit Hours: '.$row["credit_hours"];
		echo '<br/><br/>';
	}

	$conn->close();

?>


<html>
	<head> 
		<title>Courses</title>
	</head>
	
	<body>
		<h1 id="main-title">Registered Courses</h1>
		<?php
			echo "<h1>hello</h1>".$username.'<br/>';
		?>		
		<h1> END </h1>
	</body>
</html>

