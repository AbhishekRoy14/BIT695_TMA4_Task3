<?php
/**Establishing a connection to the database**/
/** or localhost can also be used for host **/
$host = "localhost"; 
$uid="root";
$pwd="root";
$database="bit695";

function connect_db($host, $uid, $pwd, $database)
 {  	$conn=mysqli_connect($host, $uid, $pwd, $database)
	or die('connection problem:' . mysqli_connect_error());
	return $conn;
}




?>