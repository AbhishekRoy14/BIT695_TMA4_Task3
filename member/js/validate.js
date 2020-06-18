	
	
/* Start validation.Client-side validation */ 
	
/* 	check the "firstname" */	
	function validateFirstname()
{
  var firstname = document.getElementById('firstname').value;
  if (firstname.length == 0)
  {
  	return "Error username is length zero\n";
  }
  else 
  {
  	return "";
  }
}
	
/* 	check the "familyName" */	
		function validateFamilyname()
{
  var familyname = document.getElementById('familyname').value;
  if (familyname.length == 0)
  {
  	return "Error familyname is length zero\n";
  }
  else 
  {
  	return "";
  }
}

/* 	check email address */
function validateEmail()
{
var email = document.getElementById('email').value;
if (email.length == 0)
  {
  	return "Error email is length zero\n";
  }
  else 
  {
  	return "";
  }  

}

/* 	check phone number */	
		function validatePhone()
{
  var phone = document.getElementById('phone').value;
  if (phone.length == 0)
  {
  	return "Error phone is length zero\n";
  }
  else 
  {
  	return "";
  }
}
/* 	Validating Data before passing through the server */
function validate() 
{
  var result = validateFirstname() + validateFamilyname() + validateEmail() + validatePhone();
  alert("result = " + result);   // should be nothing if fields validate
  if ( result == "" )
  { 
  	alert("Data Added successfully"); 
  	return true; 
  }
  else 
  {
    alert("Errors in entering the Data");
    return false;
  }
  
}
