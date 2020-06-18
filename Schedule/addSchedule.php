<!-- Server Side Validation for Adding Schedule -->
<?php
	
	$eventName = $_POST['eventName'];
	$venue = $_POST['venue'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$capacity = $_POST['capacity'];
	$BoardgameID = $_POST['BoardgameID'];
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//On Click of Submit Button start validation
		//Validate EventName
	if (isset($_POST['submit_schedule'] )) 
	{
		if (empty ($_POST['eventName'])=='POST')
		{
			echo "Event Name is required";				
			exit;
		} 
		else {
			$eventName = test_input($_POST["eventName"]);
			// check if name only contains letters, Numbers and whitespace
			if (!preg_match("/^[a-zA-Z0-9\s ]*$/",$eventName)) 
			{
				echo "Only letters, Numbers and white space allowed for Event Name";				
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
			// check if Venue only contains letters, Numbers and whitespace
			if (!preg_match("/^[a-zA-Z0-9\s  ]*$/",$venue)) 
			{
				echo "Only letters, Numbers and white space allowed for venue";				
				exit;
			}
		}
		
	//Validate Start Date	
	if (empty ($_POST['startDate']))
	{
	echo "startDate is required";	
	
	exit;
    }
	
	//Validate End Date
	if (empty ($_POST['endDate']))
	{
	echo "endDate is required";		
	exit;
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
	echo "Only Numbers allowed for Capacity";	
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
	echo "Only Numbers allowed for BoardgameID";	
	exit;
    }
	}	
	}
	
	$host = "localhost"; 	//HostName for phpMyAdmin
	$uid="root";			//UserID for phpMyAdmin
	$pwd="root";			//Password for phpMyAdmin
	$database="bit695";		//Database Name of phpMyAdmin
	
	$conn=mysqli_connect($host, $uid, $pwd, $database);
	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());	
	
	}
	
	else
	//INSERT data into schedule Database
	{$stmt = $conn->prepare("INSERT INTO schedule(eventName, venue, startDate, endDate, capacity, BoardgameID_fk)
	VALUES (?, ?, ?, ?, ?, ?)");
	
	/* Bind the params */
	$stmt->bind_param('sssssi', $eventName, $venue, $startDate, $endDate, $capacity, $BoardgameID);
	
	/* Execute the prepared statement */
	$stmt->execute();
	
	/* Echo results */
	header("refresh:1; url=addSConfirm.htm");
	
	/* Close the statement */
	$stmt->close();
	
	//Close Connection
	$conn->close();
	}
	?>
	
		