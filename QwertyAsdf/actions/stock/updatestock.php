<?php
require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['quantity']) && $_POST['quantity'] != "") {
    $id = $_POST['pid'];
    $quantity = $_POST['quantity'];
    $insert = $obj->execute("update product set stock=$quantity where ID=$id");

    if ($insert > 0) {
        $data['response'] = "y";
        $data['error'] = false;
        $data['message'] = "Stock Updated";
        echo json_encode($data);
    } else {
        $data['response'] = "n";
        $data['error'] = true;
        $data['message'] = "Something went wrong";
        echo json_encode($data);
    }
} else {
    $data['response'] = "n";
    $data['error'] = true;
    $data['message'] = "All field required";
    echo json_encode($data);
}
