<?php
	session_start();
	session_unset();
	header("Location: registration.php");
	die();
?>