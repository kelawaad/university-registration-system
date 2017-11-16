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
	if(!validatePassword()) {
		alert("Password must be at least 6 character and contains at least 1 lowercase, uppercase, special character");
		console.log(password);
		return false;
	}
	return true;

}

function validatePassword(password) {
	var patt1 = new RegExp("[!@#$%&*()><?/`~+=_-}{']");
	var patt2 = new RegExp("[0-9]");
	var patt3 = new RegExp("[a-z]");
	var patt4 = new RegExp("[A-Z]");
	if(!patt2.test(password) || !patt3.test(password) || !patt4.test(password) || password.length < 6)
		return false;
	return true;
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
			data: {user_id: user_id, new_password:password},
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