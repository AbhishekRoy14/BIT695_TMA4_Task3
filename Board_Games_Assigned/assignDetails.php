<!-- Server Side Validation for Adding assigned Game -->
<?php
	
	
	$notes = $_POST['notes'];
	$date = $_POST['date'];
	$memberID = $_POST['memberID'];
	$eventID = $_POST['eventID'];
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//On Click of Submit Button start validation
		//Validate Notes
	if (isset($_POST['submit_assignDetails'] )) 
	{
		if (empty ($_POST['notes'])=='POST')
		{
			echo "notes required";				
			exit;
		} 
		else {
			$notes = test_input($_POST["notes"]);
			// check if notes only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z0-9\s ]*$/",$notes)) 
			{
				echo "Only letters and white space allowed for notes";				
				exit;
			}
		}
		
		//Validate date
		if (empty ($_POST['date']))
		{
			echo "date is required";				
			exit;			
		}
						
		//Validate memberID
		if (empty ($_POST['memberID']))
		{
			echo "memberID is required";				
			exit;
		} 
		else {
		$memberID = test_input($_POST["memberID"]);
		// check if memberID only contains numbers
		if (!preg_match("/^[0-9 ]*$/",$memberID)) 
		{
		echo "Only numbers allowed for memberID";		
		exit;
		}
		}
		
		//Validate eventID
		if (empty ($_POST['eventID']))
		{
		echo "eventID is required";			
		exit;
		} 
		else {
		$eventID = test_input($_POST["eventID"]);
		// check if eventID only contains numbers
		if (!preg_match("/^[0-9 ]*$/",$eventID)) 
		{
		echo "Only numbers allowed for eventID";
		
		exit;
		}
		}
		
		}
		
		$host ="localhost"; 	//Host Name for phpMyAdmin
		$uid="root";			//UserID for phpMyAdmin
		$pwd="root";			//Password for phpMyAdmin
		$database="bit695";		//Database Name of phpMyAdmin
		
		$conn=mysqli_connect($host, $uid, $pwd, $database);
		// Check connection
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());	
		
		}
		
		
		else
		//Insert data into board_games_assigned database
		{$stmt = $conn->prepare("INSERT INTO board_games_assigned(notes, date, memberID_fk, eventID_fk)
		VALUES (?, ?, ?, ?)");
		
		// Bind the params 
		$stmt->bind_param('ssii', $notes, $date, $memberID, $eventID);
		
		// Execute the prepared statement 
		$stmt->execute();
		
		// Echo results 
		header("refresh:1; url=addAGConfirm.htm");
		
		// Close the statement 
		$stmt->close();
		
		//Close Connection
		$conn->close();
		}
		
		?>
		
				