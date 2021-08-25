<?php
session_start();
$path = "signin.php";
unset($_SESSION['session_ap']);
session_destroy();
header("Location: $path");
?>