<?php 
session_start();
//chech session availability
if (!isset($_SESSION['MM_Username'])) {
  header("location: ../../index.php");
}
?>
<?php
mysql_connect('localhost','root','');
	mysql_select_db('slas');
$username = $_SESSION['MM_Username'];
if(isset($_SESSION['MM_Username']))
{
	$sql = mysql_query("Select a.name , a.password , a.dob , a.department ,a.phone from lecturer a where a.lect_id=a.lect_id and  a.lect_id = '{$_GET['lect_id']}'");
	$row = mysql_fetch_object($sql);
}
if(isset($_POST['submit']))
{
	$sqlnophoto = "UPDATE lecturer SET
			name ='{$_POST['name']}', 
			password ='{$_POST['password']}',
			dob ='{$_POST['dob']}',
			department = '{$_POST['department']}',
			phone = '{$_POST['phone']}'
							WHERE lect_id = '{$lect_id}'";
				$res = mysql_query($sqlnophoto);
				if ($res)
				{
				echo "<script type='text/javascript'>alert('Sucessfully update.');window.location='viewL.php';</script>";			
				}
				else {
					echo  "<script type='text/javascript'>alert('Update fail.');</script>";}
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
   <!--pie-chart-->
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
							  Admin page
							  <br>
							  <br>
							  
							  <div class="registration_form">
								 <!-- Form -->
									<form action="" enctype="multipart/form-data" method="POST">
										<div>
											<label>
												<input placeholder="Name :" type="text" name="name" value="<?php echo $row->name; ?>" tabindex="4" required="">
											</label>
										</div>
										<div>
											<label>
												<input placeholder="Password :" type="text" name="password" value="<?php echo $row->password; ?>" tabindex="4" required="">
											</label>
										</div>						
										<div>
											<label>
												<input placeholder="Date Of Birth :"value="<?php echo $row->dob; ?>" name="dob" type="date" tabindex="4" >
											</label>
										</div>	
										<div>
											<label>
												<input placeholder="Department :"value="<?php echo $row->department; ?>" type="text" name="department" tabindex="3" >
											</label>
										</div>
										<div>
											<label>
												<input placeholder="Phone Number :"value="<?php echo $row->phone; ?>" name="phone" type="text" tabindex="3" >
											</label>
										</div>
										<div>
											<input type="submit" name="submit" value="Save">
										</div>
									</form>
									<!-- /Form -->
								</div>
							</div>
							<div class="panel-body">
								<!-- status -->
								<div class="contain">	
									<div class="gantt"></div>
								</div>
								<!-- status -->
							</div>
						</div>
					</div>
			
						<!--//area-->					
		<div class="fo-top-di">
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
										<li><a href="admin.php"><i class="fa fa-tachometer"></i> <span>Home</span></a></li> 
										<li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>News</span> <span class="fa fa-angle-right" style="float: right"		></span></a>
											<ul id="menu-academico-sub" >
												<li id="menu-academico-avaliacoes" ><a href="addNews.php">Add</a></li>
												<li id="menu-academico-boletim" ><a href="manage.php">Manage News</a></li>
											</ul>
									</li>
									<li id="menu-academico" ><a href="#"><i class="lnr lnr-pencil"></i> <span>Manage User</span> <span class="fa fa-angle-right" style="float: right" 	></span></a>
										<ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="editUser.php">Edit User</a></li>
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