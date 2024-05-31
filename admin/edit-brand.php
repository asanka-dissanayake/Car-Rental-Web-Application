<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	// Code for change password	
	if (isset($_POST['submit'])) {
		$brand = $_POST['brand'];
		$id = $_GET['id'];
		$sql = "update  tblbrands set BrandName=:brand where id=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();

		$msg = "Brand updated successfully";

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

								<h2 class="page-title ">Edit Brand</h2>

								<div class="row">
									<div class="col-md-10">
										<div class="panel panel-default">
											<div class="panel-heading"></div>
											<div class="panel-body">
												<form method="post" name="chngpwd" class="form-horizontal"
													onSubmit="return valid();">


													<?php if ($error) { ?>
														<div class="errorWrap"><strong>ERROR</strong>:
															<?php echo htmlentities($error); ?>
														</div>
													<?php } else if ($msg) { ?>
															<div class="succWrap"><strong>SUCCESS</strong>:
															<?php echo htmlentities($msg); ?>
															</div>
													<?php } ?>

													<?php
													$id = $_GET['id'];
													$ret = "select * from tblbrands where id=:id";
													$query = $dbh->prepare($ret);
													$query->bindParam(':id', $id, PDO::PARAM_STR);
													$query->execute();
													$results = $query->fetchAll(PDO::FETCH_OBJ);
													$cnt = 1;
													if ($query->rowCount() > 0) {
														foreach ($results as $result) {
															?>

															<div class="form-control">
																<label class="col-sm-4 control-label">Brand Name</label>
																<div class="col-sm-8">
																	<input type="text" class="form"
																		value="<?php echo htmlentities($result->BrandName); ?>"
																		name="brand" id="brand" required>
																</div>
															</div>
															<div class="hr-dashed"></div>

														<?php }
													} ?>


													<div class="form-control">
														<div class="col-sm-8 col-sm-offset-4">

															<button class="btn btn-primary" name="submit"
																type="submit">Submit</button>

															<a class="btn btn-primary " name="back"
																href="manage-brands.php">Back</a>
														</div>

													</div>

												</form>

											</div>
										</div>
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