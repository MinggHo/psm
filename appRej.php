<?php require_once('Connections/slas.php');
session_start();
//chech session availability
if (!isset($_SESSION['MM_UserGroup']) && ($_SESSION['MM_Username']) ) {
  header("location: ../index.php");
}
?>
<?php
mysql_connect('localhost','root','root');
mysql_select_db('slas');
$s = $_SESSION['MM_Username'];
if(isset ($_SESSION['MM_Username']))
{
	$sql ="Select b.book_id, s.name, b.description, b.status, b.subject, b.date, b.time, b.lecturer, l.username from student s, booking b, lecturer l  where b.lecturer=l.name and l.username ='{$s}' and b.username=s.username";
	$result = mysql_query($sql);
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
							  Lecturer Page - Approve/Reject Appointment
							  <br>
								<div class="bs-example4" data-example-id="contextual-table">
									<font color="black">
						<table class="table table-responsive">
						  <thead>
							<tr>
							  <th style="width:15px;">No.</th>
							  <th>Student Name</th>
							  <th>Subject</th>
							  <th>Date</th>
							  <th>Time</th>
							  <th>Description</th>
							  <th>Status</th>
							  <th>Approve/Reject</th>
							</tr>
						  </thead>
						  <tbody>
						  </font>
							<?php
					$no = 1;
					while($row = mysql_fetch_object($result))
					{
            $date = new DateTime();
            $date->modify($row->date);
        		$nextDate = $date->format('d/m/y');
            ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $row->name ?></td>
						<td><?php echo $row->subject ?></td>
						<td><?php echo $nextDate ?></td>
						<td><?php echo $row->time ?></td>
						<td><?php echo $row->description ?></td>
						<td><?php echo $row->status ?></td>
						<!-- <td><a href="approval.php?book_id=<?php echo $row->book_id?>"><img src="images/1449950325_approve.png" width="66" height="68" /></a></td> -->
            <td><a id = "approve" href = "approval.php?book_id=<?php echo $row->book_id?>&state=Approve" class="btn btn-sm btn-success" title="Approve"><i class="fa fa-music"></i></a>
            <a id = "reject" href = "approval.php?book_id=<?php echo $row->book_id?>&state=Reject" class="btn btn-sm btn-danger" title="Reject"><i class="fa fa-bell-o"></i></a></td>
					<?php
					$no++;
                    }
                    ?>
						  </tbody>
						</table>
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
   <!-- real-time -->
<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
	<script>

	$(function() {
    // $("#approve").click(function() {
    //   alert('approve');
    // });
    //
    // $("#reject").click(function() {
    //   alert('reject');
    // });
  });

	</script>
   <script src="js/menu_jquery.js"></script>
</body>
</html>
