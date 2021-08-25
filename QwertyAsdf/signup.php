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

    <link rel="shortcut icon" href="<?= LOGO ?>" type="image/x-icon">
    <!-- Title -->
    <title><?= COMPANY ?></title>

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
                                <div class="logo-box"><a href="#" class="logo-text">Let's Start</a></div>
                                <form id="signup">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="vendor_mobile" id="mobile" class="form-control" placeholder="Enter Mobile">
                                            <div class="input-group-append">
                                                <span class="form-control btn btn-success" id="otpgenerate">Send OTP</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="vendor_email" id="email" class="form-control" placeholder="Enter Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="vendor_name" id="name" class="form-control" placeholder="Enter Name" id="validationCustom01" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="vendor_pass" id="pass" class="form-control" placeholder="Enter Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block btn-submit">Sign Up</button>
                                    <div class="auth-options">
                                        <div class="custom-control custom-checkbox form-group">
                                            <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                            <label class="custom-control-label" for="exampleCheck1">Sign me in</label>
                                        </div>
                                        <a href="signin" class="forgot-link">Already have an account?</a>
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
    <div class="modal fade" id="otpmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">OTP Verification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="otpverification">
                        <div class="form-group">
                            <label>Enter OTP received on phone.</label>
                            <input type="text" class="form-control" name="userotp" id="">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Verify OTP">
                            <input type="reset" class="btn btn-warning" id="resendotp" value="Resend">
                        </div>
                    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="assets/admin/signup.js"></script>
</body>

</html>