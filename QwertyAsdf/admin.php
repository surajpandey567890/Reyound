<?php include 'partial/header.php'; ?>
<div class="page-content">
	<div class="page-info">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Vender's</li>
			</ol>
		</nav>
	</div>
	<div class="main-wrapper">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Vender's</h5>
						<table class="table <?=TABLE_CLASS?>" id="datatable-tabletools" style="width:100%">
							<thead>
								<tr>
									<th>Name</th>
									<th>Mobile Number</th>
									<th>Email</th>
									<th>GST</th>
									
									<th>Created ON</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$get_data = $obj->select("*", "admin_login", "admin_type=2 and vendor_status=1 ORDER BY ID DESC");
								if (is_array($get_data)) {
									foreach ($get_data as $key => $val) {
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
											<td><?= $val[8]; ?></td>

											
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
<?php include 'partial/footer.php'; ?>
<script src="assets/admin/admin.js"></script>

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