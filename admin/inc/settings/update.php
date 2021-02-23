<?php
    include '../../../connect.php'; 
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $shipping_cost = $_POST['shipping_cost'];
        $users_auto_approved = $_POST['users_auto_approved'];
        
        
        $Errors = array(); 
 
        $stmt = $con->prepare("UPDATE settings SET shipping_cost = ? , users_auto_approved = ? ");
        $stmt->execute([$shipping_cost,$users_auto_approved]);
        if($stmt){
            echo successMessage('تم اضافة تعديل الإعدادات');
        } }