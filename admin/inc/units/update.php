<?php
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $id   = $_POST['id']; 
        
        if(!$name){
            echo errorMessage('لا يمكن ترك حقل الإسم فارغ');
        }else{
            
        $stmt = $con->prepare("UPDATE unit set name = ? WHERE id = ? ");
        $stmt->execute([$name,$id]);
        
        if($stmt){
            echo successMessage('تم تعديل الوحدة بنجاح');
        } }
    }
    