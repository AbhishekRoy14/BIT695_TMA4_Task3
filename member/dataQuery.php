
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
					<li><a href="form_table1.htm">Members</a></li>
					<li><a href="../events.html">Weekly Calender</a></li>
					<li><a href="../about.html">About Us</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<section class="content_pages">
				<img style="padding-top: 50px" id="left_semcircle" src="images/half_circle_left.gif" alt="">
				<img style="padding-top: 50px" id="right_semcircle" src="images/half_circle_right.gif" alt="">
				<h2 style="padding-top: 70px">Members Details</h2>
				<div class="container">
					
					
					
					<?php
						
						
						include_once 'connectDatabase.php';
						function select_players($connection) {
							$memberID = $_POST['memberID'];
							$sql = "select * from players where memberID ='$memberID' ";
							$result = $connection -> query($sql);
							return $result;
							
						}
						
						$conn=connect_db($host,$uid,$pwd,$database);
						$result = select_players($conn);
						if ($result->num_rows > 0) {
							//Creating Table
							echo "<table>";
							//fetching data from players database 
							//Storing into table
							while ($row = $result->fetch_assoc()) {
								
								echo '<tr><td>&nbsp Member ID = &nbsp' . $row["memberID"];
								echo '</td></tr>&nbsp&nbsp<tr><td>&nbsp First Name = &nbsp' . $row['FirstName'];
								echo '</td></tr><tr><td>&nbsp Family Name = &nbsp' . $row['FamilyName'];
								echo '</td></tr><tr><td>&nbsp Email = &nbsp' . $row['Email'];
								echo '</td></tr><tr><td>&nbsp Phone No = &nbsp' . $row['Phone'];
								echo '</td></tr><tr><td><a href="deleteData.php?memberID=' . $row['memberID'] . '">Delete Player Record</a>';
								echo '</td></tr><tr><td><a href="editData.php?memberID=' . $row['memberID'] . '">Edit Player Record</a>'; 
								echo '</td></tr>';
								
							}
							//closing table
							echo '</table>';
						//Warning, if no database is fetched	
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
