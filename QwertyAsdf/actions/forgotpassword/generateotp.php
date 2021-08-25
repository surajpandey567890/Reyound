<?php

require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['mobile']) && $_POST['mobile'] != "") {
    $mobile = $_POST['mobile'];
    if (strlen($mobile) >= 10 && strlen($mobile) <= 10) {
        $check_ven = $obj->select("*", "admin_login", "mobileno='$mobile'");
        if (!is_array($check_ven)) {
            $data['response'] = "n";
            $data['message'] = "User Not Exist";
            echo json_encode($data);
            exit;
        }
        session_start();
        $_SESSION['otp'] = rand(111111, 999999);
        $_SESSION['otpcheck'] = false;
        $data['response'] = 'y';
        $data['mobile'] = $mobile;
        $data['message'] = "OTP has been sent.";
        echo json_encode($data);
    } else {
        $data['response'] = 'n';
        $data['message'] = 'Mobile should be of 10 Digit';
        echo json_encode($data);
        exit;
    }
} else {
    $data['response'] = 'n';
    $data['message'] = 'Mobile Number is Mandatory';
    echo json_encode($data);
    exit;
}
