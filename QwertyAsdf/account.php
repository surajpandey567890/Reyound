<?php include '../common/constant.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fashion Jalsa | Fashion Rewind">
    <meta name="keywords" content="Fashion,Jalsa">
    <meta name="author" content="Navrangi E-Commerce">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?= COMPANY ?></title>
    <link rel="shortcut icon" href="<?=LOGO?>" type="image/x-icon">

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
                                <div class="logo-box"><a href="#" class="logo-text">Bank Details</a></div>
                        <form id="finish">
                            <div class="form-group">
                                <input type="hidden" name="pid" value="<?=$_POST['pid']?>">
                                <input type="text" class="form-control" name="holdername" id="holdername" placeholder="Account Holder Name">
                            </div>    
                            <div class="form-group">
                                <input type="text" name="accountno" id="accountno" class="form-control" placeholder="Enter Account Number">
                            </div>
                            <div class="form-group">
                                <input type="text" name="ifsc" id="ifsc" class="form-control" placeholder="Enter IFSC Code">
                            </div>
                            <div class="form-group">
                                <select name="accounttype" id="accounttype" class="form-control">
                                    <option value="0">Select Account Type</option>
                                    <option value="Saving">Saving</option>
                                    <option value="Current">Current</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="signature">Digital Signature</label>
                                <input type="file" name="sign" id="sign" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control" value="Finish">
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
    
    </div>
    <!-- Javascripts -->
    <script src="assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="assets/plugins/bootstrap/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/connect.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/admin/account.js"></script>
</body>

</html>