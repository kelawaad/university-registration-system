<?php

	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	// Set up the database connection
	$servername = "localhost";
	$db_username   = "root";
	$db_password   = "";
	$dbname     = "registrationsystem";

	$conn = new mysqli($servername, $db_username, $db_password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// Hash the password
	$password = md5($password);

	// Validate that the email is not already in use
	$validation_query1 = "SELECT * FROM user WHERE email = '$email'";
	$result1 = mysqli_query($conn, $validation_query1);

	// Validate that the username is not already in use
	$validation_query2 = "SELECT * FROM user WHERE username = '$username'";
	$result2 = mysqli_query($conn, $validation_query2);

	// If any of the results have any rows
	if(mysqli_num_rows($result1) > 0 || mysqli_num_rows($result2) > 0) {
		if(mysqli_num_rows($result1) > 0) {
			// Email already in use
	        echo "1";
	    }
	    if(mysqli_num_rows($result2) > 0) {
    		// Username already exists
    		echo "2";
    	}
    } else {
    	// Store the username in the SESSION variable
    	$_SESSION['username'] = $username;

    	// Insert the data into the database
    	$sql = "INSERT INTO user(username, password, email, dept_id) VALUES ('$username', '$password', '$email', null);";
    	if($conn->query($sql) === TRUE) 
    		echo "0"; // Account created successfuly
    	else
    		echo "3"; // Account wasnot created
    }

	$conn->close();
?>