<?php include 'partial/header.php'; ?>
<div class="page-content">
	<div class="page-info">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Notification</li>
			</ol>
		</nav>
	</div>
	<div class="main-wrapper">
		<div class="inner-wrapper">

			<div class="row" id="addContainer" style="display:none;">
				<div class="col">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Add Category</h5>
							<form id="addForm" name="addForm" method="post">
								<div class="form-group">
									<label>Subject<span style="color:red;">*</span></label>
									<input type="text" class="form-control" name="subject" id="cate_name">
								</div>
								<div class="form-group">
									<label>Message<span style="color:red;">*</span></label>
									<input type="text" class="form-control" name="message" id="cate_name">
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
							<form id="editForm" name="editForm">
								<input type="hidden" id="cat_id" name="cat_id">
								<div class="form-group">
									<label>Subject <span style="color:red;">*</span></label>
									<input type="hidden" name="nid" id="notificationid">
									<input type="text" class="form-control" name="subject" id="subject" value="">
								</div>
								<div class="form-group">
									<label>Message <span style="color:red;">*</span></label>
									<input type="text" class="form-control" name="message" id="message" value="">
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
					<section class="card">
						<div class="card-body">
							<h2 class="card-title">Notification</h2>
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
										<th>Subject</th>
										<th>Message</th>
										<th>Created On</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="tableContainer">
									<?php
									$get_data = $obj->select("*", "notification", "1", " ORDER BY ID DESC");
									if (is_array($get_data)) {
										foreach ($get_data as $key => $val) {
									?>
									<tr>
										<td><?= ($key + 1); ?></td>
										<td><?= $val[1]; ?></td>
										<td><?= $val[2]; ?></td>
										<td><?= $val[3]; ?></td>
										<td>
											<a href="" class="edit-element" id="<?= $val[0]; ?>" data-original-title="Edit">
												<i class="fas fa-pencil-alt"></i>
											</a>
											<a href="" name="delete" id="<?= $val[0]; ?>" data-id="<?= $val[0]; ?>" class="remove-element" data-original-title="Delete">
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
					</section>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'partial/footer.php'; ?>
<script src="assets/admin/notification.js"></script>
<?php
$obj->execute("UPDATE notification SET is_seen='1' WHERE 1");
?>
<script>
	$("#notification_count").hide();
</script>

</body>

</html>