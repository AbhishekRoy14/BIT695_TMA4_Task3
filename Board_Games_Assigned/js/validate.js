	
	
/* Start validation.Client-side validation */ 
	
/* 	check the "EventID" */	
	function validateEventID()
{
  var eventID = document.getElementById('eventID').value;
  if (eventID.length == 0)
  {
  	return "Error EventID is length zero\n";
  }
  else 
  {
  	return "";
  }
}
	
/* 	check Date */	
		function validateDate()
{
  var date = document.getElementById('date').value;
  if (date.length == 0)
  {
  	return "Error date is length zero\n";
  }
  else 
  {
  	return "";
  }
}

/* 	check Notes related to event */
function validateEventNotes()
{
var notes = document.getElementById('notes').value;
if (notes.length == 0)
  {
  	return "Error Event Notes length is zero\n";
  }
  else 
  {
  	return "";
  }  

}

/* 	check MemberID */	
		function validateMemberID()
{
  var memberID = document.getElementById('memberID').value;
  if (memberID.length == 0)
  {
  	return "Error MemberID is length zero\n";
  }
  else 
  {
  	return "";
  }
}
/* 	Validating Data before passing through the server */
function validate() 
{
  var result = validateEventID() + validateDate() + validateEventNotes() + validateMemberID();
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
