<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    $today = CURRENTTIME;
    
    //$_POST['ID']="MjE=";
    
    if(isset($_POST['ID']) && $_POST['ID']!="")
    {
        $ID=base64_decode($_POST['ID']);
        
        $get_data = $obj->select("*", "sub_main_category", "ID='$ID'");
        if(is_array($get_data))
        {
            $cat_id=$get_data[0][1];
            
            $cat_data=$obj->select("ID,name","category","status=1");
        
            $cate_html="";
            if(is_array($cat_data))
            {
                $cate_html.="<option value=''>Select Category</option>";
                foreach($cat_data as $value)
                {
                    if($value[0]==$cat_id)
                    {
                        $cate_html.="<option value='".$value[0]."' selected>".$value[1]."</option>";
                    }
                    else
                    {
                        $cate_html.="<option value='".$value[0]."'>".$value[1]."</option>";
                    }
                    
                }   
               
            }
            
            $sub_id=$get_data[0][2];
            
            $sub_cat_data=$obj->select("ID,subcat_name","sub_category","status=1");
        
            $sub_html="";
            if(is_array($sub_cat_data))
            {
                $sub_html.="<option value=''>Select Subcategory</option>";
                foreach($sub_cat_data as $value)
                {
                    if($value[0]==$sub_id)
                    {
                        $sub_html.="<option value='".$value[0]."' selected>".$value[1]."</option>";
                    }
                    else
                    {
                        $sub_html.="<option value='".$value[0]."'>".$value[1]."</option>";
                    }
                    
                }   
               
            }
        

            $data['response']="y";
            $data['id']=$get_data[0][0];
            $data['name']=$get_data[0][3];
            $data['cate_html']=$cate_html;
            $data['sub_html']=$sub_html;
            $data['message']="Data found";
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