
<?php
  include("Connections/slas.php");  

$host = 'localhost';
$userId = 'root';
$pswd = '';

$conn = mysql_connect($host, $userId, $pswd) or
   die ('Cannot connect to database');

$dbname = "slas";
mysql_select_db ($dbname) or
   die ("Error connecting to Database: ".$dbname);

	$id =$_GET['stud_id'];
	//echo $id; die();
	
	// sending query
	mysql_query("DELETE FROM student WHERE stud_id = '$id'")
	or die(mysql_error());  	

	echo "<script type='text/javascript'>alert('Sucessfully deleting.');window.location='viewS.php';</script>";
?> 