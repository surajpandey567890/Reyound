<?php

require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['subject']) && $_POST['subject'] != "" && isset($_POST['message']) && $_POST['message'] != "" && isset($_POST['nid']) && $_POST['nid'] != "") {
    $id = $_POST['nid'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $update_query = "UPDATE `notification` SET `subject`='$subject',`message`='$message' WHERE `ID`='$id'";
    $obj->execute($update_query);

    $data['response'] = "y";
    $data['error'] = false;
    $data['message'] = "Notification updated successfully";
    echo json_encode($data);
} else {
    $data['response'] = "n";
    $data['error'] = true;
    $data['message'] = "All field required";
    echo json_encode($data);
}
