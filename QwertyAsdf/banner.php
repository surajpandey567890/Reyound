<?php include "partial/header.php"; ?>
<div class="page-content">
	<div class="page-info">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Banner</li>
			</ol>
		</nav>
	</div>
	<div class="main-wrapper">
		<div class="row" id="addContainer" style="display:none;">
			<div class="col">
				<section class="card">
					<div class="card-body">
						<h2 class="card-title">Add Banner</h2>
						<form class="form-horizontal form-bordered" id="addForm" name="addForm" method="post" encypt="multipart/form-data">
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Image<span style="color:red;">*</span></label>
								<input type="file" class="form-control" name="image" id="image">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Heading<span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="heading" id="heading">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Sub Heading<span style="color:red;"></span></label>
								<input type="text" class="form-control" name="sub_heading" id="sub_heading">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Link<span style="color:red;"></span></label>
								<input type="url" class="form-control" name="link" id="link">
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
		<div class="row">
			<div class="col">
				<section class="card">
					<header class="card-header mt-3">
						<h2 class="card-title">Banner</h2>
					</header>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<button id="addToTable" class="btn btn-primary">Add <i class="fas fa-plus"></i></button>
									<button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
								</div>
							</div>
						</div>
						<table class="table  <?=TABLE_CLASS?>" id="datatable-tabletools">
							<thead>
								<tr>
									<th>Sr. No.</th>
									<th>Image</th>
									<th>Heading</th>
									<th>Sub heading</th>
									<th>Link</th>
									<th>Created On</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody id="tableContainer">
								<?php
								$get_data = $obj->select("*", "banner", "1", " ORDER BY ID DESC");
								if (is_array($get_data)) {
									foreach ($get_data as $key => $val) {
								?>
										<tr>
											<td><?= ($key + 1); ?></td>
											<td><img src="<?= $val[1] ?>" width="60" height="60"></td>
											<td><?= $val[2]; ?></td>
											<td><?= $val[3]; ?></td>
											<td><?= $val[4]; ?></td>
											<td><?= $val[5]; ?></td>
											<td>
												<?php

												if ($val[6] == 1) {
												?>
													<button type="button" id="<?= base64_encode($val[0]); ?>" data-id="<?= base64_encode($val[0]); ?>" class="btn btn-success status-element">Active</button>
												<?php
												} else {
												?>
													<button type="button" id="<?= base64_encode($val[0]); ?>" data-id="<?= base64_encode($val[0]); ?>" class="btn btn-danger status-element">Inactive</button>
												<?php
												}
												?>
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
		</section>
	</div>
</div>
<?php include 'partial/footer.php'; ?>
<script src="assets/admin/banner.js"></script>

</body>

</html>