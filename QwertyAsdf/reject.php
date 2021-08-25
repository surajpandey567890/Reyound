	<?php include 'partial/header.php'; ?>
	<div class="page-content">
		<div class="page-info">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Reject Order</li>
				</ol>
			</nav>
		</div>
		<div class="main-wrapper">
			<div class="row">
				<div class="col">
					<section class="card">
						<header class="card-header mt-3">
							<h2 class="card-title">Rejected Order</h2>
						</header>
						<div class="card-body">
							<table class="table <?=TABLE_CLASS?>" id="datatable-tabletools">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>User Details</th>
										<th>Order Number</th>
										<th>Reject Reason</th>
										<th>Created On</th>
									</tr>
								</thead>
								<tbody id="tableContainer">
									<?php

									$get_data = $obj->select("*", "order_details", "order_status=2 ORDER BY ID DESC");
									if (is_array($get_data)) {
										foreach ($get_data as $key => $val) {
											$user_id = $val[1];
											$get_users = $obj->select("*", "users", "ID='$user_id' ORDER BY ID ASC LIMIT 1");

									?>
											<tr>
												<td><?= ($key + 1); ?></td>
												<td><b><?= $get_users[0][1]; ?></b> <br> Mobile :<?= $get_users[0][2] ?><br> Address :<?= $get_users[0][4] ?><br> Pincode :<?= $get_users[0][5] ?><br> </td>
												<td><?= $val[2]; ?></td>
												<td><?= $val[6]; ?></td>
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
	<?php include 'partial/footer.php'; ?>
	<script src="assets/admin/reject_order.js"></script>
	<?php
	$obj->execute("UPDATE checkout SET is_seen='1' WHERE 1");
	?>
	<script>
		$("#order_count").hide();
	</script>
	</body>

	</html>