<?php include 'partial/header.php'; ?>
<div class="page-content">
	<div class="page-info">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Rejected Vender's Data</li>
			</ol>
		</nav>
	</div>
	<div class="main-wrapper">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Rejected Vender's</h5>
						<table class="table <?=TABLE_CLASS?>" id="datatable-tabletools" style="width:100%">
							<thead>
								<tr>
									<th>Name</th>
									<th>Mobile Number</th>
									<th>Email</th>
									<th>GST</th>
									
									<th>Reject Reason</th>
									<th>Created ON</th>
									<!-- <th>Status</th> -->
								</tr>
							</thead>
							<tbody>
								<?php

								$get_data = $obj->select("*", "admin_login", "admin_type=2 and vendor_status = 2 ORDER BY ID DESC");
								if (is_array($get_data)) {
									foreach ($get_data as $key => $val) {
										$reject_id = $val[12];
										$reject= $obj->select("reason", "reject_reason", "ID='$reject_id'")[0][0];
										// $plan_id=$val[13];
										// $membership_plan=$obj->select("name","membership","ID='$plan_id'")[0][0];

										$user_id = $val[0];
										$get_users = $obj->select("*", "personal_info", "admin_id='$user_id' ORDER BY ID ASC LIMIT 1");




								?>
										<tr>
											<td><a href="profile?vid=<?=base64_encode($val[0])?>"><?= html_entity_decode($val[1]); ?></a></td>
											<td><?= html_entity_decode($val[7]); ?></td>
											<td><?= html_entity_decode($val[2]); ?></td>
											<td><?php if (isset($get_users[0][5])) echo $get_users[0][5];
												else echo 'Not Available'; ?></td>
											
											<!-- <td>
                                                <button type="button" id="<?=$val[0]?>" data-id="<?= $val[0]; ?>" class="btn btn-success approve-element">Approve</button>
											</td> -->
											<!-- <td width="20%">
												<?php
												if ($val[10] == 0) {
												?>
													<select class="withdraw_status" id="withdraw_status" name="withdraw_status" data-wid="<?= base64_encode($val[0]); ?>" tabindex="-1" style="display: none; width: 100%">
														<option value="0" selected>Pending</option>
														<option value="1">Approved</option>
														<option value="2">Reject</option>
													</select>
												<?php
												} elseif ($val[10] == 1) {
													echo "Approved";
												} elseif ($val[10] == 2) {
													echo "Rejected";
												}
												?>
											</td> -->
											<td>Title: <?= $reject; ?></br>
												Sub Title: <?= $val[11]; ?></td>
											<td><?= $val[8]; ?></td>
											
										</tr>
								<?php
									}
								}
								?>
								</tr>
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
				    <label>Reject Reason<span style="color:red;">*</span></label>
					<select class="form-control" name="reject_reason_id" id="reject_reason_id" tabindex="-1" style="display: none; width: 100%">
					<option value="">Select Reason</option>
									<?php
									$get_data = $obj->select("*", "reject_reason", "status=1");
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
<script src="assets/admin/approve.js"></script>

<?php
$obj->execute("UPDATE admin_login SET is_seen='1' WHERE 1");
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

	$("#admin_count").hide();
</script>

</body>

</html>