<!-- <?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		$sql = "delete from tblbrands  WHERE id=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();
		$msg = "Page data updated  successfully";

	}



	?>

	

		
	</head>

	<body>
		<?php include('includes/header.php'); ?>


		<?php include('includes/sidebar.php'); ?>
		
								<div class="panel panel-default">
									<div class="panel-heading">Listed Brands</div>
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
										

												<?php $sql = "SELECT * from  tblbrands ";
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
																<?php echo htmlentities($result->BrandName); ?>
															</td>
															<td>
																<?php echo htmlentities($result->CreationDate); ?>
															</td>
															<td>
																<?php echo htmlentities($result->UpdationDate); ?>
															</td>
															<td><a href="edit-brand.php?id=<?php echo $result->id; ?>"><i
																		class="fa fa-edit"></i></a>&nbsp;&nbsp;
																<a href="manage-brands.php?del=<?php echo $result->id; ?>"
																	onclick="return confirm('Do you want to delete');"><i
																		class="fa fa-close"></i></a>
															</td>
														</tr>
														<?php $cnt = $cnt + 1;
													}
												} ?>

											</tbody>
										</table>



										<!-- Button trigger modal -->
	<a class="btn btn-primary " name="back" href="add-brand.php">Add Brand</a>



	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
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