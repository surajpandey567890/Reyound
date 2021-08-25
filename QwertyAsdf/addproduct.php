<?php include 'partial/header.php'; ?>
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
                <li class="breadcrumb-item active" aria-current="page">Forms</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <form id="addForm">
            <section class="card" id="ProductCategory">
                <div class="card-body">
                    <h3 class="card-title">
                        Product Category
                    </h3>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="cate_id">Select Main Category</label>
                                    <select name="cate_id" id="cate_id" class="form-control" tabindex="-1" style="display: none; width: 100%">
                                        <option value="">Select Category</option>
                                        <?php
                                        $get_data = $obj->select("*", "category", "status=1 ORDER BY ID DESC");
                                        if (is_array($get_data)) {
                                            foreach ($get_data as $key => $val) {
                                        ?>
                                                <option class="maincat" value="<?= $val[0] ?>"><?= $val[1]; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sub_cate_id">Select Sub Main Category</label>
                                <select name="sub_cate_id" id="sub_cate_id" class="form-control" tabindex="-1" style="display: none; width: 100%">
                                    <option value="fetch">Please Select Main Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sub_main_cate_id">Select Sub Category</label>
                                <select name="sub_main_cate_id" id="sub_main_cate_id" class="form-control" tabindex="-1" style="display: none; width: 100%">
                                    <option value="fetch">Please Select Sub Category</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <input type="button" value="Next" id="btnProductCategory" class="btn btn-primary float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="card" id="ProductInformation" style="display: none;">
                <div class="card-body">
                    <h3 class="card-title">Product Information</h3>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Name <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>SKU<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="sku" id="sku" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:red;">Size (630 * 574 px)</label>
                                <label for="image" class="btn btn-secondary form-control">Upload Main Image<span style="color:red;">*</span></label>
                                <input type="file" multiple name="image[]" id="image" required hidden>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span style="color:red;" class="text-sm">Size(630 * 574 px)</span></label>
                                <label for="images" class="btn btn-secondary form-control">Images <span style="color:red;">*</span></label>
                                <input type="file" multiple name="images[]" id="images" required hidden>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <input type="button" value="Back" id="btnbackProductInformation" class="btn btn-secondary float-left">
                                <input type="button" value="Next" id="btnProductInformation" class="btn btn-primary float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="card" id="ProductPricing" style="display: none;">
                <div class="card-body">
                    <h3 class="card-title">Product Pricing</h3>
                    <div class="form-row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Product Price <span style="color:red;">*</span></label>
                                <input type="number" class="form-control" name="product_price" id="product_price" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Offer Price</label>
                                <input type="number" class="form-control" name="offer_price" id="offer_price">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Stock <span style="color:red;">*</span></label>
                                <input type="number" class="form-control" name="stock" id="stock" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>HSN Code <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="hsn_code" id="hsn_code" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Gst Rate<span style="color:red;">*</span></label>
                                <select class="form-control" name="gst_id" id="gst_id" tabindex="-1" style="display: none; width: 100%">
                                    <option value="">Select Gst</option>
                                    <?php
                                    $get_data = $obj->select("*", "gst", "status=1 ORDER BY ID DESC");
                                    if (is_array($get_data)) {
                                        foreach ($get_data as $key => $val1) {
                                    ?>
                                            <option value="<?= $val1[0] ?>"><?= $val1[1]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <input type="button" value="Back" id="btnbackProductPricing" class="btn btn-secondary float-left">
                                <input type="button" value="Next" id="btnProductPricing" class="btn btn-primary float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <secction class="card" id="ProductDetails" style="display: none;">
                <div class="card-body">
                    <h3 class="card-title">Product Details</h3>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Size<span style="color:red;">*</span></label>
                                <select class="form-control" name="colour_id" id="colour_id" tabindex="-1" style="display: none; width: 100%">
                                    <option value="">Select Colour</option>
                                    <?php
                                    $get_data = $obj->select("*", "colour", "status=1 ORDER BY ID DESC");
                                    if (is_array($get_data)) {
                                        foreach ($get_data as $key => $val1) {
                                    ?>
                                            <option value="<?= $val1[0] ?>"><?= $val1[1]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Colour<span style="color:red;">*</span></label>
                                <select class="form-control" name="colour_id" id="colour_id" tabindex="-1" style="display: none; width: 100%">
                                    <option value="">Select Sub Colour</option>
                                    <?php
                                    $get_data = $obj->select("*", "colour", "status=1 ORDER BY ID DESC");
                                    if (is_array($get_data)) {
                                        foreach ($get_data as $key => $val1) {
                                    ?>
                                            <option value="<?= $val1[0] ?>"><?= $val1[1]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Size<span style="color:red;">*</span></label>
                                <select class="form-control" name="size_id" id="size_id" tabindex="-1" style="display: none; width: 100%">
                                    <option value="">Select Size</option>
                                    <?php
                                    $get_data = $obj->select("*", "size", "status=1 ORDER BY ID DESC");
                                    if (is_array($get_data)) {
                                        foreach ($get_data as $key => $val1) {
                                    ?>
                                            <option value="<?= $val1[0] ?>"><?= $val1[1]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea class="form-control" id="short_description" name="short_description" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Long Description<span style="color:red;">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <input type="button" value="Back" id="btnbackProductDetails" class="btn btn-secondary float-left">
                                <input type="submit" value="Add Product" id="btnProductDetails" class="btn btn-primary float-right">
                            </div>
                        </div>
                    </div>

                </div>
            </secction>
        </form>
    </div>
</div>
<?php include 'partial/footer.php'; ?>
<script src="assets/admin/product.js"></script>
<script src="assets/ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('#btnProductCategory').click(function() {
            $('#ProductCategory').hide();
            $('#ProductInformation').show();
        });

        $('#btnProductInformation').click(function() {
            $('#ProductInformation').hide();
            $('#ProductPricing').show();
        });
        $('#btnbackProductInformation').click(function() {
            $('#ProductInformation').hide();
            $('#ProductCategory').show();
        });

        $('#btnProductPricing').click(function() {
            $('#ProductPricing').hide();
            $('#ProductDetails').show();
        });
        $('#btnbackProductPricing').click(function() {
            $('#ProductPricing').hide();
            $('#ProductInformation').show();
        });

        $('#btnProductDetails').click(function() {
            $('#ProductPricing').hide();
            $('#ProductDetails').show();
        });
        $('#btnbackProductDetails').click(function() {
            $('#ProductDetails').hide();
            $('#ProductPricing').show();
        });
    });
</script>