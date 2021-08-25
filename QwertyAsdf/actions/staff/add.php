<?php
 session_start();
require ('../../../common/library.php');
require ('../../../common/constant.php');

$today = CURRENTTIME;
 if(isset($_POST['name']) && $_POST['name']!="" &&
        isset($_POST['mobileno']) && $_POST['mobileno']!="" &&
        isset($_POST['email']) && $_POST['email']!="" &&
        isset($_POST['password']) && $_POST['password']!="")

{
        $name=ucfirst(trim(htmlentities($_POST['name'],ENT_QUOTES)));
        $mobileno=ucfirst(trim(htmlentities($_POST['mobileno'],ENT_QUOTES)));
        $email=trim(htmlentities($_POST['email'],ENT_QUOTES));
        $password = $_POST['password'];
       
        $createdon = date("Y-m-d H:i:s");

        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
                                $password = hash('sha256', $password . $salt);
                                for ($round = 0;$round < 65536;$round++)
                                {
                                    $password = hash('sha256', $password . $salt);
                                }
                                $hash = $password;

     $insert=$obj->insert("admin_login","`name`,`email`,`hash`,`salt`,`admin_type`,`status`,`mobileno`, `created_on`","'$name','$email','$hash','$salt',1,1,'$mobileno','$createdon'");

 if ($insert != "")
            {
                if (isset($_POST["address"]) && $_POST["address"]!= ""&&
                    isset($_POST["work_as"]) && $_POST["work_as"]!= ""&&
                    isset($_POST["salary"]) && $_POST["salary"]!= "")
                {
                     $address=ucfirst(trim(htmlentities($_POST['address'],ENT_QUOTES)));
                     $work_as=ucfirst(trim(htmlentities($_POST['work_as'],ENT_QUOTES)));
                     $salary=trim(htmlentities($_POST['salary'],ENT_QUOTES));
                     $createdon = date("Y-m-d H:i:s");

         $insert=$obj->insert("staff","`staff_id`,`address`,`work_as`,`salary`,`createdon`,`status`","'$insert','$address','$work_as','$salary','$createdon',1");

                $data['response'] = "y";
                $data['message'] = "Staff added successfully";
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