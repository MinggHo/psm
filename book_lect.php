<?php

  session_start();

  if ($_GET) {
  	$namaLect = $_GET['lecturer'];
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
        <script type="application/x-javascript">
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!-- jQuery -->
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <!-- lined-icons -->
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <style>
            .blacked {
                background: rgba(97, 104, 106, 0.67);
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
              <?php if($_GET) {
              echo $_GET['lecturer'];
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

                    <div class="content">

                        <div class="row">
                            <div id="message">
                                <?php
              if(isset($_SESSION['error_msg'])){?>
                                    <div class="col-lg-12">
                                        <div class="alert alert-danger" role="alert">
                                            <?= $_SESSION['error_msg']; ?>
                                        </div>
                                        <?php unset($_SESSION['error_msg']); ?>
                                    </div>
                                    <?php }elseif(isset($_SESSION['success_msg'])){?>
                                    <div class="col-lg-12">
                                        <div class="alert alert-success" role="alert">
                                            <?= $_SESSION['success_msg']; ?>
                                        </div>
                                        <?php unset($_SESSION['success_msg']); ?>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>


                        <div class="monthly-grid">
                            <div class="panel panel-widget">
                                <div class="panel-title">
                                    Student Page - Book Appointment !
                                </div>
                                <div>
                                    <div class="contain">

                                        <h4>
                  <?php
                   if($_GET) {
                       echo "Nama Lecturer : " . $_GET['lecturer'] ;
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

                            <!--//area-->
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
                        <ul id="menu">
                            <li><a href="student.php"><i class="fa fa-tachometer"></i> <span>Home</span></a></li>
                            <li id="menu-academico"><a href="searchLect.php"><i class="fa fa-table"></i> <span> Search and View Lect</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                            </li>

                            <li id="menu-academico"><a href="#"><i class="lnr lnr-layers"></i> <span>Book Appointment</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                                <ul id="menu-academico-sub">
                                    <li id="menu-academico-avaliacoes"><a href="book app.php">Book</a></li>
                                    <li id="menu-academico-boletim"><a href="viewStatus.php">View Booking Status</a></li>
                                </ul>
                            </li>
                            <li id="menu-academico"><a href="#"><i class="lnr lnr-pencil"></i> <span>Manage Profile</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                                <ul id="menu-academico-sub">
                                    <li id="menu-academico-boletim"><a href="viewAccountS.php">View Profile</a></li>
                                    <li id="menu-academico-boletim"><a href="approval.php">Edit Account</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <script>
                var toggle = true;

                $(".sidebar-icon").click(function() {
                    if (toggle) {
                        $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                        $("#menu span").css({
                            "position": "absolute"
                        });
                    } else {
                        $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                        setTimeout(function() {
                            $("#menu span").css({
                                "position": "relative"
                            });
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
            <script src="js/menu_jquery.js"></script>
            <script>
                window.onload = function() {

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

                    monday.innerHTML = String(latest_date.getNextWeekMonday()).slice(4, 10);
                    tuesday.innerHTML = String(latest_date.getNextWeekTuesday()).slice(4, 10);
                    wednesday.innerHTML = String(latest_date.getNextWeekWednesday()).slice(4, 10);
                    thursday.innerHTML = String(latest_date.getNextWeekThursday()).slice(4, 10);
                    friday.innerHTML = String(latest_date.getNextWeekFriday()).slice(4, 10);



                    var php = '<?php echo $namaLect; ?>';

                    if (php) {
                        $.ajax({
                            type: "POST",
                            data: {
                                lecturer_name: php
                            },
                            url: "getTable.php",
                            dataType: "json",
                            success: function(data) {
                                var result = data;
                                for (var i = 0; i < result.length; i++) {
                                    var obj = result[i];
                                    var objt = parseInt(obj.time);

                                    if (obj.Hari === "Monday") {
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

                                    if (obj.Hari === "Tuesday") {
                                        if (objt >= 8 && objt < 10) {
                                            var Tuesday0810 = document.getElementById('Tuesday0810');
                                            Tuesday0810.classList.add("blacked");
                                            Tuesday0810.innerHTML = "Booked";
                                        }
                                        if (objt >= 10 && objt < 12) {
                                            var Tuesday1012 = document.getElementById('Tuesday1012');
                                            Tuesday1012.classList.add("blacked");
                                            Tuesday1012.innerHTML = "Booked";
                                        }
                                        if (objt >= 12 && objt < 14) {
                                            var Tuesday1214 = document.getElementById('Tuesday1214');
                                            Tuesday1214.classList.add("blacked");
                                            Tuesday1214.innerHTML = "Booked";
                                        }
                                        if (objt >= 14 && objt < 16) {
                                            var Tuesday1416 = document.getElementById('Tuesday1416');
                                            Tuesday1416.classList.add("blacked");
                                            Tuesday1416.innerHTML = "Booked";
                                        }
                                        if (objt >= 16 && objt < 18) {
                                            var Tuesday1618 = document.getElementById('Tuesday1618');
                                            Tuesday1618.classList.add("blacked");
                                            Tuesday1618.innerHTML = "Booked";
                                        }
                                    }

                                    if (obj.Hari === "Wednesday") {
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

                                    if (obj.Hari === "Thursday") {
                                        if (objt >= 8 && objt < 10) {
                                            var Thursday0810 = document.getElementById('Thursday0810');
                                            Thursday0810.classList.add("blacked");
                                            Thursday0810.innerHTML = "Booked";
                                        }
                                        if (objt >= 10 && objt < 12) {
                                            var Thursday1012 = document.getElementById('Thursday1012');
                                            Thursday1012.classList.add("blacked");
                                            Thursday1012.innerHTML = "Booked";
                                        }
                                        if (objt >= 12 && objt < 14) {
                                            var Thursday1214 = document.getElementById('Thursday1214');
                                            Thursday1214.classList.add("blacked");
                                            Thursday1214.innerHTML = "Booked";
                                        }
                                        if (objt >= 14 && objt < 16) {
                                            var Thursday1416 = document.getElementById('Thursday1416');
                                            Thursday1416.classList.add("blacked");
                                            Thursday1416.innerHTML = "Booked";
                                        }
                                        if (objt >= 16 && objt < 18) {
                                            var Thursday1618 = document.getElementById('Thursday1618');
                                            Thursday1618.classList.add("blacked");
                                            Thursday1618.innerHTML = "Booked";
                                        }
                                    }

                                    if (obj.Hari === "Friday") {
                                        if (objt >= 8 && objt < 10) {
                                            var Friday0810 = document.getElementById('Friday0810');
                                            Friday0810.classList.add("blacked");
                                            Friday0810.innerHTML = "Booked";
                                        }
                                        if (objt >= 10 && objt < 12) {
                                            var Friday1012 = document.getElementById('Friday1012');
                                            Friday1012.classList.add("blacked");
                                            Friday1012.innerHTML = "Booked";
                                        }
                                        if (objt >= 12 && objt < 14) {
                                            var Friday1214 = document.getElementById('Friday1214');
                                            Friday1214.classList.add("blacked");
                                            Friday1214.innerHTML = "Booked";
                                        }
                                        if (objt >= 14 && objt < 16) {
                                            var Friday1416 = document.getElementById('Friday1416');
                                            Friday1416.classList.add("blacked");
                                            Friday1416.innerHTML = "Booked";
                                        }
                                        if (objt >= 16 && objt < 18) {
                                            var Friday1618 = document.getElementById('Friday1618');
                                            Friday1618.classList.add("blacked");
                                            Friday1618.innerHTML = "Booked";
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

                $("#ajxSubmit").click(function() {
                    var $lecturerName = $("#lecturerName").text().trim();
                    var $idPelajar = $("#idPelajar").text().trim();
                    var $desc = $("#desc").val();
                    var $subject = $("#subject").val();
                    var $tarikh = $("#setTarikh").text();
                    var $waktu = $("#waktuMula").text();
                    $waktu = $waktu + ":00";

                    $.ajax({
                        type: "POST",
                        url: "getdate.php",
                        dataType: "text",
                        data: {
                            lecturer_name: $lecturerName,
                            id_pelajar: $idPelajar,
                            desc: $desc,
                            subject: $subject,
                            tarikh: $tarikh,
                            waktu: $waktu
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });
                });
            </script>

    </body>

    </html>
