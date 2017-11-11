<?php

	$servername = "localhost";
	$db_username   = "root";
	$db_password   = "";
	$dbname     = "registrationsystem";

	$conn = new mysqli($servername, $db_username, $db_password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$email = $_POST["email"];
	$query = "SELECT * FROM user WHERE email = '$email'";
	$result = mysqli_query($conn, $query);
	$username = null;
	if(mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$username = $row["username"];
	}

	if($username != null) {
		$subject = "Alexandria University | Account Restore";
		mail($email, $subject, "Hello User,\nThis is the username associated with this email: ".$username."\n\nBest Regards,\nAlexandria University IT support.");
	}

?>