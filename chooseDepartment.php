<?php	
	session_start();

	 if(!isset($_SESSION["username"]))
	 {
	 	header("Location: registration.php");
	 	die();
	 	//echo '<script type="text/javascript">window.location.href="registration.php"</script>';
	 }

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


	$getUserQuery = "SELECT dept_id from user WHERE username='$username';";
	$result1 = $conn->query($getUserQuery);
	$row1 = mysqli_fetch_assoc($result1);
	$dept_id = $row1["dept_id"];

	if($dept_id != null && $dept_id != "")
	{
		header("Location: courses.php");
		die();
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
		<script>
			var username = <?php 
				echo "'$username'";
			 ?>;
		</script>
		<link rel="stylesheet"  href="css/chooseDepartment.css">
		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="js/chooseDepartment.js"></script>
		<title>Choose your department</title>
	</head>
	<body>
		<header id="main-header">
			<div class="container">
				<h3 unselectable="on" onselectstart="return false;" onmousedown="return false;"><?php echo 'Welcome '.$username; ?></h3>
			</div>
		</header>

		<div id="myModal" class="modal">
		 	<div class="modal-content">
		    	<span class="close"></span>
		    	<p id="confirmation-box-content" unselectable="on" onselectstart="return false;" onmousedown="return false;"></p>
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
							if($row["dept_id"] != 6)
								echo '<tr><td id="dept_id'.$row["dept_id"].'">'.$row["dept_name"].'</td></tr>';
						}
					?>
				</tbody>

			</table>
		</div>

	</body>
</html> 
