<?php require_once('Connections/slas.php');
session_start();
//chech session availability
if (!isset($_SESSION['MM_UserGroup']) && ($_SESSION['MM_Username']) ) {
  header("location: ../index.php");
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Student Lecturer Appointment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/pie-chart.js" type="text/javascript"></script>
<style>
  .blacked {
    background: rgba(133, 184, 199, 0.73);
    color: white;
  }
</style>
</head>
<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
			<!-- top_bg -->
						<div class="top_bg">

								<div class="header_top">
								<div class="top_left">
										<div class="log">
												<div><a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
											</div>
								</div>
								<div class="clearfix"> </div>
								</div>

						</div>
					<div class="clearfix"></div>
				<!-- /top_bg -->
				</div>
				<div class="header_bg">

							<div class="header">
								<div class="head-t">
									<div class="logo">
										<a href="index.html"><img src="images/ftmk-logo.png" class="img-responsive" alt=""> </a>
									</div>
								<div class="clearfix"> </div>
							</div>
						</div>

				</div>
					<!-- //header-ends -->

				<!--content-->
			<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">Add Date
                  <button class="btn btn-success" id="managetime">Manage timetable</button>
              <hr></div>
							<div class="panel-body">
                <?php
                if (!empty($_POST['submit'])) {
                  // echo '<pre>' . var_export($_POST, true) . '</pre>';

                  //connect
                  $conn = mysqli_connect("localhost", "root", "root", "slas");

                  $subject = $_POST['subject'];
                  $desc = $_POST['description'];
                  $date = $_POST['date'];
                  $time = $_POST['time'];
                  $lecturer = $_SESSION['name'];
                  $status = "Approve";

                  if (!empty($_POST['unavailable'])) {

                    $curr = date("l");

                    switch ($curr) {
                      case 'Monday':

                      $getMonday = "next monday";
                      $getTuesday = "+1 week next tuesday";
                      $getWednesday = "+1 week next wednesday";
                      $getThursday = "+1 week next thursday";
                      $getFriday = "+1 week next friday";

                        break;

                      case 'Tuesday':

                      $getMonday = "next monday";
                      $getTuesday = "next tuesday";
                      $getWednesday = "+1 week next wednesday";
                      $getThursday = "+1 week next thursday";
                      $getFriday = "+1 week next friday";

                        break;

                      case 'Wednesday':

                      $getMonday = "next monday";
                      $getTuesday = "next tuesday";
                      $getWednesday = "week next wednesday";
                      $getThursday = "+1 week next thursday";
                      $getFriday = "+1 week next friday";

                        break;

                      case 'Thursday':
                      $getMonday = "next monday";
                      $getTuesday = "next tuesday";
                      $getWednesday = "next wednesday";
                      $getThursday = "next thursday";
                      $getFriday = "+1 week next friday";
                        break;

                      case 'Friday':
                      $getMonday = "next monday";
                      $getTuesday = "next tuesday";
                      $getWednesday = "next wednesday";
                      $getThursday = "next thursday";
                      $getFriday = "next friday";
                        break;

                    }

                    $nextDateMon =  date('Y-m-d', strtotime($getMonday));
                    $nextDateTue =  date('Y-m-d', strtotime($getTuesday));
                    $nextDateWed =  date('Y-m-d', strtotime($getWednesday));
                    $nextDateThu =  date('Y-m-d', strtotime($getThursday));
                    $nextDateFri =  date('Y-m-d', strtotime($getFriday));

                    //multi query;
                    $multi = "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateMon', '08:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateMon', '10:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateMon', '12:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateMon', '14:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateMon', '16:00', '$lecturer', '$lecturer', '$status');";

                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateTue', '08:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateTue', '10:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateTue', '12:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateTue', '14:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateTue', '16:00', '$lecturer', '$lecturer', '$status');";

                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateWed', '08:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateWed', '10:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateWed', '12:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateWed', '14:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateWed', '16:00', '$lecturer', '$lecturer', '$status');";

                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateThu', '08:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateThu', '10:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateThu', '12:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateThu', '14:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateThu', '16:00', '$lecturer', '$lecturer', '$status');";

                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateFri', '08:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateFri', '10:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateFri', '12:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateFri', '14:00', '$lecturer', '$lecturer', '$status');";
                    $multi .= "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$nextDateFri', '16:00', '$lecturer', '$lecturer', '$status');";

                    $result = mysqli_multi_query($conn,$multi);

                    if ($result) {
                      echo '<div class="alert alert-success" role="alert">Data successfully inserted</div>';
                    } else {
                      echo '<div class="alert alert-danger" role="alert">Error inserting data</div>';
                    }
                  } else {
                    //query
                    $sql = "INSERT INTO booking (subject, description, date, time, username, lecturer, status)
                    VALUES ('$subject', '$desc', '$date', '$time', '$lecturer', '$lecturer', '$status')";

                    $result = $conn->query($sql);

                    if ($result) {
                      echo '<div class="alert alert-success" role="alert">Data successfully inserted</div>';
                    } else {
                      echo '<div class="alert alert-danger" role="alert">Error inserting data</div>';
                    }
                  }
                }
                ?>

                <form action="" method="post">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control input" id="subject" name="subject" placeholder="Enter subject" required>
                  </div>
                  <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" name="description" placeholder="Enter ..." required></textarea>
                </div>
                </div>
                  <div class="col-xs-6">
                    <div class="col-xs-6">
                      <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control input" id="date" name="date" placeholder="Enter subject">
                      </div>
                    </div>
                    <div class="col-xs-5">
                      <div class="form-group">
                        <label>Time</label>
                        <select class="form-control" name="time">
                          <option value="08:00">08:00 AM</option>
                          <option value="10:00">10:00 AM</option>
                          <option value="12:00">12:00 PM</option>
                          <option value="14:00">02:00 PM</option>
                          <option value="16:00">04:00 PM</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12">

                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="unavailable">
                            Unavailable all week [ <span id="curWeek"></span> ]
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="pull-right">
                      <button class="btn btn-primary" type="submit" name="submit" value="submit">submit</button>
                    </div>
                  </div>
                  </form>
								<div class="contain">
								</div>
								<!-- status -->
							</div>
						</div>
					</div>

          <div style="display:none;" id="timetable" class="monthly-grid">
            <div class="panel panel-widget">
              <div class="panel-title">Manage timetable
              <hr>
            </div>
              <div id="bodytimetable" class="panel-body">
                <table class="table table-condensed table-bordered">
                    <thead>
                        <th>Time</th>
                        <th>8:00 - 10:00 AM </th>
                        <th>10:00 - 12:00 AM </th>
                        <th>12:00 - 2:00 PM </th>
                        <th>2:00 - 4:00 PM </th>
                        <th>4:00 - 6:00 PM </th>
                    </thead>
                    <tbody id="tableID">
                        <tr>
                            <td>Monday <span id="todayMonday"></span></td>
                            <td id="Monday0810"></td>
                            <td id="Monday1012"></td>
                            <td id="Monday1214"></td>
                            <td id="Monday1416"></td>
                            <td id="Monday1618"></td>
                        </tr>
                        <tr>
                            <td>Tuesday <span id="todayTuesday"></span></td>
                            <td id="Tuesday0810"></td>
                            <td id="Tuesday1012"></td>
                            <td id="Tuesday1214"></td>
                            <td id="Tuesday1416"></td>
                            <td id="Tuesday1618"></td>
                        </tr>
                        <tr>
                            <td>Wednesday <span id="todayWednesday"></span></td>
                            <td id="Wednesday0810"></td>
                            <td id="Wednesday1012"></td>
                            <td id="Wednesday1214"></td>
                            <td id="Wednesday1416"></td>
                            <td id="Wednesday1618"></td>
                        </tr>
                        <tr>
                            <td>Thursday <span id="todayThursday"></span></td>
                            <td id="Thursday0810"></td>
                            <td id="Thursday1012"></td>
                            <td id="Thursday1214"></td>
                            <td id="Thursday1416"></td>
                            <td id="Thursday1618"></td>
                        </tr>
                        <tr>
                            <td>Friday <span id="todayFriday"></span></td>
                            <td id="Friday0810"></td>
                            <td id="Friday1012"></td>
                            <td id="Friday1214"></td>
                            <td id="Friday1416"></td>
                            <td id="Friday1618"></td>
                        </tr>
                        <tbody>
                </table>
              </div>
            </div>
          </div>

          <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Day : <span id="hari"></span> | Time : <span id="waktuMula"></span>:00 <span id="waktuAkhir"></span>:00</h4>
                      </div>
                      <div class="modal-body">
                          <div class="alert alert-info">
                              <strong>Info!</strong> Fill in details. </br>
                          </div>
                          <form method="POST">
                              <div class="form-group">
                                  <label for="subject">Subject:</label>
                                  <input type="text" class="form-control" name="subject" id="subject" required>
                              </div>
                              <div class="form-group">
                                  <label for="desc">Location:</label>
                                  <input type="text" class="form-control" name="desc" id="desc" required>
                              </div>
                              <button type="button" id="ajxSubmit" class="btn btn-primary">Submit</button>
                          </form>

                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                  </div>

              </div>
          </div>


			</div>
			<!--content-->
		</div>
</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="lecturer.php"><i class="fa fa-tachometer"></i> <span>Home</span></a></li>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Appointment Page</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="appRej.php">Approve/Reject App</a></li>
										  </ul>
										</li>

							        <li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Status Info Page</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="addStatus.php">Add</a></li>
											<li id="menu-academico-boletim" ><a href="manageStatus.php">Manage Status</a></li>
										  </ul>
									</li>
									<li id="menu-academico" ><a href="#"><i class="lnr lnr-pencil"></i> <span>Manage Profile</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="viewAccountL.php">View Profile</a></li>
											<li id="menu-academico-boletim" ><a href="editAccL.php">Edit Account</a></li>
										  </ul>
									</li>
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>
							</div>
							<script>
							var toggle = true;

							$(".sidebar-icon").click(function() {
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }

											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
	<script>

	$(function() {

    var lecturer_name = "<?php echo $_SESSION['name']; ?>";


    $("#managetime").click(function() {
      $("#timetable").show(1000);
      $('html, body').animate({
          scrollTop: $("#timetable").offset().top
      }, 2000);
    });

    var table = document.getElementById("tableID");
    if (table != null) {
        for (var i = 0; i < table.rows.length; i++) {
            for (var j = 0; j < table.rows[i].cells.length; j++)
                table.rows[i].cells[j].onclick = function() {
                    tableText(this);
                };
        }
    }

    function tableText(tableCell) {
        if (tableCell.innerHTML === "") {

            var date = new Date();


            var foo = tableCell.id.slice(0, 3);

            switch (foo) {
                case 'Mon':

                    var hari = tableCell.id.slice(0, 6);
                    var waktuMula = tableCell.id.slice(6, 8);
                    var waktuAkhir = tableCell.id.slice(8, 10);
                    var thatDate = date.getNextWeekMonday();
                    break;

                case 'Tue':

                    var hari = tableCell.id.slice(0, 7);
                    var waktuMula = tableCell.id.slice(7, 9);
                    var waktuAkhir = tableCell.id.slice(9, 11);
                    var thatDate = date.getNextWeekTuesday();

                    break;

                case 'Wed':

                    var hari = tableCell.id.slice(0, 9);
                    var waktuMula = tableCell.id.slice(9, 11);
                    var waktuAkhir = tableCell.id.slice(11, 13);
                    var thatDate = date.getNextWeekWednesday();

                    break;

                case 'Thu':

                    var hari = tableCell.id.slice(0, 8);
                    var waktuMula = tableCell.id.slice(8, 10);
                    var waktuAkhir = tableCell.id.slice(10, 12);
                    var thatDate = date.getNextWeekThursday();

                    break;

                case 'Fri':

                    var hari = tableCell.id.slice(0, 6);
                    var waktuMula = tableCell.id.slice(6, 8);
                    var waktuAkhir = tableCell.id.slice(8, 10);
                    var thatDate = date.getNextWeekFriday();

                    break;

            }

            var that = String(thatDate).slice(0, 15);

            $('#hari').html(hari);
            $('#setTarikh').html(that);
            $('#waktuMula').html(waktuMula);
            $('#waktuAkhir').html(" - " + waktuAkhir);
            $('#myModal').modal('show');
        } else {
            alert("Click Others");
        }
    }

    var latest_date = new Date();

    // Get latest date on table
    var curWeek = document.getElementById('curWeek');

    curWeek.innerHTML = String(latest_date.getNextWeekMonday()).slice(0, 10) + " - " + String(latest_date.getNextWeekFriday()).slice(0, 10);

    $("#ajxSubmit").click(function() {
        var $desc = $("#desc").val();
        var $subject = $("#subject").val();
        var $hari = $("#hari").text();
        // var $tarikh = $("#setTarikh").text();
        var $waktu = $("#waktuMula").text();
        $waktu = $waktu + ":00";


        $.ajax({
            type: "POST",
            url: "insertclass.php",
            dataType: "text",
            data: {
                desc: $desc,
                subject: $subject,
                // tarikh: $tarikh,
                lecturer_name, lecturer_name,
                waktu: $waktu,
                hari: $hari
            }
        }).done(function(msg) {
          myFunction();
        });
    });

    $.ajax({
        type: "POST",
        data: {
            lecturer_name: lecturer_name
        },
        url: "getClass.php",
        dataType: "json",
        success: function(data) {
          // console.log(data);
            var result = data;
            for (var i = 0; i < result.length; i++) {
                var obj = result[i];
                var objt = parseInt(obj.time);

                if (obj.Hari === "Monday") {
                    if (objt >= 8 && objt < 10) {
                        var Monday0810 = document.getElementById('Monday0810');
                        Monday0810.classList.add("blacked");
                        Monday0810.innerHTML = "CLASS";
                    }
                    if (objt >= 10 && objt < 12) {
                        var Monday1012 = document.getElementById('Monday1012');
                        Monday1012.classList.add("blacked");
                        Monday1012.innerHTML = "CLASS";
                    }
                    if (objt >= 12 && objt < 14) {
                        var Monday1214 = document.getElementById('Monday1214');
                        Monday1214.classList.add("blacked");
                        Monday1214.innerHTML = "CLASS";
                    }
                    if (objt >= 14 && objt < 16) {
                        var Monday1416 = document.getElementById('Monday1416');
                        Monday1416.classList.add("blacked");
                        Monday1416.innerHTML = "CLASS";
                    }
                    if (objt >= 16 && objt < 18) {
                        var Monday1618 = document.getElementById('Monday1618');
                        Monday1618.classList.add("blacked");
                        Monday1618.innerHTML = "CLASS";
                    }
                }

                if (obj.Hari === "Tuesday") {
                    if (objt >= 8 && objt < 10) {
                        var Tuesday0810 = document.getElementById('Tuesday0810');
                        Tuesday0810.classList.add("blacked");
                        Tuesday0810.innerHTML = "CLASS";
                    }
                    if (objt >= 10 && objt < 12) {
                        var Tuesday1012 = document.getElementById('Tuesday1012');
                        Tuesday1012.classList.add("blacked");
                        Tuesday1012.innerHTML = "CLASS";
                    }
                    if (objt >= 12 && objt < 14) {
                        var Tuesday1214 = document.getElementById('Tuesday1214');
                        Tuesday1214.classList.add("blacked");
                        Tuesday1214.innerHTML = "CLASS";
                    }
                    if (objt >= 14 && objt < 16) {
                        var Tuesday1416 = document.getElementById('Tuesday1416');
                        Tuesday1416.classList.add("blacked");
                        Tuesday1416.innerHTML = "CLASS";
                    }
                    if (objt >= 16 && objt < 18) {
                        var Tuesday1618 = document.getElementById('Tuesday1618');
                        Tuesday1618.classList.add("blacked");
                        Tuesday1618.innerHTML = "CLASS";
                    }
                }

                if (obj.Hari === "Wednesday") {
                    if (objt >= 8 && objt < 10) {
                        var Wednesday0810 = document.getElementById('Wednesday0810');
                        Wednesday0810.classList.add("blacked");
                        Wednesday0810.innerHTML = "CLASS";
                    }
                    if (objt >= 10 && objt < 12) {
                        var Wednesday1012 = document.getElementById('Wednesday1012');
                        Wednesday1012.classList.add("blacked");
                        Wednesday1012.innerHTML = "CLASS";
                    }
                    if (objt >= 12 && objt < 14) {
                        var Wednesday1214 = document.getElementById('Wednesday1214');
                        Wednesday1214.classList.add("blacked");
                        Wednesday1214.innerHTML = "CLASS";
                    }
                    if (objt >= 14 && objt < 16) {
                        var Wednesday1416 = document.getElementById('Wednesday1416');
                        Wednesday1416.classList.add("blacked");
                        Wednesday1416.innerHTML = "CLASS";
                    }
                    if (objt >= 16 && objt < 18) {
                        var Wednesday1618 = document.getElementById('Wednesday1618');
                        Wednesday1618.classList.add("blacked");
                        Wednesday1618.innerHTML = "CLASS";
                    }
                }

                if (obj.Hari === "Thursday") {
                    if (objt >= 8 && objt < 10) {
                        var Thursday0810 = document.getElementById('Thursday0810');
                        Thursday0810.classList.add("blacked");
                        Thursday0810.innerHTML = "CLASS";
                    }
                    if (objt >= 10 && objt < 12) {
                        var Thursday1012 = document.getElementById('Thursday1012');
                        Thursday1012.classList.add("blacked");
                        Thursday1012.innerHTML = "CLASS";
                    }
                    if (objt >= 12 && objt < 14) {
                        var Thursday1214 = document.getElementById('Thursday1214');
                        Thursday1214.classList.add("blacked");
                        Thursday1214.innerHTML = "CLASS";
                    }
                    if (objt >= 14 && objt < 16) {
                        var Thursday1416 = document.getElementById('Thursday1416');
                        Thursday1416.classList.add("blacked");
                        Thursday1416.innerHTML = "CLASS";
                    }
                    if (objt >= 16 && objt < 18) {
                        var Thursday1618 = document.getElementById('Thursday1618');
                        Thursday1618.classList.add("blacked");
                        Thursday1618.innerHTML = "CLASS";
                    }
                }

                if (obj.Hari === "Friday") {
                    if (objt >= 8 && objt < 10) {
                        var Friday0810 = document.getElementById('Friday0810');
                        Friday0810.classList.add("blacked");
                        Friday0810.innerHTML = "CLASS";
                    }
                    if (objt >= 10 && objt < 12) {
                        var Friday1012 = document.getElementById('Friday1012');
                        Friday1012.classList.add("blacked");
                        Friday1012.innerHTML = "CLASS";
                    }
                    if (objt >= 12 && objt < 14) {
                        var Friday1214 = document.getElementById('Friday1214');
                        Friday1214.classList.add("blacked");
                        Friday1214.innerHTML = "CLASS";
                    }
                    if (objt >= 14 && objt < 16) {
                        var Friday1416 = document.getElementById('Friday1416');
                        Friday1416.classList.add("blacked");
                        Friday1416.innerHTML = "CLASS";
                    }
                    if (objt >= 16 && objt < 18) {
                        var Friday1618 = document.getElementById('Friday1618');
                        Friday1618.classList.add("blacked");
                        Friday1618.innerHTML = "CLASS";
                    }
                }

            }
        }
    });


  });

  function myFunction() {
    alert("Data inserted");
    location.reload();
  }

  Date.prototype.getNextWeekMonday = function() {
      var d = new Date(this.getTime());
      var diff = d.getDate() - d.getDay() + 1;
      if (d.getDay() == 0)
          diff -= 7;
      diff += 7; // ugly hack to get next monday instead of current one
      return new Date(d.setDate(diff));
  };


  Date.prototype.getNextWeekTuesday = function() {
      var d = this.getNextWeekMonday();
      return new Date(d.setDate(d.getDate() + 1));
  };

  Date.prototype.getNextWeekWednesday = function() {
      var d = this.getNextWeekMonday();
      return new Date(d.setDate(d.getDate() + 2));
  };

  Date.prototype.getNextWeekThursday = function() {
      var d = this.getNextWeekMonday();
      return new Date(d.setDate(d.getDate() + 3));
  };

  Date.prototype.getNextWeekFriday = function() {
      var d = this.getNextWeekMonday();
      return new Date(d.setDate(d.getDate() + 4));
  };



	</script>
   <script src="js/menu_jquery.js"></script>
</body>
</html>
