		<?php include 'partial/header.php'; ?>
		<div class="page-content">
			<div class="page-info">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Product</li>
					</ol>
				</nav>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<div class="row mb-3">

							<?php
							if (isset($_GET['claim_id']) && $_GET['claim_id'] != "") {
								$claim_id = base64_decode($_GET['claim_id']);

								$get_img_data = $obj->select("ID,image", "claims_image", "claim_id='$claim_id' ORDER BY ID DESC");
								if (is_array($get_img_data)) {
									foreach ($get_img_data as $Ival) {
							?>
										<div class="col-md-3 mt-3">
											<div class="gallery-images">
												<img src="<?= LOCAL_IMAGE_PATH . $Ival[1] ?>" alt="gallery" class="img-fluid">
												<div class="icon-trash">
													<a href="" name="delete" id="<?= base64_encode($Ival[0]); ?>" class="remove-single-image" data-original-title="Delete">
														<i class="fa fa-trash"></i>
													</a>
												</div>
											</div>
										</div>
							<?php
									}
								} else {
									echo "<h3>No Image Found</h3>";
								}
							} else {
								echo "<h3>No Image Found</h3>";
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include 'partial/footer.php'; ?>
		<script src="assets/admin/claims_img.js"></script>
		</body>
		</html>