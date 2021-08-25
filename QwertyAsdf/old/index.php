<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title> </title>
		<meta name="keywords" content=" " />
		<meta name="description" content=" ">
		<meta name="author" content=" ">
	
	   <link rel="icon" href="img/logo/logo.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="vendor/animate/animate.css">
		<link rel="stylesheet" href="vendor/font-awesome/css/fontawesome-all.min.css" />
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
		
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="vendor/morris/morris.css" />
		<link rel="stylesheet" href="vendor/chartist/chartist.min.css" />
		
		<link rel="stylesheet" href="vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="vendor/datatables/media/css/dataTables.bootstrap4.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css" />
		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">
		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">
			<?php include'partial/header.php';
			
			   $admin_count=$obj->select("COUNT(*)","admin_login","1")[0][0];
 			   $contact_count=$obj->select("COUNT(*)","contact_us","1")[0][0];
// 			   $membership_count=$obj->select("COUNT(*)","membership","status!=2")[0][0];
			
// // 			section page

//                $mission_count=$obj->select("COUNT(*)","mission","status!=2")[0][0];
// 			   $instructions_count=$obj->select("COUNT(*)","instructions","status!=2")[0][0];
// 			   $home_sliders_count=$obj->select("COUNT(*)","home_sliders","status!=2")[0][0];
			
			
			?>
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Home</h2>
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Home</span></li>	
							</ol>
							<a class="sidebar-right-toggle" data-open=""></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-12">
							<div class="row mb-3">
								<div class="col-xl-4">
									<section class="card card-featured-left card-featured-primary mb-3">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
													<i class="fa fa-user" aria-hidden="true"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Vendor Users</h4>
														<div class="info">
															<strong class="amount"><?=$admin_count;?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="admin.php">(view Detail)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-xl-4">
									<section class="card card-featured-left card-featured-secondary">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fas fa-address-book"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Contact Us</h4>
														<div class="info">
														
														<strong class="amount"><?=$contact_count;?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="contact_us.php">(view Detail)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-xl-4">
									<section class="card card-featured-left card-featured-tertiary mb-3">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-book"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Membership Plan</h4>
														<div class="info">
															<strong class="amount">0</strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="membership.php">(view Detail)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>

							</div>
						</div>
					</div>
					
					
					
					
					<!--section page -->
					
					<!-- <div class="row">
						<div class="col-lg-12">
							<div class="row mb-3">
								<div class="col-xl-4">
									<section class="card card-featured-left card-featured-primary mb-3">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
													 <i class="fa fa-book" aria-hidden="true"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Mission</h4>
														<div class="info">
															<strong class="amount"><?=$mission_count;?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="mission.php">(view Detail)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-xl-4">
									<section class="card card-featured-left card-featured-secondary">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-book"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Instructions</h4>
														<div class="info">
														<strong class="amount"><?=$instructions_count;?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="instructions.php">(view Detail)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-xl-4">
									<section class="card card-featured-left card-featured-tertiary mb-3">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fas fa-images"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Home Sliders</h4>
														<div class="info">
															<strong class="amount"><?=$home_sliders_count;?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="home_slider.php">(view Detail)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>

							</div>
						</div>
					</div> -->
					
					
					
					
					<div class="row">
						<div class="col-lg-6">
							<section class="card">
								<header class="card-header">
									<h2 class="card-title">Graphs</h2>
								</header>
								<div class="card-body">
					
									<!-- Flot: Bars -->
									<div class="chart chart-md" id="flotBars"></div>
									<script type="text/javascript">
					
										var flotBarsData = [
										["Jan", 28],
										["Feb", 42],
											["Mar", 25],
											["Apr", 23],
											["May", 37],
											["Jun", 33],
											["Jul", 18],
											["Aug", 14],
											["Sep", 18],
											["Oct", 15],
					    					["Nov", 4],
											["Dec", 7]
										];
					
										
					
									</script>
					
							</div>
							</section>
						</div>
						<div class="col-lg-6">
							<section class="card">
							<header class="card-header">
									<h2 class="card-title">Pie Chart</h2>
								</header>
								<div class="card-body">
					
									<!-- Flot: Pie -->
									<div class="chart chart-md" id="flotPie"></div>
									<script type="text/javascript">
					
										var flotPieData = [{
											label: "Series 1",
											data: [
												[1, 60]
											],
											color: '#0088cc'
										}, {
											label: "Series 2",
									data: [
												[1, 10]
											],
											color: '#2baab1'
										}, {
											label: "Series 3",
											data: [
												[1, 15]
											],
											color: '#734ba9'
										}, {
											label: "Series 4",
											data: [
												[1, 15]
											],
											color: '#E36159'
										}];
		
									
					
									</script>
					
								</div>
							</section>
						</div>
					</div>
					
						<div class="row">
					<div class="col">
                       <section class="card">
							<header class="card-header mt-3">
								<h2 class="card-title">Top 5</h2>
						</header>
							<div class="card-body">
								<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                              	<thead>
                                  		<tr>
											<th>Column 1</th>
											<th>Column 2</th>
											<th>Column 3</th>
                                    	</tr>
									</thead>
									<tbody id="tableContainer">
			                            <tr>
										<td>1</td>
											<td>test</td>
											<td>test</td>
										</tr>
									</tbody>
								</table>
							</div>
					</section>
                    </div>
				</div>
						
				</section>
			</div>
		</section>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.js"></script>
		<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="vendor/common/common.js"></script>
		<script src="vendor/nanoscroller/nanoscroller.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="vendor/jquery-appear/jquery-appear.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="vendor/flot/jquery.flot.js"></script>
		<script src="vendor/flot.tooltip/flot.tooltip.js"></script>
		<script src="vendor/flot/jquery.flot.pie.js"></script>
		<script src="vendor/flot/jquery.flot.categories.js"></script>
		<script src="vendor/flot/jquery.flot.resize.js"></script>
		<script src="vendor/jquery-sparkline/jquery-sparkline.js"></script>
		<script src="vendor/raphael/raphael.js"></script>
		<script src="vendor/morris/morris.js"></script>
		<script src="vendor/gauge/gauge.js"></script>
		<script src="vendor/snap.svg/snap.svg.js"></script>
		<script src="vendor/liquid-meter/liquid.meter.js"></script>
		<script src="vendor/chartist/chartist.js"></script>
		<script src="js/examples/examples.charts.js"></script>
			<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>
		<script src="js/examples/examples.datatables.default.js"></script>
		<script src="js/examples/examples.datatables.row.with.details.js"></script>
		<script src="js/examples/examples.datatables.tabletools.js"></script>
		<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.dashboard.js"></script>

	</body>
</html>