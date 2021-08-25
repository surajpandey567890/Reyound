<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    $today = CURRENTTIME;

 if(isset($_POST['ID']) && $_POST['ID']!="")
    {
        $ID=base64_decode($_POST['ID']);


        $get_data = $obj->select("*", "staff", "ID='$ID'");

        if(is_array($get_data))
        {
             $admin_id=$get_data[0][1];


            $admin=$obj->select("ID,name,email,mobileno","admin_login","ID='$admin_id' ORDER BY ID ASC");
            if(is_array($admin))
            {
                foreach($admin as $val)

                {
                    $name = html_entity_decode ($val[1],ENT_QUOTES);              
                    $email =$val[2];
                    $mobileno =$val[3];
                    
                }
            }
        }
            $data['response']="y";
            $data['staff_id']=$get_data[0][1];
            $data['name']=$name;
            $data['email']=$email;
            $data['mobileno']=$mobileno;
            $data["address"] = $get_data[0][2];
            $data["work_as"] = $get_data[0][3];
            $data["salary"] = $get_data[0][4];
            echo json_encode($data);
    }
              
     else
    {
        $data['response']="n";
        $data['message']="All fields required";
        echo json_encode($data);
    }
    ?>