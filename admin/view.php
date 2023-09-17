<?php
include('includes/config.php');
error_reporting(0);
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
	<title>Mobile UI</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/core.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/components.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="assets/js/table.css">
	<link rel="stylesheet" href="assets/css/style.css" type="text/css">


</head>

<body class="fixed-left">

	<div id="wrapper">
		<div class="content ">
			<div class="container">
				<div class="row">
					<?php
					$postid = $_GET['busid'];
					$ret = mysqli_query($con, " SELECT *   FROM (SELECT tblstation.id,tblstation.bus_code,tblstation.arrival AS starttime,tblbus.`city_from`,tblbus.vendor,tblbus.`city_to`,tblbus.`seat`,tblstation.`day` AS startday FROM tblstation,tblbus WHERE distance = '00' AND tblstation.`bus_code`= tblbus.`bus_code` AND  tblbus.`bus_code` ='$postid' and status ='active') AS TAB_1, (SELECT   bus_code,arrival AS endtime ,tblstation.`day` AS endday FROM tblstation  WHERE departure ='Stop' ) AS TAB_2 WHERE TAB_1.bus_code = TAB_2.bus_code
						GROUP BY TAB_1.`bus_code`");
					while ($row = mysqli_fetch_array($ret)) {
						$vendor = $row['vendor'];
						$city_from = $row['city_from'];
						$city_to = $row['city_to'];
						$bus_code = $row['bus_code'];
						$enday = $row['endday'];
						$starttime = $row['starttime'];
						$stoptime = $row['endtime'];

						if ($enday == "1") {
							$starttime = $row['starttime'];
							$stoptime = $row['endtime'];
							$x = strtotime($stoptime);
							$y = strtotime($starttime);
							if ($x > $y) {
								$diff = ($x - $y);
							} else {
								$diff = ($y - $x);
							}
							$total = $diff / 60;
							$totalhours = floor($total / 60);
							$finalhours = $totalhours;
							$finaltime =  sprintf("%02dh %02dm", $finalhours, $total % 60);
						}


						if ($enday == "2") {
							$starttime = $row['starttime'];
							$stoptime = $row['endtime'];
							$secondday = '24:00';
							$thired = '00:00';

							$x = strtotime($starttime);
							$y = strtotime($stoptime);
							$z = strtotime($secondday);
							$c = strtotime($thired);
							$a = ($z - $x);
							$d = ($y - $c);
							$diff = $a + $d;
							$total = $diff / 60;
							$totalhours = floor($total / 60);
							$finalhours = $totalhours;
							$finaltime =  sprintf("%02dh %02dm", $finalhours, $total % 60);
						}

						if ($enday == "3") {
							$starttime = $row['starttime'];
							$stoptime = $row['endtime'];
							$secondday = '24:00';
							$thired = '00:00';

							$x = strtotime($starttime);
							$y = strtotime($stoptime);
							$z = strtotime($secondday);
							$c = strtotime($thired);



							$t1 = ($z - $x);
							$t2 = ($z - $c);
							$t3 = ($y - $c);

							$diff = $t1 + $t2 + $t3;

							$total = $diff / 60;
							$totalhours = floor($total / 60);
							$finalhours = $totalhours;
							echo $finaltime =  sprintf("%02dh %02dm", $finalhours, $total % 60);
						}

						if ($enday == "4") {
							$starttime = $row['starttime'];
							$stoptime = $row['endtime'];
							$secondday = '24:00';
							$thired = '00:00';

							$x = strtotime($starttime);
							$y = strtotime($stoptime);
							$z = strtotime($secondday);
							$c = strtotime($thired);



							$t1 = ($z - $x);
							$t2 = ($z - $c);
							$t3 = ($y - $c);

							$diff = $t1 + $t2 + $t2 + $t3;

							$total = $diff / 60;
							$totalhours = floor($total / 60);
							$finalhours = $totalhours;
							echo $finaltime =  sprintf("%02dh %02dm", $finalhours, $total % 60);
						}


						if ($enday == "5") {
							$starttime = $row['starttime'];
							$stoptime = $row['endtime'];
							$secondday = '24:00';
							$thired = '00:00';

							$x = strtotime($starttime);
							$y = strtotime($stoptime);
							$z = strtotime($secondday);
							$c = strtotime($thired);



							$t1 = ($z - $x);
							$t2 = ($z - $c);
							$t3 = ($y - $c);

							$diff = $t1 + $t2 + $t2 + $t2 + $t3;

							$total = $diff / 60;
							$totalhours = floor($total / 60);
							$finalhours = $totalhours;
							echo $finaltime =  sprintf("%02dh %02dm", $finalhours, $total % 60);
						}



					?>
						<div class="col-md-4"></div>
						<div class="col-md-4"></div>
						<div class="col-md-4 m">
							<button class="btn btn-primary cls">
								<a href="edit-report.php?pid=<?php echo $row['bus_code']; ?>&&buscode=<?php echo $row['bus_code']; ?>">Edit</a>
							</button>
							<button class="btn btn-danger cls">
								<a href="delete-report.php?pid=<?php echo $row['bus_code']; ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')">Delete</a>
							</button>
						</div>
						<div class="col-sm-12">
							<a href="details.php?busid=<?php echo $row['bus_code']; ?>">
								<div class="card-box">
									<div class="table-responsive">
										<div class="container demo">
											<table class="datatable table table-striped table-bordered">
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
													<th colspan="3">
														<hr>
													</th>
												</tr>

												<tr>
													<th style="text-align: left;">Departure&nbsp;Time</th>
													<th style="text-align: center;">
														<hr class="new5">
													</th>
													<th style="text-align: right;">Arrival&nbsp;Time</th>
												</tr>

												<tr>
													<td style="text-align: left;"><?php echo $row['starttime']; ?></td>
													<td style="text-align: center;"> Ytra Time <?php echo $finaltime; ?></td>
													<td style="text-align: right;"><?php echo $row['endtime']; ?></td>
												</tr>



												<tr>
													<td style="text-align: left;">Bus Type:- <?php
																								$bus_code1 = $bus_code;
																								$queryq = mysqli_query($con, "select *  from tblbustype where bus_code ='$bus_code1'");
																								while ($rowq = mysqli_fetch_array($queryq)) {
																									echo $rowq['bustype'];
																									echo  "\x20\x20\x20";
																								} ?> </td>
													<td style="text-align: right;">Number Of Sheet :<?php echo $row['seat']; ?> </td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</a>
						</div>

					<?php } ?>


					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<td>Station</td>
										<td>Arrival</td>
										<td>Departure</td>
										<td>Distance</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$bus_code = $_GET['busid'];
									$retstation = mysqli_query($con, "SELECT * FROM tblstation WHERE bus_code='$bus_code' order by distance ASC");
									while ($rows = mysqli_fetch_array($retstation)) {
									?>
										<tr>
											<td><?php echo $rows['station']; ?></td>
											<td><?php echo $rows['arrival']; ?></td>
											<td><?php echo $rows['departure']; ?></td>
											<td><?php echo $rows['distance']; ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>

					<?php
					$bus_code = $_GET['busid'];
					?>
					<div class="col-4">
						<a class="btn icon-btn btn-primary" href="feadback.php?bus_code=<?php echo $bus_code; ?>"><i class="fa fa-thumbs-up icon"></i>FeadBack</a>
					</div>
					<div class="col-4">
						<a class="btn icon-btn btn-primary" href="suggestion.php?bus_code=<?php echo $bus_code; ?>"><i class="fa fa-thumbs-up icon"></i> Suggestion</a>
					</div>
					<div class="col-4">
						<a class="btn icon-btn btn-primary" href="report.php?vendor=<?php echo $vendor; ?>&from=<?php echo $city_from; ?>&to=<?php echo $city_to; ?>&&busid=<?php echo $_GET['busid'] ?>"><i class="fa fa-list icon"></i> Report</a>
					</div>


					<hr>
					<br> <br>

					<?php
					$bus_code = $_GET['busid'];
					$rate = mysqli_query($con, "SELECT * FROM tblfeedback WHERE bus_id='$bus_code'");
					while ($rowrate = mysqli_fetch_array($rate)) {
					?>
						<div class="col-12">
							<div class="panel panel-white post">
								<div class="post-heading">
									<div class="pull-left image">
										<img src="images/user.png" class="img-circle avatar" alt="user profile image" style="width: 33px;">
									</div>

									Name:-<?php echo $rowrate['name']; ?><br>
									Messege:-<?php echo $rowrate['message']; ?>

									<?php
									$rate1 = $rowrate['rate'];
									if ($rate1 == 'Yes') {
									?>
										<i class="fa fa-thumbs-up icon" style="color: green;"></i>

									<?php
									} else {
									?>
										<i class="fa fa-thumbs-down icon" style="color: red;"></i>

									<?php
									}
									?>

								</div>

							</div>
							<hr>
						</div>

					<?php } ?>
				</div>


			</div>
		</div>

</body>

</html>