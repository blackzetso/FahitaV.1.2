<?php 
session_start();
include '../connect.php';

 
session_unset();
session_destroy(); 
header("location:login.php"); 
exit();