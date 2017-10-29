<?php
	
	session_start();

	$username = $_POST["username"];
	$dept_id = $_POST["dept_id"];

	// Set up the database connection
	$servername = "localhost";
	$db_username   = "root";
	$db_password   = "";
	$dbname     = "registrationsystem";

	$conn = new mysqli($servername, $db_username, $db_password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$editDepartmentQuery = "UPDATE user SET dept_id='$dept_id' WHERE username = '$username';";

	if($conn->query($editDepartmentQuery))
	{
		echo "0";
		$_SESSION["dept_id"] = $dept_id;
	}
	else{
		echo "1";
	}


	$conn->close();	

?>