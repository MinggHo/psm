<?php
	require 'Connections/slas.php';

	session_start();

	$username = "";
	$password = "";

	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
	if (isset($_POST['password'])) {
		$password = $_POST['password'];

	}

	echo $username ." : ".$password;

	$q = 'SELECT * FROM login WHERE username=:username AND password=:password';

	$query = $dbh->prepare($q);

	$query->execute(array(':username' => $username, ':password' => $password));


	if($query->rowCount() == 0){
		echo '<script type="text/javascript"> window.location = "index.php";window.alert("Login failed.");</script>';

	}else{

		$row = $query->fetch(PDO::FETCH_ASSOC);

		session_regenerate_id();
		$_SESSION['sess_user_id'] = $row['log_id'];
		$_SESSION['MM_Username'] = $row['username'];
    $_SESSION['MM_UserGroup'] = $row['type'];
    $_SESSION['name'] = $row['name'];

        echo $_SESSION['MM_UserGroup'];
		session_write_close();

		if($_SESSION['MM_UserGroup'] == "admin"){
			header('Location: admin.php');
		}else if( $_SESSION['MM_UserGroup'] == "lecturer"){
			header('Location: lecturer.php');
		}else{
			header('Location: student.php');
		}


	}


?>
