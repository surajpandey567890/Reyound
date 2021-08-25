<?php

require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['ID']) && $_POST['ID'] != "") {
    $id = $_POST['ID'];

    $query = "UPDATE `admin_login` SET isapproved=(!isapproved) WHERE `ID`='$id'";
    $result = $obj->execute($query);
    if ($result) {
        $data['response'] = 'y';
        $data['message'] = 'Status updated successfully';
        echo json_encode($data);
        exit;
    } else {
        $data['response'] = 'n';
        $data['message'] = 'All field required';
        echo json_encode($data);
        exit;
    }
} else {
    $data['response'] = 'n';
    $data['message'] = 'All field required';
    echo json_encode($data);
}
