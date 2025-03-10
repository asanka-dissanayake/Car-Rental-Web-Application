<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	// Code for change password	
	if (isset($_POST['submit'])) {
		$password = md5($_POST['password']);
		$newpassword = md5($_POST['newpassword']);
		$username = $_SESSION['alogin'];
		$sql = "SELECT Password FROM admin WHERE UserName=:username and Password=:password";
		$query = $dbh->prepare($sql);
		$query->bindParam(':username', $username, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() > 0) {
			$con = "update admin set Password=:newpassword where UserName=:username";
			$chngpwd1 = $dbh->prepare($con);
			$chngpwd1->bindParam(':username', $username, PDO::PARAM_STR);
			$chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$chngpwd1->execute();
			$msg = "Your Password succesfully changed";
		} else {
			$error = "Your current password is not valid.";
		}
	}
	?>


	<script type="text/javascript">
		function valid() {
			if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
				alert("New Password and Confirm Password Field do not match  !!");
				document.chngpwd.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>
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
		<div class="ts-main-content">
			<?php include('includes/sidebar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Change Password</h2>

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
												<div class="form-group">
													<label class="col-sm-4 control-label">Current Password</label>
													<div class="col-sm-8">
														<input type="password" class="" name="password" id="password"
															required>
													</div>
												</div>
												<div class="hr-dashed"></div>

												<div class="form-group">
													<label class="col-sm-4 control-label">New Password</label>
													<div class="col-sm-8">
														<input type="password" class="" name="newpassword" id="newpassword"
															required>
													</div>
												</div>
												<div class="hr-dashed"></div>

												<div class="form-group">
													<label class="col-sm-4 control-label">Confirm Password</label>
													<div class="col-sm-8">
														<input type="password" class="" name="confirmpassword"
															id="confirmpassword" required>
													</div>
												</div>
												<div class="hr-dashed"></div>



												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-4">

														<button class="btn btn-primary" name="submit" type="submit">Save
															changes</button>
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

		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>

	</body>

	</html>
<?php } ?>