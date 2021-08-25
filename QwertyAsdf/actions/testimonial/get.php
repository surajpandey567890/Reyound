<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    $today = CURRENTTIME;
    
 
    
    if(isset($_POST['ID']) && $_POST['ID']!="")
    {
        $ID=base64_decode($_POST['ID']);
        
        $get_data = $obj->select("*", "testimonial", "ID='$ID'");
        if(is_array($get_data))
        {
            $data['response']="y";
            $data['ID']=$get_data[0][0];
            $data['description']=htmlspecialchars_decode($get_data[0][1],ENT_QUOTES);
            $data['author']=htmlspecialchars_decode($get_data[0][2],ENT_QUOTES);
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