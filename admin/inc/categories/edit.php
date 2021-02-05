<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id  = $_POST['id'];
    $name = $_POST['name']; 
    
    $stmt = $con->prepare("UPDATE categories SET name = ? WHERE id = ? ");
    $stmt->execute([$name,$id]);
    if($stmt){
        echo successMessage('تم تعديل بيانات القسم بنجاح');
    }
 }