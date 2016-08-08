<?php

  $id = $_POST['id'];

// make connection
  $conn = mysqli_connect("localhost" , "root" , "root", "slas");

// query

  $sql = "SELECT day, status, date
          FROM status
          where lect_id = '$id'
          ORDER BY stat_id DESC
          LIMIT 1";
  $results = $conn->query($sql);

// result
  if($results) {
    $row = mysqli_fetch_assoc($results);
      if ($row['status'] == '') {
        echo "Available";
      } else {
        echo "Day : " . $row['day'] . "\nDate : " . $row['date'] . "\nStatus : " . $row['status'] . "";
      }
  } else {
    echo "error";
  }

?>
