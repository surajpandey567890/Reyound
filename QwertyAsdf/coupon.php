<?php include 'partial/header.php'; ?>
<div class="page-content">
	<div class="page-info">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Product</li>
			</ol>
		</nav>
	</div>
	<div class="main-wrapper">
		<div class="row" id="addContainer" style="display:none;">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<div class="card-body">
							<h2 class="card-title">Add Coupon</h2>
							<form class="form-horizontal form-bordered" method="post" id="addForm">

								<div class="form-group">
									<label class="control-label text-lg-right pt-2">Enter Coupon Code</label>
									<input type="text" class="form-control" name="coupon" id="coupon">
									<input type="hidden" name="id">
								</div>
								<div class="form-group">
									<label class="control-label text-lg-right pt-2">Start Date</label>
									<input type="date" class="form-control" name="sdate" id="sdate" required>
								</div>
								<div class="form-group">
									<label class="control-label text-lg-right pt-2">Expiry Date</label>
									<input type="date" class="form-control" name="edate" id="edate" required>
								</div>
								<div class="form-group">
									<label class="control-label text-lg-right pt-2">Minimum Order Amount</label>
									<input type="number" class="form-control" name="minorder" id="minorder">
								</div>
								<div class="form-group">
									<label class="control-label text-lg-right pt-2">Discount </label>
									<input type="number" class="form-control" name="percent" id="percent">

								</div>
								<div class="form-group">
									<select name="valueType" id="valueType" class="form-control">
										<option value="">- Select -</option>
										<option value="Percent">Percent</option>
										<option value="Bucks">Bucks</option>
									</select>

								</div>
								<div class="form-group">
									<label class="control-label text-lg-right pt-2">Number of Time Use</label>
									<input type="number" class="form-control" name="no_of_time_use" id="no_of_time_use">
								</div>

								<!-- <center>OR</center>
								<div class="form-group">
									<label class="control-label text-lg-right pt-2">Discount (₹)</label>
									
										<input type="text" class="form-control" name="amount" id="amount">
									</div>
								</div> -->

								<div class="form-group">
									<label class="control-label text-lg-right pt-2" for="inputDefault"></label>
									<input type="submit" class="btn btn-primary" value="Add">
									<input type="reset" class="btn btn-warning" value="Reset">
								</div>


							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row" id="editContainer" style="display:none;">
			<div class="col">
				<section class="card">
					<div class="card-body">
						<h2 class="card-title">Edit Coupon</h2>
						<form class="form-horizontal form-bordered" method="post" id="editForm">

							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Enter Coupon Code</label>
								<input type="text" class="form-control" name="coupon" id="coupon">
								<input type="hidden" name="id">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Start Date</label>
								<input type="date" class="form-control" name="sdate" id="sdate" required>
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Expiry Date</label>
								<input type="date" class="form-control" name="edate" id="edate" required>
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Minimum Order Amount</label>
								<input type="number" class="form-control" name="minorder" id="minorder">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Discount </label>
								<input type="number" class="form-control" name="percent" id="percent">

							</div>
							<div class="form-group">
								<select name="valueType" id="valueType" class="form-control">
									<option value="Percent">Percent</option>
									<option value="Bucks">Bucks</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Number of Time Use</label>
								<input type="number" class="form-control" name="no_of_time_use" id="no_of_time_use">
							</div>
							<!-- <div class="form-group">
										<label class="control-label text-lg-right pt-2">Discount (₹)</label>
										<input type="text" class="form-control" name="amount" id="amount">
									</div> -->

							<div class="form-group">
								<label class="control-label text-lg-right pt-2" for="inputDefault"></label>
								<input type="submit" class="btn btn-primary" value="Update">
								<input type="reset" class="btn btn-warning" value="Reset">
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<section class="card">
					<div class="card-body">
					<h2 class="card-title">Coupon</h2>
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<button id="addToTable" class="btn btn-primary">Add <i class="fas fa-plus"></i></button>
									<button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
								</div>
							</div>
						</div>
						<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">

							<thead>

								<tr>
									<th>Sr. No.</th>
									<th>Code</th>
									<th>Use Count</th>
									<th>Minimum Order Amount</th>
									<th>Discount</th>
									<th>Start & End Date</th>
									<th>Status</th>
									<th>Actions</th>
									<!--<th>Remark</th>-->

									<!-- <th colspan="2">Action</th> -->

								</tr>
								<!--//`ID`, `coupon_name`, `no_of_time_use`, `min_order_amt`, `value`, `value_type`, `start_date`, `expiry_date`, `status`-->
							</thead>
							<tbody id="tableContainer">
								<?php
								//update seen record 
								$seenRecord = "update coupons set flag='1'";
								$obj->execute($seenRecord);

								$coupon = $obj->select("*", "coupons", "1 ORDER BY ID DESC");
								if (is_array($coupon)) {
									foreach ($coupon as $key => $value) {
								?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td><?= $value[1] ?></td>
											<td><?= $value[2] ?></td>
											<td><?= $value[3] ?></td>
											<td><?= $value[4] . " " . $value[5] ?></td>
											<td>Start : <?= date('d-m-Y', strtotime($value[6])) ?> <br>
												Ends : <?= date('d-m-Y', strtotime($value[7])) ?>
											</td>
											<?php $isactive = $value[8];
											if ($isactive == 1) : ?>
												<td> <a href="#" name="status" id="<?= $value[0] ?>" class="updatestatus-element" data-original-title="update"><button type="button" class="btn btn-success btn-lg">Active</button></td>
											<?php
											else : ?>
												<td> <a href="#" name="status" id="<?= $value[0] ?>" class="updatestatus-element" data-original-title="update"><button type="button" class="btn btn-danger btn-lg">Inactive </button></a></td>
											<?php endif; ?>

											<td>
												<a href="#" class="edit-element" id="e-<?= $value[0] ?>" data-original-title="Edit">
													<i class="fas fa-pencil-alt"></i></a>
												<a href="#" name="delete" id="d-<?= $value[0] ?>" class="remove-element" data-original-title="Edit">
													<i class="far fa-trash-alt"></i></a>
											</td>



										</tr>



								<?php
									}
								}
								?>

							</tbody>
						</table>
					</div>
				</section>
			</div>
		</div>


	<!--//modal-->
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center" id='Title'></h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal form-bordered" method="post" id="addImage" action="actions/coupon/add_image.php" enctype="multipart/form-data">

						<div class="form-group">
							<label class="control-label text-lg-right pt-2">Select Image</label>

							<input type='hidden' id='coupon_id' name='coupon_id' value=''>
							<input type='hidden' id='option' name='option' value=''>
							<input type="file" class="form-control" name="coupon_image" id="coupon_image">

						</div>
				</div>

				<div class="form-group">
					<label class="control-label text-lg-right pt-2" for="inputDefault"></label>

					<input type="submit" class="btn btn-primary" value="Update">
					<input type="reset" class="btn btn-warning" value="Reset">
				</div>
			</div>

			</form>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>

</div>
</div>
<?php include 'partial/footer.php'; ?>
<script src="assets/admin/coupon.js"></script>


<script>
	$(".saveImage").click(function() {
		debugger;
		var option = $(this).attr('data-option');
		var coupon_id = $(this).attr('data-id');
		$("#myModal #Title").html("Add/Edit Image");
		$("#myModal #coupon_id").val(coupon_id);
		$("#myModal #option").val(option);
		$("#myModal").modal('show');


	});
</script>
</body>

</html>