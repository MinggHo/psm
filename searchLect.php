<?php
session_start();

// include("Connections/slas.php");

if ($_POST) {
	$namaLect = $_POST['term'];
} else {
	$namaLect = "";
}

	function checkHari() {
		mysql_connect("localhost" , "root" , "root") or die (mysql_error());
		mysql_select_db("slas") or die ("Cannot connect to database");

		$sql = "SELECT date, DAYNAME(date) as Hari , time FROM booking WHERE date BETWEEN CURDATE() AND CURDATE() + INTERVAL 7 DAY";
		$results = mysql_query($sql);
		$num_rows = mysql_num_rows($results);

		return $results;
	}

	function senaraiLecturer() {

		mysql_connect("localhost" , "root" , "root") or die (mysql_error());
		mysql_select_db("slas") or die ("Cannot connect to database");

		$sql = "SELECT name, department
		FROM lecturer";

		$results = mysql_query($sql);

		return $results;
	}

	$check_hari = checkHari();
	$senarai_lecturer = senaraiLecturer();
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.6/dt-1.10.12/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/dt-1.10.12/datatables.min.js"></script>
<script src="js/amcharts.js"></script>
<script src="js/serial.js"></script>
<script src="js/light.js"></script>
<!-- //lined-icons -->
   <!--pie-chart-->
<script src="js/pie-chart.js" type="text/javascript"></script>
<style>
	.blacked {
		background: black;
		color: white;
	}
