   <?php
    require('../../../common/library.php');
    require('../../../common/constant.php');
    
    $today = CURRENTTIME;
    
    //print_r($_POST);
    
    if(isset($_POST['description']) && $_POST['description']!="" && isset($_POST['author']) && $_POST['author']!="" )
    {
        $description_id=trim(htmlentities($_POST['description'],ENT_QUOTES));
        $author_id=trim(htmlentities($_POST['author'],ENT_QUOTES));
     
                $insert = $obj->insert("testimonial","`description`, `author`,`status`, `createdon`","'$description_id','$author_id',1,'$today'");
                
                if($insert>0)
                {
                    $data['response'] = "y";
                    $data['error'] = false;
                    $data['message'] = "Testimonial added successfully";
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