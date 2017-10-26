<?php
	//$email    = $_POST["email"];
//	$post = file_get_contents("php://input");
	//header("chooseDepartment.php");
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	$servername = "localhost";
	$db_username   = "root";
	$db_password   = "";
	$dbname     = "registrationsystem";

	$conn = new mysqli($servername, $db_username, $db_password, $dbname);

	echo 'New user is being registered, email: '.$email;
	echo '<br/>';
	echo 'username: '.$username;
	echo '<br/>';
	echo 'password: '.$password;
	echo '<br/>';
	$password = md5($password);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} else {
		echo 'Connection established successfuly';
	}

	$_SESSION['username'] = $username;
	header("Location: chooseDepartment.php");
	


 

	// TODO:
	// Verify username and passwords are unique and create a new entry in the table
	// Start a new session
	// Redirect the user to the corresponding webpage

	// Write query to validate that email and usernames are unique 
	//$validation_query1 = "SELECT * from user WHERE email = $email;"
	//$validation_query2 = "SELECT * from user WHERE username = $username;"
	//$sql = "INSERT INTO user(username, password, email, dept_id) VALUES ('$username', '$password', '$email', null);"

	//if ($conn->query($sql) === TRUE) {
	//    echo "Username is already used, please choose another username";
	//} else {
	//    echo "Error: " . $sql . "<br>" . $conn->error;
	//}

	$conn->close();

?>