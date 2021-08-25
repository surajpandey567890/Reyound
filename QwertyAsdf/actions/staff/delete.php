<?php
    
    require('../../../common/library.php');
    require('../../../common/constant.php');
    
    $today = CURRENTTIME;
    
    //$_POST['ID']='Mg==';
    if(isset($_POST['ID']) && $_POST['ID']!="")
    {
        $id=base64_decode($_POST['ID']);

        $query = "DELETE FROM `staff` WHERE id='$id'";
        $obj->execute($query);
        
        $data['response'] = 'y';
        $data['message'] = 'Staff deleted successfully';
        echo json_encode($data);
    }
    else
    {
        $data['response'] = 'n';
        $data['message'] = 'All field required';
        echo json_encode($data);
    }
?>