<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['eid'])) {
		$eid = intval($_GET['eid']);
		$status = 1;
		$sql = "UPDATE tblcontactusquery SET status=:status WHERE  id=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();

		$msg = "Testimonial Successfully Inacrive";
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

								<h2 class="page-title text-center">Manage Contact Us Queries</h2>

								<!-- Zero Configuration Table -->
								<div class="panel panel-default">
									<div class="panel-heading">User queries</div>
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
											cellspacing="0" width="100%" style="font-size:82%">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Contact No</th>
													<th>Message</th>
													<th>Posting date</th>
													<th>Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Contact No</th>
													<th>Message</th>
													<th>Posting date</th>
													<th>Action</th>
												</tr>
												</tr>
											</tfoot>
											<tbody>

												<?php $sql = "SELECT * from  tblcontactusquery ";
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
																<?php echo htmlentities($result->name); ?>
															</td>
															<td>
																<?php echo htmlentities($result->EmailId); ?>
															</td>
															<td>
																<?php echo htmlentities($result->ContactNumber); ?>
															</td>
															<td>
																<?php echo htmlentities($result->Message); ?>
															</td>
															<td>
																<?php echo htmlentities($result->PostingDate); ?>
															</td>
															<?php if ($result->status == 1) {
																?>
																<td>Read</td>
															<?php } else { ?>

																<td><a href="manage-conactusquery.php?eid=<?php echo htmlentities($result->id); ?>"
																		onclick="return confirm('Do you really want to read')">Pending</a>
																</td>
															<?php } ?>
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