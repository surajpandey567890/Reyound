<?php
include("../common/constant.php");

?>

<!doctype html>
<html class="fixed header-dark">

<head>
	<!-- Basic -->
	<meta charset="UTF-8">
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content=" ">
	<meta name="author" content=" ">
	<link rel="icon" href="img/logo/logo.png">
	<!-- Favicon -->
	<link rel="icon" href="img/favicon.png">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<!-- Styles -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
	<link href="assets/plugins/DataTables/datatables.min.css" rel="stylesheet">


	<!-- Theme Styles -->
	<link href="assets/css/connect.min.css" rel="stylesheet">
	<link href="assets/css/dark_theme.css" rel="stylesheet">
	<link href="assets/css/custom.css" rel="stylesheet">

</head>

<body>
	<div class="connect-container align-content-stretch d-flex flex-wrap">
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
							if (isset($_GET['product_id']) && $_GET['product_id'] != "") {
								$prod_id = base64_decode($_GET['product_id']);

								$get_img_data = $obj->select("ID,image", "product_images", "product_id='$prod_id' ORDER BY ID DESC");
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

			<div class="page-footer">
				<div class="row">
					<div class="col-md-12">
						<span class="footer-text">2019 © stacks</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	<!-- Javascripts -->
	<script src="assets/plugins/jquery/jquery-3.4.1.min.js"></script>
	<script src="assets/plugins/bootstrap/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/DataTables/datatables.min.js"></script>
	<script src="assets/js/connect.min.js"></script>
	<script src="assets/js/pages/datatables.js"></script>


	<!-- Vendor -->
	<script src="../vendor/jquery/jquery.js"></script>
	<script src="assets/admin/product_img.js"></script>
	<script src="../vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="../vendor/popper/umd/popper.min.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.js"></script>
	<script src="../vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="../vendor/common/common.js"></script>
	<script src="../vendor/nanoscroller/nanoscroller.js"></script>
	<script src="../vendor/magnific-popup/jquery.magnific-popup.js"></script>
	<script src="../vendor/jquery-placeholder/jquery-placeholder.js"></script>
	<script src="../vendor/jquery-validation/jquery.validate.js"></script>
	<script src="assets/plugins/DataTables/datatables.js"></script>
	<!--<script src="js/bootstrap-datepicker.js"></script>-->

	<script src="../vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>

	<script src="../vendor/bootstrap-markdown/js/markdown.js"></script>
	<script src="../vendor/bootstrap-markdown/js/to-markdown.js"></script>
	<script src="../vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>

	<!-- Specific Page Vendor -->
	<script src="../vendor/select2/js/select2.js"></script>
	<script src="../vendor/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="../vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>

	<!-- Examples -->
	<script src="js/examples/examples.datatables.default.js"></script>
	<script src="js/examples/examples.datatables.row.with.details.js"></script>
	<script src="js/examples/examples.datatables.tabletools.js"></script>

	<!-- Specific Page Vendor -->
	<script src="../vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
	<script src="../vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
	<script src="../vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
	<script src="../vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
	<script src="../vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
	<script src="../vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
	<script src="../vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="js/theme.js"></script>

	<!-- Theme Custom -->
	<!--<script src="js/custom.js"></script>-->

	<!-- Theme Initialization Files -->
	<script src="js/theme.init.js"></script>

	<!-- Examples -->
	<script src="js/examples/examples.dashboard.js"></script>

	<script src="../vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

	<script src="../vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
</body>

</html>