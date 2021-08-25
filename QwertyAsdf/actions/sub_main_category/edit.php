<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    
    $today = CURRENTTIME;
    //error_log(print_r($_POST,true));

    if(isset($_POST['cate_id_edit']) && $_POST['cate_id_edit']!="" && isset($_POST['name_edit']) && $_POST['name_edit']!=""  
    && isset($_POST['sub_cate_id_edit']) && $_POST['sub_cate_id_edit']!="" && isset($_POST['sub_cat_id']) && $_POST['sub_cat_id']!="")
    {
        $id=$_POST['sub_cat_id'];
        $cat_id=$_POST['cate_id_edit'];
        $sub_id=$_POST['sub_cate_id_edit'];
        $name=trim(htmlentities($_POST['name_edit'],ENT_QUOTES));
        $sub_cate_id_edit=$_POST['sub_cate_id_edit'];
        
        $checkName= $obj->select("subcat_name","sub_main_category","ID='$id'")[0][0];        
        if($checkName==$name)
        {
            $update_query = "UPDATE `sub_main_category` SET `cat_id`='$cat_id',`subcat_id`='$sub_id',`subcat_name`='$name' WHERE `ID`='$id'";
            $obj->execute($update_query);
            
            $data['response'] = "y";
            $data['error'] = false;
            $data['message'] = "Sub main category updated successfully";
            echo json_encode($data);
        }
        else
        {
            $check_subcat = $obj->select("*","sub_main_category","subcat_name='".$name."' AND cat_id='$cat_id'");
            if(is_array($check_subcat))
            {
                $data['response']="n";
            	$data['message']="Sub main category already exist";
            	echo json_encode($data);
            }
            else
            {
                $update_query = "UPDATE `sub_main_category` SET `cat_id`='$cat_id',`subcat_id`='$sub_id',`subcat_name`='$name' WHERE `ID`='$id'";
                $obj->execute($update_query);
                
                $data['response'] = "y";
                $data['error'] = false;
                $data['message'] = "Sub main category updated successfully";
                echo json_encode($data);
            }
        }
    }
    else
    {
        $data['response'] = "n";
        $data['error'] = true;
        $data['message'] = "All field required";
        echo json_encode($data);
    }
?>