		<?php include 'partial/header.php'; ?>
		<div class="page-content">
			<div class="page-info">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Base Category</li>
					</ol>
				</nav>
			</div>
			<div class="main-wrapper">
				<div class="row" id="addContainer" style="display:none;">
					<div class="col">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Add Category</h5>
								<form id="addForm" name="addForm" method="post">
									<div class="form-group">
										<label>Type<span style="color:red;">*</span></label>
										<select class="form-control" name="type_id" id="type_id" tabindex="-1" style="display: none; width: 100%">
											<option value="">Select Type</option>
											<option value="0">Top Product</option>
											<option value="1">Best Seller</option>
										</select>
									</div>
									<div class="form-group">
										<label>Category Name<span style="color:red;">*</span></label>
										<input type="text" class="form-control" name="cate_name" id="cate_name">
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
								<h5 class="card-title">Edit Category</h5>
								<form id="editForm" name="editForm" method="post">
									<input type="hidden" id="cat_id" name="cat_id">
									<div class="form-group">
										<label>Type <span style="color:red;">*</span></label>
										<select class="form-control" name="type_id_edit" id="type_id_edit" tabindex="-1" style="display: none; width: 100%">
											<option value="">Select Type</option>
											<option value="0">Top Product</option>
											<option value="1">Best Seller</option>
										</select>
									</div>
									<div class="form-group">
										<label>Category Name <span style="color:red;">*</span></label>
										<input type="text" class="form-control" name="cate_name_edit" id="cate_name_edit">
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
								<h5 class="card-title">Category</h5>
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<button id="addToTable" class="btn btn-primary">Add <i class="fas fa-plus"></i></button>
											<button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
										</div>
									</div>
								</div>
								<table class="table <?=TABLE_CLASS?>" id="datatable-tabletools">
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Category</th>
											<th>Type</th>
											<th>Created On</th>
											<th>Status</th>
											<th>Actions</th>

										</tr>

									</thead>
									<tbody id="tableContainer">

										<?php

										$get_data = $obj->select("*", "category", "status!=2 ORDER BY ID DESC");
										//print_r($get_data);
										if (is_array($get_data)) {
											foreach ($get_data as $key => $val) {
												if ($val[5] == 0) {
													$type = "Top Product";
												} else {
													$type = "Best Seller";
												}
										?>
												<tr>
													<td><?= ($key + 1); ?></td>
													<td><?= $val[1]; ?></td>
													<td><?= $type; ?></td>
													<!--<td><?= $val[4]; ?></td>-->
													<td><?= date('d M Y', strtotime($val[3])); ?></td>
														<td>
											    	<?php

													if ($val[2] == 0) {
													?>
												     <button type="button" id="<?= base64_encode($val[0]) ?>" data-id="<?= $val[0]; ?>" class="btn btn-danger update-element">Inactive</button>
												    <?php
													} else {
													?>
												    <button type="button" id="<?= base64_encode($val[0]) ?>" data-id="<?= $val[0]; ?>" class="btn btn-success update-element" >Active</button>						
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
												<td colspan="5" style="text-align:center;">No data found</td>
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
				</div>
			</div>
		</div>

		<?php include 'partial/footer.php'; ?>
		<script src="assets/admin/category.js"></script>

		</body>

		</html>