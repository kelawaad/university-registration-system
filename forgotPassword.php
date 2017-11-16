<?php
	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	$servername = "localhost";
	$db_username   = "root";
	$db_password   = "";
	$dbname     = "registrationsystem";

	$conn = new mysqli($servername, $db_username, $db_password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$email = $_POST["email"];
	$username = $_POST["username"];
	$query = "SELECT * FROM user WHERE email = '$email'";
	$result = mysqli_query($conn, $query);
	$query2 = "SELECT * FROM user WHERE username = '$username'";
	$result2 = mysqli_query($conn, $query2);
	if(mysqli_num_rows($result) > 0 && mysqli_num_rows($result2) > 0) {
		$row = mysqli_fetch_assoc($result);
		$row2 = mysqli_fetch_assoc($result2);
		$user_id = $row['user_id'];
		$user_id2 = $row2['user_id'];
		if($user_id !== $user_id2) {
			echo "1";
		}
		else {
			$token = generateRandomString();;
			$insertionQuery = "INSERT INTO token(token, user_id) VALUES ('$token', '$user_id');";			
			$insertionResult = $conn->query($insertionQuery);
			if($insertionResult === null || $insertionResult === false)
			{
				die("Connection failed");
				echo "2";
			} else {
				echo "0";
			}
			

			// $fp = fopen('tokens.json', 'r+');
			// $inp = file_get_contents('tokens.json');
			// $tempArray = json_decode($inp);
			// $jsonData = $tempArray;
			// if($tempArray !== null) {
			// 	$data = Array($token=>$username);
			// 	array_push($tempArray, $data);
			// 	$jsonData = json_encode($tempArray);
			// } else {
			// 	$data[] = Array($token=>$username);
			// 	$jsonData = json_encode($data);
			// }
			// file_put_contents('tokens.json', $jsonData);
			// fclose($fp);
			// $fp = fopen('tokens.json', 'r+');
			// $jsonString = file_get_contents('tokens.json');
			// $data = json_decode($jsonString);
			// $data[] = array($token=>$username);
			// file_put_contents('tokens.json', json_encode($data));
			// fclose($fp);
			$link =  "http://localhost:8000/univeristy-registration-system/resetPassword.php?=".$token;
			$subject = "Alexandria University | Password Reset Request";
			mail($email, $subject, "Hello User,\nPlease follow this link to reset your password:\n".$link."\n\nBest Regards,\nAlexandria University IT support.");
		}
	} else if(mysqli_num_rows($result) || mysqli_num_rows($result2)) {
		echo "1";
	}
	


?>