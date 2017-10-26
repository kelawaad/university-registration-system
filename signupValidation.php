<?php

	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$servername = "localhost";
	$db_username   = "root";
	$db_password   = "";
	$dbname     = "registrationsystem";

	$conn = new mysqli($servername, $db_username, $db_password, $dbname);
	
	//$password = md5($password);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// TODO:
	// Verify username and passwords are unique and create a new entry in the table
	// Start a new session
	// Redirect the user to the corresponding webpage

	// Write query to validate that email and usernames are unique 
	$validation_query1 = "SELECT * FROM user WHERE username = '$username'";
	$result1 = mysqli_query($conn, $validation_query1);
	$validation_query2 = "SELECT * FROM user WHERE email = '$email'";
	$result2 = mysqli_query($conn, $validation_query2);

	if(mysqli_num_rows($result1) == 1 || mysqli_num_rows($result2) == 1) {
		if(mysqli_num_rows($result1) == 1) {
			// Username already exists
	        echo "1";
	    }
	    else if(mysqli_num_rows($result2) == 1) {
    		// Email already exists
    		echo "2";
    	}
    } else {
    	$_SESSION['username'] = $username;
    	$sql = "INSERT INTO user(username, password, email, dept_id) VALUES ('$username', '$password', '$email', null);";
    	if($conn->query($sql) === TRUE) 
    		echo "0";
    	else
    		echo "3";
    }

	$conn->close();
?>