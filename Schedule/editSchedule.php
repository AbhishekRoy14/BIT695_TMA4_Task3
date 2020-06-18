<?php
	
	$host = "localhost"; 	//HostName for phpMyAdmin
	$uid="root";			//UserID for phpMyAdmin
	$pwd="root";			//Password for phpMyAdmin
	$database="bit695";		//Database Name of phpMyAdmin
	
	
	
	$eventID = null;
	
	if(isset($_GET["eventID"]))
	{
		$eventID = $_GET["eventID"];
	}
	
	$conn=mysqli_connect($host, $uid, $pwd, $database);
	
	$sql = "SELECT * FROM schedule WHERE eventID = '".$eventID."' ";
	
	$query = mysqli_query($conn,$sql);
	
	$result=mysqli_fetch_array($query,MYSQLI_ASSOC);
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!--Adding Responsive code-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--Adding CSS file to the webpage-->
		<link rel="stylesheet" href="css/style.css">
		<!--calls to set_form_date.js  -->
		<script type="text/javascript" src="js/set_form_date.js"></script>
		<!--calls to validate.js  -->
		<script type="text/javascript" src="js/validate.js"></script>
		<!--Adding jquery-->
		<script>
			function update()
			{
			document.forms['table1'].action = 'updateEvent.php';   
			document.forms['table1'].submit();
			}
		</script>
	</head>
	
	<body>
		<header>
			<h1>Board games aficionados</h1>
			<nav id="follow_me">
				<ul>
				<li><a href="../index.html">Home</a></li>
                <li><a href="../Board_Games/boardgames.htm">Games</a></li>
                <li><a href="../Board_Games_Assigned/gamesAssigned.htm">Assign Games</a></li>
				<li><a href="schedule.htm">Games Schedule</a></li>
                <li><a href="../Scores/memberScore.htm">Players Score</a></li>
				</ul>
				</nav>
				</header>
				<main>
				<section class="content_pages">
				<img style="padding-top: 50px" id="left_semcircle" src="images/half_circle_left.gif" alt="">
				<img style="padding-top: 50px" id="right_semcircle" src="images/half_circle_right.gif" alt="">
				<h2 style="padding-top: 70px">Edit Players Assigned Games</h2>
				<div class="container">
				<!--Adding Form-->
				<form id="form" name="table1" onsubmit="return validate()" action="updateEvent.php"  method="POST">
				<fieldset>
				    
				<div  class="form">
				<form id="contactform"> 
    			<p class="contact"><label for="eventID">Event ID </label></p> 
    			<input id="eventID" name="eventID" placeholder="Event ID - Required for retreving Data Only" required pattern="[0-9]+" 
				title="eventID can't be changed!" type="text" readonly="readonly" tabindex="1" 
				value="<?php echo $result["eventID"];?>"/> 
				
				<p class="contact"><label for="eventName">Event Name</label></p> 
				<input id="eventName" name="eventName" placeholder="Event Name" type="text" required pattern="[A-Za-z0-9\s]+" 
				title="Please enter letters and Numbers only!" tabindex="2" 
				value="<?php echo $result["eventName"];?>"/> 
				
				<p class="contact"><label for="venue">Venue</label></p> 
				<input id="venue" name="venue" placeholder="venue" required  pattern="[A-Za-z0-9\s]+" 
				title="Please enter letters and Numbers Only!" type="text" tabindex="3"
				value="<?php echo $result["venue"];?>"/>
				
    			<p class="contact"><label for="startDate">Event Start Date</label></p> 
				<input id="startDate" name="startDate" placeholder="Event Start Date" type="date" required pattern=""
				title="Date!" tabindex="4" 
				value="<?php echo $result["startDate"];?>"/>
				
				<p class="contact"><label for="endDate">Event End Date</label></p> 
				<input id="endDate" name="endDate" placeholder="Event End Date" required pattern=" "
				title="date!"  type="date" tabindex="5"
				value="<?php echo $result["endDate"];?>"/>
				
				<p class="contact"><label for="capacity">Capacity</label></p> 
				<input id="capacity" name="capacity" placeholder="Event Capacity" required pattern="[0-9]+"
				title="Numbers Only!"  type="text" tabindex="6"
				value="<?php echo $result["capacity"];?>"/>
				
				<p class="contact"><label for="BoardgameID">Boardgame ID</label></p> 
				<input id="BoardgameID" name="BoardgameID" placeholder="Boardgame ID" required  pattern="[0-9]+" 
				title="Numbers only!" type="text" tabindex="7"
				value="<?php echo $result["BoardgameID_fk"];?>"/>
				
				<input class="buttom" type="button" name="update_eventDetails"  value="Update"  onclick="update();" tabindex="8" />
				</form>
				</div>      
				</fieldset>								
				</form> 								
				</div>
				</section>
				</main>
				<!--Adding footer-->
				<footer>
				<p>Board games aficionados</p><p>1970-2020</p>
				</footer>
				</body>
				
				</html>
				
								