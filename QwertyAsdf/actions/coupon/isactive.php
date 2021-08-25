<?php
require('../../../common/library.php');
// echo $_POST['id'];
//     exit;
if(isset($_POST['id']) && $_POST['id']!=""):

	$cid = $_POST['id'];
    // echo $cid;
    // exit;
    $query = "UPDATE coupons SET status=(!status) WHERE ID=$cid";
    $obj->execute($query);
    
        $data['response'] = 'y';
       $data['message']= 'Status updated successfully';
       echo json_encode($data);
       exit;
  else:
      $data['response'] = 'n';
       $data['message']= 'ID not set';
       echo json_encode($data);
       exit;
  endif;
    ?>
