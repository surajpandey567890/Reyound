<?php
require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['holder']) && $_POST['holder'] != "" && isset($_POST['accountno']) && $_POST['accountno'] != "" && isset($_POST['ifsc']) && $_POST['ifsc'] != "" && isset($_POST['type']) && $_POST['type'] != "") 
{
    session_start();
    $holder = $_POST['holder'];
    $accountno = $_POST['accountno'];
    $ifsc = $_POST['ifsc'];
    $type = $_POST['type'];
    if(isset($_POST['vid']) && $_POST['vid'] != "")
    {
        $vid =$_POST['vid'];
    }
    else
    {
        $vid = $_SESSION['session_ap'];
    }

    $result = $obj->execute("update personal_info set holder_name='$holder',account_no='$accountno',ifsc='$ifsc',type='$type' where admin_id=$vid");
    
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