<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$travel_name=$_POST['travel_name'];
            

$no_vichal=$_POST['no_vichal'];
$contact_no=$_POST['contact_no'];
$contact_no2=$_POST['contact_no2'];
$email_id=$_POST['email_id'];
$wed_address=$_POST['wed_address'];
$address=$_POST['address'];
$about=$_POST['about'];
  




$imgfile=$_FILES["postimage"]["name"];

// get the image extension

$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));

// allowed extensions

$allowed_extensions = array(".jpg","jpeg",".png",".gif");

// Validation for allowed extensions .in_array() function searches an array for a specific value.

if(!in_array($extension,$allowed_extensions))

{

echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";

}

else

{

//rename the image file

$imgnewfile=md5($imgfile).$extension;

// Code for move image into directory

move_uploaded_file($_FILES["postimage"]["tmp_name"],"postimages/".$imgnewfile);

$status=1;

 


$query=mysqli_query($con,"insert into tblvendor(travel_name,no_vichal,contact_no,contact_no2,email_id,wed_address,address,about,PostImage) values('$travel_name','$no_vichal','$contact_no','$contact_no2','$email_id','$wed_address','$address','$about','$imgnewfile')");

if($query)
{
$msg="Vendor created ";
}
else{
$error="Something went wrong . Please try again.";    
} 

}
}


?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Add travel_name</title>

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
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>
 <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                   <br>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add travel_name </b></h4>
                                    <hr />
                        		


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





                        			<div class="row">
                        				<div class="col-md-10">
                        					<form class="form-horizontal" name="travel_name" method="post" enctype="multipart/form-data">

	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Travel Name</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="travel_name"  >
	                                                </div>
	                                            </div>										 
										 
										 
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">No Of Vichal</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="no_vichal"  >
	                                                </div>
	                                            </div>										 
										 
										 
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Conatct No 1</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="contact_no"  >
	                                                </div>
	                                            </div>										 
										 
										 
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Conatct No 2</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="contact_no2"  >
	                                                </div>
	                                            </div>										 
										 
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Email</label>
	                                                <div class="col-md-10">
	                                                    <input type="email" class="form-control" value="" name="email_id"  >
	                                                </div>
	                                            </div>										 
										 
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Web Site</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="wed_address"  >
	                                                </div>
	                                            </div>										 
										 
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Address</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="address"  >
	                                                </div>
	                                            </div>										 
										 
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">About</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="about"  >
	                                                </div>
	                                            </div>

												
													<div class="form-group">

													<label class="col-md-2 control-label">Icon Image</label>
													<div class="col-md-10">
													<input type="file" class="form-control" id="postimage" name="postimage"  required>
													</div>
													</div>

                                                   <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                  
                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                    Submit
                                                </button>
                                                    </div>
                                                  </div>

	                                        </form>
                        				</div>


                        			</div>


                        			




           
                       


                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

<?php include('includes/footer.php');?>

            </div>
        </div>

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
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php } ?>