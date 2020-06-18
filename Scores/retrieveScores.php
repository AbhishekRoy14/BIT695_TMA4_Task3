
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
					<li><a href="../Schedule/schedule.htm">Games Schedule</a></li>
					<li><a href="memberScore.htm">Players Score</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<section class="content_pages">
				<img style="padding-top: 50px" id="left_semcircle" src="images/half_circle_left.gif" alt="">
				<img style="padding-top: 50px" id="right_semcircle" src="images/half_circle_right.gif" alt="">
				<h2 style="padding-top: 70px">Players Score</h2>
				<div class="container">
										
					<?php
						
						
						include_once 'connectDatabase.php';
						function select_players_scores($connection) {
							$memberID = $_POST['memberID'];
							$sql = "select * from players_scores where memberID_fk ='$memberID' ";
							$result = $connection -> query($sql);
							return $result;
							
						}
						
						$conn=connect_db($host,$uid,$pwd,$database);
						$result = select_players_scores($conn);
						if ($result->num_rows > 0) {
						//Creating table 
							echo "<table>";
							//fetched data entered into table
							while ($row = $result->fetch_assoc()) {
								
								echo '<tr><td>&nbsp Member ID = &nbsp' . $row["memberID_fk"];
								echo '</td></tr>&nbsp&nbsp<tr><td>&nbsp Scores = &nbsp' . $row['score'];
								echo '</td></tr><tr><td><a href="deleteScores.php?memberID_fk=' . $row['memberID_fk'] . '">delete Score </a>';
								echo '</td></tr><tr><td><a href="editScore.php?memberID_fk=' . $row['memberID_fk'] . '">Edit Score </a>'; 
								echo '</td></tr>';
								
							}
							//Closing Table
							echo '</table>';
							//Warning, if no data is fetched
						} else  echo '0 results';						
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















