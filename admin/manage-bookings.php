<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['eid'])) {
		$eid = intval($_GET['eid']);
		$status = "2";
		$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();

		$msg = "Booking Successfully Cancelled";
	}


	if (isset($_REQUEST['aeid'])) {
		$aeid = intval($_GET['aeid']);
		$status = 1;

		$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:aeid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
		$query->execute();

		$msg = "Booking Successfully Confirmed";
	}


	?>


	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>

	</head>

	<body>
		<?php include('includes/header.php'); ?>


		<?php include('includes/sidebar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid py-4">



				<div class="row">
					<div class="col-md-12">
						<div class="card my-4">
							<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

								<h2 class="page-title text-center">Manage Bookings</h2>

								<!-- Zero Configuration Table -->
								<div class="panel panel-default">
									<div class="panel-heading">Bookings Info</div>
									<div class="panel-body">
										<?php if ($error) { ?>
											<div class="errorWrap"><strong>ERROR</strong>:
												<?php echo htmlentities($error); ?>
											</div>
										<?php } else if ($msg) { ?>
												<div class="succWrap"><strong>SUCCESS</strong>:
												<?php echo htmlentities($msg); ?>
												</div>
										<?php } ?>
										<table id="zctb" class="display table table-striped table-bordered table-hover"
											cellspacing="0" width="100%" style='font-size:82%'>
											<thead>
												<tr>
													<th width="2%">#</th>
													<th width="5%">Name</th>
													<th width="10%">Vehicle</th>
													<th width="5%">From Date</th>
													<th width="5%">To Date</th>
													<th width="10%">Message</th>
													<th width="5%">Status</th>
													<th width="5%">Posting date</th>
													<th width="5%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Vehicle</th>
													<th>From Date</th>
													<th>To Date</th>
													<th>Message</th>
													<th>Status</th>
													<th>Posting date</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>

												<?php $sql = "SELECT tblusers.FullName,tblbrands.BrandName,tblvehicles.VehiclesTitle,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.VehicleId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id  from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.EmailId=tblbooking.userEmail join tblbrands on tblvehicles.VehiclesBrand=tblbrands.id  ";
												$query = $dbh->prepare($sql);
												$query->execute();
												$results = $query->fetchAll(PDO::FETCH_OBJ);
												$cnt = 1;
												if ($query->rowCount() > 0) {
													foreach ($results as $result) { ?>
														<tr>
															<td>
																<?php echo htmlentities($cnt); ?>
															</td>
															<td>
																<?php echo htmlentities($result->FullName); ?>
															</td>
															<td><a
																	href="edit-vehicle.php?id=<?php echo htmlentities($result->vid); ?>">
																	<?php echo htmlentities($result->BrandName); ?> ,
																	<?php echo htmlentities($result->VehiclesTitle); ?>
															</td>
															<td>
																<?php echo htmlentities($result->FromDate); ?>
															</td>
															<td>
																<?php echo htmlentities($result->ToDate); ?>
															</td>
															<td>
																<?php echo htmlentities($result->message); ?>
															</td>
															<td>
																<?php
																if ($result->Status == 0) {
																	echo htmlentities('Not Confirmed yet');
																} else if ($result->Status == 1) {
																	echo htmlentities('Confirmed');
																} else {
																	echo htmlentities('Cancelled');
																}
																?>
															</td>
															<td>
																<?php echo htmlentities($result->PostingDate); ?>
															</td>
															<td><a href="manage-bookings.php?aeid=<?php echo htmlentities($result->id); ?>"
																	onclick="return confirm('Do you really want to Confirm this booking')">
																	Confirm</a> /


																<a href="manage-bookings.php?eid=<?php echo htmlentities($result->id); ?>"
																	onclick="return confirm('Do you really want to Cancel this Booking')">
																	Cancel</a>
															</td>

														</tr>
														<?php $cnt = $cnt + 1;
													}
												} ?>

											</tbody>
										</table>



									</div>
								</div>



							</div>
						</div>

					</div>
				</div>
			</div>


	</body>

	</html>
<?php } ?>