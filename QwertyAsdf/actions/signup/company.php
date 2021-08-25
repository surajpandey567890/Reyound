<?php
require('../../../common/library.php');
require('../../../common/constant.php');

if (
    isset($_POST['company_name']) && $_POST['company_name'] != "" &&
    isset($_POST['company_address']) && $_POST['company_address'] != "" &&
    isset($_POST['company_gstin']) && $_POST['company_gstin'] != "" &&
    isset($_FILES['CompanyGSTIN']['tmp_name']) && $_FILES['CompanyGSTIN']['tmp_name'] != "" &&
    isset($_FILES['CompanyPAN']['tmp_name']) && $_FILES['CompanyPAN']['tmp_name'] != "" &&
    isset($_FILES['CompanyChaque']['tmp_name']) && $_FILES['CompanyChaque']['tmp_name'] != "" &&
    isset($_FILES['CompanyAddress']['tmp_name']) && $_FILES['CompanyAddress']['tmp_name'] != ""
) {
    session_start();

    $adminid = $_POST['adminid'];
    $cname = $_POST['company_name'];
    $caddress = $_POST['company_address'];
    $cgstin = $_POST['company_gstin'];

    $result = $obj->insert("personal_info", "`admin_id`,`company_name`,`address`,`gst`,`createdon`", "'$adminid','$cname','$caddress','$cgstin',now()");
    if ($result > 0) {
        $path = $_SERVER['DOCUMENT_ROOT'].'/QwertyAsdf/VendorData/' . $adminid;
        $obj->createDir($path);
        if (!move_uploaded_file($_FILES['CompanyGSTIN']['tmp_name'], $path . '/GSTIN.jpg'))
            die('GSTIN file upload failed');
        if (!move_uploaded_file($_FILES['CompanyPAN']['tmp_name'], $path . '/PAN.jpg'))
            die('PAN file upload failed');
        if (!move_uploaded_file($_FILES['CompanyChaque']['tmp_name'], $path . '/CancelChaque.jpg'))
            die('Chaque file upload failed');
        if (!move_uploaded_file($_FILES['CompanyAddress']['tmp_name'], $path . '/Address.jpg'))
            die('Address file upload failed');

        $data['response'] = "y";
        $data['message'] = "Success";
        $data['pid'] = $result;
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
