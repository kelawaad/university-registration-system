<?php
	
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Setup the database connection
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

	// Write query to validate that email and usernames are unique 
	$validation_query = "SELECT * FROM user WHERE username = '$username'";
	$result = mysqli_query($conn, $validation_query);

	if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // If the passwords are the same
        if($row["password"] === $password)
        {
        	// Store the username in the SESSION variable
        	$_SESSION['username'] = $username;

        	// If the user already chose a department, store the dept_id in the SESSION variable
        	if($row["dept_id"] != null)
        	{
        		echo "1"; // Successful login, go to the courses page
        		$_SESSION["dept_id"] = $row["dept_id"];
        	}
        	else
        		echo "0"; // Successful login, go to the departments page
        }
        else {
        	// Password is incorrect
        	echo "-1";
        }
     } else {
        // Username doesn't exist
        echo "-1";
     }
     
	$conn->close();

?>