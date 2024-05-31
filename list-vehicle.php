<?php

// session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_REQUEST['del'])) {
		$delid = intval($_GET['del']);
		$sql = "delete from tblvehicles SET id=:status WHERE  id=:delid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':delid', $delid, PDO::PARAM_STR);
		$query->execute();
		$msg = "Vehicle  record deleted successfully";
	}


	?>

	<!DOCTYPE HTML>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<title>ShareCar Car Rental Portal</title>
		<!--Bootstrap -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
		<!--Custome Style -->
		<link rel="stylesheet" href="assets/css/style.css" type="text/css">
		<!--OWL Carousel slider-->
		<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
		<!--slick-slider -->
		<link href="assets/css/slick.css" rel="stylesheet">
		<!--bootstrap-slider -->
		<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
		<!--FontAwesome Font Style -->
		<link href="assets/css/font-awesome.min.css" rel="stylesheet">



		<link rel="shortcut icon" href="assets/images/favicon-icon/sharecar.png">
		<!-- Google-Font-->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

	</head>

	<body>



		<!--Header-->
		<?php include('includes/owner-header.php'); ?>
		<!--Page Header-->
		<!-- /Header -->

		<!--Page Header-->
		<section class="page-header profile_page">
			<div class="container">
				<div class="page-header_wrap">
					<div class="page-heading">
						<h1>Listed Vehicles</h1>
					</div>
					<ul class="coustom-breadcrumb">
						<li><a href="#">Home</a></li>
						<li>Listed Vehicles</li>
					</ul>
				</div>
			</div>
			<!-- Dark Overlay-->
			<div class="dark-overlay"></div>
		</section>
		<!-- /Page Header-->





		<section class="user_profile inner_pages">
			<div class="container">


				<div class="row">
					<div class="col-md-3 col-sm-3">
						<?php include('includes/owner-sidebar.php'); ?>

						<div class="col-md-6 col-sm-8">
							<div class="profile_wrap">
								<h5 class="uppercase underline">Listed Vehicles </h5>
								<div class="my_vehicles_list">
									<div class="">
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
											cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Vehicle Title</th>
													<th>Brand </th>
													<th>Price Per day</th>
													<th>Fuel Type</th>
													<th>Model Year</th>
													<th>Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Vehicle Title</th>
													<th>Brand </th>
													<th>Price Per day</th>
													<th>Fuel Type</th>
													<th>Model Year</th>
													<th>Action</th>
												</tr>
												</tr>
											</tfoot>
											<tbody>

												<?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
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
																<?php echo htmlentities($result->VehiclesTitle); ?>
															</td>
															<td>
																<?php echo htmlentities($result->BrandName); ?>
															</td>
															<td>
																<?php echo htmlentities($result->PricePerDay); ?>
															</td>
															<td>
																<?php echo htmlentities($result->FuelType); ?>
															</td>
															<td>
																<?php echo htmlentities($result->ModelYear); ?>
															</td>
															<td><a href="edit-vehicle.php?id=<?php echo $result->id; ?>"><i
																		class="fa fa-edit"></i></a>&nbsp;&nbsp;
																<a href="manage-vehicles.php?del=<?php echo $result->id; ?>"
																	onclick="return confirm('Do you want to delete');"><i
																		class="fa fa-close"></i></a>
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
		</section>
		<!--/my-vehicles-->
		<?php include('includes/footer.php'); ?>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/interface.js"></script>
		<!--Switcher-->
		<script src="assets/switcher/js/switcher.js"></script>
		<!--bootstrap-slider-JS-->
		<script src="assets/js/bootstrap-slider.min.js"></script>
		<!--Slider-JS-->
		<script src="assets/js/slick.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
	</body>

	</html>
<?php } ?>