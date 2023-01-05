// validator.js
// An example of input validation using the change and submit events

// The event handler function for the name text box
function chkName() {
	var theName = document.getElementById("firstName");
	//alert("" + theName.value);
	
	var pos = theName.value.search(/^[A-Z][a-z]+$/);
	if (pos!=0) {
	   alert("The name you entered (" + theName.value + 
		   ") is not in the correct form.  Please fix your name.");
			
	   theName.select();
	   theName.focus();
	   return false;
	}
	else
	   return true;
}

function chkLastName() {
	var theName = document.getElementById("lastName");
	//alert("" + theName.value);

	var pos = theName.value.search(/^[A-Z][A-Za-z]+$/);
	if (pos != 0) {
		alert("The name you entered (" + theName.value +
			") is not in the correct form.  Please fix your name.");

		theName.select();
		theName.focus();
		return false;
	}
	else
		return true;
}

function chkEmail() {
	var email = document.getElementById("email");
	//alert("" + email.value);

	var pos = email.value.search(/^[a-z]+.[a-z]+@snc.edu$/); //only snc students can sign up
	if (pos!=0) {
	   alert("The email you entered (" + email.value + 
		  ") is not in the correct form.  Please fix your email.");
			
	   email.focus();
	   email.select();
	   return false;
	}
	else
	   return true;
}

function chkPassword() {
	var thePassword = document.getElementById("password");
	//alert("" + thePassword.value);
	
	// Test the format of the password
	if (thePassword.value.length < 6) {
	   alert("The password you entered is too short ... must be at least 6 characters");
	   thePassword.focus();
	   thePassword.select();
	   return false;
	}
	else
	   return true;
}
function submitMe() {
	//if (chkName() && chkEmail() && chkPassword())
	if(chkName() && chkLastName() && chkEmail() && chkPassword())
		return true;
	return false;
}

const existEmail = document.getElementById('email');
var emailValid = false;
existEmail.addEventListener('change', function () {
	const email = existEmail.value;
	if (!(email.includes("@snc.edu"))) {
		emailValid = true;
    }
});

function login() {
	if (chkEmail() && chkPassword())
		return true;
	return false;
}



