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
	 if(!ValidateEmail(email) || !validatePassword(password))
	 	return false;
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
	var patt1 = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; 
 	if (patt1.test(mail))  
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
	var patt1 = new RegExp("[!@#$%^&*()><?/`~+=_-}{']");
	var patt2 = new RegExp("[0-9]");
	var patt3 = new RegExp("[a-z]");
	var patt4 = new RegExp("[A-Z]");
	if(!patt1.test(password) || !patt2.test(password) || !patt3.test(password) || !patt4.test(password) || password.length < 6)
	{
		alert("Password must be at least 6 character and contains at least 1 lowercase, uppercase, special character");
		return false;
	}
	return true;
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

function changeTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}


$("document").ready(function() {
	$("#login-form-div").hide();
	$("#previous-div").hide();

	resetRegistrationForm();
	resetLoginForm();


	$(window).click(function(e) {
		if(e.target == modal)
			modal.style.display = "none";
	});

	var modal = document.getElementById('myModal');
	$("#forgot-username-password-link").click(function(){
		modal.style.display = "block";
		document.getElementsByClassName("tabcontent")[0].style.display = "block";
		var tab1 = document.getElementById("tab1");
		tab1.className += " active";
	});

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
		if($("#login-username").is(":focus") || $("#login-password").is(":focus"))
			return;
		if($("#register-username").is(":focus") || $("#register-passwrd").is(":focus") || $("#register-email").is(":focus"))
			return;
	    let key = e.which;
	    if(key == 39)
	    	showLogin();
	    else if(key == 37)
	    	showRegistration();
	    else if(key == 27) {
	    	var tab1 = document.getElementById("tab1");
	    	if(tab1.className.includes("active")) {
	    		document.getElementById('myModal').style.display = "none";
	    		tab1.className = tab1.className.replace(" active", "");
	    	}
	    	$(document).focus();
	    }
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

	$("#forgot-username-form").submit(function(e) {
		e.preventDefault();
		var email = $("#forgot-username-email").val();
		if(!ValidateEmail(email)) {
			return;
		}

		$.ajax({
			url: 'forgotUsername.php',
			type: "POST",
			data: {email: email},
			success: function(response) {
				console.log(response);
			}
		});

    	var tab1 = document.getElementById("tab1");
    	if(tab1.className.includes("active")) {
    		document.getElementById('myModal').style.display = "none";
    		tab1.className = tab1.className.replace(" active", "");
    	}
    	$(document).focus();
	});

	$("#forgot-password-form").submit(function(e) {
		e.preventDefault();
		var email = $("#forgot-password-email").val();
		if(!ValidateEmail(email)) {
			return;
		}



    	var tab2 = document.getElementById("tab2");
    	if(tab2.className.includes("active")) {
    		document.getElementById('myModal').style.display = "none";
    		tab2.className = tab2.className.replace(" active", "");
    	}
    	$(document).focus();
	});


});