</style>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

        });

    </script>
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

			<!-- Modal -->
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
					  <strong>Info!</strong> Insert all the followings to complete the order. </br>
					  <strong>Lecturer Name : <span id="lecturerName">
					  <?php if($_POST) {
						echo $_POST['term'];
						} else {
						echo "";
						}
						?> </span></br>
						<strong>Student ID : <span id="idPelajar">
						<?php if($_SESSION) {
						echo $_SESSION['MM_Username'];
						} else {
						echo "";
						}
						?>
						</span></strong>
					</br>
					Tarikh : <span id="setTarikh"></span>
					  </strong>
				  </div>
				  <form method="POST">
				  <div class="form-group">
					<label for="subject">Subject:</label>
					<input type="text" class="form-control" name="subject" id="subject" required>
				  </div>
				  <div class="form-group">
					<label for="desc">Description:</label>
					<input type="text" class="form-control" name="desc" id="desc" required>
				  </div>
				  <button type="submit" id="ajxSubmit" class="btn btn-primary">Submit</button>
				</form>

				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>

			<div class="row">
					<div id="message">
						<?php
						if(isset($_SESSION['error_msg'])){?>
								<div class="col-lg-12">
										<div class="alert alert-danger" role="alert"><?= $_SESSION['error_msg']; ?></div>
										<?php unset($_SESSION['error_msg']); ?>
								</div>
						<?php }elseif(isset($_SESSION['success_msg'])){?>
								<div class="col-lg-12">
										<div class="alert alert-success" role="alert"><?= $_SESSION['success_msg']; ?></div>
										<?php unset($_SESSION['success_msg']); ?>
								</div>
						<?php } ?>
					</div>
			</div>

					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
								<div class="row">
							  <h2>Student Page - Search Lecturer by Name</h2>


									<div class="col-lg-6">
									</div>
								  <div class="col-lg-6">
										<!-- <form action="" method="POST">
										<div class="input-group">
											<input type="text" name="term" class="form-control" placeholder="Lecturer Name...">
											<span class="input-group-btn">
												<button class="btn btn-secondary" type="submit">
													<i class="fa fa-search"></i>
												</button>
											</span>
										</div>
									</form> -->
								  </div>
								</div>

								<!-- <form action="searchLect.php" method="GET">
								<div class="form-group">
                                    <input type="text" name = "term" class="form-control">
                                    <span class="input-group-btn">
                                    <button type="submit" name="submit" class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                    </button>
                                    </span>
								</div>
                                    <br/>
                                    <br/>
                                </form> -->

                                    <?php
                      //                      if(isset($_POST['submit'])){
											//
											//
                      //                      	mysql_connect("localhost" , "root" , "root") or die (mysql_error());
								      //       mysql_select_db("slas") or die ("Cannot connect to database");
											//
											//
                      //                       $term = mysql_real_escape_string($_REQUEST['term']);
											//
                      //                       $sql = "select a.timetable , a.name , b.date , b.day , b.status ,b.stat_id from lecturer a , status b where a.name LIKE '%$term%' and a.lect_id=b.lect_id";
                      //                       //echo $sql = "select * from lecturer a , status b where a.name LIKE '%".$term."%'";
                      //                       $r_query = mysql_query($sql);
                      //                        $num_rows = mysql_num_rows($r_query);
											//
											//
                      //                   	if ($num_rows>0){
                      //                       while ($row = mysql_fetch_assoc($r_query)){
										  //   while($row = $r_query->fetch_assoc()) {
                      //                       $timetable=$row['timetable'];
                      //                       $status=$row['status'];
											//
											// echo "<img src='upload/$timetable'>";
											// echo '<br /><br /> Date : ' .$row['date'];
											// echo '<br /><br /> Day : ' .$row['day'];
											// echo '<br /><br /> Status : ' .$row['status'];
											//
											// 		}
											// 	}
											// } else {
											// 	echo "No record";
											// }
										  //  }
											//
											//
                      //                    ?>
										 <?php

											// $new_array = [];
											//
											// 	while($row = mysql_fetch_assoc($check_hari)) {
											// 		array_push($new_array,$row);
											// }
											//
											// echo '<pre>'; print_r($new_array); echo '</pre>';
											//
											// for ($i=0; $i < count($new_array); $i++) {
											// 	echo $new_array[$i]['time'] . '</br>';
											// }

											// while ($row = mysql_fetch_assoc($check_hari)) {
											//
											// $hari = $row['Hari'];
											// $time = $row['time'];

										 ?>

							</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="alert alert-info">
											<strong>Info!</strong> Click on calander icon to book.
										</div>
									</div>
								</div>
								<!-- status -->
								<div class="contain" id="hide">

									<h4>
									<?php
									 if($_GET) {
											 echo "Nama Lecturer : " . $_GET['term'] ;
										 }
									?>
									</h4>
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
										 <?php if( $hari = 'Monday' ) {

										 } ?>
										 <tr>
											 <td>Monday <span id="todayMonday"></span></td>
											 <td id="Monday0810">Lec - BITS</td>
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
											 <td id="Tuesday1416">Lec - BITC</td>
											 <td id="Tuesday1618"></td>
										 </tr>
										 <?php

										 // $hari_arr = [];
										 // $time_arr = [];
										 //
										 // for ($i=0; $i < count($new_array); $i++) {
										 // 	$hari = $new_array[$i]['Hari'] ;
										 // 	array_push($hari_arr,$hari);
										 //
										 // 	$time = $new_array[$i]['time'] ;
										 // 	array_push($time_arr,$time);
										 // }
										 //
										 // echo '<pre>'; print_r($time_arr); echo '</pre>';

										 ?>
										 <tr>
											 <td>Wednesday <span id="todayWednesday"></span></td>
											 <td id="Wednesday0810"></td>
											 <td id="Wednesday1012"></td>
											 <td id="Wednesday1214"></td>
											 <td id="Wednesday1416"></td>
											 <td id="Wednesday1618"></td>
											 <?php

											 // for ($i=0; $i < count($hari_arr); $i++) {
											 // 	if( $hari_arr[$i] = 'Wednesday' ) {
											 // 		for ($i=0; $i < count($time_arr); $i++) {
											 //
											 // 			if( $time_arr[$i] >= 8 && $time_arr[$i] < 10 ) {
											 // 				echo '<td id="Wednesday0810" class="blacked"><small>Booked</small></td>';
											 // 				} else {
											 // 				echo '<td></td>';
											 // 			}
											 //
											 // 			if ($time_arr[$i] >= 10 && $time_arr[$i] < 12) {
											 // 				echo '<td id="Wednesday1012" class="blacked"><small>Booked</small></td>';
											 // 				} else {
											 // 				echo '<td></td>';
											 // 				}
											 //
											 // 		 	if ($time_arr[$i] >= 12 && $time_arr[$i] < 14) {
											 // 				echo '<td id="Wednesday1214" class="blacked"><small>Booked</small></td>';
											 // 				} else {
											 // 				echo '<td></td>';
											 // 				}
											 //
											 // 			if ($time_arr[$i] >= 14 && $time_arr[$i] < 16) {
											 // 				echo '<td id="Wednesday1416" class="blacked"><small>Booked</small></td>';
											 // 				}	else {
											 // 				echo '<td></td>';
											 // 				}
											 //
											 // 			if ($time_arr[$i] >= 16 && $time_arr[$i] < 18) {
											 // 				echo '<td id="Wednesday1618" class="blacked"><small>Booked</small></td>';
											 // 				} else {
											 // 				echo '<td></td>';
											 // 				}
											 //
											 // 			}
											 // 		}
											 // }

											 ?>
										 </tr>
										 <tr>
											 <td>Thursday <span id="todayThursday"></span></td>
											 <td id="Thursday0810"></td>
											 <td id="Thursday1012"></td>
											 <td id="Thursday1214">Lec - BITS S1</td>
											 <td id="Thursday1416"></td>
											 <td id="Thursday1618">Lec - BITC</td>
										 </tr>
										 <tr>
											 <td>Friday <span id="todayFriday"></span></td>
											 <td id="Friday0810"></td>
											 <td id="Friday1012">Lec - BITS</td>
											 <td id="Friday1214"></td>
											 <td id="Friday1416"></td>
											 <td id="Friday1618"></td>
										 </tr>
									 <tbody>
									</table>
									<?php //} ?>
								</div>

			<table id="myTable" class="table table-condensed">
        <thead>
            <tr>
                <th>Lecturer Name</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Lecturer Name</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
					<?php while ($row = mysql_fetch_assoc($senarai_lecturer)) {
						echo '<tr>';
						echo '<td>' . $row['name'] . '</td>';
						echo '<td>' . $row['department'] . '</td>';
						echo '<td><a href="book_lect.php?lecturer='.$row['name'].'"><i class="fa fa-calendar" title="Book"></i></a></td>';
						echo '</tr>';
					} ?>
        </tbody>
    </table>

							</div>
						</div>
					</div>

						<!--//area-->
		<div class="fo-top-di">
			<div class="foot-top">

					<!-- <div class="col-md-6 s-c">
						<li>
							<div class="fooll">
								<h1>follow us on</h1>
							</div>
						</li>
						<li>
							<div class="social-ic">
								<ul>
									<li><a href="#"><i class="facebok"> </i></a></li>
									<li><a href="#"><i class="twiter"> </i></a></li>
									<li><a href="#"><i class="goog"> </i></a></li>
									<li><a href="#"><i class="be"> </i></a></li>
										<div class="clearfix"></div>
								</ul>
							</div>
						</li>
							<div class="clearfix"> </div>
					</div>
					<div class="col-md-6 s-c">
						<div class="stay">
						</div>
					</div>
					<div class="clearfix"> </div>

			</div>
			<div class="footer">

					<div class="col-md-2 abt">
						<h4>Locate FTMK</h4>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d712.9232886392891!2d102.31874714794212!3d2.3082501355805936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1e46a143881ad%3A0x8c8068611b844a80!2sFakulti+Teknologi+Maklumat+dan+Komunikasi+(FTMK)%2C+UTeM!5e0!3m2!1sen!2smy!4v1461644725290" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="clearfix"> </div>
			</div> -->
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
										<li><a href="student.php"><i class="fa fa-tachometer"></i> <span>Home</span></a></li>
										 <li id="menu-academico" ><a href="searchLect.php"><i class="fa fa-table"></i> <span> Search and View Lect</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										</li>

							        <li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Book Appointment</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="book app.php">Book</a></li>
											<li id="menu-academico-boletim" ><a href="viewStatus.php">View Booking Status</a></li>
										  </ul>
									</li>
									<li id="menu-academico" ><a href="#"><i class="lnr lnr-pencil"></i> <span>Manage Profile</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-boletim" ><a href="viewAccountS.php">View Profile</a></li>
											<li id="menu-academico-boletim" ><a href="editAcc.php">Edit Account</a></li>
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
   <!-- real-time -->
