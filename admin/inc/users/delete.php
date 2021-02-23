<?php  
    include '../../../connect.php';
    include '../../../inc/App/function.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id']; 
        
        $stmt = $con->prepare("DELETE FROM `users` WHERE id = $id");
        $stmt->execute(); 

        if($stmt){
            redirect('users.php');
        } 
    }  