<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

// For adding post  
if(isset($_POST['submit']))
{
$bus_line=$_POST['bus_line'];
$city_from=$_POST['city_from'];
$city_to=$_POST['city_to'];
$arrival_time=$_POST['arrival_time'];
$departure_time=$_POST['departure_time'];
$route=$_POST['route'];

 
$seat=$_POST['seat'];
$vendor=$_POST['vendor']; 
 

               

 

$arrival_minite=$_POST['arrival_minite'];
$arrival_S=$_POST['arrival_s'];

$departure_minite=$_POST['departure_minite'];
$departure_s=$_POST['departure_s'];
$postid=intval($_GET['pid']); 

$bus_code=$_POST['bus_code']; 
 
 
$query=mysqli_query($con,"update tblbus set route='$route',

bus_line='$bus_line',
city_from='$city_from',
city_to='$city_to',
seat='$seat',
vendor='$vendor'
where id='$postid'");


 


if($query)
{
$msg="Post successfully added ";
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
           <?php include('includes/topheader.php');?>
            <!-- ========== Left Sidebar Start ========== -->
             <?php include('includes/leftsidebar.php');?>
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
                                    <h4 class="page-title">Update Bus </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="add-bus.php">Add More</a>
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
						<?php if($msg){ ?>
						<div class="alert alert-success" role="alert">
						<strong>Well done!</strong> <?php echo htmlentities($msg);?>
						</div>
						<?php } ?>

						<!---Error Message--->
						<?php if($error){ ?>
						<div class="alert alert-danger" role="alert">
						<strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
						<?php } ?>


						</div>
						</div>

							<?php
							$postid=intval($_GET['pid']);
							$queryup=mysqli_query($con,"select * from tblbus where tblbus.id='$postid'");
							while($rowup=mysqli_fetch_array($queryup))
							{
							?>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="card-box">
									<form name="addpost" method="post" enctype="multipart/form-data">
									
									<input type="hidden"  value="<?php echo $rowup['bus_code'];?>"  name="bus_code" >
									
									
									
									
								<div class="row">
								   <div class="col-xs-4">
								   <div class="form-group m-b-20">
									<label for="exampleInputEmail1">LINE</label>
								    <select class="form-control" name="bus_line" id="bus_line">
										<option><?php echo $rowup['bus_line'];?></option>
										<option>ROADWAYS</option>
										<option>PRIVATE</option>
									</select>
									</div>
									</div>


                                    <div class="col-xs-4">
									<div class="form-group m-b-20">
									<label for="exampleInputEmail1">To</label>		
                                    <select class="form-control" name="city_from" id="city_from">
									<option><?php echo $rowup['city_from'];?></option>
									
											<?php
											$query=mysqli_query($con,"select *  from tblcity");
											while($row=mysqli_fetch_array($query))
											{
											?>											
										<option><?php echo $row['city'];?></option>
										<?php   }?>
									</select>
									</div>
									</div>
									
									<div class="col-xs-4">
									<div class="form-group m-b-20">
									<label for="exampleInputEmail1">From</label>
                                    <select class="form-control" name="city_to" id="city_to">
									<option><?php echo $rowup['city_to'];?></option>
											<?php
											$query=mysqli_query($con,"select *  from tblcity");
											while($row=mysqli_fetch_array($query))
											{
											?>											
										<option><?php echo $row['city'];?></option>
										<?php   }?>
									</select>
									</div>
									</div>
									
 

									
									<div class="col-xs-4">									
									<div class="form-group m-b-20">
									<label for="exampleInputEmail1">Route</label>
                                    <input type="text" class="form-control" value="<?php echo $rowup['route'];?>" id="route" name="route" placeholder="Departure route" required>
									</div>
									</div>	

	
 									<div class="col-xs-4">									
									<div class="form-group m-b-20">
									<label for="exampleInputEmail1">Vendor</label> 
                                    <select class="form-control" name="vendor" id="vendor">
									<option><?php echo $rowup['vendor'];?></option>
											<?php
											$query=mysqli_query($con,"select *  from tblvendor");
											while($row=mysqli_fetch_array($query))
											{
											?>											
										<option><?php echo $row['travel_name'];?></option>
										<?php   }?>
									</select>
 
									
									
									</div>
									</div>
 									


									<div class="col-xs-4">									
									<div class="form-group m-b-20">
									<label for="exampleInputEmail1">No OF Seat</label> 
									<input type="text"    name="seat"   value="<?php echo $rowup['seat'];?>" required> 
									</div>
									</div>	

 										
								</div>
									
 

 
									
 
 									
									
									<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
									 <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                        </form>
                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
	                 <?php   }?>


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

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
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