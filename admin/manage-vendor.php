<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_GET['action']))

{
$postid=$_GET['rid'];
  $vendor=$_GET['vendor'];
$query=mysqli_query($con,"update tblvendor set status='deactive' where id='$postid'");
$query2=mysqli_query($con,"update tblbus set status='deactive' where vendor='$vendor'");
echo mysqli_error($con);
echo ("<script LANGUAGE='JavaScript'>
          window.alert('Succesfully Deactive');
          window.location.href='manage-vendor.php';
       </script>");
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
        <title>Manage travel_name</title>

		
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
           <?php include('includes/topheader.php');?>

            <!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

 
 <br>


                                    <div class="row">

 
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Vendor 
							<div style="float: right;margin-top: -5px;">
							<a href="add-vendor.php">
							<button id="addToTable" class="btn btn-success waves-effect waves-light">Add More Vendor <i class="mdi mdi-plus-circle-outline" ></i></button>
							</a>
							</div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<div class="table-responsive">
                             <table id="example" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Travel Name</th>
																 <th>Mobile No</th>
																 <th>Address</th>
																 <th>Total Bus</th>
 
 
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
													<?php 
													$query=mysqli_query($con,"SELECT COUNT(tblbus.`vendor`) AS countb,tblvendor.* FROM tblvendor 
													LEFT JOIN `tblbus` ON 
													tblbus.`vendor` = tblvendor.`travel_name`
													WHERE tblvendor.`status` = 'active'
													GROUP BY tblvendor.`travel_name`");
													$cnt=1;
													while($row=mysqli_fetch_array($query))
													{
													?>

													 <tr>
													<th scope="row"><?php echo htmlentities($cnt);?></th>
													<td><?php echo htmlentities($row['travel_name']);?></td>
													<td><?php echo htmlentities($row['contact_no']);?></td>
													<td><?php echo htmlentities($row['address']);?></td>

													<td><?php echo htmlentities($row['countb']);?></td>
 
 
													<td>
													    <a href="edit-vendor.php?cid=<?php echo htmlentities($row['id']);?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a> 
														

														
														&nbsp;<a href="manage-vendor.php?rid=<?php echo htmlentities($row['id']);?>&&action=del&&vendor=<?php echo $row['travel_name'];?>"> <i class="fa fa-trash-o" style="color: #f05050"> De Active</i></a> 
 
														
														</td>
													</tr>
													<?php
													$cnt++;
													 } ?>
													</tbody>
                                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
													<script>
													$(document).ready(function() {
														$('#example').DataTable();
													} );
													</script> 


                    </div> <!-- container -->

                </div> <!-- content -->

       <?php include('includes/footer.php');?>

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

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
         <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src='assets/js/jquery.dataTables.min.js'></script>
		<script  src="assets/js/table.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
		<!-- jQuery  -->

    </body>
</html>
<?php } ?>