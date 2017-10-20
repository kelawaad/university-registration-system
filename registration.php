<!DOCTYPE html>
<html>
	<head>	
		
		<script type="text/javascript" src="registration.js"> </script>
		<script type="text/javascript" src="jquery-3.2.1.js"></script>
		<script src="my-jquery.js"></script>
		<link rel="stylesheet"  href="registration.css">
		<title>University Registration System</title>
		
	</head>

	<body>
		<header id="main-header">
			<h1>University Registration System</h1>
		</header>

		<div id="registration-form-div">
			<form id="registration-form" action="signupValidation.php" method="post" onsubmit="return validateForm()">
				<h3>E-mail</h3>
				<input type = "text" name ="email" ID="email" placeholder="Email"/>
				<br/>				
				<h3>Username</h3>				
				<input type = "text" name ="username" ID="username"  placeholder="Username"/>
				<h3>Password</h3>				
				<input type = "password" name ="password" ID="password" placeholder="Password"/>
				<br/>
				<br/>
				<input type="submit" value="Sign Up">
			</form>
			<br/>
		</div>
		<div id="login-form-div">
			<form id="login-form" action="loginValidation.php" method="post">
				<h3>Username</h3>
				<input type="text" name="username" id="email" placeholder="Username"/>
				<br/>
				<h3>Password</h3>
				<input type="password" name="password" id="password" placeholder="Password"/>
				<br/>
				<br/>
				<input type="submit" value="Login"/>
			</form>
		</div>

	</body>


</html>
