

/* Start validation.Client-side validation */ 

/* 	check the "Board Game Name" */	
function validateBoardGameName()
{
	var boardgame = document.getElementById('boardgame').value;
	if (boardgame.length == 0)
	{
		return "Error Board Game Name is length zero\n";
	}
	else 
	{
		return "";
	}
}

/* 	check the "Position" */	
function validatePosition()
{
	var position = document.getElementById('position').value;
	if (position.length == 0)
	{
		return "Error Position is length zero\n";
	}
	else 
	{
		return "";
	}
}

/* 	check Notes */
function validateNotes()
{
	var notes = document.getElementById('notes').value;
	if (notes.length == 0)
	{
		return "Error Notes is length zero\n";
	}
	else 
	{
		return "";
	}  
	
}

/* 	Validating Data before passing through the server */
function validate() 
{
var result = validateBoardGameName() + validatePosition() + validateNotes();
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
