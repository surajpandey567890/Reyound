<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    $today = CURRENTTIME;
    
    //$_POST['ID']="Mg==";
    
    if(isset($_POST['ID']) && $_POST['ID']!="")
    {
        $ID=$_POST['ID'];
        
        $get_data = $obj->select("*", "product", "ID='$ID'");
        if(is_array($get_data))
        {
            $cate_id=$get_data[0][1];
           
            $data['response']="y";
            $data['product_id']=$get_data[0][0];
            $data['description']=html_entity_decode($get_data[0][6]);
            $data['short_description']=html_entity_decode($get_data[0][12]);
            $data['message']="Data found";
            echo json_encode($data);
        }
        else
        {
            $data['response']="n";
            $data['message']="Data not found";
            echo json_encode($data);
        }
    }
    else
    {
        $data['response']="n";
        $data['message']="All fields required";
        echo json_encode($data);
    }
?>