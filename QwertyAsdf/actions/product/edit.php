<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    
    $today = CURRENTTIME;
    
    /*error_log(print_r($_POST,true));
    die();*/
    
    if(isset($_POST['product_id']) && $_POST['product_id']!="" && isset($_POST['cate_id_edit']) && $_POST['cate_id_edit']!="" && isset($_POST['sub_cate_id_edit']) && $_POST['sub_cate_id_edit']!="" && isset($_POST['name_edit']) && $_POST['name_edit']!="" 
    && isset($_POST['product_price_edit']) && $_POST['product_price_edit']!="" && isset($_POST['offer_price_edit']) && $_POST['offer_price_edit']!="" && isset($_POST['stock_edit']) && $_POST['stock_edit']!=""
    && isset($_POST['description_edit']) && $_POST['description_edit']!="" && isset($_POST['sub_main_cate_id_edit']) && $_POST['sub_main_cate_id_edit']!=""&& isset($_POST['hsn_code_edit']) && $_POST['hsn_code_edit'] != ""&& isset($_POST['gst_id_edit']) && $_POST['gst_id_edit'] != ""&& isset($_POST['colour_id_edit']) && $_POST['colour_id_edit'] != ""&& isset($_POST['size_id_edit']) && $_POST['size_id_edit'] != ""&& isset($_FILES['images_edit']) && $_FILES['images_edit']['name']!="")
    {
        $product_id=$_POST['product_id'];
        
        $product_price_edit=$_POST['product_price_edit'];
        $offer_price_edit=$_POST['offer_price_edit'];
        
        $category=$_POST['cate_id_edit'];
        $sub_category=$_POST['sub_cate_id_edit'];
        $sub_main_cate_id_edit=$_POST['sub_main_cate_id_edit'];
  
        @$image=$_FILES['image_edit'];
        $images_edit=$_FILES['images_edit'];
        
        $stock_edit=$_POST['stock_edit'];
         $hsn_code_edit = $_POST['hsn_code_edit'];
         $gst_id_edit = $_POST['gst_id_edit'];
         $colour_id_edit = $_POST['colour_id_edit'];
         $size_id_edit = $_POST['size_id_edit'];
        $name=trim(htmlentities(ucfirst($_POST['name_edit']),ENT_QUOTES));
        $short_description_edit=trim(htmlentities($_POST['short_description_edit'],ENT_QUOTES));
        $description_edit=trim(htmlentities($_POST['description_edit'],ENT_QUOTES));

        $type = array("image/gif","image/png","image/jpeg","image/jpg","image/webp");
        $max_size = 2*1024*1024;
        
        // $path = "../../img/product";
          $path = "../../../images/product_main/";
                   // $db_path = "images/product/";
        
        $image_name = $obj->upload_file($image, $type, $max_size, $path);
        $final_path = "images/product_main/".$image_name[0];
        
        $update_query = "UPDATE `product` SET `cat_id`='$category',`sub_cat_id`='$sub_category',`sub_main_cat_id`='$sub_main_cate_id_edit',`name`='$name',`description`='$description_edit',`product_price`='$product_price_edit',`offer_price`='$offer_price_edit',`stock`='$stock_edit',`short_description`='$short_description_edit',`images_edit`='$final_path',`hsn_code`='$hsn_code_edit',`gst_id`='$gst_id_edit',`colour_id`='$colour_id_edit',`size_id`='$size_id_edit'WHERE `ID`='$product_id'";
        $obj->execute($update_query);

        
        if(isset($_FILES['image_edit']) && $_FILES['image_edit']['name']!="")
        {
            $image=$_FILES['image_edit'];
        
            $type = array("image/gif","image/png","image/jpeg","image/jpg");
            $max_size = 2*1024*1024;
            $path = "../../../images/product/";
    
            $kk_imgs = $obj->multiple_upload_file($image, $type, $max_size, $path);
            if(is_array($kk_imgs))
            {
                foreach($kk_imgs as $key=>$value) 
                {
                    $final_path = "images/product/".$value;
                    $insert_img = $obj->insert("product_images","`product_id`, `image`, `createdon`","'$product_id','$final_path','$today'");
                }
            }
        }
        else
        {
            //do nothing
        }
        
        $data['response'] = "y";
        $data['error'] = false;
        $data['message'] = "Product detail updated successfully";
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