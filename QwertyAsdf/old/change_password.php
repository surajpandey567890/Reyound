<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title></title>
		<meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content="">
		   
		 <link rel="icon" href="img/logo.png">
    
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
		    <?php include 'partial/header.php';?>
            
			<div class="inner-wrapper">
				
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Current Password</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Change Password</span></li>
							</ol>
					
							<label href="#" class="sidebar-right-toggle" data-open=""></label>
						</div>
					</header>

                    <!-- Add Form Start -->
                    <div class="row" id="addContainer">
						<div class="col">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									</div>
									<h2 class="card-title">Change Password</h2>
								</header>
								<div class="card-body">
									<form id="changePassword" name="changePassword" class="form-horizontal form-bordered">
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Old Password</label>
											<div class="col-lg-6">
												<input type="password" class="form-control" id="old_password" name="old_password">
											</div>
										</div>
                                        
                                        <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">New Password</label>
											<div class="col-lg-6">
												<input type="password" class="form-control" name="new_password" id="new_password">
											</div>
										</div>
                                        
                                        <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Confirm New Password</label>
											<div class="col-lg-6">
												<input type="password" class="form-control" id="confirm_password" name="confirm_password">
											</div>
										</div>
					
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault"></label>
											<div class="col-lg-6">
												<input type="submit" class="btn btn-primary" value="Change">
                                                <input type="reset" class="btn btn-warning">
											</div>
										</div>
										
									</form>
								</div>
							</section>
						</div>
					</div>
                    <!-- Add Form End -->
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
        <script src="vendor/jquery-validation/jquery.validate.js"></script>
        <script src="assets/admin/change_password.js"></script>
        <script src="assets/DataTables/datatables.js"></script>
        <!--<script src="js/bootstrap-datepicker.js"></script>-->
		
       <script src="vendor/bootstrap-markdown/js/markdown.js"></script>
		<script src="vendor/bootstrap-markdown/js/to-markdown.js"></script>
		<script src="vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script> 
        
        
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<!--<script src="js/custom.js"></script>-->
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.dashboard.js"></script>


        <script src="vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
          <!--<script type="text/javascript">
            $(function () {
                $('#dob').datepicker();
            });
        </script>-->
       
        <script>
            $(document).ready( function () {
                $('#datatable-editable').DataTable();
            } );

        </script>
        
        <?php
        if(isset($_SESSION['add_message']) && $_SESSION['add_message']!=""):
        ?>
            <script>
                var message = '<?=$_SESSION['add_message']?>';
                alert(message);
            </script>
       <?php
            $_SESSION['add_message']="";
            unset($_SESSION['add_message']);
        endif;
        ?>
        
        
	</body>
</html>