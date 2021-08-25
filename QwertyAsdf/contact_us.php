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
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Contact Us</h5>
						<table class="table <?=TABLE_CLASS?>" id="datatable-tabletools">
							<thead>
								<tr>
									<th>Sr. No.</th>
									<th>Name</th>
									<th>Email</th>
									<th>Subject</th>
									<th>Message</th>
									<th>Created On</th>
								</tr>
							</thead>
							<tbody id="tableContainer">
								<?php
								$get_data = $obj->select("*", "contact_us", "1", " ORDER BY ID DESC");
								if (is_array($get_data)) {
									foreach ($get_data as $key => $val) {
								?>
										<tr>
											<td><?= ($key + 1); ?></td>
											<td><?= $val[1]; ?></td>
											<td><?= $val[2]; ?></td>
											<td><?= $val[3]; ?></td>
											<td><?= $val[4]; ?></td>
											<td><?= $val[6]; ?></td>
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
<?php
$obj->execute("UPDATE contact_us SET is_seen='1' WHERE 1");
?>
<script>
	$("#contact_count").hide();
	
</script>

</body>

</html>