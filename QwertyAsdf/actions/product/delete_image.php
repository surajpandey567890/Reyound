<?php
    
    require('../../../common/library.php');
    require('../../../common/constant.php');
    
    $today = CURRENTTIME;
    
    //$_POST['ID']='Mg==';
    if(isset($_POST['ID']) && $_POST['ID']!="")
    {
        $id=base64_decode($_POST['ID']);
        
        $delete_img=$obj->select("image","product_images","ID='$id'")[0][0];
        
        if($delete_img!="")
        {
            if(unlink("../../../".$delete_img))
            {
                //echo 'deleted';
            }
            else
            {
                //echo "not";
            }
        }
        
        //Delete images
        $query = "DELETE FROM `product_images` WHERE `ID`='$id'";
        $obj->execute($query);
        
        $data['response'] = 'y';
        $data['message'] = 'Image delete successfully';
        echo json_encode($data);
    }
    else
    {
        $data['response'] = 'n';
        $data['message'] = 'All field required';
        echo json_encode($data);
    }
?>