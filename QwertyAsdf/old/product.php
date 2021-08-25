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
						<h2>Product</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Product</span></li>
							</ol>
					
							<label class="sidebar-right-toggle" data-open=""></label>
						</div>
					</header>

                    <!-- Add Form Start -->
                    
                    <div class="row" id="addContainer" style="display:none;">
					    <div class="col">
							<section class="card">
								<header class="card-header">
									<h2 class="card-title">Add Product</h2>
								</header>
								<div class="card-body">
									<form class="form-horizontal form-bordered" id="addForm" name="addForm" method="POST" encypt="multipart/form-data">
                                        <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Category<span style="color:red;">*</span></label>
											<div class="col-lg-6">
											    <select class="form-control populate" name="cate_id" id="cate_id" data-plugin-selectTwo required>
											        <option value="">Select Category</option>
											    <?php
											        $get_data=$obj->select("*","category","1 ORDER BY ID DESC");
        									        //print_r($get_data);
        									        if(is_array($get_data))
        									        {
        									            foreach($get_data as $key => $val)
        									            {
											    ?>
											    <option value="<?=$val[0]?>"><?=$val[1];?></option>
												<?php
        									            }
        									        }         
												?>
												</select>
											</div>
										</div>

                 <div class="form-group row" >
											<label class="col-lg-3 control-label text-lg-right pt-2">Sub Category Name<span style="color:red;">*</span></label>
											<div class="col-lg-6">
											    <select class="form-control" name="sub_cate_id" id="sub_cate_id">
											     <option value="">Select  Sub Category Name</option>
											    <?php
											        $get_data=$obj->select("*","sub_category","1 ORDER BY ID DESC");
        									        print_r($get_data);
        									        if(is_array($get_data))
        									        {
        									            foreach($get_data as $key => $val1)
        									            {
											    ?>
											    <option value="<?=$val1[0]?>"><?=$val1[2];?></option>
												<?php
        									            }
        									        }         
												?>
												</select>
											</div>
										</div>
                    
                    <div class="form-group row" >
											<label class="col-lg-3 control-label text-lg-right pt-2">Sub Main Category Name<span style="color:red;">*</span></label>
											<div class="col-lg-6">
											    <select class="form-control" name="sub_main_cate_id" id="sub_main_cate_id">
											     <option value="">Select  Sub Category Name</option>
											    <?php
											        $get_data=$obj->select("*","sub_main_category","1 ORDER BY ID DESC");
        									        print_r($get_data);
        									        if(is_array($get_data))
        									        {
        									            foreach($get_data as $key => $val1)
        									            {
											    ?>
											    <option value="<?=$val1[0]?>"><?=$val1[3];?></option>
												<?php
        									            }
        									        }         
												?>
												</select>
											</div>
										</div>

										<!-- <div class="form-group row" id="sub_cat_field" style="display:none;">
											<label class="col-lg-3 control-label text-lg-right pt-2">Sub Category<span style="color:red;">*</span></label>
											<div class="col-lg-6">
											    <select class="form-control populate" name="sub_cate_id" id="sub_cate_id" data-plugin-selectTwo required>
											    
												</select>
											</div>
										</div>
										
										<div class="form-group row" id="sub_main_cat_field" style="display:none;">
											<label class="col-lg-3 control-label text-lg-right pt-2">Sub Main Category<span style="color:red;">*</span></label>
											<div class="col-lg-6">
											    <select class="form-control populate" name="sub_main_cate_id" id="sub_main_cate_id" data-plugin-selectTwo required>
											    
												</select>
											</div>
										</div> -->
										
										<!--<div class="form-group row">-->
										<!--	<label class="col-lg-3 control-label text-lg-right pt-2">Main Category</label>-->
										<!--	<div class="col-lg-6">-->
										<!--		<select class="form-control populate" data-plugin-selectTwo>-->
										<!--			<option disabled=""> -- Select Main Category --</option>-->
										<!--			<option value="CT">Connecticut</option>-->
										<!--			<option value="DE">Delaware</option>-->
										<!--			<option value="FL">Florida</option>-->
										<!--			<option value="GA">Georgia</option>-->
										<!--			<option value="IN">Indiana</option>-->
										<!--			<option value="ME">Maine</option>-->
										<!--			<option value="MD">Maryland</option>-->
										<!--			<option value="MA">Massachusetts</option>-->
										<!--			<option value="MI">Michigan</option>-->
										<!--			<option value="NH">New Hampshire</option>-->
										<!--			<option value="NJ">New Jersey</option>-->
										<!--			<option value="NY">New York</option>-->
										<!--		</select>-->
										<!--	</div>-->
										<!--</div>-->
									    
										
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Name <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="text" class="form-control" name="name" id="name" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">SKU <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="text" class="form-control" name="sku" id="sku" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Images <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="file" class="form-control" multiple name="images[]" id="images" required>
												<span style="color:red;">Image size should be 630 * 574 pixels</span>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Product Price <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="number" class="form-control" name="product_price" id="product_price" required>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Offer Price</label>
											<div class="col-lg-6">
												<input type="number" class="form-control" name="offer_price" id="offer_price">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Stock <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="number" class="form-control" name="stock" id="stock" required>
											</div>
										</div>
										<!-- <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Tags</label>
											<div class="col-lg-6">
											    <input type="text" name="tags" id="tags" data-role="tagsinput" placeholder="Add tags" />
											    
											</div>
										</div> -->
										<!--<div class="form-group row">-->
										<!--	<label class="col-lg-3 control-label text-lg-right pt-2">Tags</label>-->
										<!--	<div class="col-lg-6">-->
										<!--		<select multiple data-role="tagsinput" name="tags1[]" id="tags1">-->
          <!--                                          <option value="Tag1">Tag1</option>-->
          <!--                                          <option value="Tag2">Tag2</option>-->
          <!--                                        </select>-->
										<!--	</div>-->
										<!--</div>-->
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Short Description</label>
											<div class="col-lg-8">
												<textarea class="form-control" id="short_description" name="short_description" rows="5"></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Long Description<span style="color:red;">*</span></label>
											<div class="col-lg-8">
												<textarea class="form-control" id="description" name="description" rows="5"></textarea>
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
									<h2 class="card-title">Edit Product</h2>
								</header>
								<div class="card-body">
									<form class="form-horizontal form-bordered" action="" id="editForm" name="editForm" method="POST">
                                         <input type="hidden" id="product_id" name="product_id">
									     <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Category<span style="color:red;">*</span></label>
											<div class="col-lg-6">
											    <select class="form-control populate" name="cate_id_edit" id="cate_id_edit" data-plugin-selectTwo>
											        <option value="">Select Category</option>
											    <?php
											        $get_data=$obj->select("*","category","status!=2 ORDER BY ID DESC");
        									        //print_r($get_data);
        									        if(is_array($get_data))
        									        {
        									            foreach($get_data as $key => $val)
        									            {
											    ?>
											                <option value="<?=$val[0]?>"><?=$val[1];?></option>
												<?php
        									            }
        									        }         
												?>
												</select>
											</div>
										</div>
										<div class="form-group row" id="sub_cat_field1">
											<label class="col-lg-3 control-label text-lg-right pt-2">Sub Category<span style="color:red;">*</span></label>
											<div class="col-lg-6">
											    <select class="form-control populate" name="sub_cate_id_edit" id="sub_cate_id_edit" data-plugin-selectTwo>
											    
												</select>
											</div>
										</div>
										
										<div class="form-group row" id="sub_main_cat_field1">
											<label class="col-lg-3 control-label text-lg-right pt-2">Sub Main Category<span style="color:red;">*</span></label>
											<div class="col-lg-6">
											    <select class="form-control populate" name="sub_main_cate_id_edit" id="sub_main_cate_id_edit" data-plugin-selectTwo>
											    
												</select>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Name <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="text" class="form-control" name="name_edit" id="name_edit" required>
											</div>
										</div>
										<!--<div class="form-group row">-->
										<!--	<label class="col-lg-3 control-label text-lg-right pt-2">SKU <span style="color:red;">*</span></label>-->
										<!--	<div class="col-lg-6">-->
										<!--		<input type="text" class="form-control" name="sku" id="sku" required>-->
										<!--	</div>-->
										<!--</div>-->
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Images <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="file" class="form-control" multiple name="image_edit[]" multiple id="image_edit">
												<span style="color:red;">Image size should be 630 * 574 pixels</span>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Product Price <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="number" class="form-control" name="product_price_edit" id="product_price_edit" required>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Offer Price</label>
											<div class="col-lg-6">
												<input type="number" class="form-control" name="offer_price_edit" id="offer_price_edit">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Stock <span style="color:red;">*</span></label>
											<div class="col-lg-6">
												<input type="number" class="form-control" name="stock_edit" id="stock_edit" required>
											</div>
										</div>
										<!--<div class="form-group row">-->
										<!--	<label class="col-lg-3 control-label text-lg-right pt-2">Tags</label>-->
										<!--	<div class="col-lg-6">-->
										<!--	    <input type="text" name="tags_edit" id="tags_edit" data-role="tagsinput" placeholder="Add tags" />-->
											    
										<!--	</div>-->
										<!--</div>-->
										
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Short Description</label>
											<div class="col-lg-8">
												<textarea class="form-control" id="short_description_edit" name="short_description_edit" rows="5"></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 control-label text-lg-right pt-2">Long Description<span style="color:red;">*</span></label>
											<div class="col-lg-8">
												<textarea class="form-control" id="description_edit" name="description_edit" rows="5"></textarea>
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
								<h2 class="card-title">Product</h2>
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
											<th>Category</th>
											<th>Sub Category</th>
											<th>Sub Main Category</th>
											<th>Name/SKU</th>
											<th>Product Price / Offer Price</th>
											<th>Stock</th>
											<th>Descriptions</th>
											<th>Images</th>
											<th>Createdon</th>
											<th>Status</th>
											<th>Actions</th>
                       </tr>
									</thead>
									<tbody id="tableContainer">
			                            <?php
			                                $getProduct=$obj->select("*","product","status!=2 ORDER BY ID DESC");
			                                if(is_array($getProduct))
			                                {
			                                    foreach($getProduct as $key => $val)
			                                    {
			                                        $cat_id=$val[1];
									                $category=$obj->select("name","category","ID='$cat_id'")[0][0];
									                $subcat_id=$val[2];
									                $sub_category=$obj->select("subcat_name","sub_category","ID='$subcat_id'")[0][0];
									                
									                $submaincat_id=$val[3];
									                $sub_main_category=$obj->select("subcat_name","sub_main_category","ID='$submaincat_id'")[0][0];
			                            ?>
			                            <tr>
											<td><?=($key+1)?></td>
											<td><?=($category==null ? "": $category);?></td>
											<td><?=($sub_category==null ? "": $sub_category);?></td>
											<td><?=($sub_main_category==null ? "": $sub_main_category);?></td>
											<td><?=html_entity_decode($val[4]);?></br>
											<?=html_entity_decode($val[5]);?></td>
											<td><?=$val[7];?>/<?=$val[8];?></td>
											<td><?=$val[9];?></td>
											<td><a href="#" class="view-element" data-id="<?=base64_encode($val[0]);?>" id="<?=base64_encode($val[0]);?>">View</a></td>
											<td><a href="product_images.php?product_id=<?=base64_encode($val[0]);?>" target="_blank" class="view-images">View</a></td>
											<td><?=$val[11];?></td>
											<?php
    											    if($val[10]==1)
    											    {
    											?>
    											<td><button type="button" id="<?=base64_encode($val[0]);?>" class="btn btn-success status-element">Active</button></td>
    											<?php
    											    }
    											    else
    											    {
    											?>
    											<td><button type="button" id="<?=base64_encode($val[0]);?>" class="btn btn-danger status-element">Inactive</button></td>
    											<?php
    											    }
    											?>
    										<!-- <td><b><a href="add_compare_product.php?pid=<?=base64_encode($val[0]);?>" target="_blank" class="add_compare_product">Add</a>
    										
    										</td>	 -->
									     	
									     		<!--<a href="#" class="edit-element" id="edittable" data-original-title="Edit">-->
									     		<!--	<i class="fas fa-pencil-alt"></i>-->
									     		<!--</a>-->
									     		<!-- <a href="relative.php?pid=<?=base64_encode($val[0])?>" name="relative" id="" class="relative-element" data-original-title="Edit">
                                                         <i class="fas fa-cubes" aria-hidden="true"></i></a>
                                                </a> -->
									     		
                                                    <td>
                                                    <a href="" class="edit-element" id="<?=base64_encode($val[0]);?>" data-original-title="Edit">
    									     			    <i class="fas fa-pencil-alt"></i>
    									     		</a>        
                                                    <a href=""  name="delete" id="<?=base64_encode($val[0]);?>" data-id="<?=base64_encode($val[0]);?>" class="remove-element" data-original-title="Delete">
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
        	<div class="modal fade" id="descpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="exampleModalLabel"><b>Descriptions : </b></h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<span id="short_desp"></span>
			      		
			        		<span id="desp"></span>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      		</div>
			    	</div>
			  	</div>
			</div>
        </section>
        
        
        <section>
        	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
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
         <script src="assets/admin/product.js"></script> 
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
       
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<!--<script src="js/custom.js"></script>-->
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>
		<script src="js/tagsinput.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.dashboard.js"></script>
                
        <script src="vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
        <script>
            $(function () {
                $('input[data-role=tagsinput]').tagsinput();
            }
            );
        </script>
        <script src="assets/ckeditor/ckeditor.js"></script>
        <script>
    	        var editor=CKEDITOR.replace('description',{
                extraPlugins : 'filebrowser',
                extraPlugins : 'youtube',
                filebrowserBrowseUrl:'browser.php?type=Images',
                filebrowserUploadMethod:"form",
                filebrowserUploadUrl:"upload.php"
                });
                
                var editor=CKEDITOR.replace('description_edit',{
                extraPlugins : 'filebrowser',
                extraPlugins : 'youtube',
                filebrowserBrowseUrl:'browser.php?type=Images',
                filebrowserUploadMethod:"form",
                filebrowserUploadUrl:"upload.php"
                });
                
                var editor=CKEDITOR.replace('short_description',{
                extraPlugins : 'filebrowser',
                extraPlugins : 'youtube',
                filebrowserBrowseUrl:'browser.php?type=Images',
                filebrowserUploadMethod:"form",
                filebrowserUploadUrl:"upload.php"
                });
                
                var editor=CKEDITOR.replace('short_description_edit',{
                extraPlugins : 'filebrowser',
                extraPlugins : 'youtube',
                filebrowserBrowseUrl:'browser.php?type=Images',
                filebrowserUploadMethod:"form",
                filebrowserUploadUrl:"upload.php"
                });
                
                
    		    
    	</script>


	  
	</body>
</html>

