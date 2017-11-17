function validateFrom() {
	let password = document.getElementById("password-box").value;
	let passwordConfirm = document.getElementById("confirm-password-box").value;
	if(password === null || password === "")
	{
		alert("Please enter a password");
		return false;
	}
	if(passwordConfirm === null || passwordConfirm === "")
	{
		alert("Please confirm your password");
		return false;
	}
	if(password != passwordConfirm) {
		alert("Your password don't match!");
		return false;
	}
	if(!validatePassword(password)) {
		alert("Password must be at least 8 character and contains at least 1 lowercase, uppercase, special character");
		return false;
	}
	return true;

}

function validatePassword(password) {
	var regExp = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
	return regExp.test(password);

}

$("document").ready(function() {

	$("#reset-password-form").submit(function(e) {
		e.preventDefault();
		if(!validateFrom())
			return false;
		console.log("Submitting");

		let password = document.getElementById("password-box").value;
		$.ajax({
			url: 'changePassword.php',
			method: 'POST',
			data: {user_id: user_id, new_password:password, token: token},
			success: function(response) {
				if(response === "1") {
					alert("An error has occured please try again later");
				} else if(response === "0") {
					alert("Your password was successfuly changed!");
					window.location.href = 'registration.php';
				}
			}
		});

	});
});