<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
<script>

window.onload = function() {

  $('#myTable').DataTable();

	$("#hide").hide();

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


	var latest_date = new Date();

	// Get latest date on table
	var monday = document.getElementById('todayMonday');
	var tuesday = document.getElementById('todayTuesday');
	var wednesday = document.getElementById('todayWednesday');
	var thursday = document.getElementById('todayThursday');
	var friday = document.getElementById('todayFriday');

	monday.innerHTML = String(latest_date.getNextWeekMonday()).slice(4,10);
	tuesday.innerHTML = String(latest_date.getNextWeekTuesday()).slice(4,10);
	wednesday.innerHTML = String(latest_date.getNextWeekWednesday()).slice(4,10);
	thursday.innerHTML = String(latest_date.getNextWeekThursday()).slice(4,10);
	friday.innerHTML = String(latest_date.getNextWeekFriday()).slice(4,10);



	var php = '<?php echo $namaLect; ?>';

	if (php) {
		$.ajax({
				type: "POST",
				data: {
					lecturer_name : php
				},
				url: "getTable.php",
				dataType: "json",
				success: function(data) {

					//wrong
					if (data === 0) {
						$("#hide").hide();
					// 	alert("Lecturer not found.");
				} else {
					$("#hide").show();
					var result = data;
					for(var i = 0; i < result.length; i++) {
							var obj = result[i];
							var objt = parseInt(obj.time);

							if(obj.Hari === "Wednesday") {
								if (objt >= 8 && objt < 10) {
									var Wednesday0810 = document.getElementById('Wednesday0810');
									Wednesday0810.classList.add("blacked");
									Wednesday0810.innerHTML = "Booked";
								}
								if (objt >= 10 && objt < 12) {
									var Wednesday1012 = document.getElementById('Wednesday1012');
									Wednesday1012.classList.add("blacked");
									Wednesday1012.innerHTML = "Booked";
								}
								if (objt >= 12 && objt < 14) {
									var Wednesday1214 = document.getElementById('Wednesday1214');
									Wednesday1214.classList.add("blacked");
									Wednesday1214.innerHTML = "Booked";
								}
								if (objt >= 14 && objt < 16) {
									var Wednesday1416 = document.getElementById('Wednesday1416');
									Wednesday1416.classList.add("blacked");
									Wednesday1416.innerHTML = "Booked";
								}
								if (objt >= 16 && objt < 18) {
									var Wednesday1618 = document.getElementById('Wednesday1618');
									Wednesday1618.classList.add("blacked");
									Wednesday1618.innerHTML = "Booked";
								}
							}

							if(obj.Hari === "Monday") {
								if (objt >= 8 && objt < 10) {
									var Monday0810 = document.getElementById('Monday0810');
									Monday0810.classList.add("blacked");
									Monday0810.innerHTML = "Booked";
								}
								if (objt >= 10 && objt < 12) {
									var Monday1012 = document.getElementById('Monday1012');
									Monday1012.classList.add("blacked");
									Monday1012.innerHTML = "Booked";
								}
								if (objt >= 12 && objt < 14) {
									var Monday1214 = document.getElementById('Monday1214');
									Monday1214.classList.add("blacked");
									Monday1214.innerHTML = "Booked";
								}
								if (objt >= 14 && objt < 16) {
									var Monday1416 = document.getElementById('Monday1416');
									Monday1416.classList.add("blacked");
									Monday1416.innerHTML = "Booked";
								}
								if (objt >= 16 && objt < 18) {
									var Monday1618 = document.getElementById('Monday1618');
									Monday1618.classList.add("blacked");
									Monday1618.innerHTML = "Booked";
								}
							}
					}

				}

				}
		});
	} else {
		// alert("Select lecturer to book");
	}
}

