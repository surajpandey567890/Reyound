<?php

require('../../../common/library.php');
require('../../../common/constant.php');

if(isset($_POST['cate_id']) && $_POST['cate_id']!="" && isset($_POST['sub_cate_name']) && $_POST['sub_cate_name']!="")
{
        //&& isset($_POST['link']) && $_POST['link']!=""
        $cat_id=$_POST['cate_id'];
        $name = htmlentities(ucfirst($_POST['sub_cate_name']), ENT_QUOTES);
        $link = htmlentities($_POST['link'], ENT_QUOTES);
        $createdon = date("Y-m-d H:i:s");
    
        $check_subcat = $obj->select("*","sub_category","subcat_name='".$name."'");
        if(is_array($check_subcat))
        {
            $data['response']="n";
        	$data['message']="Sub category already exist";
        	echo json_encode($data);
        }
        else
        {
            $inserted_id=$obj->insert("sub_category","`cat_id`, `subcat_name`, `link`, `createdon`","'$cat_id','$name','$link','$createdon'");
            if($inserted_id !="")
            {
                    $data['response']="y";
                	$data['message']="Sub category added successfully";
                	echo json_encode($data); 
            }
            else
            {
                    $data['response']="n";
                	$data['message']="Something went wrong";
                	echo json_encode($data);            
            }
        }
}
else
{
    $data['response']="n";
	$data['message']="All field required";
	echo json_encode($data);
}
       
//header("Location: ../../subCategory.php");

?>