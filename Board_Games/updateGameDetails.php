<!-- Server Side Validation for Updating Board Game -->
<?php
	
	$boardgame = $_POST['boardgame'];
	$position = $_POST['position'];
	$notes = $_POST['notes'];
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//On Click of Submit Button start validation
		//Validate BoardGame
	if (isset($_POST['update_gameDetails'] )) 
	{
		if (empty ($_POST['boardgame'])=='POST')
		{
			echo "BoardGame Name is required";	
			exit;
		} 
		else {
			$boardgame = test_input($_POST["boardgame"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z\s ]*$/",$boardgame)) 
			{
				echo "Only letters and white space allowed for boardgame";				
				exit;
			}
		}
		
		//Validate Position
		if (empty ($_POST['position']))
		{
			echo "position is required";				
			exit;
		} 
		else {
			$position = test_input($_POST["position"]);
			// check if position only contains letters and whitespace
			if (!preg_match("/^[A-Za-z\s]*$/",$position)) 
			{
				echo "Only letters and white space allowed for position";				
				exit;
			}
		}
		
		//Validate Notes
		if (empty ($_POST['notes']))
		{
			echo "notes is required";				
		exit;
		} 
		else {
		$notes = test_input($_POST["notes"]);
		// check if notes only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z\s ]*$/",$notes))
		{
		echo "Only letters and white space allowed for position";		
		exit;
		}
		}		
		}
		
		
		$host = "localhost"; 	//HostName for phpMyAdmin
		$uid="root";			//UserID for phpMyAdmin
		$pwd="root";			//Password for phpMyAdmin
		$database="bit695";		//Database Name of phpMyAdmin
		
		// Check connection
		$conn=mysqli_connect($host, $uid, $pwd, $database);
		
		//Updatind BoardGame Database
		$sql = "UPDATE boardgames SET
		Boardgame = '".$_POST["boardgame"]."' ,
		Position = '".$_POST["position"]."' ,
		Notes = '".$_POST["notes"]."' 
		
		WHERE BoardgameID = '".$_POST["BoardgameID"]."' ";
		
		$query = mysqli_query($conn,$sql);
		if($query) {
		
		//URL for update database confirmation
		header("refresh:1; url=updateGConfirm.htm");
		}
		
		//Close Connection
		mysqli_close($conn);
		
		?>		