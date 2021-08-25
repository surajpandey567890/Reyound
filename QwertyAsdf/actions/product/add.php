<?php
 session_start();
require ('../../../common/library.php');
require ('../../../common/constant.php');

$today = CURRENTTIME;

if (isset($_POST['cate_id']) && $_POST['cate_id'] != "" && isset($_POST['sub_cate_id']) && $_POST['sub_cate_id'] != "" && isset($_POST['sub_main_cate_id']) && $_POST['sub_main_cate_id'] != "" && isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['sku']) && $_POST['sku'] != "" && isset($_POST['product_price']) && $_POST['product_price'] != "" && isset($_POST['offer_price']) && $_POST['offer_price'] != "" && isset($_POST['stock']) && $_POST['stock'] != "" && isset($_POST['short_description']) && $_POST['short_description'] != "" && isset($_POST['description']) && $_POST['description'] != ""&& isset($_POST['hsn_code']) && $_POST['hsn_code'] != ""&& isset($_POST['gst_id']) && $_POST['gst_id'] != ""&& isset($_POST['colour_id']) && $_POST['colour_id'] != ""&& isset($_POST['size_id']) && $_POST['size_id'] != ""&& isset($_FILES['image']) && $_FILES['image']['name']!="")
{
    $name = htmlentities(ucfirst($_POST['name']) , ENT_QUOTES);
    $description = htmlentities($_POST['description'], ENT_QUOTES);
    $cat_id = $_POST['cate_id'];
    $sub_cate_id = $_POST['sub_cate_id'];
    $sub_main_cate_id = $_POST['sub_main_cate_id'];
    $product_price = $_POST['product_price'];
    $offer_price = $_POST['offer_price'];
    $stock = $_POST['stock'];
    $sku = $_POST['sku'];
    $hsn_code = $_POST['hsn_code'];
    $gst_id = $_POST['gst_id'];
    $colour_id = $_POST['colour_id'];
    $size_id = $_POST['size_id'];
    $image=($_FILES['image']);
    $short_description = htmlentities($_POST['short_description'], ENT_QUOTES);

    $checkSKU = $obj->select("*", "product", "sku='$sku'");
    if (is_array($checkSKU))
    {
        $data['response'] = "n";
        $data['message'] = "SKU already exist";
        echo json_encode($data);
    }
    else
    {
        $check = $obj->select("*", "product", "name='$name' AND cat_id='$cat_id' AND sub_cat_id='$sub_cate_id' AND sub_main_cat_id='$sub_main_cate_id'");
        if (is_array($check))
        {
            $data['response'] = "n";
            $data['message'] = "Product already exist";
            echo json_encode($data);
        }
        else
        {
            $inserted_id = $obj->insert("product", "`cat_id`, `sub_cat_id`, `sub_main_cat_id`, `name`, `sku`, `description`, `product_price`, `offer_price`, `stock`, `status`, `createdon`,`short_description`,`added_by`,`hsn_code`,`gst_id`,`colour_id`,`size_id`", "'$cat_id','$sub_cate_id','$sub_main_cate_id','$name','$sku','$description','$product_price','$offer_price','$stock','1','$today','$short_description','".$_SESSION['session_ap']."','$hsn_code','$gst_id','$colour_id','$size_id'");

            $obj->ProductAdded($_SESSION['LOGIN_EMAIL']);
            if ($inserted_id != "")
            {
                if (isset($_FILES["image"]) && $_FILES["image"]['name'] != "")
                {

                    $image = $_FILES["image"];
                    //print_r($medical_doc);
                    $type = array(
                        "image/gif",
                        "image/png",
                        "image/jpeg",
                        "image/jpg"
                    );
                    $max_size = 2 * 1024 * 1024;
                    $path = "../../../images/product_main/";
                    $db_path = "images/product_main/";

                    $image_path = $obj->upload_file($image, $type, $max_size, $path);

                    $obj->execute("update product set image_main='$image_path' where ID='$inserted_id'");
                }
                if (isset($_FILES["images"]) && $_FILES["images"]['name'] != "")
                {

                    $images = $_FILES["images"];
                    //print_r($medical_doc);
                    $type = array(
                        "image/gif",
                        "image/png",
                        "image/jpeg",
                        "image/jpg"
                    );
                    $max_size = 2 * 1024 * 1024;
                    $path = "../../../images/product/";
                    $db_path = "images/product/";

                    $images_path = $obj->multiple_upload_file($images, $type, $max_size, $path);

                    foreach ($images_path as $key => $value)
                    {
                        $obj->insert("product_images", "`product_id`, `image`, `createdon`", "'$inserted_id','$db_path$value','$today'");
                    }
                }
            }
            
            
                $data['response'] = "y";
                $data['message'] = "Product added successfully";
                echo json_encode($data);
            
        }
    }
}
else
{
    $data['response'] = "n";
    $data['message'] = "All Field Required";
    echo json_encode($data);
}
