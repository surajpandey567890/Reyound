<?php include 'partial/header.php'; ?>

<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reports Overview</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <?php
                            $last7 = $obj->select("count(ID)", "`order_details`", "createdon between date(date(now())-7) and date(now());");
                            ?>
                            <h5 class="card-title"><?= $last7[0][0] ?></h5>
                            <p class="stats-text">Order Placed in 7 Day's</p>
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
                            <?php $last30 = $obj->select("count(ID)", "`order_details`", "createdon between date(date(now())-30) and date(now());"); ?>
                            <h5 class="card-title"><?= $last30[0][0] ?></h5>
                            <p class="stats-text">Order Placed in 30 Day's</p>
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
                            <?php $last7 = $obj->select("sum(amount)", "`order_details`", "createdon between date(date(now())-90) and date(now());"); ?>
                            <h5 class="card-title"><?= $last7[0][0] ?></h5>
                            <p class="stats-text">Last 7 Day's Sale</p>
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
                            <?php $last30 = $obj->select("sum(amount)", "`order_details`", "createdon between date(date(now())-90) and date(now());"); ?>
                            <h5 class="card-title"><?= $last30[0][0] ?></h5>
                            <p class="stats-text">Last 30 Day's Sale</p>
                        </div>
                        <div class="stats-icon change-success">
                            <i class="material-icons">money</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Last 10 Order</h3>
                        <table class="table">
                            <tr>
                                <th>Order Id</th>
                                <th>Order Date</th>
                                <th>Amount</th>
                            </tr>
                            <tr>
                                <th>FS111111</th>
                                <th>25-08-2021</th>
                                <th>2,000</th>
                            </tr>
                            <tr>
                                <th>FS111112</th>
                                <th>25-08-2021</th>
                                <th>2,000</th>
                            </tr>
                            <tr>
                                <th>FS111113</th>
                                <th>25-08-2021</th>
                                <th>2,000</th>
                            </tr>
                            <tr>
                                <th>FS111114</th>
                                <th>25-08-2021</th>
                                <th>2,000</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partial/footer.php'; ?>