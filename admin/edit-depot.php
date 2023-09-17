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
$catid=intval($_GET['pid']);
$state=$_POST['state'];$city=$_POST['city'];$phone_no=$_POST['phone_no'];
$depot=$_POST['depot'];
$query=mysqli_query($con,"Update  tbldepot set depot='$depot',state='$state',city='$city',phone_no='$phone_no' where id='$catid'");
if($query)
{
$msg="depot Updated successfully ";
}
else{
$error="Something went wrong . Please try again.";    
} 
}


?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Admin | Update Depot</title>

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


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Update depot</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="add-depot.php">ADD More depot</a>
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Update depot </b></h4>
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

<?php 
$catid=$_GET['pid'];
$query=mysqli_query($con,"Select * from  tbldepot where  id='$catid'");
while($row=mysqli_fetch_array($query))
{
?>



                        			<div class="row">
                        				<div class="col-md-12">
                        					<form class="form-horizontal" name="phone_no" method="post">											                                      <div class="form-group m-b-20">                                    <label for="exampleInputEmail1">State</label>                                    <select id="state" class="form-control" name="state">                                               <option  value="<?php echo $row['city'];?>"><?php echo $row['city'];?></option>                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>                                                <option value="Andhra Pradesh">Andhra Pradesh</option>                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>                                                <option value="Assam">Assam</option>                                                <option value="Bihar">Bihar</option>                                                <option value="Chandigarh">Chandigarh</option>                                                <option value="Chhattisgarh">Chhattisgarh</option>                                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>                                                <option value="Daman and Diu">Daman and Diu</option>                                                <option value="Delhi">Delhi</option>                                                <option value="Goa">Goa</option>                                                <option value="Gujarat">Gujarat</option>                                                <option value="Haryana">Haryana</option>                                                <option value="Himachal Pradesh">Himachal Pradesh</option>                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>                                                <option value="Jharkhand">Jharkhand</option>                                                <option value="Karnataka">Karnataka</option>                                                <option value="Kerala">Kerala</option>                                                <option value="Lakshadweep">Lakshadweep</option>                                                <option value="Madhya Pradesh">Madhya Pradesh</option>                                                <option value="Maharashtra">Maharashtra</option>                                                <option value="Manipur">Manipur</option>                                                <option value="Meghalaya">Meghalaya</option>                                                <option value="Mizoram">Mizoram</option>                                                <option value="Nagaland">Nagaland</option>                                                <option value="Orissa">Orissa</option>                                                <option value="Pondicherry">Pondicherry</option>                                                <option value="Punjab">Punjab</option>                                                <option value="Rajasthan">Rajasthan</option>                                                <option value="Sikkim">Sikkim</option>                                                <option value="Tamil Nadu">Tamil Nadu</option>                                                <option value="Tripura">Tripura</option>                                                <option value="Uttaranchal">Uttaranchal</option>                                                <option value="Uttar Pradesh">Uttar Pradesh</option>                                                <option value="West Bengal">West Bengal</option>                                </select>                                </div>																		 <div class="form-group m-b-20">										<label for="exampleInputEmail1">City</label>										<input type="text" class="form-control" id="city" name="city"  value="<?php echo $row['city'];?>"  placeholder="Enter City" required>										</div>								
	                                            <div class="form-group  m-b-20">
	                                                <label>depot Name</label>
	                                            
	                                                    <input type="text" class="form-control" value="<?php echo $row['depot'];?>" name="depot" required>
	                                             
	                                            </div>
	                                     
	                                            <div class="form-group">
	                                                <label>Phone No</label>
													<input type="text" class="form-control" value="<?php echo $row['phone_no'];?>" name="phone_no" required>
	                                            </div>
<?php } ?>
                                                 <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                  
                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                    Update
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
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php } ?>