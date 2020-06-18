<?php
	
	$host = "localhost"; 	//HostName for phpMyAdmin
	$uid="root";			//UserID for phpMyAdmin
	$pwd="root";			//Password for phpMyAdmin
	$database="bit695";		//Database Name of phpMyAdmin
		
	$memberID = null;
	
	if(isset($_GET["memberID_fk"]))
	{
		$memberID_fk = $_GET["memberID_fk"];
	}
	
	$conn=mysqli_connect($host, $uid, $pwd, $database);
	
	$sql = "SELECT * FROM players_scores WHERE memberID_fk = '".$memberID_fk."' ";
	
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
			document.forms['table1'].action = 'updateScore.php';   
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
					<li><a href="../Schedule/schedule.htm">Games Schedule</a></li>
					<li><a href="memberScore.htm">Players Score</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<section class="content_pages">
				<img style="padding-top: 50px" id="left_semcircle" src="images/half_circle_left.gif" alt="">
				<img style="padding-top: 50px" id="right_semcircle" src="images/half_circle_right.gif" alt="">
				<h2 style="padding-top: 70px">Edit Player Score</h2>
				<div class="container">
					<!--Adding Form-->
					<form id="form" name="table1" onsubmit="return validate()" action="updateScore.php"  method="POST">
						<fieldset>							
							<div  class="form">
								<form id="contactform"> 
								
									<p class="contact"><label for="memberID">Member ID</label></p> 
									<input id="memberID" name="memberID" placeholder="Member ID" required  pattern="[0-9]+" 
									title="Numbers Only!" type="text" readonly = "readonly" tabindex="1"
									value="<?php echo $result["memberID_fk"];?>"/>
									
									<p class="contact"><label for="score">Player Score </label></p> 
									<input id="score" name="score" placeholder="Player Score " required pattern="[0-9]+" 
									title="Numbers Only!" type="text" tabindex="2" 
									value="<?php echo $result["score"];?>"/> 
																											
									<input class="buttom" type="submit" name="update_score"  value="Update"  onclick="update();" tabindex="3" />
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
