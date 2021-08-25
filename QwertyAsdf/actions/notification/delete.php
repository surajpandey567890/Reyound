<?php

require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['ID']) && $_POST['ID'] != "") {
    $id = $_POST['ID'];

    $query = "DELETE FROM `notification` WHERE id='$id'";
    $obj->execute($query);

    $data['response'] = 'y';
    $data['message'] = 'Notification deleted successfully';
    echo json_encode($data);
} else {
    $data['response'] = 'n';
    $data['message'] = 'All field required';
    echo json_encode($data);
}
