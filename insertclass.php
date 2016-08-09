<?php
	session_start();

	if (!$_POST['subject'] && !$_POST['desc']) {

	} else {

		$desc = $_POST["desc"];
		$subject = $_POST["subject"];
		$waktu = $_POST["waktu"];
		// $tarikh = $_POST['tarikh'];
		$hari = $_POST['hari'];
		$lecturer_name = $_POST['lecturer_name'];

		// $nextDate =  date('Y-m-d', strtotime($tarikh));

		// Create a new DateTime object
		// $date = new DateTime();
		//
		// $tarikh = "next " . $_POST['tarikh'];
		// $nextDate = strtotime($tarikh);
		//
		// Modify the date it contains
		// $date->modify($tarikh);


		// Output
		// $nextDate = $date->format('Y-m-d');

		// make connection
			$conn = mysqli_connect("localhost" , "root" , "root", "slas");

		// query

			$sql = "INSERT INTO booking
			(book_id, subject, description, time, username, lecturer, status, classDay)
			VALUES ( '' , '$subject' , '$desc' , '$waktu' , '$id_pelajar' , '$lecturer_name' , 'Class', '$hari')";
			$results = $conn->query($sql);

		// result
			if($results) {

			$_SESSION['success_msg'] = "Date has been successfully booked.";

			// echo '<div class="alert alert-success">';
			// echo '<strong>Success!</strong> Data has been inserted. </br>';
			// echo 'Lecturer Name : ' . $lecturer_name . ' Date :  ' . $nextDate . ' on ' .  $waktu . '</br>';
			// echo 'Purpose : ' . $subject . ' | ' . $subject ;
			// echo '</div>';

			} else {

			$_SESSION['error_msg'] = "Error making booking.";

			// echo '<div class="alert alert-danger">';
			// echo '<strong>Error!</strong> Data insert fail. </br>';
			// echo '</div>';
			}
}


?>
