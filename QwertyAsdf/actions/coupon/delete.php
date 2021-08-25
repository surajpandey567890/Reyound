<?php

require('../../../common/library.php');

if(isset($_POST['ID']) && $_POST['ID']!="")
{
	$idArray = explode("-", $_POST['ID']);

	$id = $idArray[1];
    
    $check = $obj->select("*","orders","coupon_id ='$id' and status not in(3,4)");
    
    if(count($check)>0) 
    {
        $query = "DELETE FROM coupons where ID=$id";
        $obj->execute($query);
        echo "Data deleted successfully";
    }
    else
    {
         echo "Coupon detail use in order";
    }
}
else
{
    echo "ID Not Set !!";
}
?>