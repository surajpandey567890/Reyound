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
						<h5 class="card-title">Add Product</h5>
						<form id="addForm" name="addForm" method="POST" encypt="multipart/form-data">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Category<span style="color:red;">*</span></label>
										<select class="form-control populate" name="cate_id" id="cate_id" required tabindex="-1" style="display: none; width: 100%">
											<option value="">Select Category</option>
											<?php
											$get_data = $obj->select("*", "category", "status=1 ORDER BY ID DESC");
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
								</div>

								<div class="col-md-4">

									<div class="form-group">
										<label>Sub Category Name<span style="color:red;">*</span></label>
										<select class="form-control" name="sub_cate_id" id="sub_cate_id" tabindex="-1" style="display: none; width: 100%">
											<option value="">Select Sub Category Name</option>
											<?php
											$get_data = $obj->select("*", "sub_category", "status=1 ORDER BY ID DESC");
											if (is_array($get_data)) {
												foreach ($get_data as $key => $val1) {
											?>
													<option value="<?= $val1[0] ?>"><?= $val1[2]; ?></option>
											<?php
												  }
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Sub Main Category Name<span style="color:red;">*</span></label>
										<select class="form-control" name="sub_main_cate_id" id="sub_main_cate_id" tabindex="-1" style="display: none; width: 100%">
											<option value="">Select Sub Category Name</option>
											<?php
											$get_data = $obj->select("*", "sub_main_category", "status=1 ORDER BY ID DESC");
											if (is_array($get_data)) {
												foreach ($get_data as $key => $val1) {
											?>
													<option value="<?= $val1[0] ?>"><?= $val1[3]; ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">

									<div class="form-group">
										<label>Name <span style="color:red;">*</span></label>
										<input type="text" class="form-control" name="name" id="name" required>
									</div>
								</div>
								<div class="col-md-4">

									<div class="form-group">
										<label>SKU <span style="color:red;">*</span></label>
										<input type="text" class="form-control" name="sku" id="sku" required>
									</div>
								</div>
								<div class="col-md-4">


									<div class="form-group">
										<label>Main Images <span style="color:red;">*</span></label>
										<input type="file" class="form-control" multiple name="image[]" id="image" required>
										<span style="color:red;">Image size should be 630 * 574 pixels</span>
									</div>

								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Images <span style="color:red;">*</span></label>
										<input type="file" class="form-control btn" multiple name="images[]" id="images" required>
										<span style="color:red;">Image size should be 630 * 574 pixels</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Product Price <span style="color:red;">*</span></label>
										<input type="number" class="form-control" name="product_price" id="product_price" required>
									</div>
								</div>
								<div class="col-md-4">


									<div class="form-group">
										<label>Offer Price</label>
										<input type="number" class="form-control" name="offer_price" id="offer_price">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Stock <span style="color:red;">*</span></label>
										<input type="number" class="form-control" name="stock" id="stock" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>HSN Code <span style="color:red;">*</span></label>
										<input type="text" class="form-control" name="hsn_code" id="hsn_code" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Gst Rate<span style="color:red;">*</span></label>
										<select class="form-control" name="gst_id" id="gst_id" tabindex="-1" style="display: none; width: 100%">
											<option value="">Select Gst</option>
											<?php
											$get_data = $obj->select("*", "gst", "status=1 ORDER BY ID DESC");
											if (is_array($get_data)) {
												foreach ($get_data as $key => $val1) {
											?>
													<option value="<?= $val1[0] ?>"><?= $val1[1]; ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Colour<span style="color:red;">*</span></label>
										<select class="form-control" name="colour_id" id="colour_id" tabindex="-1" style="display: none; width: 100%">
											<option value="">Select Colour</option>
											<?php
											$get_data = $obj->select("*", "colour", "status=1 ORDER BY ID DESC");
											if (is_array($get_data)) {
												foreach ($get_data as $key => $val1) {
											?>
													<option value="<?= $val1[0] ?>"><?= $val1[1]; ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Size<span style="color:red;">*</span></label>
										<select class="form-control" name="size_id" id="size_id" tabindex="-1" style="display: none; width: 100%">
											<option value="">Select Size</option>
											<?php
											$get_data = $obj->select("*", "size", "status=1 ORDER BY ID DESC");
											if (is_array($get_data)) {
												foreach ($get_data as $key => $val1) {
											?>
													<option value="<?= $val1[0] ?>"><?= $val1[1]; ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Short Description</label>
								<textarea class="form-control" id="short_description" name="short_description" rows="5"></textarea>
							</div>
							<div class="form-group">
								<label>Long Description<span style="color:red;">*</span></label>
								<textarea class="form-control" id="description" name="description" rows="5"></textarea>
							</div>
							<div class="form-group">
								<label></label>
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
						<h5 class="card-title">Edit Product</h5>
						<form id="editForm" name="editForm" method="POST">
							<input type="hidden" id="product_id" name="product_id">
							<div class="form-group">
								<label>Category<span style="color:red;">*</span></label>
								<select class="form-control populate" name="cate_id_edit" id="cate_id_edit" data-plugin-selectTwo>
									<option value="">Select Category</option>
									<?php
									$get_data = $obj->select("*", "category", "status=1 ORDER BY ID DESC");
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
							<div class="form-group" id="sub_cat_field1">
								<label>Sub Category<span style="color:red;">*</span></label>
								<select class="form-control populate" name="sub_cate_id_edit" id="sub_cate_id_edit">
								</select>
							</div>
							<div class="form-group" id="sub_main_cat_field1">
								<label>Sub Main Category<span style="color:red;">*</span></label>
								<select class="form-control populate" name="sub_main_cate_id_edit" id="sub_main_cate_id_edit">
								</select>
							</div>

							<div class="form-group">
								<label>Name <span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="name_edit" id="name_edit" required>
							</div>
							<div class="form-group">
								<label>Main Image <span style="color:red;">*</span></label>
								<input type="file" class="form-control" multiple name="images_edit[]" multiple id="images_edit">
								<span style="color:red;">Image size should be 630 * 574 pixels</span>
							</div>
							<div class="form-group">
								<label>Images <span style="color:red;">*</span></label>
								<input type="file" class="form-control" multiple name="image_edit[]" multiple id="image_edit">
								<span style="color:red;">Image size should be 630 * 574 pixels</span>
							</div>
							<div class="form-group">
								<label>Product Price <span style="color:red;">*</span></label>
								<input type="number" class="form-control" name="product_price_edit" id="product_price_edit" required>
							</div>
							<div class="form-group">
								<label>Offer Price</label>
								<input type="number" class="form-control" name="offer_price_edit" id="offer_price_edit">
							</div>
							<div class="form-group">
								<label>Stock <span style="color:red;">*</span></label>
								<input type="number" class="form-control" name="stock_edit" id="stock_edit" required>
							</div>
							<div class="form-group">
								<label>HSN Code <span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="hsn_code_edit" id="hsn_code_edit" required>
							</div>
							<div class="form-group">
								<label>Gst Rate<span style="color:red;">*</span></label>
								<select class="form-control" name="gst_id_edit" id="gst_id_edit">
									<option value="">Select Gst</option>
									<?php
									$get_data = $obj->select("*", "gst", "status=1 ORDER BY ID DESC");
									if (is_array($get_data)) {
										foreach ($get_data as $key => $val1) {
									?>
											<option value="<?= $val1[0] ?>"><?= $val1[1]; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Colour<span style="color:red;">*</span></label>
								<select class="form-control" name="colour_id_edit" id="colour_id_edit">
									<option value="">Select Colour</option>
									<?php
									$get_data = $obj->select("*", "colour", "status=1 ORDER BY ID DESC");
									if (is_array($get_data)) {
										foreach ($get_data as $key => $val1) {
									?>
											<option value="<?= $val1[0] ?>"><?= $val1[1]; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Size<span style="color:red;">*</span></label>
								<select class="form-control" name="size_id_edit" id="size_id_edit">
									<option value="">Select Size</option>
									<?php
									$get_data = $obj->select("*", "size", "status=1 ORDER BY ID DESC");
									if (is_array($get_data)) {
										foreach ($get_data as $key => $val1) {
									?>
											<option value="<?= $val1[0] ?>"><?= $val1[1]; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Short Description</label>
								<textarea class="form-control" id="short_description_edit" name="short_description_edit" rows="5"></textarea>
							</div>
							<div class="form-group">
								<label>Long Description<span style="color:red;">*</span></label>
								<textarea class="form-control" id="description_edit" name="description_edit" rows="5"></textarea>
							</div>
							<div class="form-group">
								<label for="inputDefault"></label>
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
						<h5 class="card-title">Product</h5>
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<button id="addProduct" class="btn btn-primary">Add <i class="fas fa-plus"></i></button>
									<button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
								</div>
							</div>
						</div>
						<table class="table <?= TABLE_CLASS ?> table-responsive" id="datatable-tabletools">
							<thead>
								<tr>
									<th>Category</th>
									<th>Name</th>
									<th>SKU</th>
									<th>Product Price</th>
									<th>Offer Price</th>
									<th>Stock</th>
									<th>Hsn code/Gst Rate</th>
									<th>Colour/Size</th>
									<th>Descriptions</th>
									<th>Main Image</th>
									<th>Images</th>
									<?php
									if ($_SESSION['ADMIN_TYPE'] != 2) { ?>
										<th>Added by</th>
										<th>Product Status</th>
										<th>Reject Reason</th>
									<?php } ?>
									<th>Createdon</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody id="tableContainer">
								<?php
								if ($_SESSION['ADMIN_TYPE'] != 2) {

									$getProduct = $obj->select("*", "product", "1 ORDER BY ID DESC");
								} else {

									$getProduct = $obj->select("*", "product", "status=1 and product_status=1  and added_by='" . $_SESSION['session_ap'] . "'ORDER BY ID DESC");
								}

								if (is_array($getProduct)) {
									foreach ($getProduct as $key => $val) {
										$cat_id = $val[1];
										$category = $obj->select("name", "category", "ID='$cat_id'")[0][0];
										$subcat_id = $val[2];
										$sub_category = $obj->select("subcat_name", "sub_category", "ID='$subcat_id'")[0][0];

										$submaincat_id = $val[3];
										$sub_main_category = $obj->select("subcat_name", "sub_main_category", "ID='$submaincat_id'")[0][0];

										$added_by_id = $val[13];
										$added_by = $obj->select("name", "admin_login", "ID='$added_by_id'")[0][0];
										$gst_id = $val[18];
										$gst = $obj->select("name", "gst", "ID='$gst_id'")[0][0];
										$colour_id = $val[19];
										$colour = $obj->select("name", "colour", "ID='$colour_id'")[0][0];
										$size_id = $val[20];
										$size = $obj->select("name", "size", "ID='$size_id'")[0][0];


								?>
										<tr>
											<td><?= ($category == null ? "" : $category); ?></td>
											<td><?= html_entity_decode($val[4]); ?></td>
											<td><?= html_entity_decode($val[5]); ?></td>
											<td><?= $val[7]; ?></td>
											<td><?= $val[8]; ?></td>
											<td><?= $val[9]; ?></td>
											<td><?= $val[17]; ?>/<?= $gst; ?> </td>
											<td><?= $colour; ?>/<?= $size; ?> </td>
											<td><a href="#" class="view-element" data-id="<?= $val[0]; ?>" id="<?= $val[0]; ?>">View</a></td>
											<td><img src="<?= $val[16] ?>" width="60" height="60"></td>
											<td><a href="product_images.php?product_id=<?= base64_encode($val[0]); ?>" target="_blank" class="view-images">View</a></td>
											<?php
											if ($_SESSION['ADMIN_TYPE'] != 2) { ?>

												<td><?= ($added_by == null ? "" : $added_by); ?></td>

												<td width="20%">
													<?php
													if ($val[14] == 0) {
													?>
														<select class="withdraw_status" id="withdraw_status" name="withdraw_status" data-wid="<?= base64_encode($val[0]); ?>" tabindex="-1" style="display: none; width: 100%">
															<option value="0" selected>Pending</option>
															<option value="1">Approved</option>
															<option value="2">Reject</option>
														</select>
													<?php
													} elseif ($val[14] == 1) {
														echo "Approved";
													} elseif ($val[14] == 2) {
														echo "Rejected";
													}
													?>
												</td>
												<td><?= $val[15]; ?></td>

											<?php } ?>
											<td><?= $val[11]; ?></td>
											<?php
											if ($val[10] == 1) {
											?>
												<td><button type="button" id="<?= base64_encode($val[0]); ?>" class="btn btn-success status-element">Active</button></td>
											<?php
											} else {
											?>
												<td><button type="button" id="<?= base64_encode($val[0]); ?>" class="btn btn-danger status-element">Inactive</button></td>
											<?php
											}
											?>
											<!-- <td><b><a href="add_compare_product.php?pid=<?= base64_encode($val[0]); ?>" target="_blank" class="add_compare_product">Add</a>
													
													</td>	 -->

											<!--<a href="#" class="edit-element" id="edittable" data-original-title="Edit">-->
											<!--	<i class="fas fa-pencil-alt"></i>-->
											<!--</a>-->
											<!-- <a href="relative.php?pid=<?= base64_encode($val[0]) ?>" name="relative" id="" class="relative-element" data-original-title="Edit">
																<i class="fas fa-cubes" aria-hidden="true"></i></a>
														</a> -->

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
<div id="descpModal" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Product Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="short_desp"></p>
				<p id="desp"></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
				<form id="rejectreason" name="addForm" method="post">
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

<?php include 'partial/footer.php'; ?>
<script src="assets/admin/product.js"></script>

<script>
	$("#datatable-tabletools").on("click", ".view-description", function() {
		//debugger;
		var ID = $(this).attr('id');
		$('#pid').val(ID);
		$.ajax({
			url: 'actions/product/get_description',
			type: 'POST',
			data: {
				'ID': ID
			},
			success: function(data) {
				//debugger;
				result = $.parseJSON(data);
				if (result.response == 'y') {
					$('#pdescription').val(result.description);
					$('#discription').modal('show');
				} else {
					swal("Oh ho!", result.message, "error");
				}
			},
			cache: false,
			contentType: false,
			processData: false
		});

	});
</script>

<script>
	$(function() {
		$('input[data-role=tagsinput]').tagsinput();
	});
</script>
<script src="assets/ckeditor/ckeditor.js"></script>
<script>
	var editor = CKEDITOR.replace('description', {
		extraPlugins: 'filebrowser',
		extraPlugins: 'youtube',
		filebrowserBrowseUrl: 'browser.php?type=Images',
		filebrowserUploadMethod: "form",
		filebrowserUploadUrl: "upload.php"
	});

	var editor = CKEDITOR.replace('description_edit', {
		extraPlugins: 'filebrowser',
		extraPlugins: 'youtube',
		filebrowserBrowseUrl: 'browser.php?type=Images',
		filebrowserUploadMethod: "form",
		filebrowserUploadUrl: "upload.php"
	});

	var editor = CKEDITOR.replace('short_description', {
		extraPlugins: 'filebrowser',
		extraPlugins: 'youtube',
		filebrowserBrowseUrl: 'browser.php?type=Images',
		filebrowserUploadMethod: "form",
		filebrowserUploadUrl: "upload.php"
	});

	var editor = CKEDITOR.replace('short_description_edit', {
		extraPlugins: 'filebrowser',
		extraPlugins: 'youtube',
		filebrowserBrowseUrl: 'browser.php?type=Images',
		filebrowserUploadMethod: "form",
		filebrowserUploadUrl: "upload.php"
	});

	$('#addProduct').click(function() {
		window.open('addproduct', '_blank');
	});
</script>



</body>

</html>