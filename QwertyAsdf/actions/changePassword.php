<?php
session_start();
require('../../common/library.php');

// $_POST['old_password'] = "admin";
// $_POST['new_password'] = "admin1";
// $_POST['confirm_password'] = "admin1";

if(isset($_POST['old_password']) && $_POST['old_password']!="" &&
   isset($_POST['new_password']) && $_POST['new_password']!="" &&
   isset($_POST['confirm_password']) && $_POST['confirm_password']!=""
  ):
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $admin_id = $_SESSION["session_ap"];
    //echo $admin_id;
    if($new_password = $confirm_password):
     
        $admin_data = $obj->select("*","admin_login","ID='$admin_id'");
        if(is_array($admin_data))
        {
            $db_hash = $admin_data[0][3];
            $db_salt = $admin_data[0][4];
            
           $db_salt = str_replace(" ","",$db_salt);
           
                //check oldpassword encreaption
                $password = hash('sha256', $old_password . $db_salt); 
        		for($round = 0; $round < 65536; $round++) 
        		{ 
        			$password = hash('sha256', $password . $db_salt); 
        		}
        		
        		$db_hash = str_replace(" ","",$db_hash);
        	    $password = str_replace(" ","",$password);
        		if(strcmp($db_hash,$password)==0)
        		{
        		    
        		        //encreaption 
                        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));	
                        $password = hash('sha256', $new_password . $salt); 
                        for($round = 0; $round < 65536; $round++) 
                        { 
                        	$password = hash('sha256', $password . $salt); 
                        }
                        $hash = $password;
    
                      //**************
        		     
        		        $obj->execute("UPDATE admin_login SET hash='$hash',salt='$salt' WHERE ID='$admin_id'");
                        $data['response']="y";
                        $data['message']="Password changed successfully";
        		}
                else{
                $data['response']="n";
                $data['message']="Current password does not match";
                }
           }
         else{
            $data['response']="n";
            $data['message']="Current password does not match";
         }
         
         else:
             $data['response']="n";
            $data['message']=" Confirm password does not match";
             
         endif;
else:
    $data['response']="n";
    $data['message']="All fields required";
endif;
 
echo json_encode($data);
    
?>