<!-- Server Side Validation for Update assigned Game -->
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
	if (isset($_POST['update_assignedDetails'] )) 
	
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
		else {
			$date = test_input($_POST["date"]);
			// check date format
			
			if (!preg_match("/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/",$date)) 
			{
				echo "Please enter vaild date";				
				exit;
			}
		}
		
	
	//Validate memberID
	if (empty ($_POST['memberID']))
	{
	echo "memberID is required";	
	
	exit;
	} 
	else {
    $memberID = test_input($_POST["memberID"]);
    // check check if memberID only contains numbers
    if (!preg_match("/^[0-9 ]*$/",$memberID)) 
	{
	echo "Only numbers allowed for memberID";
	
	exit;
    }
	}
	
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
			
	
	$host = "localhost"; 	//Host Name for phpMyAdmin
	$uid="root";			//UserID for phpMyAdmin
	$pwd="root";			//Password for phpMyAdmin
	$database="bit695";		//Database Name of phpMyAdmin
	
	$conn=mysqli_connect($host, $uid, $pwd, $database);
	
	//Updating board_games_assigned Database
	$sql = "UPDATE board_games_assigned SET
	notes = '".$_POST["notes"]."' ,
	date = '".$_POST["date"]."' ,
	memberID_fk = '".$_POST["memberID"]."' ,
	eventID_fk = '".$_POST["eventID"]."' ";
	
		
	$query = mysqli_query($conn,$sql);
	if($query) {
	header("refresh:1; url=updateAGConfirm.htm");
	}
	//Connection Close
	mysqli_close($conn);
	
	?>	