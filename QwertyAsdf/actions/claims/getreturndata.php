<?php

require('../../../common/library.php');
require('../../../common/constant.php');
if (isset($_POST['ID']) && $_POST['ID'] != "") {
    $ID = $_POST['ID'];

    $get_data = $obj->select("*", "returns", "ID='$ID'");
    if (is_array($get_data)) {
        $data['response'] = "y";
        
        $data['orderNumber'] = $get_data[0][1];
        $data['returnReason'] = $get_data[0][2];
        $data['returnDate'] = $get_data[0][6];
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
