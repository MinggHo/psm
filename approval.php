<?php require_once('Connections/slas.php');
session_start();
//chech session availability
if (!isset($_SESSION['MM_Username'])) {
  header("location: index.php");
}
?>
<?php

if(isset($_GET['book_id'])){

$book_id = $_GET['book_id'];
$state = $_GET['state'];

$conn = mysqli_connect("localhost" , "root" , "root", "slas");

// query

$sql = "UPDATE booking
SET status = '$state'
WHERE book_id = $book_id";
// echo '<pre>' . var_export($sql, true) . '</pre>';
// die();
$results = $conn->query($sql);

// result
if($results) {
  echo "<script type='text/javascript'>alert('Sucessfully update.');window.location='appRej.php';</script>";
} else {
  echo  "<script type='text/javascript'>alert('Update fail.');</script>";
}
}

?>
