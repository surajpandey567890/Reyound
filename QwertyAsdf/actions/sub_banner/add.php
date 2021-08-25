   <?php
    require('../../../common/library.php');
    require('../../../common/constant.php');
    
    $today = CURRENTTIME;
    
    //print_r($_POST);
    
    if(isset($_FILES['image']) && $_FILES['image']['name']!="" &&
        isset($_POST['heading']) && $_POST['heading']!="" &&
        isset($_POST['sub_heading']) && $_POST['sub_heading']!="" &&
        isset($_POST['link']) && $_POST['link']!="" )
    {
       
        $image=($_FILES['image']);
        $heading=ucfirst(trim(htmlentities($_POST['heading'],ENT_QUOTES)));
        $sub_heading=ucfirst(trim(htmlentities($_POST['sub_heading'],ENT_QUOTES)));
        $link=trim(htmlentities($_POST['link'],ENT_QUOTES));
        
        $createdon = date("Y-m-d H:i:s");
        
        $type = array("image/gif","image/png","image/jpeg","image/jpg","image/webp");
        $max_size = 2*1024*1024;
        
        $path = "../../img/sub_banner";
        
        $image_name = $obj->upload_file($image, $type, $max_size, $path);
        $final_path = "img/sub_banner/".$image_name[0];

        
     
                $insert=$obj->insert("sub_banner","`image`,`heading`,`sub_heading`,`link`,`createdon`, `status`","'$final_path','$heading','$sub_heading','$link','$today',1");
                
                if($insert>0)
                {
                    $data['response'] = "y";
                    $data['error'] = false;
                    $data['message'] = "Sub Banner added successfully";
                    echo json_encode($data);
                }
                else
                {
                    $data['response'] = "n";
                    $data['error'] = true;
                    $data['message'] = "Something went wrong";
                    echo json_encode($data);
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