<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    
    $today = CURRENTTIME;
    //error_log(print_r($_POST,true));

    if(isset($_POST['cat_id']) && $_POST['cat_id']!="" && isset($_POST['cate_name_edit']) && $_POST['cate_name_edit']!=""  && isset($_POST['type_id_edit']) && $_POST['type_id_edit']!="")
    {
        $cat_id=$_POST['cat_id'];
        $type_id=$_POST['type_id_edit'];
        $name=trim(htmlentities($_POST['cate_name_edit'],ENT_QUOTES));
    
        $update_query = "UPDATE `category` SET `name`='$name',`type_id`='$type_id' WHERE `ID`='$cat_id'";
        $obj->execute($update_query);
        
        $data['response'] = "y";
        $data['error'] = false;
        $data['message'] = "Category updated successfully";
        echo json_encode($data);

    }
    else
    {
        $data['response'] = "n";
        $data['error'] = true;
        $data['message'] = "All field required";
        echo json_encode($data);
    }
?>