<?php

require('../../../common/library.php');
require('../../../common/constant.php');
$today = CURRENTTIME;

//$_POST['ID']="Mg==";

if (isset($_POST['ID']) && $_POST['ID'] != "") {
    $ID = $_POST['ID'];

    $get_data = $obj->select("*", "notification", "ID='$ID'");
    if (is_array($get_data)) {
        $data['response'] = "y";
        $data['nid'] = $get_data[0][0];
        $data['subject'] = $get_data[0][1];
        $data['message'] = $get_data[0][2];
        echo json_encode($data);
    } else {
        $data['response'] = "n";
        $data['message'] = "Data not found";
        echo json_encode($data);
    }
} else {
    $data['response'] = "n";
    $data['message'] = "All fields required";
    echo json_encode($data);
}
