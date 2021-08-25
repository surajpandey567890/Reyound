 <?php
 
    
    require('../../../common/library.php');
    require('../../../common/constant.php');
    
    $today = CURRENTTIME;
    
   // $_POST['ID']='Mg==';
    if(isset($_POST['wid']) && $_POST['wid']!="" && isset($_POST['status']) && $_POST['status']=="1")
    {
        $id=base64_decode($_POST['wid']);

        $query = "UPDATE `order_details` SET `order_status`=1,`reject_reason`='' WHERE `ID`='$id'";
        $obj->execute($query);
        
        $data['response'] = 'y';
        $data['message'] = 'Request approved successfully';
        echo json_encode($data);   
    }
    elseif(isset($_POST['wid']) && $_POST['wid']!="" && isset($_POST['status']) && $_POST['status']=="2" && isset($_POST['reason']) && $_POST['reason']!="")
    {
        $id=base64_decode($_POST['wid']);
        $status=$_POST['status'];
        $reason=trim(htmlentities($_POST['reason'],ENT_QUOTES));
        
        $query = "UPDATE `order_details` SET `order_status`='$status',`reject_reason`='$reason' WHERE `ID`='$id'";
        $obj->execute($query);
        
        $data['response'] = 'y';
        $data['message'] = 'Request rejected successfully';
        echo json_encode($data);   
    }
    else
    {
        $data['response'] = 'n';
        $data['message'] = 'All field required';
        echo json_encode($data);
    }
?>