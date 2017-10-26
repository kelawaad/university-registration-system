<?php
	
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	$servername = "localhost";
	$db_username   = "root";
	$db_password   = "";
	$dbname     = "registrationsystem";

	$conn = new mysqli($servername, $db_username, $db_password, $dbname);

	//$password = md5($password);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}	

	// Write query to validate that email and usernames are unique 
	$validation_query = "SELECT * FROM user WHERE username = '$username'";
	$result = mysqli_query($conn, $validation_query);

	if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if($row["password"] == $password)
        {
        	$_SESSION['username'] = $username;
        	if($row["dept_id"] != null)
        	{
        		echo "1";
        		$_SESSION["dept_id"] = $row["dept_id"];
        	}
        	else
        		echo "0";
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