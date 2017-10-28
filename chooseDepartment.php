<?php	
	session_start();
	$username = $_SESSION["username"];

	// Set up the database connection
	$servername = "localhost";
	$db_username   = "root";
	$db_password   = "";
	$dbname     = "registrationsystem";

	$conn = new mysqli($servername, $db_username, $db_password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}	

	// Get the list of departments
	$getDepartmentsQuery = "SELECT * from department";
	$result = mysqli_query($conn, $getDepartmentsQuery);
	

	// Show the list of departments
	$num_rows = mysqli_num_rows($result);

	$conn->close();
?>

<html>
	<head>
		<link rel="stylesheet"  href="chooseDepartment.css">
		<script type="text/javascript" src="jquery-3.2.1.js"></script>
		<script type="text/javascript" src="chooseDepartment.js"></script>
		<title>Choose your department</title>
	</head>
	<body>
		<header id="main-header">
			<div class="container">
				<h3>Alexandria University</h3>
			</div>
		</header>

		<div id="myModal" class="modal">
		 	<div class="modal-content">
		    	<span class="close"></span>
		    	<p id="confirmation-box-content"></p>
		    	<button id="yes-btn">Yes</button>
		    	<button id="no-btn">No</button>
	  		</div>
		</div>

		<div id="departments-table-div">
			<table id="departments-table" unselectable="on" onselectstart="return false;" onmousedown="return false;">

				<tbody>
					<tr><th id="table-header" colspan="2">Departments</th></tr>
					<?php 
						for($i = 0;$i < $num_rows; $i++) {
							$row = mysqli_fetch_assoc($result);
							echo '<tr><td id="dept_id'.$row["dept_id"].'">'.$row["dept_name"].'</td></tr>';
						}
					?>
				</tbody>

			</table>
		</div>

	</body>
</html> 
