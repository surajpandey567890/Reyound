<?php

require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['userotp']) && $_POST['userotp'] != "") {
    $userotp =$_POST['userotp'];
    //Replace Hard Coded OTP with Session OTP Variable $_SESSION['otp']
    if ($userotp == 5252) {
        $data['response'] = 'y';
        $data['message'] = 'OTP Verified';
        session_start();
        $_SESSION['otpcheck'] = true;
        echo json_encode($data);
        exit;
    } else {
        $data['response'] = 'n';
        $data['message'] = 'Wrong OTP';
        echo json_encode($data);
    }
} else {
    $data['response'] = 'n';
    $data['message'] = 'All field required';
    echo json_encode($data);
}
