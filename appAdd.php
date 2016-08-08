<?php require_once('Connections/slas.php');
session_start();
//chech session availability
if (!isset($_SESSION['MM_UserGroup']) && ($_SESSION['MM_Username']) ) {
  header("location: ../index.php");
}
?>
<?php
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
              <hr></div>
							<div class="panel-body">
                <form action="" method="post">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control input" id="subject" name="subject" placeholder="Enter subject">
                  </div>
                  <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>
                </div>
                </div>
                  <div class="col-xs-6">
                    <div class="col-xs-6">
                      <div class="form-group">
                        <label for="subject">Date</label>
                        <input type="date" class="form-control input" id="date" name="date" placeholder="Enter subject">
                      </div>
                    </div>
                    <div class="col-xs-5">
                      <div class="form-group">
                        <label>Time</label>
                        <select class="form-control">
                          <option value="8">08:00</option>
                          <option value="10">10:00</option>
                          <option value="12">12:00</option>
                          <option value="14">14:00</option>
                          <option value="16">16:00</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12">

                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                            Unavailable all week [ <span id="curWeek"></span> ]
                          </label>
                        </div>

                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                            Checkbox 2
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
    var curWeek = document.getElementById('curWeek');

    curWeek.innerHTML = String(latest_date.getNextWeekMonday()).slice(0, 10) + " - " + String(latest_date.getNextWeekFriday()).slice(0, 10);

  });

	</script>
   <script src="js/menu_jquery.js"></script>
</body>
</html>
