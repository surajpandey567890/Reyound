<?php include 'partial/header.php'; ?>
<div class="page-content">
	<div class="page-info">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Order's</li>
			</ol>
		</nav>
	</div>
	<div class="main-wrapper">
		<div class="row">
			<div class="col">
				<section class="card">
					<div class="card-body">
						<h5 class="card-title">Order Details</h5>
						<table class="table <?=TABLE_CLASS?>" id="datatable-tabletools">
							<thead>
								<tr>
									<th>Sr. No.</th>
									<th>Users</th>
									<th>Order Number</th>
									<th>Checkout</th>
									<th>Amount</th>
									<th>Order Status</th>
									<th>Reject reason</th>
									<th>Created On</th>
								</tr>
							</thead>
							<tbody id="tableContainer">
								<?php
								if($_SESSION['session_ap'] == 2)
								{
									$get_data = $obj->select("*", "order_details", "order_to=".$_SESSION['session_ap']." ORDER BY ID DESC");	
								}
								else
								{
									$get_data = $obj->select("*", "order_details", "1 ORDER BY ID DESC");
								}
								if (is_array($get_data)) {
									foreach ($get_data as $key => $val) {
										$user_id = $val[1];
										$get_users = $obj->select("*", "users", "ID='$user_id' ORDER BY ID ASC LIMIT 1");
										// $order_id=$val[2];
										// $get_order=$obj->select("*","order_details","ID='$order_id' ORDER BY ID ASC LIMIT 1");
										$checkout_id = $val[2];
										$product_id = $checkout_id;
										$get_checkout = $obj->select("*", "checkout", "ID='$checkout_id' ORDER BY ID ASC LIMIT 1");
								?>
										<tr>
											<td><?= ($key + 1); ?></td>
											<td><b><?= $get_users[0][1]; ?></b> <br> Mobile :<?= $get_users[0][2] ?><br> Address :<?= $get_users[0][5] ?><br> Pincode :<?= $get_users[0][6] ?><br> </td>
											<td><?= $val[2]; ?></td>
											<td><?= $val[3]; ?></td>
											<td><?= $val[4]; ?></td>
											<td width="20%">
												<?php
												if ($val[5] == 0) {
												?>
													<select class="withdraw_status" id="withdraw_status" name="withdraw_status" data-wid="<?= base64_encode($val[0]); ?>" tabindex="-1" style="display: none; width: 100%">
														<option value="0" selected>Pending</option>
														<option value="1">Completed</option>
														<option value="2">Reject</option>
													</select>
												<?php
												} elseif ($val[5] == 1) {
													echo "Completed";
												} elseif ($val[5] == 2) {
													echo "Rejected";
												}
												?>
											</td>
											<td><?= html_entity_decode($val[6]); ?></td>
											<td><?= $val[7]; ?></td>
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

<!-- Order Details Process File -->
<script src="assets/admin/order_details.js"></script>
<?php
$obj->execute("UPDATE order_details SET is_seen='1' WHERE 1");
?>
<script>
	function get_modal(user_id) {
		$('#save_reason').modal('show');
		$('#save_reason  #user_id').val(user_id);

	}
</script>
<script>
	$("#save_reason").on('submit', function() {
		debugger;
		var formData = new FormData(this);

		//alert(formData);
		console.log(formData);

		$.ajax({
			url: 'actions/order_details/save_reason.php',
			type: 'POST',
			data: formData, //$("#save_scholarship").serialize(),
			success: function(data) {
				debugger;
				result = $.parseJSON(data);
				if (result.response == 'y') {
					alert(result.message);
					location.reload();
				} else {

					alert(result.message);
				}
			},
			cache: false,
			contentType: false,
			processData: false
		});
		return false;
	})
	$("#order_count").hide();
</script>
</body>

</html>