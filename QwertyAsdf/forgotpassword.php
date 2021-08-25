<?php include '../common/constant.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <link rel="shortcut icon" href="<?= LOGO ?>" type="image/x-icon">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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
                                <div class="logo-box"><a href="#" class="logo-text">Let's Begin</a></div>
                                <div class="container" id="con3" style="display:none">
                                    <form id="setNewPass">
                                        <div class="form-group">
                                            <label for="">Enter Password</label>
                                            <input type="hidden" id="AdminMobile" name="adminmobile">
                                            <input type="password" id="pass" class="form-control" name="pass">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" id="conpass" class="form-control" name="conpass">
                                        </div>
                                        <button type="submit" id="otp" class="btn btn-primary btn-block btn-submit">Set New Password</button>
                                    </form>
                                </div>
                                <div class="container" id="con2" style="display:none">
                                    <form id="verifyOTP">
                                        <div class="form-group">
                                            <label>Enter OTP received on phone</label>
                                            <input name="userotp" id="userotp" type="text" class="form-control" placeholder="Enter OTP Here">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block btn-submit">Verify OTP</button>
                                    </form>
                                </div>
                                <div class="container" id="con1">
                                    <form id="getMobile">
                                        <div class="form-group">
                                            <label for="">Enter Registered Mobile</label>
                                            <input name="mobile" id="mobile" type="text" class="form-control" placeholder="Enter Email/Mobile">
                                        </div>
                                        <button type="submit" id="otp" class="btn btn-primary btn-block btn-submit">Generate OTP</button>
                                        <div class="auth-options">
                                            <div class="custom-control custom-checkbox form-group">
                                                <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                                <label class="custom-control-label" for="exampleCheck1">Remember me</label>
                                            </div>
                                            <a href="#" class="forgot-link">Forgot Password?</a>
                                        </div>
                                        <div class="form-group text-center">
                                            <a href="signup" class="forgot-link">Want to be a part of family? Signup Here :)</a>
                                        </div>
                                    </form>
                                </div>
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
    <script src="../vendor/jquery/jquery.js"></script>
    <script src="../vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="../vendor/popper/umd/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.js"></script>
    <script src="../vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../vendor/common/common.js"></script>
    <script src="../vendor/nanoscroller/nanoscroller.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.js"></script>
    <script src="../vendor/jquery-placeholder/jquery-placeholder.js"></script>
    <script src="../vendor/jquery-validation/jquery.validate.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#getMobile").validate({
                rules: {
                    mobile: {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    }
                },
                messages: {
                    mobile: {
                        required: "Mobile number required",
                        minlength: "Should be 10 digit",
                        maxlength: "Should be 10 digit",
                    }
                },

                submitHandler: function(form, e) {
                    var formData = new FormData(document.getElementById('getMobile'));
                    $.ajax({
                        url: 'actions/forgotpassword/generateotp',
                        type: 'POST',
                        data: formData,
                        success: function(data) {
                            result = $.parseJSON(data);
                            if (result.response == 'y') {
                                swal({
                                    title: "Wow",
                                    text: result.message,
                                    type: "success"
                                }).then(function() {
                                    $("#AdminMobile").val(result.mobile);
                                    $("#con1").hide();
                                    $("#con2").show();
                                });
                            } else {
                                swal({
                                    title: "Oh No!",
                                    text: result.message,
                                    type: "error"
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                    return false;
                }
            });
            $("form#verifyOTP").submit(function() {
                var formData = new FormData(document.getElementById('verifyOTP'));
                $.ajax({
                    url: 'actions/otp/verifyotp',
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        result = $.parseJSON(data);
                        if (result.response == 'y') {
                            swal({
                                title: "Wow",
                                text: result.message,
                                type: "success"
                            }).then(function() {
                                $("#con2").hide();
                                $("#con3").show();
                            });
                        } else {
                            swal({
                                title: "Oh No!",
                                text: result.message,
                                type: "error"
                            }).then(function() {
                                $('#userotp').focus();
                            });
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;
            });
            $("#setNewPass").validate({
                rules: {
                    pass: {
                        required: true,
                        minlength: 9
                    },
                    conpass: {
                        equalTo: "#pass"
                    }
                },
                messages: {
                    pass: {
                        required: "Please choose a new password",
                        minlength: "Password should be 8 character long"
                    },
                    conpass: {
                        equalTo: "Should be same as above"
                    }
                },

                submitHandler: function(form, e) {
                    e.preventDefault();
                    var formData = new FormData(document.getElementById('setNewPass'));
                    $.ajax({
                        url: 'actions/forgotpassword/change',
                        type: 'POST',
                        data: formData,
                        success: function(data) {
                            result = $.parseJSON(data);
                            if (result.response == 'y') {
                                swal({
                                    title: "Wow",
                                    text: result.message,
                                    type: "success"
                                }).then(function() {
                                    location.href = "/QwertyAsdf/"
                                });
                            } else {

                                swal({
                                    title: "Oh No!",
                                    text: result.message,
                                    type: "error"
                                }).then(function() {
                                    $('#pass').focus();
                                });
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                    return false;
                }
            });
        });
    </script>

</body>

</html>