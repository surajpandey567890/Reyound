<?php
 session_start();
require ('../../../common/library.php');
require ('../../../common/constant.php');


$today = CURRENTTIME;
    if(isset($_POST['staff_id']) && $_POST['staff_id']!=""&&
        isset($_POST['name_edit']) && $_POST['name_edit']!="" &&
        isset($_POST['mobileno_edit']) && $_POST['mobileno_edit']!="" &&
        isset($_POST['email_edit']) && $_POST['email_edit']!="" )
        
{       
        $staff_id=$_POST['staff_id'];
        $name_edit=ucfirst(trim(htmlentities($_POST['name_edit'],ENT_QUOTES)));
        $mobileno_edit=ucfirst(trim(htmlentities($_POST['mobileno_edit'],ENT_QUOTES)));
        $email_edit=trim(htmlentities($_POST['email_edit'],ENT_QUOTES));
        $createdon = date("Y-m-d H:i:s");
        

    

     $update_query = "UPDATE `admin_login` SET `name`='$name_edit',`email`='$email_edit',`mobileno`='$mobileno_edit',`created_on`='$createdon' WHERE `ID`='$staff_id'";
        $update = $obj->execute($update_query);

 if ($update != "")
            {
                if (isset($_POST["address_edit"]) && $_POST["address_edit"]!= ""&&
                    isset($_POST["work_as_edit"]) && $_POST["work_as_edit"]!= ""&&
                    isset($_POST["salary_edit"]) && $_POST["salary_edit"]!= "")
                {
                     $address_edit=ucfirst(trim(htmlentities($_POST['address_edit'],ENT_QUOTES)));
                     $work_as_edit=ucfirst(trim(htmlentities($_POST['work_as_edit'],ENT_QUOTES)));
                     $salary_edit=trim(htmlentities($_POST['salary_edit'],ENT_QUOTES));
                     $createdon = date("Y-m-d H:i:s");

       

          $update_query = "UPDATE `staff` SET `address`='$address_edit',`work_as`='$work_as_edit',`salary`='$salary_edit',`createdon`='$createdon' WHERE `staff_id`='$staff_id'";
              $update = $obj->execute($update_query);

                $data['response'] = "y";
                $data['message'] = "Staff updated successfully";
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

?>