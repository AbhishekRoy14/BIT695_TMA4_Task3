<?php
	
	$host = "localhost"; 	//Host Name for phpMyAdmin
	$uid="root";			//UserID for phpMyAdmin
	$pwd="root";			//Password for phpMyAdmin
	$database="bit695";		//Database Name of phpMyAdmin
	
	
	
	$BoardgameID = null;
	
	if(isset($_GET["BoardgameID"]))
	{
		$BoardgameID = $_GET["BoardgameID"];
	}
	// Check connection
	$conn=mysqli_connect($host, $uid, $pwd, $database);
	//Creating a Select query
	$sql = "SELECT * FROM boardgames WHERE BoardgameID = '".$BoardgameID."' ";
	
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
			document.forms['table1'].action = 'updateGameDetails.php';   
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
			<li><a href="boardgames.htm">Games</a></li>
			<li><a href="../Board_Games_Assigned/gamesAssigned.htm">Assign Games</a></li>
			<li><a href="../Schedule/schedule.htm">Games Schedule</a></li>
			<li><a href="../Scores/memberScore.htm">Players Score</a></li>
            </ul>
			</nav>
			</header>
			<main>
			<section class="content_pages">
            <img style="padding-top: 50px" id="left_semcircle" src="images/half_circle_left.gif" alt="">
            <img style="padding-top: 50px" id="right_semcircle" src="images/half_circle_right.gif" alt="">
            <h2 style="padding-top: 70px">Edit Game Detials</h2>
            <div class="container">
			
			<form id="form" name="table1" onsubmit="return validate()" action="updateGameDetails.php"  method="POST">
			<fieldset>
			<!--Adding Form-->     
			<div  class="form">
    		<form id="contactform"> 
			<p class="contact"><label for="name">BoardgameID </label></p> 
			<input id="BoardgameID" name="BoardgameID" placeholder="BoardgameID - Required for retreving Data Only" required pattern="[0-9]+" 
			title="BoardgameID can't be changed!" type="text" readonly="readonly" tabindex="1" 
			value="<?php echo $result["BoardgameID"];?>"/> 
			
			<p class="contact"><label for="name">Board Games</label></p> 
			<input id="boardgame" name="boardgame" placeholder="First Name" type="text" required pattern="[A-Za-z]+" 
			title="Please enter letters only!" tabindex="2" 
			value="<?php echo $result["Boardgame"];?>"/> 
			
			<p class="contact"><label for="position">Position</label></p> 
			<input id="position" name="position" placeholder="Position" required  pattern="[A-Za-z\s]+" 
			title="Numbers only!" type="text" tabindex="3"
			value="<?php echo $result["Position"];?>"/>
			
			<p class="contact"><label for="notes">Notes</label></p> 
			<input id="notes" name="notes" placeholder="Membership Information" type="text" required pattern="[A-Za-z\s]+"
			title="Please enter letters only!" tabindex="4" 
			value="<?php echo $result["Notes"];?>"/>
			            
			<input class="buttom" type="button" name="update_gameDetails"  value="Update"  onclick="update();" tabindex="5" />
			
			</form>
			</div>      
            </fieldset>						
			</form> 						
			</div>
			</section>
			</main>
			<!--Adding Footer-->
			<footer>
			<p>Board games aficionados</p><p>1970-2020</p>
			</footer>
			</body>			
			</html>
			
						