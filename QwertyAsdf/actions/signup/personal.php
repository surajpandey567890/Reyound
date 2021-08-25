<?php
require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['vendor_mobile']) && $_POST['vendor_mobile'] != "" && isset($_POST['vendor_email']) && $_POST['vendor_email'] != "" && isset($_POST['vendor_name']) && $_POST['vendor_name'] != "" && isset($_POST['vendor_pass']) && $_POST['vendor_pass'] != "") {
    session_start();
    if (isset($_SESSION['otpcheck'])) {
        if (!filter_var($_POST['vendor_email'], FILTER_VALIDATE_EMAIL)) {
            $data['response'] = "n";
            $data['message'] = $_POST['vendor_email'] . " is a invalid email address";
            echo json_encode($data);
            exit;
        };
        $pcheck = $_POST["vendor_pass"];
        if (strlen($pcheck) <= 8) {
            $data['response'] = "n";
            $data['message'] = "Your Password Must Contain At Least 8 Characters!";
            echo json_encode($data);
            exit;
        } elseif (!preg_match("#[0-9]+#", $pcheck)) {
            $data['response'] = "n";
            $data['message'] = "Your Password Must Contain At Least 1 Number!";
            echo json_encode($data);
            exit;
        } elseif (!preg_match("#[A-Z]+#", $pcheck)) {
            $data['response'] = "n";
            $data['message'] = "Your Password Must Contain At Least 1 Capital Letter!";
            echo json_encode($data);
            exit;
        } elseif (!preg_match("#[a-z]+#", $pcheck)) {
            $data['response'] = "n";
            $data['message'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
            echo json_encode($data);
            exit;
        }

        $vmobile = ucfirst(htmlentities($_POST['vendor_mobile'], ENT_QUOTES));

        $createdon = date("Y-m-d H:i:s");

        $vname = $_POST['vendor_name'];
        $vemail = $_POST['vendor_email'];
        $vpass = $_POST['vendor_pass'];

        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $password = hash('sha256', $vpass . $salt);
        for ($round = 0; $round < 65536; $round++) {
            $password = hash('sha256', $password . $salt);
        }
        $hash = $password;

        $_SESSION['otpcheck'] = false;
        $inserted_id = $obj->insert("admin_login", "`mobileno`, `email`,`name`,`hash`,`salt`,`created_on`,`admin_type`", "'$vmobile','$vemail','$vname','$hash','$salt','$createdon',2");
        $data['response'] = "y";
        $data['message'] = "Vendor Registration Successfully";
        $data['id'] = $inserted_id;
        echo json_encode($data);
    } else {
        $data['response'] = "n";
        $data['message'] = "OTP Not Verified";
        echo json_encode($data);
        exit;
    }
} else {
    $data['response'] = "n";
    $data['message'] = "All field required";
    echo json_encode($data);
}
