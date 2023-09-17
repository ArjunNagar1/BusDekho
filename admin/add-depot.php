<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

$nameError="";
// For adding post  
if(isset($_POST['submit']))
{
$status = "1";	
	
$state=$_POST['state'];	$city=$_POST['city'];
$depot=$_POST['depot'];
$phone_no=$_POST['phone_no'];

// Validation Star

/*  Special Char Validation */ 
if ( preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $depot) ){
$nameError= "Do Not Use Special Character";
$status= "0";}

/*  White space And Blank*/
if (ctype_space($depot) ){
$nameError= "Enter Category Name";
$status= "0";}

/*   Text Lenght Valtion*/
if (strlen($depot) > 100){
$nameError= "Enter Less Then 15 Word";
$status= "0";}

// Validation End


if($status == "1"){  
$query=mysqli_query($con,"insert into tbldepot(depot,phone_no,state,city) values('$depot','$phone_no','$state','$city')");
if($query)
{
$msg="successfully added ";
}
else{
$msg="Something went wrong . Please try again.";    
}
	
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
        <title>Adminportal | Add depot</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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
                                    <h4 class="page-title">Add depot </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="manage-bus-type.php">Manage</a>
                                        </li>
 
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

<div class="row">
<div class="col-sm-6" id="hideMe">  
<!---Success Message--->  
<?php if($msg){ ?>
<div class="alert alert-success alert-dismissible" role="alert"  >
<a href="#" class="close" data-dismiss="alert" aria-label="close"  >&times;</a>
<strong>Well done!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($nameError){ ?>
<div class="alert alert-danger alert-dismissible" role="alert">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <?php echo htmlentities($nameError);?></div>
<?php } ?>


</div>
</div>





                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
										<form name="addpost" method="post" enctype="multipart/form-data">								    <div class="form-group m-b-20">                                    <label for="exampleInputEmail1">State</label>                                    <select id="state" class="form-control" name="state">                                    <option class="d-none" value="" selected="" disabled="">Select State...</option>                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>                                                <option value="Andhra Pradesh">Andhra Pradesh</option>                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>                                                <option value="Assam">Assam</option>                                                <option value="Bihar">Bihar</option>                                                <option value="Chandigarh">Chandigarh</option>                                                <option value="Chhattisgarh">Chhattisgarh</option>                                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>                                                <option value="Daman and Diu">Daman and Diu</option>                                                <option value="Delhi">Delhi</option>                                                <option value="Goa">Goa</option>                                                <option value="Gujarat">Gujarat</option>                                                <option value="Haryana">Haryana</option>                                                <option value="Himachal Pradesh">Himachal Pradesh</option>                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>                                                <option value="Jharkhand">Jharkhand</option>                                                <option value="Karnataka">Karnataka</option>                                                <option value="Kerala">Kerala</option>                                                <option value="Lakshadweep">Lakshadweep</option>                                                <option value="Madhya Pradesh">Madhya Pradesh</option>                                                <option value="Maharashtra">Maharashtra</option>                                                <option value="Manipur">Manipur</option>                                                <option value="Meghalaya">Meghalaya</option>                                                <option value="Mizoram">Mizoram</option>                                                <option value="Nagaland">Nagaland</option>                                                <option value="Orissa">Orissa</option>                                                <option value="Pondicherry">Pondicherry</option>                                                <option value="Punjab">Punjab</option>                                                <option value="Rajasthan">Rajasthan</option>                                                <option value="Sikkim">Sikkim</option>                                                <option value="Tamil Nadu">Tamil Nadu</option>                                                <option value="Tripura">Tripura</option>                                                <option value="Uttaranchal">Uttaranchal</option>                                                <option value="Uttar Pradesh">Uttar Pradesh</option>                                                <option value="West Bengal">West Bengal</option>                                </select>                                </div>										 <div class="form-group m-b-20">										<label for="exampleInputEmail1">City</label>										<input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>										</div>
										 <div class="form-group m-b-20">
										<label for="exampleInputEmail1">depot</label>
										<input type="text" class="form-control" id="depot" name="depot" placeholder="Enter title" required>
										</div>
										
										 <div class="form-group m-b-20">
										<label for="exampleInputEmail1">DEPO Number</label>
										<input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter title" required>
										</div>										
										
										
										
										
										
										
										
										<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save</button>
										<button type="reset" class="btn btn-danger waves-effect waves-light">Discard</button>
                                        </form>
                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



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
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

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
         <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
         <script src="../plugins/summernote/summernote.min.js"></script>

    


    </body>
</html>
<?php } ?>