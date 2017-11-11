<?php
	$email = $_POST["email"];
	$subject = "Alexandria University | Account Restore";
	mail($email, $subject, "Hello User,\nPlease follow this link in order to restore your account: https://google.com.\n\nBest Regards,\nAlexandria University IT support.");
	echo 'Hello';

?>