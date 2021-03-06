
<?php
	include_once 'connectDatabase.php';
	
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
					<h2 style="padding-top: 70px">Members</h2>
					<div class="container">
												
						<?php
							$host = "localhost"; 	//HostName for phpMyAdmin
							$uid="root";			//UserID for phpMyAdmin
							$pwd="root";			//Password for phpMyAdmin
							$database="bit695";		//Database Name of phpMyAdmin
							
							$conn=mysqli_connect($host, $uid, $pwd, $database);
							// Check connection
							if (!$conn) {
								die("Connection failed: " . mysqli_connect_error());	
								
							}
							
							else
								//Deleting data from schedule Database
							{$stmt = $conn->prepare("DELETE FROM schedule WHERE eventID = ?");
								
								/* Bind the params */
								$stmt->bind_param('i', $eventID = $_GET['eventID']);
								
								/* Execute the prepared statement */
								$stmt->execute();
								
								/* results */
								header("refresh:1; url=deleteSConfirm.htm");
								/* Close the statement */
								$stmt->close();
								
								//Closing Connection
								$conn->close();
							}
						?>
						
					</div>
				</section>
			</main>
			<!--Adding footer-->
			<footer>
				<p>Board games aficionados</p><p>1970-2020</p>
			</footer>
		</body>
		
	</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		