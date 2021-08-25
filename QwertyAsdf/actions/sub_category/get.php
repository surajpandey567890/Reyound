<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    $today = CURRENTTIME;
    
    //$_POST['ID']="Mg==";
    
    if(isset($_POST['ID']) && $_POST['ID']!="")
    {
        $ID=base64_decode($_POST['ID']);
        
        $get_data = $obj->select("*", "sub_category", "ID='$ID'");
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
            }
            else
            {
                $data['response']="n";
                $data['message']="Data not found";
                echo json_encode($data);
            }
            
             
            $data['response']="y";
            $data['id']=$get_data[0][0];
            $data['name']=$get_data[0][2];
            $data['cate_html']=$cate_html;
            $data['message']="Data found";
            echo json_encode($data);
    }
    else
    {
        $data['response']="n";
        $data['message']="All fields required";
        echo json_encode($data);
    }
?>