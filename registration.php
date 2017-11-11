<?php
	session_start();
	session_unset();

?>

<!DOCTYPE html>
<html>
	<head>	
		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="js/registration.js"></script>
		<link rel="stylesheet"  href="css/registration.css">
		<link rel="icon" href="images/university_favicon.ico">
		<title>University Registration System</title>
		
	</head>


	<body>
		<header id="main-header">
			<div class="container">
				<h3 unselectable="on" onselectstart="return false;" onmousedown="return false;">Alexandria University</h3>
			</div>
		</header>
		<div id="myModal" class="modal">
		 	<div class="modal-content">
		    	<div class="tab">
					<button class="tablinks" id="tab1" onclick="changeTab(event, 'Username')">Forgot Username</button>
					<button class="tablinks" onclick="changeTab(event, 'Password')">Forgot Password</button>
				</div>

				<div id="Username" class="tabcontent">
				  <form id="forgot-username-form">
				  	<h2>Email</h2>
				  	<input type="text" name="forgot-username-email" id="forgot-username-email" placeholder="Email"/>
				  	<br/>
				  	<input type="submit" id="forgot-username-submit"></button>
				  </form>
				  
				</div>

				<div id="Password" class="tabcontent">
				  <form id="forgot-password-form">
				  	<h2>Email</h2>
				  	<input type="text" name="forgot-password-email" id="forgot-password-email" placeholder="Email"/>
				  	<br/>
				  	<h2>Username</h2>
				  	<input type="text" name="forgot-password-username" id="forgot-password-username" placeholder="Username"/>
				  	<br/>
				  	<input type="submit" id="forgot-password-submit"></button>
				  </form>
				</div>
	  		</div>
		</div>
		<div id="forms-div">
			<div id="previous-div">
				<img src="images/left-arrow.jpg" id="previous"/>
			</div>
			<div id="next-div">
				<img src="images/right-arrow.png" id="next"/>
			</div>
			<div id="registration-form-div">
				<form id="registration-form" action="signupValidation.php" method="post">
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
				<form id="login-form" action="loginValidation.php" method="post">
					<h3>Username</h3>
					<input type="text" name="username" id="login-username" placeholder="Username"/>
					<h3>Password</h3>
					<input type="password" name="password" id="login-password" placeholder="Password"/>
					<br/>
					<br/>
					<input type="submit" value="Login"/>
				</form>
					<a href="#" id="forgot-username-password-link">Forgot Username/Password</a>
			</div>
		</div>
	</body>


</html>
