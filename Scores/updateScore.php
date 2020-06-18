<!-- Server Side Validation for Updating players scores -->
<?php
	
	
	$score = $_POST['score'];
	$memberID = $_POST['memberID'];
	
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//On Click of Submit Button start validation
		//Validate Scores
	if (isset($_POST['update_score'] )) 
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
	}
	
	
	
	$host = "localhost"; 	//HostName for phpMyAdmin
	$uid="root";			//UserID for phpMyAdmin
	$pwd="root";			//Password for phpMyAdmin
	$database="bit695";		//Database Name of phpMyAdmin
	
	//Checking Connection
	$conn=mysqli_connect($host, $uid, $pwd, $database);
	
	//Updaing players_scores Database
	$sql = "UPDATE players_scores SET
	score = '".$_POST["score"]."' ,
	memberID_fk = '".$_POST["memberID"]."' ";
	
	$query = mysqli_query($conn,$sql);
	if($query) {
	
	//Return to URL after updating Database
	header("refresh:1; url=updateMSConfirm.htm");
	}
	
	//Close Connection
	mysqli_close($conn);
	
	?>	