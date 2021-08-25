<?php
session_start();
$path = "signin.php";
unset($_SESSION['session_ap_dombivlikar']);
$_SESSION['session_ap_dombivlikar']=""; 
unset($_SESSION['session_ap_dombivlikar']);
$_SESSION['session_ap_dombivlikar']=""; 
session_regenerate_id(true);
session_destroy();
header("Location:$path");
?>