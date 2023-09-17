<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
   header('location:index.php');
} else {

   // For adding post  
   if (isset($_POST['submit'])) {
      $today = date("Ymd");
      $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
      $unique = $today . $rand;
      $bus_line = $_POST['bus_line'];
      $city_from = $_POST['city_from'];
      $city_to = $_POST['city_to'];

      $route = $_POST['route'];
      $seat = $_POST['seat'];
      $vendor = $_POST['vendor'];


      $number1 = count($_POST["station"]);

      for ($i = 0; $i < $number1; $i++) {
         $query = mysqli_query($con, "INSERT INTO tblstation (`bus_code`,`station`,`arrival`,`departure`,`distance`,`day`) VALUES ('$unique','" . mysqli_real_escape_string($con, $_POST["station"][$i]) . "','" . mysqli_real_escape_string($con, $_POST["arrival"][$i]) . "','" . mysqli_real_escape_string($con, $_POST["departure"][$i]) . "','" . mysqli_real_escape_string($con, $_POST["distance"][$i]) . "','" . mysqli_real_escape_string($con, $_POST["day"][$i]) . "')");
      }


      $number2 = count($_POST["bustype"]);

      for ($i = 0; $i < $number2; $i++) {
         $query = mysqli_query($con, "INSERT INTO tblbustype (`bus_code`,`bustype`) VALUES ('$unique','" . mysqli_real_escape_string($con, $_POST["bustype"][$i]) . "')");
      }






      $query = mysqli_query($con, "insert into tblbus(bus_line,city_from,city_to,route,seat,vendor,bus_code) values('$bus_line','$city_from','$city_to','$route','$seat','$vendor','$unique')");


      if ($query) {
         $msg = "Post successfully added ";

         header("refresh:0.1;url=reuse-bus.php?buscode=$unique");
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
      <title>Adminportal | Add certificate</title>
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
                     <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Reuse Data</h3>
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
                  <?php
                  $postid = $_GET['buscode'];
                  $queryup = mysqli_query($con, "select * from tblbus where tblbus.bus_code='$postid'");
                  while ($rowup = mysqli_fetch_array($queryup)) {
                  ?>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card-box">
                              <div class="">
                                 <form name="addpost" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $rowup['bus_code']; ?>" name="bus_code">
                                    <div class="row">
                                       <div class="col-xs-4">
                                          <div class="form-group m-b-20">
                                             <label for="exampleInputEmail1">LINE</label>
                                             <select class="form-control" name="bus_line" id="bus_line">
                                                <option><?php echo $rowup['bus_line']; ?></option>
                                                <option>ROADWAYS</option>
                                                <option>PRIVATE</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-xs-4">
                                          <div class="form-group m-b-20">
                                             <label for="exampleInputEmail1">To</label>
                                             <select class="form-control" name="city_from" id="city_from">
                                                <option><?php echo $rowup['city_from']; ?></option>
                                                <?php
                                                $query = mysqli_query($con, "select *  from tblcity");
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                   <option><?php echo $row['city']; ?></option>
                                                <?php   } ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-xs-4">
                                          <div class="form-group m-b-20">
                                             <label for="exampleInputEmail1">From</label>
                                             <select class="form-control" name="city_to" id="city_to">
                                                <option><?php echo $rowup['city_to']; ?></option>
                                                <?php
                                                $query = mysqli_query($con, "select *  from tblcity");
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                   <option><?php echo $row['city']; ?></option>
                                                <?php   } ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-xs-12">
                                          <div class="form-group m-b-20">
                                             <label for="exampleInputEmail1">Route</label>
                                             <input type="text" class="form-control" value="<?php echo $rowup['route']; ?>" id="route" name="route" placeholder="Departure route" required>
                                          </div>
                                       </div>
                                       <div class="col-xs-4">
                                          <div class="form-group m-b-20">
                                             <label for="exampleInputEmail1">Vendor</label>
                                             <select class="form-control" name="vendor" id="vendor">
                                                <option><?php echo $rowup['vendor']; ?></option>
                                                <?php
                                                $query = mysqli_query($con, "select *  from tblvendor");
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                   <option><?php echo $row['travel_name']; ?></option>
                                                <?php   } ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-xs-4">
                                          <div class="form-group m-b-20">
                                             <label for="exampleInputEmail1">No OF Seat</label>
                                             <input type="text" class="form-control" name="seat" value="<?php echo $rowup['seat']; ?>" required> <br>
                                          </div>
                                       </div>
                                       <div class="col-xs-4">
                                          <div class="form-group m-b-20">
                                             <label for="exampleInputEmail1">Bus Type</label><br>
                                             <select name="bustype[]" class="form-control" required>

                                                <?php

                                                $bcode = $_GET['buscode'];
                                                $queryd = mysqli_query($con, "select *  from tblbustype where bus_code = '$bcode'");
                                                while ($rowd = mysqli_fetch_array($queryd)) {
                                                ?>
                                                   <option value="<?php echo $rowd['bustype']; ?>"><?php echo $rowd['bustype']; ?></option>
                                                <?php   } ?>

                                                <?php
                                                $query = mysqli_query($con, "select *  from tbltype");
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                   <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
                                                <?php   } ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-xs-12">
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
                                             <!--
                                             For storing multiple values in php get array of fields
                                             -->
                                             <tbody>
                                                <?php
                                                $postid = $_GET['buscode'];
                                                $queryss = mysqli_query($con, "SELECT * FROM tblstation where bus_code = '$postid'");
                                                while ($rowss = mysqli_fetch_array($queryss)) {
                                                ?>
                                                   <tr class="after-add-more">
                                                      <td >
                                                         <select class="form-control" name="station[]">
                                                            <option>
                                                               <?php echo $rowss['station']; ?></option>
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
                                       </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Reuse and Post</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                 </form>
                              </div>
                           </div>
                           <!-- end p-20 -->
                        </div>
                        <!-- end col -->
                     </div>
                     <!-- end row -->
                  <?php   } ?>
               </div>
               <!-- container -->
            </div>
            <!-- content -->
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