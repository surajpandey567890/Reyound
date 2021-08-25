<?php include 'partial/header.php'; ?>
<div class="page-content">
	<div class="page-info">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Active</li>
			</ol>
		</nav>
	</div>
	<div class="main-wrapper">
		<div class="inner-wrapper">
			<div class="row">
				<div class="col">
					<section class="card">
						<div class="card-body">
							<h2 class="card-title">Active Products</h2>
							<div class="row">
								<div class="col-sm-6">
									<!-- <div class="mb-3">
											<button id="addToTable" class="btn btn-primary">Add <i class="fas fa-plus"></i></button>
                                            <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button> 
										</div> -->
								</div>
							</div>
							<table class="table <?=TABLE_CLASS?>" id="datatable-tabletools">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>Category</th>
										<th>Sub Category</th>
										<th>Sub Main Category</th>
										<th>Name/SKU</th>
										<th>Createdon</th>

									</tr>
								</thead>
								<tbody id="tableContainer">
									<?php
									$getProduct = $obj->select("*", "product", "status=1 ORDER BY ID DESC");
									if (is_array($getProduct)) {
										foreach ($getProduct as $key => $val) {
											$cat_id = $val[1];
											$category = $obj->select("name", "category", "ID='$cat_id'")[0][0];
											$subcat_id = $val[2];
											$sub_category = $obj->select("subcat_name", "sub_category", "ID='$subcat_id'")[0][0];

											$submaincat_id = $val[3];
											$sub_main_category = $obj->select("subcat_name", "sub_main_category", "ID='$submaincat_id'")[0][0];
									?>
											<tr>
												<td><?= ($key + 1) ?></td>
												<td><?= ($category == null ? "" : $category); ?></td>
												<td><?= ($sub_category == null ? "" : $sub_category); ?></td>
												<td><?= ($sub_main_category == null ? "" : $sub_main_category); ?></td>
												<td><?= html_entity_decode($val[4]); ?></br>
													<?= html_entity_decode($val[5]); ?></td>

												<td><?= $val[11]; ?></td>

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
		</div>
	</div>

	<section>
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
	</section>


	<section>
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
	</section>

	<?php include 'partial/footer.php'; ?>
	<script src="assets/admin/active_products.js"></script>

	<script>
		$(function() {
			$('input[data-role=tagsinput]').tagsinput();
		});
	</script>
	<script src="assets/ckeditor/ckeditor.js"></script>
	<script>


	</script>



	</body>

	</html>