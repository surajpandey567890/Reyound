<?php
session_start();

require('../../../common/library.php');

date_default_timezone_set("Asia/Kolkata");

if(isset($_POST["id"]) && $_POST["id"]!="") {
    
    $coupon = $_POST["id"];
    $coupon = explode("-", $coupon)[1];
    // echo $coupon;
    // exit;
    
    $coupons = $obj->select("ID,coupon_name,no_of_time_use, min_order_amt, value, value_type, start_date, expiry_date", "coupons", "ID = $coupon");
    
    $coupon_id = $coupons[0][0];
    $coupon_code = html_entity_decode($coupons[0][1]);
    $no_of_time_use = $coupons[0][2];
    $minAmount = $coupons[0][3];
    $value = $coupons[0][4];
    $valueType = $coupons[0][5];
    $sdate = $coupons[0][6];
    $edate = $coupons[0][7];
    $coupon_code =html_entity_decode ($coupon_code,ENT_QUOTES);
    
    
    $data["response"] = "y";
    $data["id"] = $coupon_id;
    $data["couponcode"] = $coupon_code;
    $data["no_of_use"] = $no_of_time_use;
    $data["minAmount"] = $minAmount;
    $data["value"] = $value;
    $data["valueType"] = $valueType;
    $data["sdate"] = $sdate;
    $data["edate"] = $edate;
    echo json_encode($data);
}
else{
    $data["response"] = "n";
    $data["message"] = "All Fields Required";
    echo json_encode($data);
}
    
?>