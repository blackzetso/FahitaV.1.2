<?php 
session_start();
include 'connect.php';

 
session_unset();
session_destroy(); 
header("location:login.php"); 
if (isset($_COOKIE['session'])) {
    unset($_COOKIE['session']); 
    setcookie('session', null, -1, '/'); 
    return true;
} else {
    return false;
}

exit();