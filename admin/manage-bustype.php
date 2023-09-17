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
 

$unique = $_GET['pid'];
$bustype=$_POST['bustype'];
 

$postid=$_GET['pid'];

 
 
 $query2=mysqli_query($con,"delete from tblbustype where bus_code='$postid'");
 
$number1 = count($_POST["bustype"]); 
if($query2)
{ 
 for($i=0; $i<$number1; $i++) {
 $query=mysqli_query($con,"INSERT INTO tblbustype (`bus_code`,`bustype`) VALUES ('$unique','".mysqli_real_escape_string($con, $_POST["bustype"][$i])."')");  		 
 } 
 
}
 
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
        <title>Admin  |   Manage Bus </title>

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
                                    <h4 class="page-title">Manage Bus Type </h4>
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
				<th>Add Or Remove</th>
                
            </tr>
        </thead>
        <!--
            For storing multiple values in php get array of fields
        -->
        <tbody>
											<?php
											  $postid=$_GET['pid'];
											$queryss=mysqli_query($con,"SELECT * FROM tblbustype where bus_code = '$postid'");
											while($rowss=mysqli_fetch_array($queryss))
											{
											?>		
		
		
										<tr>
											<td>
                                             <select class="form-control" name="bustype[]">
											 <option><?php echo $rowss['bustype'];?></option>
																		<?php
																		$query=mysqli_query($con,"select *  from tbltype");
																		while($row=mysqli_fetch_array($query))
																		{
																		?>											
																	<option><?php echo $row['type'];?></option>
																	<?php   }?>
                                             </select>				
											
											</td>
 
 											
											<td>
											<span class="glyphicon plus">&#x2b;</span>
											<span class="glyphicon alert-danger minus">&#xe082;</span>
											</td>											
										</tr>
										<?php   }?>
										<tr>
											<td>
																<select class="form-control" name="bustype[]">
																<option>Add More</option>
																		<?php
																		$query=mysqli_query($con,"select *  from tbltype");
																		while($row=mysqli_fetch_array($query))
																		{
																		?>											
																	<option><?php echo $row['type'];?></option>
																	<?php   }?>
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
        $(this).closest('tbody').append(cloneTr);
    });

    $(document).on("click",".minus",function() {
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