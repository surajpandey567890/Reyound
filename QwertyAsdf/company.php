<?php include '../common/constant.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reyound | Reyound Rewind">
    <meta name="keywords" content="Reyound">
    <meta name="author" content="Navrangi E-Commerce">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?= COMPANY ?></title>
    <link rel="shortcut icon" href="<?= LOGO ?>" type="image/x-icon">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="assets/css/connect.min.css" rel="stylesheet">
    <link href="assets/css/dark_theme.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="auth-page sign-in">
    <div class="connect-container align-content-stretch d-flex flex-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="auth-form">
                        <div class="row">
                            <div class="col">
                                <div class="logo-box"><a href="#" class="logo-text">Bussines Details</a></div>
                                <form id="company" encypt="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" name="adminid" value="<?= $_POST['id'] ?>">
                                        <input type="text" name="company_name" id="company" class="form-control" placeholder="Company Name">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="company_address" id="address" cols="30" rows="5" class="form-control" placeholder="Company Address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="company_gstin" id="gst" class="form-control" placeholder="Company GSTIN">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Pincode</label>
                                                <input type="number" class="form-control" name="PinCode" id="pinCode" onblur="GetCity(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">District</label>
                                                <input type="text" class="form-control" id="PinDistrict" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">State</label>
                                                <input type="text" name="state" class="form-control" id="PinState" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!-- <label for="">Company GSTIN</label> -->
                                                <label for="companyGSTIN" class="btn btn-secondary form-control">GSTIN Upload</label>
                                                <span id="chooseGSTIN">No file chosen</span>
                                                <input type="file" name="CompanyGSTIN" id="companyGSTIN" accept="image/jpeg, image/jpg" hidden>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="companyPAN" class="btn btn-secondary form-control">Company PAN</label>
                                                <span id="choosePAN">No file chosen</span>
                                                <input type="file" name="CompanyPAN" id="companyPAN" accept="image/jpeg, image/jpg" hidden>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="companyChaque" class="btn btn-secondary form-control">Cancel Chaque</label>
                                                <span id="chooseChaque">No file chosen</span>
                                                <input type="file" name="CompanyChaque" id="companyChaque" accept="image/jpeg, image/jpg" hidden>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="companyAddress" class="btn btn-secondary form-control">Address proof</label>
                                                <span id="chooseAddress">No file chosen</span>
                                                <input type="file" name="CompanyAddress" id="companyAddress" accept="image/jpeg, image/jpg" hidden>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fom-group">
                                        <input type="submit" class="form-control btn btn-primary" value="Next">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block d-xl-block">
                    <div class="auth-image"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascripts -->
    <script src="assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="assets/plugins/bootstrap/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/connect.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/admin/company.js"></script>
    <script>
        const companyGSTIN = document.getElementById('companyGSTIN');

        const chooseGSTIN = document.getElementById('chooseGSTIN');

        companyGSTIN.addEventListener('change', function() {
            chooseGSTIN.textContent = this.files[0].name
        })
        const companyPAN = document.getElementById('companyPAN');

        const choosePAN = document.getElementById('choosePAN');

        companyPAN.addEventListener('change', function() {
            choosePAN.textContent = this.files[0].name
        })
        const companyChaque = document.getElementById('companyChaque');

        const chooseChaque = document.getElementById('chooseChaque');

        companyChaque.addEventListener('change', function() {
            chooseChaque.textContent = this.files[0].name
        })
        const companyAddress = document.getElementById('companyAddress');

        const chooseAddress = document.getElementById('chooseAddress');

        companyAddress.addEventListener('change', function() {
            chooseAddress.textContent = this.files[0].name
        })

        function GetCity(pincode) {
            var ID = $('#pinCode').val();
            $.getJSON('https://api.postalpincode.in/pincode/' + ID, function(data) {
                $.each(data, function() {
                    $('#PinDistrict').val(data[0].PostOffice[0].District);
                    $('#PinState').val(data[0].PostOffice[0].State);
                });
            });
        }
    </script>
</body>

</html>