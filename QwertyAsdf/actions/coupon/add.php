<?php


require('../../../common/library.php');

//date_default_timezone_set("Asia/Kolkata");
    
    // $coupon = $_POST["coupon"];
    // $expiredate = $_POST["edate"];
    // $minorder = $_POST["minorder"];
    // $percent = $_POST["percent"];
    // $no_of_time_use = $_POST["no_of_time_use"];
    // $valueType = $_POST["valueType"];
    
    
    // echo $coupon .$expiredate.$minorder.$percent.$no_of_time_use.$valueType;
    // exit;

if(isset($_POST["coupon"]) && $_POST["coupon"]!="" && 
   isset($_POST["edate"]) && $_POST["edate"]!="" &&
   isset($_POST["sdate"]) && $_POST["sdate"]!="" &&
   isset($_POST["minorder"]) && $_POST["minorder"]!="" && 
   isset($_POST["percent"]) && $_POST["percent"]!="" &&
   isset($_POST["no_of_time_use"]) && $_POST["no_of_time_use"]!="" &&
   isset($_POST["valueType"]) && $_POST["valueType"]!="") {
    
   
    $coupon = trim(htmlentities($_POST["coupon"],ENT_QUOTES));
    $startdate = $_POST["sdate"];
    $expiredate = $_POST["edate"];
    $minorder = $_POST["minorder"];
    $percent = $_POST["percent"];
    $no_of_time_use = $_POST["no_of_time_use"];
    $valueType = $_POST["valueType"];
    $createdon = date("Y-m-d H:i:s");
    
    //$final_image = 'img/Coupon/TP.jpg';
    
    $check_coupon = $obj->select("coupon_name","coupons","coupon_name='$coupon'");
    
    if(!is_array($check_coupon))
    {
         $obj->insert("coupons","coupon_name, no_of_time_use, min_order_amt, value, value_type, start_date, expiry_date, status, createdon",
                                 "'$coupon', '$no_of_time_use','$minorder','$percent','$valueType', ' $startdate', '$expiredate','1','$createdon'");
            
        $data["response"] = "y";
        $data["message"] = "Coupon added successfully";
        echo json_encode($data);
        exit;
    }
    else
    {
        $data["response"] = "n";
        $data["message"] = "Coupon code already present";
        echo json_encode($data);
        exit;
    }
    
}
else
{
    $data["response"] = "n";
    $data["message"] = "All fields required";
    echo json_encode($data);
    exit;
}
    
?>