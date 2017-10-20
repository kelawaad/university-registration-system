function validateForm() {
	let email = document.getElementById("email").value;
	let name = document.getElementById("username").value;
	let password = document.getElementById("password").value;
	
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
