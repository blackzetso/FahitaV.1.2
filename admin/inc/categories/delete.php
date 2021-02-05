<?php  
    include '../../../connect.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        
        $stmt = $con->prepare("DELETE FROM `categories` WHERE id = $id");
        $stmt->execute();
    }  