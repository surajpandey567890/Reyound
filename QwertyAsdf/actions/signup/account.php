<?php
require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['accountno']) && $_POST['accountno'] != "" && isset($_POST['ifsc']) && $_POST['ifsc'] != "") {
    session_start();

    $createdon = date("Y-m-d H:i:s");

    $pid = $_POST['pid'];
    $holdername = $_POST['holdername'];
    $accountno = $_POST['accountno'];
    $ifsc = $_POST['ifsc'];
    $type = $_POST['accounttype'];
    $sign = 'pepe';

    $result = $obj->execute("update personal_info set holder_name='$holdername',account_no='$accountno',ifsc='$ifsc',type='$type',sign_image='$sign' where ID='$pid'");

    if ($result) {
        $result = $obj->selectQuery("select email from admin_login inner join personal_info where admin_login.id=personal_info.admin_id and personal_info.ID=$pid");
        $obj->welcomemail($result[0][0]);
        $data['response'] = "y";
        $data['message'] = "Account activation successful";
        echo json_encode($data);
    } else {
        $data['response'] = "n";
        $data['message'] = "Failed to update data";
        echo json_encode($data);
    }
} else {
    $data['response'] = "n";
    $data['message'] = "All field required";
    echo json_encode($data);
}
