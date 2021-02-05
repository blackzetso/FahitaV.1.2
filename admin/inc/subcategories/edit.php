<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id  = $_POST['id'];
    $name = $_POST['name']; 
    $order = $_POST['order'];
        
    $stmt = $con->prepare("UPDATE subcategories SET name = ? , category_order = ? WHERE id = ? ");
    $stmt->execute([$name,$order,$id]);
    if($stmt){
        echo successMessage('تم تعديل بيانات القسم بنجاح');
    } 
 } 