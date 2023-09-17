<?php 
include('includes/config.php');
?>


<!DOCTYPE html>
<html lang="en" >

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>Mobile UI</title>
  
  

      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="style.css">
	    <style> 

    </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="device-screen rounded">
  <header class="px-3 pb-0 pt-2">
	<?php 
	include('includes/menu.php');
	?>
  </header>
  <div class="shade"></div>

  <main class="container-fluid pt-3">
  
 
    
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <input type="text" class="inuoutsearch" id="myInput" onkeyup="myFunction()" placeholder="Search BY Depo Name" title="Type in a name"> 
    </div>
 <style>
#login_Box_Div{
  display:none;
}
</style>
<script src="js/jquery.min.js"></script>  
<i class="fa fa-filter" id="buttonLogin" aria-hidden="true" style="color: #2490e8;font-size: 26px;"></i>  
<div id = "login_Box_Div"> 
    <form>
      <div class="col-md-12">
        <label><input type="checkbox" value="ac" id="ac"/>AC</label>
		<label><input type="checkbox" value="volvo" id="volvo"/>Volvo</label>
		<label><input type="checkbox" value="all" id="all"/>All</label>
      </div>
    </form>

</div>
  
<script>
$('#buttonLogin').click(function(){
   $('#login_Box_Div').toggle();
});

</script>
 
  
<br>  

    <table id="myTable1">
											<?php
											  $postid=$_GET['bus_line'];
											$ret=mysqli_query($con,"select * from tblbus where bus_line='$postid' and status ='active'");
                                             while ($row=mysqli_fetch_array($ret)) 

										    {
                                               
											   
											$starttime = $row['arrival_time'];
											$stoptime = $row['departure_time'];
											$diff = (strtotime($stoptime) - strtotime($starttime));
											$total = $diff/60;
											$finaltime =  sprintf("%02dh %02dm", floor($total/60), $total%60);	
												 
												
											?>											
											<tr>
											 <td>	
												<div class="col-md-12 animal" data-category="all">
												   <a href="details.php?busid=<?php echo $row['bus_code']; ?>">
												  <div class="kard">
												<table id="myTable" style="width: 100%;">
												  <tr>
													<td class="clr">From:</td>
													<td class="clr">&nbsp;</td>
													<td class="clr">To:</td>
												  </tr>
												  <tr>
													<th><?php echo $row['city_from']; ?></th>
													<td class="clr">&nbsp;</td>
													<th><?php echo $row['city_to']; ?></th>
												  </tr>
												  <tr>
													<th colspan="3"><hr></th>
												  </tr>
												  
												  <tr>
													<th style="text-align: left;">Departure&nbsp;Time</th>
													 <th style="text-align: center;"><hr class="new5"></th>
													<th style="text-align: right;">Arrival&nbsp;Time</th>
												  </tr>

												  <tr>
													<td style="text-align: left;"><?php echo $row['arrival_time']; ?></td>
													 <td style="text-align: center;"> Ytra Time  <?php echo $finaltime; ?></td>
													<td style="text-align: right;"><?php echo $row['departure_time']; ?></td>
												  </tr>		

 
												  
												  <tr>
													 <td style="text-align: left;"> </td>
												  </tr>	
												  
												  <tr>
													<td><button class="bt">Details</button></td>
												  </tr>

												  
												</table>
 
												
 	

 

 


									 
										  
												  </div>
													</a>
												</div>
											 </td>
										     </tr>
									<?php }?>

		
	
	</table>
	</div>
	

 
 	<br> 
 
  </main>
  
</div>
 <style>
 
hr.new5 {
  border: 5px solid green;
  border-radius: 5px;
  min-width:10px;
}
</style>
<script  src="script.js"></script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script> 

  	<?php 
	include('includes/footer.php');
	?>

</body>

</html>

 