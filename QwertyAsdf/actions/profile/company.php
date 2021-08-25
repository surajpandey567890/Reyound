<?php
require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['cname']) && $_POST['cname'] != "" && isset($_POST['caddress']) && $_POST['caddress'] != "" && isset($_POST['gstin']) && $_POST['gstin'] != "") 
{
    session_start();
    $name = $_POST['cname'];
    $address = $_POST['caddress'];
    $gstin = $_POST['gstin'];

    if(isset($_POST['vid']) && $_POST['vid'] != "")
    {
        $vid =$_POST['vid'];
    }
    else
    {
        $vid = $_SESSION['session_ap'];
    }

    $result = $obj->execute("update personal_info set company_name='$name',address='$address',gst='$gstin' where admin_id=$vid");
    
    if ($result) {
        $data['response'] = "y";
        $data['message'] = "Company information updated successfully";
        echo json_encode($data);
    } else {
        $data['response'] = "n";
        $data['message'] = "Company information update failed";
        echo json_encode($data);
    }
}else
{
    $data['response'] = "n";
    $data['message'] = "All field required";
    echo json_encode($data);
}
?>