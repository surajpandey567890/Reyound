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
		
	</head>
	<body>
		<section class="body">

		    <?php include "partial/header.php"; ?>
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Testimonial</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Testimonial</span></li>
							</ol>
					
							<label class="sidebar-right-toggle" data-open=""></label>
						</div>
					</header>

                    <!-- Add Form Start -->
                    
                    <div class="row" id="addContainer" style="display:none;">
					    <div class="col">
							<section class="card">
								<header class="card-header">
									<h2 class="card-title">Add Testimonial</h2>
								</header>
									<div class="card-body">
									<form class="form-horizontal form-bordered" id="addForm" name="addForm" method="post" encypt="multipart/form-data">
									    
									    <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Description <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="text" class="form-control" name="description" id="description">
											</div>
										</div>
										
									   
									    <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Author <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="text" class="form-control" name="author" id="author">
											</div>
										</div>
										
										
                       			        <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault"></label>
											<div class="col-lg-6">
												<input type="submit" class="btn btn-primary" value="Add">
                                                <input type="reset" class="btn btn-warning" value="Reset">
											</div>
										</div>
										
									</form>
								</div>
							</section>
						</div>
					</div>

					 <div class="row" id="editContainer" style="display:none;">
					    <div class="col">
							<section class="card">
								<header class="card-header">
									<h2 class="card-title"> Edit Testimonial</h2>
								</header>
								<div class="card-body">
									<form class="form-horizontal form-bordered" id="editForm" name="editForm" method="post" encypt="multipart/form-data">
									    <input type="hidden" class="form-control" name="ID" id="ID">
									    <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2"> Description<span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="text" class="form-control" name="description_edit" id="description_edit">
											</div>
										</div>
										
									   
									    <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Author <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="text" class="form-control" name="author_edit" id="author_edit">
											</div>
										</div>
                       			        <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault"></label>
											<div class="col-lg-6">
												<input type="submit" class="btn btn-primary" value="Edit">
                                                <input type="reset" class="btn btn-warning" value="Reset">
											</div>
										</div>
										
									</form>
								</div>
							</section>
						</div>
					</div>
                    
                    <!-- start: page -->
                    
				<div class="row">
					<div class="col">
                        <section class="card">
							<header class="card-header mt-3">
								<h2 class="card-title">Testimonial</h2>
							</header>
							<div class="card-body">
							    <div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<button id="addToTable" class="btn btn-primary">Add <i class="fas fa-plus"></i></button>
                                            <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button> 
										</div>
									</div>
								</div>
								<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                                	<thead>
                                   		<tr>
											<th>Sr. No.</th>
											<th>Description</th>
											<th>Author</th>
											<th>Created On</th>
											<th>Action</th>
                                    	</tr>
									</thead>
									<tbody id="tableContainer">
									
									  <?php      
									        $get_data=$obj->select("*","testimonial","1"," ORDER BY ID DESC");
									        if(is_array($get_data))
									        {
									            foreach($get_data as $key=>$val)
									            {
									              
									  
									          ?>
									          
									               <tr>
									                        <td><?=($key+1);?></td>
									                        <td><?=$val[1];?></td>
									                        <td><?=$val[2];?></td>
									                        <td><?=$val[4];?></td>
									                                 
            											<td>
            									     		<a href="" class="edit-element" id="<?=base64_encode($val[0]);?>" data-original-title="Edit">
            									     			<i class="fas fa-pencil-alt"></i>
            									     		</a>
                                                            <a href=""  name="delete" class="remove-element" id="<?=base64_encode($val[0]);?>" data-original-title="Delete">
                                                            	<i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </td> 
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
					<!-- end: page -->
				</section>
            </div>
        </section>

        <section>
        	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
			      		
			      		<div class="modal-body">
			        		...
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      		</div>
			    	</div>
			  	</div>
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
         <script src="assets/admin/testimonial.js"></script> 
        <script src="assets/DataTables/datatables.js"></script>
        <!--<script src="js/bootstrap-datepicker.js"></script>-->
        
        <script src="vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		
        <script src="vendor/bootstrap-markdown/js/markdown.js"></script>
		<script src="vendor/bootstrap-markdown/js/to-markdown.js"></script>
		<script src="vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script> 
		
		 <!-- Specific Page Vendor -->
		<script src="vendor/select2/js/select2.js"></script>
		<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>

         	<!-- Examples -->
		<script src="js/examples/examples.datatables.default.js"></script>
		<script src="js/examples/examples.datatables.row.with.details.js"></script>
		<script src="js/examples/examples.datatables.tabletools.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
		<script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>
       
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<!--<script src="js/custom.js"></script>-->
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.dashboard.js"></script>
                
        <script src="vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
     
	  
	</body>
</html>