var table = document.getElementById("tableID");
if (table != null) {
    for (var i = 0; i < table.rows.length; i++) {
        for (var j = 0; j < table.rows[i].cells.length; j++)
        table.rows[i].cells[j].onclick = function () {
            tableText(this);
        };
    }
}

function tableText(tableCell) {
	if(tableCell.innerHTML === "") {


		// You can then use it like this :

		var date = new Date();


	var foo = tableCell.id.slice(0,3);

	switch(foo) {
		case 'Mon' :

			var hari = tableCell.id.slice(0,6);
			var waktuMula = tableCell.id.slice(6,8);
			var waktuAkhir = tableCell.id.slice(8,10);
			var thatDate = date.getNextWeekMonday();
			break;

		case 'Tue' :

			var hari = tableCell.id.slice(0,7);
			var waktuMula = tableCell.id.slice(7,9);
			var waktuAkhir = tableCell.id.slice(9,11);
			var thatDate = date.getNextWeekTuesday();

			break;

		case 'Wed' :

			var hari = tableCell.id.slice(0,9);
			var waktuMula = tableCell.id.slice(9,11);
			var waktuAkhir = tableCell.id.slice(11,13);
			var thatDate = date.getNextWeekWednesday();

			break;

		case 'Thu' :

			var hari = tableCell.id.slice(0,8);
			var waktuMula = tableCell.id.slice(8,10);
			var waktuAkhir = tableCell.id.slice(10,12);
			var thatDate = date.getNextWeekThursday();

			break;

		case 'Fri' :

			var hari = tableCell.id.slice(0,6);
			var waktuMula = tableCell.id.slice(6,8);
			var waktuAkhir = tableCell.id.slice(8,10);
			var thatDate = date.getNextWeekFriday();

			break;

	}

	var that = String(thatDate).slice(0,15);

	$('#hari').html(hari);
	$('#setTarikh').html(that);
	$('#waktuMula').html(waktuMula);
	$('#waktuAkhir').html(" - " + waktuAkhir);
    $('#myModal').modal('show');
	} else {
    alert("Click Others");
	}
}

