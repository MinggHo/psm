<?php
session_start();
if(!isset($_SESSION['MM_Username'])){
	header("location: index.php");
}
?>
<?php
mysql_connect('localhost', 'root', 'root');
mysql_select_db('slas');
$sql = "select name from lecturer";
$res = mysql_query($sql);

if(isset($_POST['submit'])){


			$sql = mysql_query("insert into booking(subject, description, date, time, username, lecturer)
			values('{$_POST['subject']}','{$_POST['description']}','{$_POST['date']}','{$_POST['time']}','{$_POST['name']}','{$_POST['lecturer']}')");
			if($sql)
			{
				echo "<script type='text/javascript'>alert('Sucessfully insert.');window.location='viewStatus.php';</script>";
			}
			else
			{
				echo "<script type='text/javascript'>alert('Insert fail.');</script>";
	}

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
<script src="js/amcharts.js"></script>
<script src="js/serial.js"></script>
<script src="js/light.js"></script>
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
   <!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
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


					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
								Student Page - Book Appointment !
							</div>
							<div class="panel-body">
				<div class="registration_form">
						 <!-- Form -->
						 <div class = "col-md-6">
							<form action="" enctype="multipart/form-data" method="post">
							<div>
								<label class="col-sm-4 control-label"><font color="black">Date Of Booking :</font></label>
								<div class="col-sm-6">
									<input placeholder="" type="date" name="date" tabindex="4" >
								</div>
							</div>
							<div>
								<label class="col-sm-4 control-label"><font color="black">Time of Booking :</font></label>
								<div class="col-sm-6">
								<input placeholder="" type="time" name="time" tabindex="4" >
							</div>
								<div>
									<label>
										<input placeholder="Subject:" name="subject" type="text" tabindex="1" required="">
									</label>
							</div>
							<div>
								<label>
								<input placeholder="Description:" name="description" type="text" tabindex="2" required="">
								</label>
							</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Lecturer Name</label>
									<div class="col-sm-8">
										<select class="form-control1" name="lecturer">
											<option>Select Lecturer</option>
											<?php while($rekod = mysql_fetch_object($res)) { echo
											"<option value='$rekod->name'>$rekod->name</option>"; } ?>
										</select>
									</div>
							</div>
				<div>
					<label>
						<input placeholder="Student name" value="<?php echo $_SESSION['MM_Username'];?>" name="name" type="text" tabindex="4" required="">
					</label>
				</div>

				<br>
				<br>

				<div>
					<input type="submit" name="submit" value="Save">
				</div>
			</form>
		</div>
			<!-- /Form -->
		</div>
								<div class="contain">
								</div>
								<!-- status -->
							</div>
						</div>
					</div>

						<!--//area-->
		<div class="fo-top-di"
			<div class="foot-top">

					<div class="col-md-6 s-c">
						<li>
							<div class="fooll">
								<h1>follow us on</h1>
							</div>
						</li>
						<li>
							<div class="social-ic">
								<ul>
									<li><a href="https://www.facebook.com/groups/ftmkroom/"><i class="facebok"> </i></a></li>
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
											<li id="menu-academico-boletim" ><a href="approval.php">Edit Account</a></li>
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
