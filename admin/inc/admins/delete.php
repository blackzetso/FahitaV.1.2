<?php  
    include '../../../connect.php';
    include '../../../inc/App/function.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $stmt = $con->prepare("SELECT * FROM `users` WHERE permission = 'admin' ");
        $stmt->execute();
        $count = $stmt->rowCount();
       
        if($count > 1){ 
             
            $stmt = $con->prepare("DELETE FROM `users` WHERE id = $id");
            $stmt->execute(); 
            
            if($stmt){
                redirect('admins.php');
            }
        }else {
           echo errorMessage('لا يمكنك حذف المسؤل الوحيد'); 
        }
    }  