<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    // For adding post  
    if (isset($_POST['submit'])) {


        $unique = $_GET['pid'];
        $bus_line = $_POST['bus_line'];
        $city_from = $_POST['city_from'];
        $city_to = $_POST['city_to'];
        $arrival_time = $_POST['arrival_time'];
        $departure_time = $_POST['departure_time'];
        $route = $_POST['route'];
        $seat = $_POST['seat'];
        $vendor = $_POST['vendor'];
        $ordinary = $_POST['ordinary'];



        $ac = $_POST['ac'];
        $super_deluxe = $_POST['super_deluxe'];
        $volvo = $_POST['volvo'];
        $sleeper = $_POST['sleeper'];
        $express = $_POST['express'];
        $super_luxury = $_POST['super_luxury'];

        $arrival_minite = $_POST['arrival_minite'];
        $arrival_S = $_POST['arrival_S'];

        $departure_minite = $_POST['departure_minite'];
        $departure_s = $_POST['departure_s'];
        $day = $_POST['day'];

        $postid = $_GET['pid'];



        $query2 = mysqli_query($con, "delete from tblstation where bus_code='$postid'");

        $number1 = count($_POST["station"]);
        if ($query2) {
            for ($i = 0; $i < $number1; $i++) {
                $query = mysqli_query($con, "INSERT INTO tblstation (`bus_code`,`station`,`arrival`,`departure`,`distance`,`day`) VALUES ('$unique','" . mysqli_real_escape_string($con, $_POST["station"][$i]) . "','" . mysqli_real_escape_string($con, $_POST["arrival"][$i]) . "','" . mysqli_real_escape_string($con, $_POST["departure"][$i]) . "','" . mysqli_real_escape_string($con, $_POST["distance"][$i]) . "','" . mysqli_real_escape_string($con, $_POST["day"][$i]) . "')");
            }
        }

        if ($query) {
            $msg = "Post successfully added ";
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
        <meta name="route" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Admin | Manage Bus </title>

        <!-- Summernote css -->
        <link href="plugins/summernote/summernote.css" rel="stylesheet" />



        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>
            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->



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
                                    <h4 class="page-title">Manage Bus Stop </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="manage-bus.php">Manage</a>
                                        </li>

                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <!---Success Message--->
                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <!---Error Message--->
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="card-box">
                                        <form name="addpost" method="post" enctype="multipart/form-data">
                                            <div class="row">




                                                <script src="assets/js/jquery.min.js"></script>
                                                <script src="assets/js/bootstrap.min.js"></script>

                                                <table class="table table-bordered table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Station</th>
                                                            <th>Arrival</th>
                                                            <th>Departure</th>
                                                            <th>Distance</th>
                                                            <th>Distance</th>

                                                        </tr>
                                                    </thead>
                                                    <!-- For storing multiple values in php get array of fields-->
                                                    <tbody>
                                                        <?php
                                                        $postid = $_GET['pid'];
                                                        $queryss = mysqli_query($con, "SELECT * FROM tblstation where bus_code = '$postid'");
                                                        while ($rowss = mysqli_fetch_array($queryss)) {
                                                        ?>


                                                            <tr class="after-add-more">
                                                                <td>
                                                                    <select class="form-control" name="station[]">
                                                                        <option><?php echo $rowss['station']; ?></option>
                                                                        <?php
                                                                        $query = mysqli_query($con, "select *  from tblcity");
                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option><?php echo $row['city']; ?></option>
                                                                        <?php   } ?>
                                                                    </select>

                                                                </td>
                                                                <td><input type="text" name="arrival[]" value="<?php echo $rowss['arrival']; ?>" class="form-control"></td>
                                                                <td><input type="text" name="departure[]" value="<?php echo $rowss['departure']; ?>" class="form-control"></td>
                                                                <td><input type="text" name="distance[]" value="<?php echo $rowss['distance']; ?>" class="form-control"></td>
                                                                <td style="width: 109px;">
                                                                    <select class="form-control single" name="day[]" id="city_to">
                                                                        <option value="<?php echo $rowss['day']; ?>">Day <?php echo $rowss['day']; ?></option>
                                                                        <option value="1">Day 1</option>
                                                                        <option value="2">Day 2</option>
                                                                        <option value="3">Day 3</option>
                                                                        <option value="4">Day 4</option>
                                                                        <option value="5">Day 5</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <span class="glyphicon plus">&#x2b;</span>
                                                                    <span class="glyphicon alert-danger minus">&#xe082;</span>
                                                                </td>
                                                            </tr>
                                                        <?php   } ?>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control" name="station[]">
                                                                    <?php
                                                                    $query = mysqli_query($con, "select *  from tblcity");
                                                                    while ($row = mysqli_fetch_array($query)) {
                                                                    ?>
                                                                        <option><?php echo $row['city']; ?></option>
                                                                    <?php   } ?>
                                                                </select>

                                                            </td>
                                                            <td><input type="text" name="arrival[]" class="form-control"></td>
                                                            <td><input type="text" name="departure[]" class="form-control"></td>
                                                            <td><input type="text" name="distance[]" class="form-control"></td>
                                                            <td style="width: 109px;">
                                                                <select class="form-control single" name="day[]" id="city_to">
                                                                    <option value="1">Day 1</option>
                                                                    <option value="2">Day 2</option>
                                                                    <option value="3">Day 3</option>
                                                                    <option value="4">Day 4</option>
                                                                    <option value="5">Day 5</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <span class="glyphicon plus">&#x2b;</span>
                                                                <span class="glyphicon alert-danger minus">&#xe082;</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <script>
                                                    $(document).ready(function() {
                                                        $(".plus").click(function() {
                                                            var cloneTr = $(this).closest('tr').clone();
                                                            $(cloneTr).find('input').val("");
                                                            $(cloneTr).find('.plus').hide();
                                                            $(cloneTr).find('.minus').removeAttr('style');
                                                            $(this).closest('tr').after(cloneTr).closest('tbody');
                                                        });

                                                        $(document).on("click", ".minus", function() {
                                                            $(this).closest('tr').remove();
                                                        });
                                                    });
                                                </script>

                                                <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                        </form>
                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



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
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>


        <!--Summernote js-->
        <script src="plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->


        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>
            jQuery(document).ready(function() {

                $('.summernote').summernote({
                    height: 240, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: false // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>


        <!--Summernote js-->
        <script src="plugins/summernote/summernote.min.js"></script>




    </body>

    </html>
<?php } ?>