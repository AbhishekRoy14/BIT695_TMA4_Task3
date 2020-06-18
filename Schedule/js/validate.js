	
	
/* Start validation.Client-side validation */ 
	
/* 	check the "Event Name" */	
	function validateEventName()
{
  var eventName = document.getElementById('eventName').value;
  if (eventName.length == 0)
  {
  	return "Error Event Name length is zero\n";
  }
  else 
  {
  	return "";
  }
}
	
/* 	check the "venue" */	
		function validateVenue()
{
  var venue = document.getElementById('venue').value;
  if (venue.length == 0)
  {
  	return "Error Venue length is zero\n";
  }
  else 
  {
  	return "";
  }
}

/* 	check Event Start Date  */
function validateStartDate()
{
var startDate = document.getElementById('startDate').value;
if (startDate.length == 0)
  {
  	return "Error Start Date length is zero\n";
  }
  else 
  {
  	return "";
  }  

}

/* 	check Event End Date */	
		function validateEndDate()
{
  var endDate = document.getElementById('endDate').value;
  if (endDate.length == 0)
  {
  	return "Error Event End Date length is zero\n";
  }
  else 
  {
  	return "";
  }
}

/* 	check capacity */	
		function validateCapacity()
{
  var capacity = document.getElementById('capacity').value;
  if (capacity.length == 0)
  {
  	return "Error capacity length is zero\n";
  }
  else 
  {
  	return "";
  }
}

/* 	check BoardgameID */	
		function validateBoardgameID()
{
  var BoardgameID = document.getElementById('BoardgameID').value;
  if (BoardgameID.length == 0)
  {
  	return "Error BoardgameID length is zero\n";
  }
  else 
  {
  	return "";
  }
}


/* 	Validating Data before passing through the server */
function validate() 
{
  var result = validateEventName() + validateVenue() + validateStartDate() + validateEndDate() + validateCapacity() + validateBoardgameID() ;
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
