<?php
	
	function getToken($URI) {
		$length = strlen($URI);
		$token = '';
		$i = 0;
		while($i < $length && $URI[$i] !== '=')
			$i++;
		for($i = $i + 1; $i < $length; $i++) {
			$token .= $URI[$i];
		}
		return $token;
	}

	$servername = "localhost";
	$db_username   = "root";
	$db_password   = "";
	$dbname     = "registrationsystem";

	$conn = new mysqli($servername, $db_username, $db_password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$token = getToken($_SERVER['REQUEST_URI']);
	$query = "SELECT * from token WHERE token='$token';";
	$result = $conn->query($query);
	$user_id = '';
	if(mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$user_id = $row['user_id'];
	}
	else {
		header("Location:registration.php");
	}
	$getUserQuery = "SELECT * from user WHERE user_id='$user_id'";
	$result = $conn->query($getUserQuery);
	$row = mysqli_fetch_assoc($result);
	$username = $row['username'];
	// $str = file_get_contents('tokens.json');
	// $json = json_decode($str);
	// echo '<pre>' . print_r($json, true) . '</pre>';
	// for($i = 0;$i < count($json); $i++) {
	// 	foreach ($json[$i] as $key => $value) {
	// 		if($token == $key) {
	//  			echo $key.'   '.$value;
	//  			$username = $value;
	// 		}
	// 	}
	// 	echo '<br>';
	// }
?>

<html>
	<head>
		<title>Password Reset</title>
		<link rel="icon" href="images/university_favicon.ico">
		<link rel="stylesheet"  href="css/resetPassword.css">
		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="js/resetPassword.js"></script>
		<script type="text/javascript"><?php echo 'let user_id ='.$user_id.';'; echo 'let token = "'.$token.'";'; ?></script>
	</head>

	<body>
		<header id="main-header">
			<div class="container">
				<h3 unselectable="on" onselectstart="return false;" onmousedown="return false;">Alexandria University</h3>
			</div>
		</header>
		<div id="form-div">
			<form id="reset-password-form">
				<h2>Password</h2>
				<input type="password" id="password-box"/>
				<h2>Confirm Password</h2>
				<input type="password" id="confirm-password-box"/>
				<input type="submit" id="form-submit"/>
			</form>
		</div>

	</body>
</html>

