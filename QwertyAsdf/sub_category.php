<?php include 'partial/header.php'; ?>
<div class="page-content">
	<div class="page-info">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Sub Category</li>
			</ol>
		</nav>
	</div>
	<div class="main-wrapper">
		<div class="row" id="addContainer" style="display:none;">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Add Sub Category</h5>
						<form id="addForm" name="addForm" method="post">
							<div class="form-group">
								<label>Category<span style="color:red;">*</span></label>
								<select class="form-control" name="cate_id" id="cate_id" tabindex="-1" style="display: none; width: 100%">
									<option value="">Select Category</option>
									<?php
									$get_data = $obj->select("*", "category", "1 ORDER BY ID DESC");
									//print_r($get_data);
									if (is_array($get_data)) {
										foreach ($get_data as $key => $val) {
									?>
											<option value="<?= $val[0] ?>"><?= $val[1]; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Sub Category Name <span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="sub_cate_name" id="sub_cate_name">
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
		<div class="row" id="editContainer" style="display:none;">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Edit Sub Category</h5>
						<form id="editForm" name="editForm" method="post">
							<input type="hidden" id="sub_cat_id" name="sub_cat_id">
							<div class="form-group">
								<label>Category<span style="color:red;">*</span></label>
								<select class="form-control" name="cate_id_edit" id="cate_id_edit" tabindex="-1" style="display: none; width: 100%">
									<option value="">Select Category</option>
									<?php
									$get_data = $obj->select("*", "category", "1 ORDER BY ID DESC");
									if (is_array($get_data)) {
										foreach ($get_data as $key => $val) {
									?>
											<option value="<?= $val[0] ?>"><?= $val[1]; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Sub Category Name</label>
								<input type="text" class="form-control" name="name_edit" id="name_edit">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Edit">
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
						<h5 class="card-title">Sub Category</h5>
						<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<button id="addToTable" class="btn btn-primary">Add <i class="fas fa-plus"></i></button>
											<button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
										</div>
									</div>
								</div>
						<table class="table <?=TABLE_CLASS?>" id="datatable-tabletools" style="width:100%">
							<thead>
								<tr>
									<th>Sr. No.</th>
									<th>Category</th>
									<th>Sub Category</th>
									<th>Created On</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$get_data = $obj->select("*", "sub_category", "1 ORDER BY ID DESC");
								if (is_array($get_data)) {
									foreach ($get_data as $key => $val) {
										$cat_id = $val[1];
										$cat_name = $obj->select("name", "category", "ID='$cat_id'")[0][0];
								?>
										<tr>
											<td><?= ($key + 1); ?></td>
											<td><?= $cat_name; ?></td>
											<td><?= $val[2]; ?></td>
											<!-- <td>
        											    <?php
														if ($val[3] != "") {
														?>
        											            <a href="<?= $val[3]; ?>" target="_blank">Link</a>
        											    <?php
														}
														?>
        											</td> -->
											<td><?= date('d M Y', strtotime($val[4])); ?></td>
											<td>
												<?php

												if ($val[3] == 0) {
												?>
													<button type="button" id="<?= base64_encode($val[0]) ?>" data-id="<?= $val[0]; ?>" class="btn btn-danger update-element">Inactive</button>
												<?php
												} else {
												?>
													<button type="button" id="<?= base64_encode($val[0]) ?>" data-id="<?= $val[0]; ?>" class="btn btn-success update-element">Active</button>
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
											</td>

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
</div>

<section>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'partial/footer.php'; ?>
<script src="assets/admin/subcategory.js"></script>

</body>

</html>