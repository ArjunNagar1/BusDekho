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
$item_name=$_POST['item_name'];
$item_weight=$_POST['item_weight'];
$item_price=$_POST['item_price'];
$query=mysqli_query($con,"Update  products set productName='$item_name',productPrice='$item_price',productPriceBeforeDiscount='$item_price',productQuantity='$item_weight' where id='$catid'");
if($query)
{
$msg="Item Updated successfully ";
}
else{
$error="Something went wrong . Please try again.";    
} 
}


?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Newsportal | Update Item</title>

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
                                    <h4 class="page-title">Edit Item <?php echo $_SESSION['login']; ?> </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="add-item.php">ADD Item </a>
                                        </li>
 
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        		


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
$catid=intval($_GET['pid']);
$query=mysqli_query($con,"Select * from  products where id='$catid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>



                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
										<form name="addpost" method="post" enctype="multipart/form-data">
										 <div class="form-group m-b-20">
										<label for="exampleInputEmail1">Item Name</label>
										<input type="text" class="form-control" id="item_name" value="<?php echo $row['productName'];?>" name="item_name" placeholder="Enter Item Name" required>
										</div>
										
										 <div class="form-group m-b-20">
										<label for="exampleInputEmail1">Item weight</label>
										<input type="text" class="form-control" id="item_weight" value="<?php echo $row['productQuantity'];?>" name="item_weight" placeholder="Enter weight" required>
										</div>

										 <div class="form-group m-b-20">
										<label for="exampleInputEmail1">Price</label>
										<input type="text" class="form-control" id="item_price" value="<?php echo $row['productPrice'];?>" name="item_price" placeholder="Enter Price" required>
										</div>
										
										
										<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Update</button>
										
                                        </form>
                                     </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

<?php } ?>

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