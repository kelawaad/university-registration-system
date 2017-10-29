var showingRegistration = true;

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
	// if(!ValidateEmail())
	// 	return false;
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

function ValidateEmail(mail)   
{  
 	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
  	{  
    	return true;  
  	} 
  	else 
  	{ 
    	alert("You have entered an invalid email address!");  
    	return false;
	}
}  

function validatePassword(password) {
	
}

function showLogin()
{
	if(!showingRegistration)
		return;
	showingRegistration = false;
	$('#registration-form-div').fadeOut('fast', function(){
	        $('#login-form-div').fadeIn('fast');
    });
    $("#next-div").fadeOut('fast', function() {
  		$("#previous-div").fadeIn('fast');
  	});
}

function resetRegistrationForm() {
	$("#registration-form").each(function() {
		this.reset();
	});
}

function resetLoginForm() {
	$("#login-form").each(function() {
		this.reset();
	});	
}

function showRegistration()
{
	if(showingRegistration)
		return;
	showingRegistration = true;
    $('#login-form-div').fadeOut('fast', function(){
        $('#registration-form-div').fadeIn('fast');
    });
  	$("#previous-div").fadeOut('fast', function() {
  		$("#next-div").fadeIn('fast');
  	});
  	
}


$("document").ready(function() {
	$("#login-form-div").hide();
	$("#previous-div").hide();

	resetRegistrationForm();
	resetLoginForm();


	$("#next-div").click(function(e){
	    e.preventDefault();
	    showLogin();
	    
	});

	$("#previous-div").click(function(e){
	    e.preventDefault();
	    showRegistration();
	});

	$(document).keydown(function(e) {
		//Check first if a textbox is in focus
	    let key = e.which;
	    if(key == 39)
	    	showLogin();
	    else if(key == 37)
	    	showRegistration();
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
				{
					alert("Username or password is incorrect.");
				}
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
				console.log(typeof response_data);
				var response = [-1, -1, -1, -1];
				for(var i = 0;i < response.length;i++)
				{
					if(response_data.includes(String(i)))
						response[i] = 1;
				}
				if(response[0] === 1) {
					console.log("tamam");
					window.location.href = "chooseDepartment.php";
				}
				else if(response[1] === 1){ 
					console.log("Email is already in use");
					alert("Email alreay in use!!");
					
				}
				else if(response[2] === 1){
					console.log("Username already exists");
					alert("Username already exists");
				}
				else if(response[3] === 1) {

				}
			}
		});
	});

	$("#forgot-username-password-link").click(function(e) {
		e.preventDefault();
		alert("OK");
	});
});

