<?php include 'partial/header.php'; ?>
<div class="page-content">
	<div class="page-info">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Claims</li>
			</ol>
		</nav>
	</div>
	<div class="main-wrapper">
		<div class="row" id="addContainer" style="display:none;">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Add Claims</h5>
						<form id="addForm" name="addForm" method="POST" encypt="multipart/form-data">
							<div class="form-group">
								<label>Order Number <span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="order_number" id="order_number">
							</div>
							<div class="form-group">
								<label>Images <span style="color:red;">*</span></label>
								<input type="file" class="form-control" multiple name="images[]" id="images" required>
								<span style="color:red;">Image size should be 630 * 574 pixels</span>
							</div>
							<div class="form-group">
								<label>Reason<span style="color:red;">*</span></label>
								<select class="form-control" name="reason" id="reason">
									<option value="">Select Reason</option>
									<option value="0">Wrong Product</option>
									<option value="1">Damage Product</option>
									<option value="2">Others</option>
								</select>
							</div>
							<div class="form-group">
								<label>Short Description<span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="short_description" id="short_description">
							</div>
							<div class="form-group">
								<label>Long Description<span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="long_description" id="long_description">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Add">
								<input type="reset" class="btn btn-warning" value="Reset">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Claims</h5>
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<button id="addToTable" class="btn btn-primary">Add <i class="fas fa-plus"></i></button>
									<button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
								</div>
							</div>
						</div>
						<table class="table <?= TABLE_CLASS ?>" id="datatable-tabletools">
							<thead>
								<tr>
									<th>Sr. No.</th>
									<th>Order Number</th>
									<th>Reason</th>
									<th>Images</th>

									<th>Explanation</th>
									<?php
									if ($_SESSION['ADMIN_TYPE'] != 2) {
									?>

										<th>Claims Status</th>
									<?php
									}
									?>

									<th>Reject reason</th>
									<th>Created On</th>
									<!-- <th>Raise Claim</th> -->
								</tr>
							</thead>
							<tbody id="tableContainer">
								<?php
								$get_data = $obj->select("*", "claims", "1 ORDER BY ID DESC");
								if (is_array($get_data)) {
									foreach ($get_data as $key => $val) {

										if ($val[2] == 0) {
											$type = "Wrong Product";
										} elseif ($val[2] == 1) {
											$type = "Damage Product";
										} elseif ($val[2] == 2) {
											$type = "Others";
										}

										$cat_id = $val[1];
										$cat_name = $obj->select("name", "category", "ID='$cat_id'")[0][0];
								?>
										<tr>
											<td><?= ($key + 1); ?></td>
											<td><?= $val[1]; ?></td>
											<td><?= $type; ?></td>
											<td><a href="claim_images.php?claim_id=<?= base64_encode($val[0]); ?>" target="_blank" class="view-images">View</a></td>
											<td><a href="#" class="view-element" data-id="<?= $val[0]; ?>" id="<?= $val[0]; ?>">View</a></td>
											<td>
												<?php
												if ($val[5] == 0) {
												?>
													<select class="form-control withdraw_status" id="withdraw_status" name="withdraw_status" data-wid="<?= base64_encode($val[0]); ?>" tabindex="-1" style="display: none; width: 100%">
														<option value="0" selected>Pending</option>
														<option value="1">Completed</option>
														<option value="2">Reject</option>
													</select>
												<?php
												} elseif ($val[5] == 1) {
													echo "Completed";
												} elseif ($val[5] == 2) {
													echo "Rejected";
												}
												?>
											</td>
											<td><?= html_entity_decode($val[6]); ?></td>
											<td><?= $val[7]; ?></td>


											<!-- <td>
												<?php

												if ($val[3] == 0) {
												?>
													<button type="button" id="<?= base64_encode($val[0]) ?>" data-id="<?= $val[0]; ?>" class="btn btn-danger update-element">Pending</button>
												<?php
												} else {
												?>
													<button type="button" id="<?= base64_encode($val[0]) ?>" data-id="<?= $val[0]; ?>" class="btn btn-success update-element">Completed</button>
												<?php
												}
												?>
											</td>
											<td>
												<a href="" class="edit-element" id="<?= base64_encode($val[0]); ?>" data-original-title="Edit">
													<i class="fas fa-pencil-alt"></i>
												</a>
												<a href="" name="delete" id="<?= base64_encode($val[0]); ?>" data-id="<?= base64_encode($val[0]); ?>" class="remove-element" data-original-title="Delete">
													<i class="far fa-trash-alt"></i>
												</a>
											</td> -->
											<!-- <td><button class="btn btn-primary raise-claims" id="<?= $val[0]; ?>" data-id="<?= $val[0]; ?>"> Claims</button></td> -->
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
				</div>
			</div>
		</div>
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

<?php include 'partial/footer.php'; ?>
<script src="assets/admin/claims.js">
	<?php
	$obj->execute("UPDATE claims SET is_seen='1' WHERE 1");
	?>
	$("#claims_count").hide();
</script>


</body>

</html>