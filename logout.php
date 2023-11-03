<?php 
session_start();
session_destroy();

setcookie("user_email", $email ,time() + (-86400 * 7),"/");
header("Location:index.php?durum=exit");




?>