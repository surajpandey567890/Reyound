<?php

    include('../common/constant.php');
    $company_name=company_name;
?>
<!doctype html>
<html class="fixed header-dark">
	<head>
		<!-- Basic -->
		
		<meta charset="UTF-8">
		<title><?=$company_name?></title>
		<meta name="keywords" content="<?=$company_name?>" />
		<meta name="description" content="<?=$company_name?>">
		<meta name="author" content="<?=$company_name?>">
	
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
		<link rel="stylesheet" href="vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
        <link rel="stylesheet" href="vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="vendor/morris/morris.css" />
		<link rel="stylesheet" href="vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="vendor/datatables/media/css/dataTables.bootstrap4.css" />

         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"> 
		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css" />
		
		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="assets/DataTables/datatables.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.js"></script>
		
		<!--jquery -->
		<script  src="https://code.jquery.com/jquery-3.4.1.js" crossorigin="anonymous"></script>
		<script src="assets/ckeditor/ckeditor.js"></script>
		
		<link rel="stylesheet" href="css/tagsinput.css">
		
	</head>
	<body>
		<section class="body">

		    <?php include "partial/header.php"; ?>
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Images</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Images</span></li>
							</ol>
					
							<label class="sidebar-right-toggle" data-open=""></label>
						</div>
					</header>

                    <!-- Add Form Start -->
                    
                   
                    
                    <!-- start: page -->
                    
					<div class="row">
					     <div class="col-lg-12">
					         <div class="row mb-3">
					                 
					                <?php
					                    if(isset($_GET['product_id']) && $_GET['product_id']!="")
					                    {
					                        $prod_id=base64_decode($_GET['product_id']);
					                    
    					                    $get_img_data= $obj->select("ID,image", "product_images", "product_id='$prod_id' ORDER BY ID DESC");
                                            if(is_array($get_img_data))
                                            {
                                                foreach($get_img_data as $Ival)
                                                {
                                        ?>
                                        <div class="col-md-3 mt-3">
                                            <div class="gallery-images">
                                                <img src="<?=LOCAL_IMAGE_PATH.$Ival[1]?>" alt="gallery" class="img-fluid">
                                                <div class="icon-trash">
                                                    <a href="" name="delete" id="<?=base64_encode($Ival[0]);?>" class="remove-single-image" data-original-title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
    								    </div>
                                        <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "<h3>No Image Found</h3>";
                                            }
					                    }
					                    else
					                    {
					                        echo "<h3>No Image Found</h3>";
					                    }
					                ?>
					                               	
                                  
                    			</div>
						    </div>
					    </div>
					<!-- end: page -->
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
		<script src="assets/admin/product_img.js"></script> 
		<script src="vendor/nanoscroller/nanoscroller.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>
        <script src="vendor/jquery-validation/jquery.validate.js"></script>
        <script src="assets/DataTables/datatables.js"></script>
        <!--<script src="js/bootstrap-datepicker.js"></script>-->
	
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.dashboard.js"></script>
                
        <script src="vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
	</body>
</html>