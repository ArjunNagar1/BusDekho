<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if ($_GET['action'] = 'del') {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "delete from tblreport where id='$postid'");
        if ($query) {
            $msg = "report deleted ";
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
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Adminportal | Manage Report</title>

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
                                    <h4 class="page-title">Manage Report </h4>
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

                                                        <th>Vendor</th>
                                                        <th>City From</th>
                                                        <th>City To</th>
                                                        <th>Report Msg</th>
                                                        <th>Sender Name</th>
                                                        <th>Mobile</th>
                                                        <th>View</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $query = mysqli_query($con, "select *  from tblreport");
                                                    $rowcount = mysqli_num_rows($query);
                                                    if ($rowcount == 0) {
                                                    ?>
                                                        <p>

                                                        <h3 style="color:red">No record found</h3>
                                                        </p>
                                                        <?php
                                                    } else {
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <tr>
                                                                <td><b><?php echo htmlentities($row['vendor']); ?></b></td>
                                                                <td><b><?php echo htmlentities($row['city_form']); ?></b></td>
                                                                <td><b><?php echo htmlentities($row['city_to']); ?></b></td>
                                                                <td><b><?php echo htmlentities($row['msg']); ?></b></td>
                                                                <td><b><?php echo htmlentities($row['username']); ?></b></td>
                                                                <td><b><?php echo htmlentities($row['mobile']); ?></b></td>
                                                                <td><a href="view.php?busid=<?php echo $row['busid']; ?>" class="btn btn-success waves-effect waves-light" target="_blank">View</a></td>

                                                                <td>
                                                                    <!--<a href="edit-depot.php?pid=<?php echo $row['id']; ?>"> <i class="fa fa-pencil" style="color: #f05050"></i></a>-->
                                                                    <!--&nbsp;-->
                                                                    <a href="manage-report.php?pid=<?php echo $row['id']; ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a>
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