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

	$id =$_GET['news_id'];
	//echo $id; die();
	
	// sending query
	mysql_query("DELETE FROM news WHERE news_id = '$id'")
	or die(mysql_error());  	
	
	header("Location: manage.php");
?> 