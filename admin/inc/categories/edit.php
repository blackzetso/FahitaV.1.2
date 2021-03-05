<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id    = $_POST['id'];
    $name  = $_POST['name']; 
    $view  = isset($_POST['view']) ? '1' : '0';
    $Order = $_POST['Order'];
    
    $stmt = $con->prepare("UPDATE categories SET name = ? , order_number = ? , navbar = ? WHERE id = ? ");
    $stmt->execute([$name,$Order,$view,$id]);
    if($stmt){
        echo successMessage('تم تعديل بيانات القسم بنجاح');
    }
 }