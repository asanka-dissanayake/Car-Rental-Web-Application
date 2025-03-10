<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	// if(isset($_REQUEST['del']))
// 	{
// $delid=intval($_GET['del']);
// $sql = "delete from tblvehicles SET id=:status WHERE  id=:delid";
// $query = $dbh->prepare($sql);
// $query -> bindParam(':delid',$delid, PDO::PARAM_STR);
// $query -> execute();
// $msg="Vehicle  record deleted successfully";
// }



	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		$sql = "delete from tblvehicles  WHERE id=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();
		$msg = "Vehicle record deleted successfully";

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

								<h2 class="page-title text-center">Manage Vehicles</h2>

								<!-- Zero Configuration Table -->
								<div class="panel panel-default">
									<div class="panel-heading">Vehicle Details</div>
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


	</body>

	</html>
<?php } ?>