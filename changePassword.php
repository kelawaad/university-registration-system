<?php 
	$user_id = $_POST['user_id'];
	$new_password = $_POST['new_password'];

	$servername = "localhost";
	$db_username   = "root";
	$db_password   = "";
	$dbname     = "registrationsystem";

	$conn = new mysqli($servername, $db_username, $db_password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$new_password = md5($new_password);
	$updateQuery = "UPDATE user SET password='$new_password' WHERE user_id = '$user_id';";
	$result = $conn->query($updateQuery);
	if($result === null || $result === FALSE) {
		echo "1";
	} else {
		echo "0";
	}




 ?>