<?php
	session_start();

?>

<!DOCTYPE html>
<html>
	<head>	
		<script type="text/javascript" src="jquery-3.2.1.js"></script>
		<script type="text/javascript" src="registration.js"></script>
		<link rel="stylesheet"  href="registration.css">
		<title>University Registration System</title>
		
	</head>

	<body>
		<header id="main-header">
			<div class="container">
				<h3>Alexandria University</h3>
			</div>
		</header>
		<div id="forms-div">
			<div id="previous-div">
				<img src="images/left-arrow.jpg" id="previous"/>
			</div>
			<div id="next-div">
				<img src="images/right-arrow.png" id="next"/>
			</div>
			<div id="registration-form-div">
				<form id="registration-form" action="signupValidation.php" method="post" onsubmit="return validateRegistrationForm()">
					<h3>E-mail</h3>
					<input type = "text" name ="email" ID="register-email" placeholder="Email"/>
					<br/>				
					<h3>Username</h3>				
					<input type = "text" name ="username" ID="register-username"  placeholder="Username"/>
					<h3>Password</h3>				
					<input type = "password" name ="password" ID="register-password" placeholder="Password"/>
					<br/>
					<br/>
					<input type="submit" value="Sign Up">
				</form>
				<br/>
			</div>
			<div id="login-form-div">
				<form id="login-form" action="loginValidation.php" method="post" onsubmit="return validateLoginForm()">
					<h3>Username</h3>
					<input type="text" name="username" id="login-username" placeholder="Username"/>
					<h3>Password</h3>
					<input type="password" name="password" id="login-password" placeholder="Password"/>
					<br/>
					<br/>
					<input type="submit" value="Login"/>
				</form>

			</div>

			
		</div>
	</body>


</html>
