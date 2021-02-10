<?php  
    include '../../../connect.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        
        $stmt = $con->prepare("DELETE FROM `bottom_ads` WHERE id = $id");
        $stmt->execute();
    }  