<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id  = $_POST['id'];
    $number = $_POST['number'];
    $url  = $_POST['url'];
    
    $stmt = $con->prepare("UPDATE slides SET number = ? , url = ? WHERE id = ? ");
    $stmt->execute([$number,$url,$id]);
    if($stmt){
        echo successMessage('تم تعديل بيانات القسم بنجاح');
    }
 }