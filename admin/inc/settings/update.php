<?php
    include '../../../connect.php'; 
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $shipping_cost = $_POST['shipping_cost'];
        
        $Errors = array(); 
 
        $stmt = $con->prepare("UPDATE settings SET shipping_cost = ? ");
        $stmt->execute([$shipping_cost]);
        if($stmt){
            echo successMessage('تم اضافة تعديل الإعدادات');
        } }