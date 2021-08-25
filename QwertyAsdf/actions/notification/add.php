<?php
require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['subject']) && $_POST['subject'] != "" && isset($_POST['message']) && $_POST['message'] != "") {

    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $check_notification = $obj->select("*", "notification", "subject='$subject'");

    if (is_array($check_notification)) {
        $data['response'] = "n";
        $data['message'] = "Notification already exist";
        echo json_encode($data);
    } else {
        $inserted_id = $obj->insert("notification", "`subject`, `message`,`createdon`", "'$subject','$message',now()");
        $data['response'] = "y";
        $data['message'] = "Notification added successfully";
        echo json_encode($data);
    }
} else {
    $data['response'] = "n";
    $data['message'] = "All field required";
    echo json_encode($data);
}
