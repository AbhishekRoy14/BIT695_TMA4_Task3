<!-- Server Side Validation for Adding Scores to Players -->
<?php
		
	$score = $_POST['score'];
	$memberID = $_POST['memberID'];
	$eventID = $_POST['eventID'];
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//On Click of Submit Button start validation
		//Validate Scores
	if (isset($_POST['submit_addScores'] )) 
	{
		
		if (empty ($_POST['score']))
		{
			echo "score is required";				
			exit;
		} 
		else {
			$score = test_input($_POST["score"]);
			// check if score only contains Numbers
			if (!preg_match("/^[0-9 ]*$/",$score)) 
			{
				echo "Only Numbers allowed for score";				
				exit;
			}
		}
						
		//Validate Member ID
		if (empty ($_POST['memberID']))
		{
			echo "memberID is required";				
			exit;
		} 
	else {
    $memberID = test_input($_POST["memberID"]);
    // check if Member ID only contains Numbers
    if (!preg_match("/^[0-9 ]*$/",$memberID)) 
	{
	echo "Only Numbers allowed for memberID";	
	exit;
    }
	}
	
	//Validate Event ID
	if (empty ($_POST['eventID']))
	{
	echo "eventID is required";		
	exit;
	} 
	else {
    $eventID = test_input($_POST["eventID"]);
    // check if Event ID only contains Numbers
    if (!preg_match("/^[0-9 ]*$/",$eventID)) 
	{
	echo "Only Numbers allowed for eventID";	
	exit;
    }
	}		
	}
	
	$host ="localhost"; 	//HostName for phpMyAdmin
	$uid="root";			//UserID for phpMyAdmin
	$pwd="root";			//Password for phpMyAdmin
	$database="bit695";		//Database Name of phpMyAdmin
	
	$conn=mysqli_connect($host, $uid, $pwd, $database);
	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());	
	
	}
		
	else
		//Inserting data into players_scores Database
	{$stmt = $conn->prepare("INSERT INTO players_scores(score, memberID_fk, eventID_fk)
	VALUES (?, ?, ?)");
	
	/* Bind the params */
	$stmt->bind_param('iii', $score, $memberID, $eventID);
	
	/* Execute the prepared statement */
	$stmt->execute();
	
	/* Echo results */
	header("refresh:1; url=addMSConfirm.htm");
	
	/* Close the statement */
	$stmt->close();
	
	//Close Connection
	$conn->close();
	}
	
	?>
	
	
		