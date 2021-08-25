<?php
session_start();
require('../../../common/library.php');

date_default_timezone_set("Asia/Kolkata");

//  echo $_POST["partner_service_id"]."-".$_POST["service_type"]."-".$_POST["service_name"]."-".$_POST["category"]."-".$_POST["item"]."-".$_POST["price"];
//  exit;
if(isset($_POST["id"]) && $_POST["id"]!="" &&
    isset($_POST["coupon"]) && $_POST["coupon"]!="" && 
   isset($_POST["edate"]) && $_POST["edate"]!="" &&
   isset($_POST["sdate"]) && $_POST["sdate"]!="" &&
   isset($_POST["minorder"]) && $_POST["minorder"]!="" && 
   isset($_POST["percent"]) && $_POST["percent"]!="" &&
   isset($_POST["no_of_time_use"]) && $_POST["no_of_time_use"]!="" &&
   isset($_POST["valueType"]) && $_POST["valueType"]!="") {
    
    $id = $_POST["id"];
    $coupon = trim(htmlentities($_POST["coupon"]));
    $startdate = $_POST["sdate"];
    $expiredate = $_POST["edate"];
    $minorder = $_POST["minorder"];
    $percent = $_POST["percent"];
    $no_of_time_use = $_POST["no_of_time_use"];
    $valueType = $_POST["valueType"];
    $createdon = date("Y-m-d H:i:s");
    
    
    $obj->execute("UPDATE coupons SET coupon_name='$coupon',no_of_time_use=$no_of_time_use,min_order_amt=$minorder,value=$percent,value_type='$valueType',
                                 start_date='$startdate',expiry_date='$expiredate' WHERE ID =$id ");
    
    $data["response"] = "y";
    $data["message"] = "Coupon updated successfully";
    echo json_encode($data);
}
else{
    $data["response"] = "n";
    $data["message"] = "All fields required";
    echo json_encode($data);
}
    
?>