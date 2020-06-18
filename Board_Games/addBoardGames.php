
<!-- Server Side Validation for Adding Board Game -->
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
		if (isset($_POST['submit_games'] )) 
		{
		if (empty ($_POST['boardgame'])=='POST')
		{
			echo "Boardgame is required";	
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
		echo "Please enter vaild notes";
		exit;
		}
		}
		}
		
		$host ="localhost"; //HostName for phpMyAdmin
		$uid="root";		//UserID for phpMyAdmin
		$pwd="root";		//Password for phpMyAdmin
		$database="bit695";	//Database Name of phpMyAdmin
		
		$conn=mysqli_connect($host, $uid, $pwd, $database);
		// Check connection
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());	
		
		}
		
		else
		//Insert data into Boardgame Database
		{$stmt = $conn->prepare("INSERT INTO boardgames(Boardgame, Position, Notes)
		VALUES (?, ?, ?)");
		
		// Bind the params 
		$stmt->bind_param('sss', $boardgame, $position, $notes);
		
		// Execute the prepared statement 
		$stmt->execute();
		
		// Echo results 	
		header("refresh:1; url=addGConfirm.htm");
		
		// Close the statement 
		$stmt->close();
		
		// Close Connection 
		$conn->close();
		}
		
		?>
		
				