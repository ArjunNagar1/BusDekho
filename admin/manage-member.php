<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if($_GET['action']='del')
{
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"delete from tblmember where id='$postid'");
if($query) 
{
$msg="Photo deleted ";
}
else{
$error="Something went wrong . Please try again.";    
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
        <title>Adminportal | Manage depot</title>
		
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


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Manage Member </h4>
 
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
																					   
											<th>Travel Agency</th>
											<th>Contact Person</th>
											<th>Mobile</th>
											<th>City</th>
											<th>No Of Vichal</th>
											<th>Created Date</th>
											<th>Update Date</th>
											<th>Action</th>
											</tr>
											</thead>
											<tbody>

											<?php
											$query=mysqli_query($con,"SELECT *  FROM tblmember");
											$rowcount=mysqli_num_rows($query);
											if($rowcount==0)
											{
											?>
											<p>

											<h3 style="color:red">No record found</h3>
											</p>
											<?php 
											} else {
											while($row=mysqli_fetch_array($query))
											{
											?>
											 <tr>
											<td><b><?php echo $row['name'];?></b></td>
											<td><b><?php echo $row['person'];?></b></td>									
											<td><b><?php echo $row['mobile'];?></b></td>
											<td><b><?php echo $row['city'];?></b></td>
											<td><b><?php echo $row['no_vichal'];?></b></td>
											<td><b><?php echo $row['crated_date'];?></b></td>
											<td><b><?php echo $row['update_date'];?></b></td>
											<td>
 
												<a href="manage-member.php?pid=<?php echo $row['id'];?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>

											 </tr>
											<?php } }?>
                                               
                                            </tbody>
                                        </table>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>



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