$("#ajxSubmit").click(function() {
	var $lecturerName = $("#lecturerName").text().trim();
	var $idPelajar = $("#idPelajar").text().trim();
	var $desc = $("#desc").val();
	var $subject = $("#subject").val();
	var $tarikh = $("#hari").text();
	var $waktu = $("#waktuMula").text();
		$waktu = $waktu+":00";

	$.ajax({
		  type: "POST",
		  url: "getdate.php",
			dataType: "text",
		  data: {
			  lecturer_name : $lecturerName,
			  id_pelajar : $idPelajar,
			  desc : $desc,
			  subject : $subject,
			  tarikh : $tarikh,
			  waktu : $waktu
		  },
			success: function(response) {
				console.log(response);
			}
	});
});
</script>
	<script type="text/javascript">

	$(function() {

		// We use an inline data source in the example, usually data would
		// be fetched from a server

		var data = [],
			totalPoints = 300;

		function getRandomData() {

			if (data.length > 0)
				data = data.slice(1);

			// Do a random walk

			while (data.length < totalPoints) {

				var prev = data.length > 0 ? data[data.length - 1] : 50,
					y = prev + Math.random() * 10 - 5;

				if (y < 0) {
					y = 0;
				} else if (y > 100) {
					y = 100;
				}

				data.push(y);
			}

			// Zip the generated y values with the x values

			var res = [];
			for (var i = 0; i < data.length; ++i) {
				res.push([i, data[i]])
			}

			return res;
		}

		// Set up the control widget

		var updateInterval = 30;
		$("#updateInterval").val(updateInterval).change(function () {
			var v = $(this).val();
			if (v && !isNaN(+v)) {
				updateInterval = +v;
				if (updateInterval < 1) {
					updateInterval = 1;
				} else if (updateInterval > 2000) {
					updateInterval = 2000;
				}
				$(this).val("" + updateInterval);
			}
		});

		var plot = $.plot("#placeholder", [ getRandomData() ], {
			series: {
				shadowSize: 0	// Drawing is faster without shadows
			},
			yaxis: {
				min: 0,
				max: 100
			},
			xaxis: {
				show: false
			}
		});

		function update() {

			plot.setData([getRandomData()]);

			// Since the axes don't change, we don't need to call plot.setupGrid()

			plot.draw();
			setTimeout(update, updateInterval);
		}

		update();

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
<!-- /real-time -->
<script src="js/jquery.fn.gantt.js"></script>
    <script>

		$(function() {

			"use strict";

			$(".gantt").gantt({
				source: [{
					name: "Sprint 0",
					desc: "Analysis",
					values: [{
						from: "/Date(1320192000000)/",
						to: "/Date(1322401600000)/",
						label: "Requirement Gathering",
						customClass: "ganttRed"
					}]
				},{
					name: " ",
					desc: "Scoping",
					values: [{
						from: "/Date(1322611200000)/",
						to: "/Date(1323302400000)/",
						label: "Scoping",
						customClass: "ganttRed"
					}]
				},{
					name: "Sprint 1",
					desc: "Development",
					values: [{
						from: "/Date(1323802400000)/",
						to: "/Date(1325685200000)/",
						label: "Development",
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1325685200000)/",
						to: "/Date(1325695200000)/",
						label: "Showcasing",
						customClass: "ganttBlue"
					}]
				},{
					name: "Sprint 2",
					desc: "Development",
					values: [{
						from: "/Date(1326785200000)/",
						to: "/Date(1325785200000)/",
						label: "Development",
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1328785200000)/",
						to: "/Date(1328905200000)/",
						label: "Showcasing",
						customClass: "ganttBlue"
					}]
				},{
					name: "Release Stage",
					desc: "Training",
					values: [{
						from: "/Date(1330011200000)/",
						to: "/Date(1336611200000)/",
						label: "Training",
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Deployment",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1338711200000)/",
						label: "Deployment",
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Warranty Period",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1349711200000)/",
						label: "Warranty Period",
						customClass: "ganttOrange"
					}]
				}],
				navigate: "scroll",
				scale: "weeks",
				maxScale: "months",
				minScale: "days",
				itemsPerPage: 10,
				onItemClick: function(data) {
					alert("Item clicked - show some details");
				},
				onAddClick: function(dt, rowId) {
					alert("Empty space clicked - add an item!");
				},
				onRender: function() {
					if (window.console && typeof console.log === "function") {
						console.log("chart rendered");
					}
				}
			});

			$(".gantt").popover({
				selector: ".bar",
				title: "I'm a popover",
				content: "And I'm the content of said popover.",
				trigger: "hover"
			});

			prettyPrint();

		});

    </script>
		   <script src="js/menu_jquery.js"></script>
</body>
</html>
