<?php

require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['pass']) && $_POST['pass'] != "" && isset($_POST['conpass']) && $_POST['conpass'] != "") {
    $pcheck = $_POST["pass"];
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


    if ($_POST['pass'] == $_POST['conpass'])
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
    $password = hash('sha256', $pcheck . $salt);
    for ($round = 0; $round < 65536; $round++) {
        $password = hash('sha256', $password . $salt);
    }
    $hash = $password;
    $mobile = $_POST['adminmobile'];
    $result = $obj->execute("update admin_login set hash='$hash',salt='$salt' where mobileno='$mobile'");
    if ($result) {
        $data['response'] = 'y';
        $data['message'] = 'Password Reset Successfull';
        echo json_encode($data);
    } else {
        $data['response'] = 'n';
        $data['message'] = 'Updation Failed';
        echo json_encode($data);
    }
} else {
    $data['response'] = 'n';
    $data['message'] = 'All field required';
    echo json_encode($data);
}
