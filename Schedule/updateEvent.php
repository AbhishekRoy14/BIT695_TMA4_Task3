<!-- Server Side Validation for Updating Schedule -->
<?php
	
	$eventName = $_POST['eventName'];
	$venue = $_POST['venue'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$capacity = $_POST['capacity'];
	$BoardgameID = $_POST['BoardgameID'];
	$eventID = $_POST['eventID'];
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//On Click of Submit Button start validation
		//Validate EventName
	if (isset($_POST['update_eventDetails'] )) 
	{
		if (empty ($_POST['eventName'])=='POST')
		{
			echo "Event Name is required";				
			exit;
		} 
		else {
			$eventName = test_input($_POST["eventName"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z0-9\s ]*$/",$eventName)) 
			{
				echo "Only letters, Numbers and white space allowed for eventName";				
				exit;
			}
		}
		
		//Validate Venue
		if (empty ($_POST['venue']))
		{
			echo "venue is required";	
			
			exit;
		} 
		else {
			$venue = test_input($_POST["venue"]);
			// check if Venue only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z0-9\s]*$/",$venue)) 
			{
				echo "Only letters, Numbers and white space allowed for venue";				
				exit;
			}
		}
		
	// Validate Start Date
	if (empty ($_POST['startDate']))
	{
	echo "Start Date is required";	
	
	exit;
	} 
	else {
    $startDate = test_input($_POST["startDate"]);
    // check if a valid date formate is used
	//if (checkdate ( $month, $day, $year ),$startDate)
    if (!preg_match("/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/",$startDate)) 
	{
	echo "Please enter vaild Start Date";	
	exit;
    }
	}
	
	//Validate End Date
	if (empty ($_POST['endDate']))
	{
	echo "End Date is required";		
	exit;
	} 
	else {
    $endDate = test_input($_POST["endDate"]);
    // check if name only contains letters and whitespace
	//if (checkdate ( $month, $day, $year ),$endDate)
    if (!preg_match("/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/",$endDate)) 
	{
	echo "Please enter vaild End Date";	
	exit;
    }
	}
	
	//Validate Capacity
	if (empty ($_POST['capacity']))
	{
	echo "capacity is required";		
	exit;
	} 
	else {
    $capacity = test_input($_POST["capacity"]);
    // check if Capacity only contains Numbers
    if (!preg_match("/^[0-9]*$/",$capacity))
	{
	echo "Please enter vaild capacity";
	
	exit;
    }
	}
	
	//Validate BoardgameID
	if (empty ($_POST['BoardgameID']))
	{
	echo "BoardgameID is required";	
	
	exit;
	} 
	else {
    $BoardgameID = test_input($_POST["BoardgameID"]);
    // check if BoardgameID only contains Numbers
    if (!preg_match("/^[0-9 ]*$/",$BoardgameID))
	{
	echo "Please enter vaild BoardgameID";	
	exit;
    }
	}
	
	//Validate EventID
	if (empty ($_POST['eventID']))
	{
	echo "eventID is required";		
	exit;
	} 
	else {
    $eventID = test_input($_POST["eventID"]);
    // check if eventID only contains Numbers
    if (!preg_match("/^[0-9 ]*$/",$eventID))
	{
	echo "Please enter vaild eventID";	
	exit;
    }
	}	
	}
	
	
	$host = "localhost"; 	//HostName for phpMyAdmin
	$uid="root";			//UserID for phpMyAdmin
	$pwd="root";			//Password for phpMyAdmin
	$database="bit695";		//Database Name of phpMyAdmin
	
	//Checking Connection
	$conn=mysqli_connect($host, $uid, $pwd, $database);
	
	//Updating Schedule Database
	$sql = "UPDATE schedule SET
	eventName = '".$_POST["eventName"]."' ,
	venue = '".$_POST["venue"]."' ,
	startDate = '".$_POST["startDate"]."' ,
	endDate = '".$_POST["endDate"]."' ,
	capacity = '".$_POST["capacity"]."' ,
	BoardgameID_fk = '".$_POST["BoardgameID"]."' 
	
	WHERE eventID = '".$_POST["eventID"]."' ";
	
	$query = mysqli_query($conn,$sql);
	if($query) {
	
	header("refresh:1; url=updateSConfirm.htm");
	}
	
	//Close Connection
	mysqli_close($conn);
	
	?>	