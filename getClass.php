<?php

session_start();

$lecturer_name = $_POST['lecturer_name'];
$conn = mysqli_connect("localhost" , "root" , "root", "slas");

$sql = "SELECT lecturer, time, classDay AS Hari
FROM booking
WHERE lecturer = '$lecturer_name' AND status = 'Class'";

$results = $conn->query($sql);

if ($results->num_rows > 0) {

  $array = [];

  while($row = mysqli_fetch_assoc($results)) {
    array_push($array,$row);
  }

  echo json_encode($array);
  // $_SESSION['success_msg'] = "Click on table below (date / time) to book.";

} else {
  echo 0;
  // $_SESSION['error_msg'] = "Lecturer not found, please search again.";
}

// echo $results->num_rows;
// echo var_dump($_POST);
?>
