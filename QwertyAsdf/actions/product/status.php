<?php
    
    require('../../../common/library.php');
    require('../../../common/constant.php');
    
    $today = CURRENTTIME;
    
    //$_POST['ID']='Mg==';
    if(isset($_POST['ID']) && $_POST['ID']!="")
    {
        $id=base64_decode($_POST['ID']);

        $query = "UPDATE `product` SET `status`=(!status) WHERE `ID`='$id'";
        $obj->execute($query);
        
        $data['response'] = 'y';
        $data['message'] = 'Status updated successfully';
        echo json_encode($data);
    }
    else
    {
        $data['response'] = 'n';
        $data['message'] = 'All field required';
        echo json_encode($data);
    }
?>