<?php include 'partial/header.php'; ?>
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Low Stock</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="inner-wrapper">
            <div class="row">
                <div class="col">
                    <section class="card">
                        <div class="card-body">
                            <h2 class="card-title">Low Stocks</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- <div class="mb-3">
											<button id="addToTable" class="btn btn-primary">Add <i class="fas fa-plus"></i></button>
                                            <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button> 
										</div> -->
                                </div>
                            </div>
                            <table class="table <?=TABLE_CLASS?>" id="datatable-tabletools">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Sub Main Category</th>
                                        <th>Name/SKU</th>
                                        <th>Stock</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody id="tableContainer">
                                    <?php
                                    $getProduct = $obj->select("*", "product", "stock<10 and status=1 ORDER BY ID DESC");
                                    if (is_array($getProduct)) {
                                        foreach ($getProduct as $key => $val) {
                                            $cat_id = $val[1];
                                            $category = $obj->select("name", "category", "ID='$cat_id'")[0][0];
                                            $subcat_id = $val[2];
                                            $sub_category = $obj->select("subcat_name", "sub_category", "ID='$subcat_id'")[0][0];

                                            $submaincat_id = $val[3];
                                            $sub_main_category = $obj->select("subcat_name", "sub_main_category", "ID='$submaincat_id'")[0][0];
                                    ?>
                                            <tr>
                                                <td><?= ($key + 1) ?></td>
                                                <td><?= ($category == null ? "" : $category); ?></td>
                                                <td><?= ($sub_category == null ? "" : $sub_category); ?></td>
                                                <td><?= ($sub_main_category == null ? "" : $sub_main_category); ?></td>
                                                <td><?= html_entity_decode($val[4]); ?></br>
                                                    <?= html_entity_decode($val[5]); ?></td>
                                                <td><?= html_entity_decode($val[9]); ?></td>
                                                <td>
                                                    <button type="button" id="<?= $val[0] ?>" data-id="<?= $val[0]; ?>" class="btn btn-success update-element">Update</button>
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
        </div>
    </div>
</div>

<!-- <section>
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
        </section>-->

<div class="modal fade" id="UpdateStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Quantity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updatestock">
                    <div class="form-group">
                        <label>Enter Quantity</label>
                        <input type="hidden" name="pid" id="pid">
                        <input type="text" class="form-control" name="quantity">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update">
                        <input type="reset" class="btn btn-warning" id="resendotp" value="Resend">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Vendor -->
<?php include 'partial/footer.php'; ?>
<script>
    $(function() {
        $('input[data-role=tagsinput]').tagsinput();
    });
</script>
<script src="assets/ckeditor/ckeditor.js"></script>
<script>
    $('form#updatestock').submit(function(e) {
        e.preventDefault();
        $('#UpdateStock').modal('hide');
        var formData = new FormData(this);
        //alert("working");
        $.ajax({
            url: 'actions/stock/updatestock',
            type: 'POST',
            data: formData,
            success: function(data) {
                //debugger;
                result = $.parseJSON(data);
                if (result.response == 'y') {
                    swal("Wow", result.message, "success").then(function(){location.reload();});
                } else {
                    swal("Oh ho!", result.message, "error");
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    });
</script>
<script>
    $("#datatable-tabletools").on("click", ".update-element", function() {
        //debugger;
        var ID = $(this).attr('id');
        $('#pid').val(ID);
        //alert(ID);
        $('#UpdateStock').modal('show');
    });
</script>



</body>

</html>