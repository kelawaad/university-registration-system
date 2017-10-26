<?php	
	session_start();
?>

<html>
	<body>

	Welcome <?php echo $_SESSION["username"]; ?> <br/>
	Your email address is: <?php echo $_SESSION["password"]; ?>

	</body>
</html> 
