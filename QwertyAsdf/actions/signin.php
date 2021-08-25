<?php
session_start();
require('../../common/library.php');

//$_POST['username']="ad_dict";	
//$_POST['pwd']="admin";


if(isset($_POST['username']) && isset($_POST['pwd']) && $_POST['username']!='' && $_POST['pwd']!=''){
	
		$username = $_POST['username'];
        $username =str_replace(" ","",str_replace("'","",$username));
		//echo $username;
		$password = $_POST['pwd'];
        $password = str_replace(" ","",str_replace("'","",$password));
		
		$record = $obj->select("*","admin_login","email='$username' OR mobileno='$username'");
		if(is_array($record)){
             $dbhash = $record[0][3];
             $db_salt= $record[0][4];
             
            
             
            $pass = hash('sha256', $password . $db_salt); 
    		for($round = 0; $round < 65536; $round++) 
    		{ 
    			$pass = hash('sha256', $pass . $db_salt); 
    		}
    		
    		$newhash=$pass;
    		$dbhash = str_replace(" ","",$dbhash);
    		$newhash =str_replace(" ","",$newhash);
  
        	//	echo $dbhash." <br> ".$newhash;
        		if(strcmp($dbhash,$newhash) == 0)
        		{
            		    $data["response"]='y';
                        $_SESSION["session_ap"] = $record[0][0];
                        $_SESSION["ADMIN_USERNAME"] =$record[0][1];
                        $_SESSION["ADMIN_TYPE"] =$record[0][5];
                        $_SESSION["LOGIN_EMAIL"] =$record[0][2];
                        echo json_encode($data);
                 
                }
                else
                {
                    $data["response"]='n';
                    $data["message"]='Invalid login credentials';
                    echo json_encode($data);
                }
            }
            else{
                $data["response"]='n';
                    $data["message"]='Invalid login credentials';
                echo json_encode($data);
	          }

		}
else{
    $data["response"]='n';
    $data["message"]='All Fields Required';
    echo json_encode($data);
  }

?>

