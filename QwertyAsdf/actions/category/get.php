<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    $today = CURRENTTIME;
    
    //$_POST['ID']="Mg==";
    
    if(isset($_POST['ID']) && $_POST['ID']!="")
    {
        $ID=base64_decode($_POST['ID']);
        
        $get_data = $obj->select("*", "category", "ID='$ID'");
        if(is_array($get_data))
        {
            $type_id=$get_data[0][5];
            
            $option_html="<option value=''>Select Type</option>";
            if($type_id==0)
            {
                $option_html.="<option value='0' selected>Top Product</option>";
            }
            else
            {
                $option_html.="<option value='1' selected>Best Seller</option>";
            }
            
            $data['response']="y";
            $data['cat_id']=$get_data[0][0];
            $data['name']=$get_data[0][1];
            $data['option_html']=$option_html;
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