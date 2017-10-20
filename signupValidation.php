<?php
	$email    = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];


	$servername = "localhost";
	$username   = "root";
	$password   = "";
	$dbname     = "";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	// TODO:
	// Verify username and passwords are unique and create a new entry in the table
	// Redirect the user to the corresponding webpage

	// Write query to validate that email and usernames are unique 
	//$sql = "SELECT FROM Student()"
	//$sql = "INSERT into Emp(fName,lName,Dno) values ('$fname','$lname','$dno')";

	if ($conn->query($sql) === TRUE) {
	    echo "Username is already used, please choose another username";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>