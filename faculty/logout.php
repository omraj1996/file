<?php
session_start();
unset($_SESSION["password"]);
unset($_SESSION["userid"]);

session_destroy(); 
header("Location:../home.php");
?>
