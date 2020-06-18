	
	
/* Start validation.Client-side validation */ 
	
/* 	check the "memberID" */	
	function validateMemberID()
{
  var memberID = document.getElementById('memberID').value;
  if (memberID.length == 0)
  {
  	return "Error MemberID length is zero\n";
  }
  else 
  {
  	return "";
  }
}
	
/* 	check the "score" */	
		function validateScore()
{
  var score = document.getElementById('score').value;
  if (score.length == 0)
  {
  	return "Error score length is zero\n";
  }
  else 
  {
  	return "";
  }
}

/* 	check eventID */
function validateEventID()
{
var eventID = document.getElementById('eventID').value;
if (eventID.length == 0)
  {
  	return "Error eventID length is zero\n";
  }
  else 
  {
  	return "";
  }  

}


/* 	Validating Data before passing through the server */
function validate() 
{
  var result = validateMemberID() + validateScore() + validateEventID();
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
