<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    $today = CURRENTTIME;
    
    //$_POST['ID']="Mg==";
    
    if(isset($_POST['ID']) && $_POST['ID']!="")
    {
        $ID=$_POST['ID'];
        
        $get_data = $obj->select("*", "claims", "ID='$ID'");
        if(is_array($get_data))
        {
            $claim_id=$get_data[0][1];
           
            $data['response']="y";
            $data['claim_id']=$get_data[0][0];
            $data['description']=$get_data[0][3];
            $data['short_description']=$get_data[0][4];
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