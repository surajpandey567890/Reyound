<?php include 'partial/header.php'; ?>
<div class="page-content">
    <div class="main-wrapper">
        <div class="profile-header">
            <div class="row">
                <div class="col">
                    <div class="profile-img">
                        <img src="assets/images/avatars/profile-image-1.png">
                    </div>
                    <div class="profile-name">
                        <?php
                        if (isset($_GET['vid']) && $_GET['vid'] != '') {
                            $vid = base64_decode($_GET['vid']);
                            $name = $obj->select("name", "admin_login", "ID=$vid");
                            echo "<h3>{$name[0][0]}</h3><input type='hidden' id='vvid' value='$vid'>";
                        } else {
                        ?>
                            <h3><?= $_SESSION['ADMIN_USERNAME'] ?></h3>
                        <?php
                        } ?>
                        <span>Seller at <?= COMPANY ?></span>
                    </div>
                    <div class="profile-menu">
                        <ul>
                            <li>
                                <a href="#" id="viewprofile" style="display: none;">View Profile</a>
                            </li>
                            <li>
                                <a href="#" id="viewdocument">View Document</a>
                            </li>
                        </ul>
                        <div class="profile-status">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-content">
            <section id="SellerInformation">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5>Personal Information</h5>
                                    </div>
                                    <div class="col">
                                        <button id="EditPersonal" class="btn btn-xs btn-primary float-right">Edit</button>
                                    </div>
                                </div>
                                <br>
                                <?php
                                if (isset($_GET['vid']) && $_GET['vid'] != '') {
                                    $ID = base64_decode($_GET['vid']);
                                } else {
                                    $ID = $_SESSION['session_ap'];
                                }
                                $pdata = $obj->select("name,mobileno,email", "admin_login", "id=$ID");

                                ?>
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <td><?= $pdata[0][0] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mobile</th>
                                        <td><?= $pdata[0][1] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?= $pdata[0][2] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5>Company Information</h5>
                                    </div>
                                    <div class="col">
                                        <button id="EditCompany" class="btn btn-xs btn-primary float-right">Edit</button>
                                    </div>
                                </div>
                                <br>
                                <?php $cdata = $obj->select("*", "personal_info", "admin_id=$ID"); ?>
                                <table class="table">
                                    <tr>
                                        <th>Company Name</th>
                                        <td><?php if (!isset($cdata[0][3])) echo 'Not Availabe';
                                            else echo $cdata[0][3]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Company Address</th>
                                        <td><?php if (!isset($cdata[0][4])) echo 'Not Availabe';
                                            else echo $cdata[0][4]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>GSTIN</th>
                                        <td><?php if (!isset($cdata[0][5])) echo 'Not Availabe';
                                            else echo $cdata[0][5]; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5>Banking Information</h5>
                                    </div>
                                    <div class="col">
                                        <button id="EditBanking" class="btn btn-xs btn-primary float-right">Edit</button>
                                    </div>
                                </div>
                                <br>
                                <?php $bdata = $obj->select("*", "personal_info", "admin_id=$ID"); ?>
                                <table class="table">
                                    <tr>
                                        <th>Account Holder</th>
                                        <td><?php if (!isset($bdata[0][2])) echo 'Not Availabe';
                                            else echo $bdata[0][2]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Account Number</th>
                                        <td><?php if (!isset($bdata[0][6])) echo 'Not Availabe';
                                            else echo $bdata[0][6]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>IFSC Code</th>
                                        <td><?php if (!isset($bdata[0][7])) echo 'Not Availabe';
                                            else echo $bdata[0][7]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>A/C Type</th>
                                        <td><?php if (!isset($bdata[0][8])) echo 'Not Availabe';
                                            else echo $bdata[0][8]; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5>Change Password</h5>
                                <br>
                                <form id="changePassword">
                                    <div class="form-group">
                                        <input type="password" name="old_password" placeholder="Current Password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="new_password" placeholder="New Password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Change Password" class="btn btn-xs btn-primary">
                                        <input type="reset" value="Reset" class="btn btn-xs btn-warning">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="SellerDocument" style="display: none;">
                <div class="row">
                    <div class="col-md-3">
                        <div class="gallery-images">
                            <label for="">Company GSTIN Image</label>
                            <a href="/QwertyAsdf/VendorData/<?= $ID ?>/GSTIN.jpg" target="_blank"><img src="VendorData/<?= $ID ?>/GSTIN.jpg" alt="gallery" class="img-thumbnail"></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="gallery-images">
                            <label for="">Company PAN</label>
                            <a href="/QwertyAsdf/VendorData/<?= $ID ?>/PAN.jpg" target="_blank"><img src="/QwertyAsdf/VendorData/<?= $ID ?>//PAN.jpg" alt="gallery" class="img-thumbnail"></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="gallery-images">
                            <label for="">GSTIN Image</label>
                            <a href="/QwertyAsdf/VendorData/<?= $ID ?>/CancelChaque.jpg" target="_blank"><img src="VendorData/<?= $ID ?>/CancelChaque.jpg" alt="gallery" class="img-thumbnail"></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="gallery-images">
                            <label for="">Company Address Images</label>
                            <a href="/QwertyAsdf/VendorData/<?= $ID ?>/Address.jpg" target="_blank"><img src="VendorData/<?= $ID ?>/Address.jpg" alt="gallery" class="img-thumbnail"></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="modal fade" id="PersonalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Personal Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ModifyPersonal">
                    <div class="form-group">
                        <input type="hidden" name="vid" id="pvid">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?= $pdata[0][0] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile" value="<?= $pdata[0][1] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?= $pdata[0][2] ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-primary">
                        <input type="reset" value="Reset" class="btn btn-warning">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="CompanyEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Company Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ModifyCompany">
                    <div class="form-group">
                        <input type="hidden" name="vid" id="cvid">
                        <input type="text" name="cname" class="form-control" placeholder="Enter Company Name" value="<?= $cdata[0][3] ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="caddress" class="form-control" placeholder="Enter Address" cols="30" rows="10"><?= $cdata[0][4] ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="gstin" class="form-control" placeholder="Enter GST Number" value="<?= $cdata[0][5] ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-primary">
                        <input type="reset" value="Reset" class="btn btn-warning">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="BankingEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Bank Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ModifyBanking">
                    <div class="form-group">
                        <input type="hidden" name="vid" id="bvid">
                        <input type="text" name="holder" class="form-control" placeholder="Enter Name" value="<?= $bdata[0][2] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="accountno" class="form-control" placeholder="Enter Name" value="<?= $bdata[0][6] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="ifsc" class="form-control" placeholder="Enter Name" value="<?= $bdata[0][7] ?>">
                    </div>
                    <div class="form-group">
                        <select name="type" class="js-states form-control" tabindex="-1" style="display: none; width: 100%">
                            <option value="Saving" <?php if ($bdata[0][8] == 'saving') echo 'selected'; ?>>Saving</option>
                            <option value="Current" <?php if ($bdata[0][8] == 'current') echo 'selected'; ?>>Current</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-primary">
                        <input type="reset" value="Reset" class="btn btn-warning">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<?php include 'partial/footer.php'; ?>
<script src="assets/admin/pofile.js"></script>
<script>
    $(document).ready(function() {
        ID = $('#vvid').val();
        $('#pvid').val(ID);
        $('#cvid').val(ID);
        $('#bvid').val(ID);

        $('#viewdocument').click(function() {
            $('#SellerInformation').hide();
            $('#SellerDocument').show();
            $('#viewprofile').show();
            $('#viewdocument').hide();
        });

        $('#viewprofile').click(function() {
            $('#SellerDocument').hide();
            $('#SellerInformation').show();
            $('#viewprofile').hide();
            $('#viewdocument').show();
        });

        $('body').addClass('app-profile');
    });
</script>