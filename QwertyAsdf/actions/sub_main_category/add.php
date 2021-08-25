<?php

require('../../../common/library.php');
require('../../../common/constant.php');

if(isset($_POST['cate_id']) && $_POST['cate_id']!="" && isset($_POST['cate_name']) && $_POST['cate_name']!=""
&& isset($_POST['sub_cate_id']) && $_POST['sub_cate_id']!="")
{
        $cat_id=$_POST['cate_id'];
        $sub_cate_id=$_POST['sub_cate_id'];
        $name = htmlentities(ucfirst($_POST['cate_name']), ENT_QUOTES);
        $createdon = date("Y-m-d H:i:s");

        $check_subcat = $obj->select("*","sub_main_category","subcat_name='$name'");
        if(is_array($check_subcat))
        {
            $data['response']="n";
            $data['message']="Sub main category already exist";
            echo json_encode($data);
        }
        else
        {
            $inserted_id=$obj->insert("sub_main_category","`cat_id`, `subcat_id`, `subcat_name`,`status`, `createdon`","'$cat_id', '$sub_cate_id','$name',1,'$createdon'");

                 $data['response']="y";
                 $data['message']="Sub main category added successfully";
                 echo json_encode($data);
                  }
}
else
{
        $data['response']="n";
        $data['message']="All field required";
        echo json_encode($data);
}

    
     
?>