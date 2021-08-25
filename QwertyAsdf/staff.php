<?php include "partial/header.php"; ?>
<div class="page-content">
	<div class="page-info">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Staff</li>
			</ol>
		</nav>
	</div>
	<!-- add part start -->

	<div class="main-wrapper">
		<div class="row" id="addContainer" style="display:none;">
			<div class="col">
				<section class="card">
					<div class="card-body">
						<h2 class="card-title">Add Staff</h2>
						<form class="form-horizontal form-bordered" id="addForm" name="addForm" method="post" encypt="multipart/form-data">
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Name<span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="name" id="name">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Mobileno<span style="color:red;">*</span></label>
								<input type="number" class="form-control" name="mobileno" id="mobileno">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Email<span style="color:red;">*</span></label>
								<input type="email" class="form-control" name="email" id="email">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Password<span style="color:red;">*</span></label>
								<input type="password" class="form-control" name="password" id="password">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Adress<span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="address" id="address">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">WorkAs<span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="work_as" id="work_as">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Salary<span style="color:red;">*</span></label>
								<input type="number" class="form-control" name="salary" id="salary">
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
		<!-- add part end -->

		<!-- edit part start -->
		<div class="row" id="editContainer" style="display:none;">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Edit Category</h5>
						<form id="editForm" name="editForm" method="post">
							<input type="hidden" id="staff_id" name="staff_id">

							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Name<span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="name_edit" id="name_edit">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Mobileno<span style="color:red;">*</span></label>
								<input type="number" class="form-control" name="mobileno_edit" id="mobileno_edit">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Email<span style="color:red;">*</span></label>
								<input type="email" class="form-control" name="email_edit" id="email_edit">
							</div>

							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Adress<span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="address_edit" id="address_edit">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">WorkAs<span style="color:red;">*</span></label>
								<input type="text" class="form-control" name="work_as_edit" id="work_as_edit">
							</div>
							<div class="form-group">
								<label class="control-label text-lg-right pt-2">Salary<span style="color:red;">*</span></label>
								<input type="number" class="form-control" name="salary_edit" id="salary_edit">
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
		<!-- edit part end -->
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Staff</h5>
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<button id="addToTable" class="btn btn-primary">Add <i class="fas fa-plus"></i></button>
									<button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
								</div>
							</div>
						</div>
						<table class="table  <?= TABLE_CLASS ?>" id="datatable-tabletools">
							<thead>
								<tr>
									<th>Sr. No.</th>
									<th>Name</th>
									<th>Mobile Number / Email</th>
									<th>Address</th>
									<th>Work As</th>
									<th>Salary</th>
									<th>Created ON</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="tableContainer">
								<?php

								$get_data = $obj->select("*", "staff", "1 ORDER BY ID DESC");
								if (is_array($get_data)) {
									foreach ($get_data as $key => $val) {
										// $plan_id=$val[13];
										// $membership_plan=$obj->select("name","membership","ID='$plan_id'")[0][0];

										$staff_id = $val[1];
										$get_users = $obj->select("*", "admin_login", "ID='$staff_id' ORDER BY ID ASC LIMIT 1");
								?>
										<tr>
											<td><?= ($key + 1); ?></td>
											<td><?= $get_users[0][1] ?></td>
											<td><?= $get_users[0][7] ?></br>
												<?= $get_users[0][2] ?></td>
											<td><?= html_entity_decode($val[2]); ?></td>
											<td><?= html_entity_decode($val[3]); ?></td>
											<td><?= html_entity_decode($val[4]); ?></td>
											<td><?= $val[5]; ?></td>
											<td>
												<?php

												if ($val[6] == 0) {
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center">Accounts Details</h4>
			</div>
			<div class="modal-body">
				<div id='output'></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<?php include 'partial/footer.php'; ?>
<script src="assets/admin/staff.js"></script>

<?php
$obj->execute("UPDATE staff SET is_seen='1' WHERE 1");
?>
<script>
	// function getModal(id)
	// {
	//     debugger;
	//     $.ajax({
	//            type: "POST",
	//            url: "actions/users/showProducts.php",
	//            data:{'id':id},
	//            success: function(obj)
	//            {
	//                var result = $.parseJSON(obj);
	//                if(result.response == 'y'){
	//                    $("#myModal").modal('show');
	//                    $("#myModal #output").html(result.output);
	//                }
	//                else{
	//               alert(result.message);
	//                }
	//            },
	//            error: function() {alert('failed');
	//            }
	//            });
	//        return false;
	// }

	$("#staff_count").hide();
</script>