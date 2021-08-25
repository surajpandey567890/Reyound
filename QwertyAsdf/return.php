		<?php include 'partial/header.php'; ?>
		<div class="page-content">
			<div class="page-info">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Return Order</li>
					</ol>
				</nav>
			</div>
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Return Order</h5>
							<!-- <div class="row">
										<div class="col-sm-6">
											<div class="mb-3">
												<button id="addToTable" class="btn btn-primary">Add <i class="fas fa-plus"></i></button>
												<button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
											</div>
										</div>
									</div> -->
							<table class="table  <?= TABLE_CLASS ?>" id="datatable-tabletools">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>Order Number</th>
										<th>Reason</th>

										<th>Explanation</th>

										<th>Images</th>
										<?php
										//if($_SESSION['ADMIN_TYPE']!=2){
										?>

										<th>Return Status</th>
										<?php
										//}
										?>

										<th>Reject reason</th>
										<th>Created On</th>
										<?php if (!$_SESSION['ADMIN_TYPE'] == 0) { ?>
											<th>Action</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody id="tableContainer">
									<?php
									$get_data = $obj->select("*", "returns", "1 ORDER BY ID DESC");
									if (is_array($get_data)) {
										foreach ($get_data as $key => $val) {

											if ($val[2] == 0) {
												$type = "Wrong Product";
											} elseif ($val[2] == 1) {
												$type = "Damage Product";
											} elseif ($val[2] == 2) {
												$type = "Missing Product";
											} elseif ($val[2] == 3) {
												$type = "Bad Quality";
											} elseif ($val[2] == 4) {
												$type = "Others";
											}


									?>
											<tr>
												<td><?= ($key + 1); ?></td>
												<td><?= $val[1]; ?></td>
												<td><?= $type; ?></td>
												<td><?= html_entity_decode($val[3]); ?></td>
												<td><a href="return_images.php?return_id=<?= base64_encode($val[0]); ?>" target="_blank" class="view-images">View</a></td>

												<td>
													<?php
													if ($val[4] == 0) {
													?>
														<select class="form-control withdraw_status" id="withdraw_status" name="withdraw_status" data-wid="<?= base64_encode($val[0]); ?>">
															<option value="0" selected>Pending</option>
															<option value="1">Approved</option>
															<option value="2">Reject</option>
														</select>
													<?php
													} elseif ($val[4] == 1) {
														echo "Approved";
													} elseif ($val[4] == 2) {
														echo "Rejected";
													}
													?>
												</td>
												<td><?= html_entity_decode($val[5]); ?></td>
												<td><?= $val[6]; ?></td>
												<?php if (!$_SESSION['ADMIN_TYPE'] == 0) { ?>
													<td><button class="btn btn-primary raise-claims" id="<?= $val[0]; ?>" data-id="<?= $val[0]; ?>"> Claims</button></td>
												<?php } ?>

											</tr>
										<?php
										}
									} else {
										?>
										<tr>
											<td colspan="6" style="text-align:center;">No data found</td>
										</tr>
									<?php
									}
									?>

								</tbody>
							</table>
						</div>
						</section>
					</div>
				</div>
				<!-- end: page -->
				</section>
			</div>
		</div>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"> Reject Reason</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<form id="addForm" name="addForm" method="post">
							<input type="hidden" name="wid" id="wid">
							<input type="hidden" name="status" id="status">
							<div class="form-group">
								<label>Reason</label>
								<textarea class="form-control" id="reason" name="reason" rows="5"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Save">
								<input type="reset" class="btn btn-warning" value="Reset">
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title text-center">Rejected Reason</h4>
					</div>
					<div class="modal-body" id='save_reason'>
						<form name="save_reason" id="save_reson" method="POST">
							<div class="form-group">
								<label>Rejected Reason</label>
								<input type="hidden" name="user_id" id="user_id">
								<input type="text" class="form-control" name="reason" id="reason">
							</div>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name='btn-save' id='btn-save' value="Save">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>

		<div class="modal fade" id="descpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><b>Descriptions : </b></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<span id="short_desp"></span>

						<span id="desp"></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
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
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="RaiseClaim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"> Reject Reason</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">

						<table class="table">
							<tr>
								<th>Order Number</th>
								<td id="orderNumber"></td>
							</tr>
							<tr>
								<th>Return Date</th>
								<td id="returnDate"></td>
							</tr>
							<tr>
								<th>Return Reason</th>
								<td id="returnReason"></td>
							</tr>
						</table>
						<form id="fileClaim" method="post">
							<input type="hidden" id="odrNumber" name="orderNumber">
							<div class="form-group">
								<label>Claim Reason</label>
								<select name="claimReason" tabindex="-1" style="display: none; width: 100%">
									<option value="Damage Product">Damaged Return Product</option>
									<option value="Damage Product">Damaged Return Product</option>
									<option value="Damage Product">Damaged Return Product</option>
								</select>
							</div>
							<div class="form-group">
								<label>Claim related photos</label>
								<input type="file" name="claimPhoto" class="form-control">
							</div>
							<div class="form-group">
								<label>Claims Short Discription</label>
								<textarea class="form-control" name="claimShortDescp" cols="30" rows="2"></textarea>
							</div>
							<div class="form-group">
								<label>Claims Long Discription</label>
								<textarea class="form-control" name="claimLongDescp" cols="30" rows="5"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="File Claim">
								<input type="reset" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
		<?php include 'partial/footer.php'; ?>
		<script src="assets/admin/return.js">
			<?php
			$obj->execute("UPDATE returns SET is_seen='1' WHERE 1");
			?>
			$("#returns_count").hide();
		</script>

		</body>

		</html>