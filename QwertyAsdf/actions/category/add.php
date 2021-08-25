<?php
require('../../../common/library.php');
require('../../../common/constant.php');

if(isset($_POST['cate_name']) && $_POST['cate_name']!="" && isset($_POST['type_id']) && $_POST['type_id']!="")
{
        $name = ucfirst(htmlentities($_POST['cate_name'], ENT_QUOTES));

        $type_id=$_POST['type_id'];
        $createdon = date("Y-m-d H:i:s");
        //$eng_title=$_POST['eng_title'];
        
        $check_cat = $obj->select("*","category","name='$name'");
        if(is_array($check_cat))
        {
            $data['response']="n";
        	$data['message']="Category already exist";
        	echo json_encode($data);
        }
        else
        {
            $inserted_id=$obj->insert("category","`name`, `createdon`,`type_id`","'$name','$createdon','$type_id'");

           
                    $data['response']="y";
                    $data['message']="Category added successfully";
                    echo json_encode($data); 
                   
            }
                          
        
     
}
else
{
        $data['response']="n";
    	$data['message']="All field required";
    	echo json_encode($data);
}
