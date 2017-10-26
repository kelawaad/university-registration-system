function validateRegistrationForm() {
	let email = document.getElementById("register-email").value;
	let name = document.getElementById("register-username").value;
	let password = document.getElementById("register-password").value;

	// Add email validation
	
	if (email === null || email === "") {
		alert("Pleae enter an email! ");
		return false;
	}
	if(name === null || name === ""){
		alert("Pleae enter a name! ");
		return false;
	}
	if(password === null || password === ""){
		alert("Please enter a password! ");
		return false;
	}
	return true;
}

function validateLoginForm() {
	let username = document.getElementById("login-username").value;
	let password = document.getElementById("login-password").value;

	if(username === null || username === "")
	{
		alert("Please enter a username");
		return false;
	}
	if(password === false || password === "")
	{
		alert("Please enter a password");
		return false;
	}
	return true;
}

function validatePassword(password) {
	
}


$("document").ready(function() {
	$("#login-form-div").hide();
	$("#previous-div").hide();

	$("#next-div").click(function(e){
	    e.preventDefault();
	    $('#registration-form-div').fadeOut('fast', function(){
	        $('#login-form-div').fadeIn('fast');
	    });
	    $("#next-div").fadeOut('fast', function() {
	  		$("#previous-div").fadeIn('fast');
	  	});
	});

	$("#previous-div").click(function(e){
	    e.preventDefault();
	    $('#login-form-div').fadeOut('fast', function(){
	        $('#registration-form-div').fadeIn('fast');
	    });
	  	$("#previous-div").fadeOut('fast', function() {
	  		$("#next-div").fadeIn('fast');
	  	});
	});

	$("#registration-form").each(function() {
		this.reset();
	});

	$("#login-form").each(function() {
		this.reset();
	});

	$("#login-form").submit(function(e) {
		e.preventDefault();
		
		if(!validateLoginForm())
			return;
	
		var $form = $( this );
		var url = $form.attr( 'action' );
		var username = $("#login-username").val();
		var password = $("#login-password").val();
		$.ajax({
			url: url,
			type:  "POST",
			data: {username: username, password: password},
			success: function(response_data) {
				console.log(response_data);
				if(response_data === "0")
				{
					window.location.href = "chooseDepartment.php";
				}
				else if(response_data === "1")
				{
					window.location.href = "courses.php";
				}
				else
					console.log("Should appear an error");
			}
		});
	});

	$("#registration-form").submit(function(e) {
		e.preventDefault();

		if(!validateRegistrationForm())
			return;
		
		var $form = $(this);
		var url = $form.attr('action');
		
		var username = $("#register-username").val();
		var password = $("#register-password").val();
		var email = $("#register-email").val();

		$.ajax({
			url: url,
			type: "POST",
			data: {email: email, username: username, password: password},
			success: function(response_data) {
				console.log(response_data);
				if(response_data === "0") {
					console.log("tamam");
				}
				else if(response_data === "-1"){ 
					console.log("Username already exists");
				}
				else if(response_data === "-2"){
					console.log("Email is already in use");
				}
			}
		});
	});
});

