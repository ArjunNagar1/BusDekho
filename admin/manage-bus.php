<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if ($_GET['action'] = 'del') {
        $postid = $_GET['pid'];
        $query = mysqli_query($con, "delete from tblbus where bus_code='$postid'");
        $query2 = mysqli_query($con, "delete from tblstation where bus_code='$postid'");

        if ($query) {
            $msg = "Post deleted ";
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="route" content="ADMIN PANEL BY NSK">
        <meta name="author" content="NSK">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Adminportal | Manage BUS</title>

        <!--Morris Chart CSS -->


        <!-- jvectormap -->


        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="assets/js/table.css">





    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"> Manage Bus </h4>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->




                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">


                                    <div class="table-responsive">

                                        <div class="container demo">
                                            <table class="datatable table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>vendor</th>
                                                        <th>To</th>
                                                        <th>From</th>
                                                        <th>Arrival Time</th>
                                                        <th>Departure Time</th>
                                                        <th>Route</th>
                                                        <th>Station</th>
                                                        <th>Bus Type</th>
                                                        <th>Action</th>
                                                        <th>Reuse</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $query = mysqli_query($con, "SELECT *   FROM 
 (SELECT tblbus.id
 ,tblstation.bus_code,tblstation.arrival AS starttime,tblbus.vendor,tblbus.`city_from`,tblbus.`city_to`,tblbus.`seat`,tblbus.`route`,tblstation.`day` AS startday
 FROM tblstation,tblbus
 WHERE distance = '00' AND tblstation.`bus_code`= tblbus.`bus_code`  AND STATUS ='active' ORDER BY tblstation.arrival ASC  ) AS TAB_1, 
 (SELECT   bus_code,arrival AS endtime ,tblstation.`day` AS endday
 FROM     tblstation  WHERE departure ='Stop' ) AS TAB_2
 WHERE TAB_1.bus_code = TAB_2.bus_code
 
 

											 
 GROUP BY TAB_1.`bus_code`");
                                                    $rowcount = mysqli_num_rows($query);
                                                    if ($rowcount == 0) {
                                                    ?>
                                                        <p>No DATA</p>
                                                        <?php
                                                    } else {
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <tr>
                                                                <td><b><?php echo $row['vendor']; ?></b></td>
                                                                <td><?php echo $row['city_from'] ?></td>
                                                                <td><?php echo $row['city_to'] ?></td>
                                                                <td><?php echo $row['starttime']; ?></td>
                                                                <td><?php echo $row['endtime']; ?></td>
                                                                <td><?php echo $row['route'] ?></td>
                                                                <td>


                                                                    <a href="manage-busstop.php?pid=<?php echo $row['bus_code']; ?>"><button>Station</button></a>



                                                                </td>

                                                                <td>
                                                                    <a href="manage-bustype.php?pid=<?php echo $row['bus_code']; ?>"><button>Bus&nbsp;Type</button></a>
                                                                </td>

                                                                <td>

                                                                    <a href="edit-bus.php?pid=<?php echo $row['id']; ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                                                    &nbsp;<a href="manage-bus.php?pid=<?php echo $row['bus_code']; ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a>
                                                                </td>



                                                                <td>

                                                                    <a href="reuse-bus.php?pid=<?php echo $row['bus_code']; ?>&&buscode=<?php echo $row['bus_code']; ?>"><button>REUSE</button></a>
                                                                </td>
                                                            </tr>
                                                    <?php }
                                                    } ?>

                                                </tbody>

                                            </table>

                                        </div>








                                    </div>
                                </div>
                            </div>
                        </div>



                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src='assets/js/jquery.dataTables.min.js'></script>
        <script src="assets/js/table.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <!-- jQuery  -->




    </body>

    </html>
<?php } ?>