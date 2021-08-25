<?php include '../common/adminSession.php'; ?>
<?php include '../common/library.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reyound | Reyound Rewind">
    <meta name="keywords" content="Reyound">
    <meta name="author" content="Navrangi E-Commerce">
    <link rel="shortcut icon" href="/reyound/QwertyAsdf/img/logo.png" type="image/x-icon">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <style>
        @font-face {
            font-family: 'Reyound';
            src: url('/web-fonts/DrSugiyama-Regular.woff') format('woff2');
        }
    </style>
    <!-- Title -->
    <title><?= COMPANY
            ?></title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="/reyound/QwertyAsdf/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/reyound/QwertyAsdf/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="/reyound/QwertyAsdf/assets/plugins/DataTables/datatables.min.css" rel="stylesheet">
    <link href="/reyound/QwertyAsdf/assets/plugins/select2/css/select2.min.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="/reyound/QwertyAsdf/assets/css/connect.min.css" rel="stylesheet">
    <link href="/reyound/QwertyAsdf/assets/css/dark_theme.css" rel="stylesheet">
    <link href="/reyound/QwertyAsdf/assets/css/custom.css" rel="stylesheet">

    <!-- Sweetalert -->
    <!-- <link rel="stylesheet" href="/reyound/QwertyAsdf/css/sweetalert.css"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="connect-container align-content-stretch d-flex flex-wrap">
        <div class="page-sidebar">
            <div class="logo-box"><img src="/reyound/QwertyAsdf/img/navlogo.png" alt="Fashion Jalsa" width="60%"><a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
            <div class="page-sidebar-inner slimscroll">
                <ul class="accordion-menu">
                    <li>
                        <a href="index" class="active"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
                    </li>
                    <?php if ($_SESSION['ADMIN_TYPE'] != 2) { ?>
                        <li>
                        <a href="#"><i class="material-icons-outlined">store</i>Vendor Management<i class="material-icons has-sub-menu">add</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="admin">Vendor's</a>
                            </li>
                            <li>
                                <a href="approve">Pending Approval</a>
                            </li>
                             <li>
                                <a href="reject_vendor">Reject Vendor</a>
                            </li>
                        </ul>
                    </li>
                        <li>
                            <a href="#"><i class="material-icons">category</i>Category<i class="material-icons has-sub-menu">add</i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="category">Base Category</a>
                                </li>
                                <li>
                                    <a href="sub_category">Sub Category</a>
                                </li>
                                <li>
                                    <a href="sub_main_category">Sub Main Category</a>
                                </li>
                            </ul>
                        </li>
                    <?php
                    } ?>
                    <li>
                        <a href="#"><i class="material-icons">local_shipping</i>Order<i class="material-icons has-sub-menu">add</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="order">Order


                                    <?php
                                    $order_count = $obj->select("COUNT(*)", "order_details", "is_seen='0'")[0][0];
                                    if ($order_count != 0) {
                                    ?>

                                        <span class="badge badge-primary" id="order_count"><?= $order_count; ?></span>

                                    <?php
                                    }
                                    ?>
                                </a>
                            </li>
                            <li>
                                <a href="pending">Pending Order</a>
                            </li>
                            <li>
                                <a href="completed_order">Completed Order</a>
                            </li>
                            <li>
                                <a href="reject">Rejected Order</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="material-icons">inventory</i>Inventory<i class="material-icons has-sub-menu">add</i></a>
                        <ul class="sub-menu">

                            <li>
                                <a href="stock">Stock</a>
                            </li>
                            <li>
                                <a href="lowstock">Low Stock</a>
                            </li>
                            <li>
                                <a href="outofstock">Out of Stock</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="material-icons">production_quantity_limits</i>Products<i class="material-icons has-sub-menu">add</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="product">Product's</a>
                            </li>

                    </li>
                    <li>
                        <a href="active_products">Active</a>
                    </li>
                    <li>
                        <a href="inactive_products">In-Active</a>
                    </li>
                </ul>
                </li>

                <li>
                    <a href="#"><i class="material-icons">featured_video</i>Returns<i class="material-icons has-sub-menu">add</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="return">Return product
                                <?php
                                $returns_count = $obj->select("COUNT(*)", "returns", "is_seen='0'")[0][0];
                                if ($returns_count != 0) {
                                ?>



                                    <span class="badge badge-primary" id="returns_count"><?= $returns_count; ?></span>

                                <?php
                                }
                                ?>
                            </a>


                        </li>


                        <?php
                        if ($_SESSION['ADMIN_TYPE'] != 2) {  ?> <li>
                                <a href="claims">Claims

                                    <?php
                                    $claims_count = $obj->select("COUNT(*)", "claims", "is_seen='0'")[0][0];
                                    if ($claims_count != 0) {
                                    ?>



                                        <span class="badge badge-primary" id="claims_count"><?= $claims_count; ?></span>
                                    <?php } ?>

                                </a>

                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                <?php
                if ($_SESSION['ADMIN_TYPE'] != 2) { ?>
                    <li>
                        <a href="#"><i class="material-icons">featured_video</i>Banners<i class="material-icons has-sub-menu">add</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="banner">Banner</a>
                            </li>
                            <li>
                                <a href="sub_banner">Sub Banner</a>
                            </li>

                        </ul>
                    </li>
                <?php
                } ?>
                <li>

                <li>
                    <a href="notification"><i class="material-icons">notifications</i>Notification
                        <?php
                        $notification_count = $obj->select("COUNT(*)", "notification", "is_seen='0'")[0][0];
                        if ($notification_count != 0) {
                        ?>

                            <span class="badge badge-primary" id="notification_count"><?= $notification_count; ?></span>
                        <?php
                        } ?>
                    </a>

                </li>
                </li>
                <?php
                if ($_SESSION['ADMIN_TYPE'] != 2) { ?>
                    <li>
                        <?php
                        $contact_count = $obj->select("COUNT(*)", "contact_us", "is_seen='0'")[0][0];
                        if ($contact_count != 0) {
                        ?>


                            <a href="contact_us"><i class="material-icons">help</i>Customer's Query <span class="badge badge-primary" id="contact_count"><?= $contact_count; ?></span> </a>

                    </li>
                <?php
                        } ?>
                <li>
                    <a href="testimonial"><i class="material-icons">stars</i>Testinomial</a>
                </li>
                <li>
                    <a href="report"><i class="material-icons">summarize</i>Reports</a>
                </li>
            <?php
                } ?>
            <?php
            if ($_SESSION['ADMIN_TYPE'] == 0) { ?>
                <li>
                    <a href="staff"><i class="material-icons">group</i>Staff</a>
                </li>
            <?php
            } ?>
            <?php
            if ($_SESSION['ADMIN_TYPE'] != 2) { ?>
                <li>
                    <a href="users"><i class="material-icons">group</i>User's
                        <?php
                        $users_count = $obj->select("COUNT(*)", "users", "is_seen='0'")[0][0];
                        if ($users_count != 0) {
                        ?>

                            <span class="badge badge-primary" id="users_count"><?= $users_count; ?></span>
                    <?php
                        }
                    } ?>
                    </a>
                </li>
                 <li>
                    <a href="coupon"><i class="material-icons">extension</i>Coupon</a>
                </li>
                <li>
                    <a href="logout"><i class="material-icons">logout</i>Log Out</a>
                </li>
                <br><br><br>
                </ul>
            </div>
        </div>
        <div class="page-container">
            <div class="page-header">
                <nav class="navbar navbar-expand">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item small-screens-sidebar-link">
                            <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                        </li>
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href="profile"><img src="assets/images/avatars/profile-image-1.png" alt="profile image"></a>
                                <span><?= $_SESSION['ADMIN_USERNAME'] ?></span>
                                <!-- <i class="material-icons dropdown-icon">keyboard_arrow_down</i> -->
                            </a>
                            <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="logout">Log out</a>
                            </div> -->
                        </li>
                        <li class="nav-item">
                            <!-- <a href="#" class="nav-link" id="dark-theme-toggle"><i class="material-icons-outlined">brightness_2</i><i class="material-icons">brightness_2</i></a> -->
                        </li>
                    </ul>
                </nav>
            </div>