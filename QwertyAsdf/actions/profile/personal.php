<?php
require('../../../common/library.php');
require('../../../common/constant.php');

if (isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['mobile']) && $_POST['mobile'] != "" && isset($_POST['email']) && $_POST['email'] != "") 
{
    session_start();
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    if(isset($_POST['vid']) && $_POST['vid'] != "")
    {
        $vid =$_POST['vid'];
    }
    else
    {
        $vid = $_SESSION['session_ap'];
    }

    $result = $obj->execute("update admin_login set name='$name',mobileno='$mobile',email='$email' where id=$vid");
    
    if ($result) {
        $data['response'] = "y";
        $data['message'] = "Personal information updated successfully";
        echo json_encode($data);
    } else {
        $data['response'] = "n";
        $data['message'] = "Personal information update failed";
        echo json_encode($data);
    }
}else
{
    $data['response'] = "n";
    $data['message'] = "All field required";
    echo json_encode($data);
}
?>