<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['eid'])) {
		$eid = intval($_GET['eid']);
		$status = "0";
		$sql = "UPDATE tbltestimonial SET status=:status WHERE  id=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();

		$msg = "Post Review Successfully Inactive";
	}


	if (isset($_REQUEST['aeid'])) {
		$aeid = intval($_GET['aeid']);
		$status = 1;

		$sql = "UPDATE tbltestimonial SET status=:status WHERE  id=:aeid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
		$query->execute();

		$msg = "Post Review Successfully Active";
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

								<h2 class="page-title text-center">Manage Reviews</h2>

								<!-- Zero Configuration Table -->
								<div class="panel panel-default">
									<div class="panel-heading">User Reviews</div>
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
													<th>Name</th>
													<th>Email</th>
													<th>Testimonials</th>
													<th>Posting date</th>
													<th>Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Testimonials</th>
													<th>Posting date</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>

												<?php $sql = "SELECT tblusers.FullName,tbltestimonial.UserEmail,tbltestimonial.Testimonial,tbltestimonial.PostingDate,tbltestimonial.status,tbltestimonial.id from tbltestimonial join tblusers on tblusers.Emailid=tbltestimonial.UserEmail";
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
															<td>
																<?php echo htmlentities($result->UserEmail); ?>
															</td>
															<td>
																<?php echo htmlentities($result->Testimonial); ?>
															</td>
															<td>
																<?php echo htmlentities($result->PostingDate); ?>
															</td>
															<td>
																<?php if ($result->status == "" || $result->status == 0) {
																	?><a href="manage-reviews.php?aeid=<?php echo htmlentities($result->id); ?>"
																		onclick="return confirm('Do you really want to Active')">
																		Inactive</a>
																<?php } else { ?>

																	<a href="manage-reviews.php?eid=<?php echo htmlentities($result->id); ?>"
																		onclick="return confirm('Do you really want to Inactive')">
																		Active</a>
																</td>
															<?php } ?>
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