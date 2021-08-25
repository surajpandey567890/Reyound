<?php
session_start();

$path = "../signin.php";
unset($_SESSION['session_ap_dombivlikar']);
//session_destroy();

header("Location:$path");
?>