<?php
	
	$host = "localhost"; 	//HostName for phpMyAdmin
	$uid="root";			//UserID for phpMyAdmin
	$pwd="root";			//Password for phpMyAdmin
	$database="bit695";		//Database Name of phpMyAdmin
	
	
	
	$memberID = null;
	
	if(isset($_GET["memberID"]))
	{
		$memberID = $_GET["memberID"];
	}
	
	$conn=mysqli_connect($host, $uid, $pwd, $database);
	
	$sql = "SELECT * FROM players WHERE memberID = '".$memberID."' ";
	
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
			function query()
			{
			document.forms['table1'].action = 'updateData.php';   
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
				<h2 style="padding-top: 70px">Edit Member Detials</h2>
				<div class="container">
				<!--Adding Form-->
				<form id="form" name="table1" onsubmit="return validate()" action="updateData.php"  method="POST">
				<fieldset>
			
				<div  class="form">
				<form id="contactform"> 
    			<p class="contact"><label for="name">MemberID </label></p> 
    			<input id="memberID" name="memberID" placeholder="MemberID - Required for retreving Data Only" required pattern="[0-9]+" 
				title="MemberID can't be changed!" type="text" readonly="readonly" tabindex="1" 
				value="<?php echo $result["memberID"];?>"/> 
				
				<p class="contact"><label for="name">First Name</label></p> 
				<input id="firstname" name="firstname" placeholder="First Name" type="text" required pattern="[A-Za-z\s]+" 
				title="Please enter letters only!" tabindex="2" 
				value="<?php echo $result["FirstName"];?>"/> 
				
				<p class="contact"><label for="name">Family Name</label></p> 
				<input id="familyname" name="familyname" placeholder="Family Name" required  pattern="[A-Za-z\s]+" 
				title="Please enter letters only!" type="text" tabindex="3" 
				value="<?php echo $result["FamilyName"];?>"/>
				
    			<p class="contact"><label for="email">Email</label></p> 
    			<input id="email" name="email" placeholder="example@domain.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
				title="A valid email address is required!" type="email" tabindex="4" 
				value="<?php echo $result["Email"];?>"/>
				
				<p class="contact"><label for="phone">Phone</label></p> 
				<input id="phone" name="phone" placeholder="NZ Phone Number" required pattern="^(0|(\+64(\s|-)?)){1}(\d{1}|(21|22|27){1})(\s|-)?\d{3}(\s|-)?\d{4}$"
				title="A valid NZ phone or mobile number is required!" type="text" tabindex="5" 
				value="<?php echo $result["Phone"];?>"/>
				
				<input class="buttom" type="button" name="update_details"  value="Update"  onclick="query();" tabindex="6" />
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
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
								