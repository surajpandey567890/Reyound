<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    
    $today = CURRENTTIME;
    
 if(isset($_POST['ID']) && $_POST['ID']!="" && isset($_POST['description_edit']) && $_POST['description_edit']!="" && isset($_POST['author_edit']) && $_POST['author_edit']!="" )
   
    {   $ID=$_POST['ID'];
        
        $description_edit=trim(htmlentities($_POST['description_edit'],ENT_QUOTES));
        $author_edit=trim(htmlentities($_POST['author_edit'],ENT_QUOTES));
        
    
        
        $update_query = "UPDATE `testimonial` SET `description`='$description_edit',`author`='$author_edit' WHERE `ID`='$ID'";
        $obj->execute($update_query);
        
        $data['response'] = "y";
        $data['error'] = false;
        $data['message'] = "Testimonial updated successfully";
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