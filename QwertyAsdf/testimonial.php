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
				<section class="card">
					<div class="card-body">
						<h5 class="card-title">Add Testimonial</h5>
						<form id="addForm" name="addForm" method="post" encypt="multipart/form-data">
							<div class="form-group">
								<label>Description <span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="description" id="description">
							</div>
							<div class="form-group">
								<label>Author <span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="author" id="author">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Add">
								<input type="reset" class="btn btn-warning" value="Reset">
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>

		<div class="row" id="editContainer" style="display:none;">
			<div class="col">
				<section class="card">
					<div class="card-body">
						<h5 class="card-title"> Edit Testimonial</h5>
						<form class="form-horizontal form-bordered" id="editForm" name="editForm" method="post" encypt="multipart/form-data">
							<input type="hidden" class="form-control" name="ID" id="ID">
							<div class="form-group">
								<label> Description<span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="description_edit" id="description_edit">
							</div>
							<div class="form-group">
								<label>Author <span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="author_edit" id="author_edit">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Edit">
								<input type="reset" class="btn btn-warning" value="Reset">
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Testimonial</h5>
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
									<th>Description</th>
									<th>Author</th>
									<th>Created On</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="tableContainer">
								<?php
								$get_data = $obj->select("*", "testimonial", "1", " ORDER BY ID DESC");
								if (is_array($get_data)) {
									foreach ($get_data as $key => $val) {
								?>
										<tr>
											<td><?= ($key + 1); ?></td>
											<td><?= $val[1]; ?></td>
											<td><?= $val[2]; ?></td>
											<td><?= $val[4]; ?></td>

											<td>
												<a href="" class="edit-element" id="<?= base64_encode($val[0]); ?>" data-original-title="Edit">
													<i class="fas fa-pencil-alt"></i>
												</a>
												<a href="" name="delete" class="remove-element" id="<?= base64_encode($val[0]); ?>" data-original-title="Delete">
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
<?php include 'partial/footer.php'; ?>
<script src="assets/admin/testimonial.js"></script>
</body>

</html>