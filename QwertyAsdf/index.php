<?php include 'partial/header.php';

$total_product = $obj->select("COUNT(*)", "product", "status=1")[0][0];
$total_sale = 8352;
$today_order = 10;
$last_month = 820;
?>
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="row stats-row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                        <?php $last30 = $obj->select("count(ID)", "`order_details`", "createdon between date(date(now())-7) and date(now());"); ?>
                            <h5 class="card-title"><?=$last30[0][0]?></h5>
                            <p class="stats-text">Order's in 7 Day's</p>
                        </div>
                        <div class="stats-icon change-success">
                            <i class="material-icons">people</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                        <?php $last30 = $obj->select("count(ID)", "`order_details`", "createdon between date(date(now())-30) and date(now());"); ?>
                            <h5 class="card-title"><?=$last30[0][0]?></h5>
                            <p class="stats-text">Order's in 30 Day's</p>
                        </div>
                        <div class="stats-icon change-success">
                            <i class="material-icons">money</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                        <?php $last30 = $obj->select("sum(amount)", "`order_details`", "createdon between date(date(now())-7) and date(now());"); ?>
                            <h5 class="card-title">₹ <?=$last30[0][0]?></h5>
                            <p class="stats-text">Last 7 Day's Sale</p>
                        </div>
                        <div class="stats-icon change-success">
                            <i class="material-icons">inventory_2</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                        <?php $last30 = $obj->select("sum(amount)", "`order_details`", "createdon between date(date(now())-30) and date(now());"); ?>
                            <h5 class="card-title">₹ <?=$last30[0][0]?></h5>
                            <p class="stats-text">Last 30 Day's Sale</p>
                        </div>
                        <div class="stats-icon change-success">
                            <i class="material-icons">production_quantity_limits</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card savings-card">
                    <div class="card-body">
                        <h5 class="card-title">Sales<span class="card-title-helper">30 Days</span></h5>
                        <div class="savings-stats">
                        <?php $tillnow = $obj->select("sum(amount)", "`order_details`", "1"); ?>
                            <h5>₹ <?=$tillnow[0][0]?></h5>
                            <span>Total savings for last month</span>
                        </div>
                        <div id="sparkline-chart-1"></div>
                    </div>
                </div>
                <div class="card top-products">
                    <div class="card-body">
                        <h5 class="card-title">Popular Products<span class="card-title-helper">Today</span></h5>
                        <div class="top-products-list">
                            <div class="product-item">
                                <h5>Alpha - File Hosting Service</h5>
                                <span>4,037 downloads</span>
                                <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                            </div>
                            <div class="product-item">
                                <h5>Lime - Task Managment Dashboard</h5>
                                <span>1,876 downloads</span>
                                <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                            </div>
                            <div class="product-item">
                                <h5>Space - Meetup Hosting App</h5>
                                <span>1,252 downloads</span>
                                <i class="material-icons product-item-status product-item-danger">arrow_downward</i>
                            </div>
                            <div class="product-item">
                                <h5>Meteor - Messaging App</h5>
                                <span>938 downloads</span>
                                <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Visitors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Reports</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Investments</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="visitors-stats">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="visitors-stats-info">
                                        <p>Total visitors in the current period:</p>
                                        <h5>77,871</h5>
                                        <span>6-26 Apr</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="visitors-stats-info">
                                        <p>Unique visitors in the current period and ratio:</p>
                                        <h5>58,403</h5>
                                        <span>6-26 Apr</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div id="chart-visitors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'partial/footer.php'; ?>
    </body>

    </html>