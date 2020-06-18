<!-- Server Side Validation for Updating Member Details -->
<?php
		
	$firstname = $_POST['firstname'];
	$familyname = $_POST['familyname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//On Click of Submit Button start validation
		//Validate FirstName
	if (isset($_POST['update_details'] )) 
	{
		if (empty ($_POST['firstname'])=='POST')
		{
			echo "First Name is required";	
			exit;
		} 
		else {
			$firstname = test_input($_POST["firstname"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z\s ]*$/",$firstname)) 
			{
				echo "Only letters and white space allowed";
				exit;
			}
		}
		
		//Validate FamilyName
		if (empty ($_POST['familyname']))
		{
			echo "familyname is required";	
			exit;
		} 
		else {
			$familyname = test_input($_POST["familyname"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z\s ]*$/",$familyname)) 
			{
				echo "Only letters and white space allowed";
				exit;
			}
		}
		
		//Validate Email
		if (empty ($_POST['email']))
		{
		echo "email is required";	
		exit;
		} 
		else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
		echo "Only vaild email address allowed";
		exit;
		}
		}
		
		//Validate Phone
		if (empty ($_POST['phone']))
		{
		echo "phone is required";	
		exit;
		} 
		else {
		$phone = test_input($_POST["phone"]);
		// check if phone Number is valid
		if (!preg_match("/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/",$phone)) 
		{
		echo "A valid NZ phone or mobile number is required";
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

		//Updating players database
		$sql = "UPDATE players SET
		FirstName = '".$_POST["firstname"]."' ,
		FamilyName = '".$_POST["familyname"]."' ,
		Email = '".$_POST["email"]."' ,
		Phone = '".$_POST["phone"]."' 
		
		WHERE memberID = '".$_POST["memberID"]."' ";
		
		$query = mysqli_query($conn,$sql);
		if($query) {
		
		header("refresh:1; url=updateConfirm.htm");
		}
		
		//Connection Close
		mysqli_close($conn);
		
		?>		