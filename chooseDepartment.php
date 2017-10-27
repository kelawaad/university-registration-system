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
	

	//$i = 0;
	// for($i = 0;i < mysqli_num_rows($result);$i = $i + 1) {
	// 	$row = mysqli_fetch_assoc($result);
	// 	echo $row["dept_name"].'<br/>';
	// }
	$conn->close();
?>

<html>
	<body>

		Welcome <?php echo $username; ?> <br/>
		Your email address is: <?php ?>


	</body>
</html> 
