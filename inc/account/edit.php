<?php 
    session_start();
    include '../../connect.php';
    include '../App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_SESSION['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        $stmt = $con->prepare("UPDATE users SET full_name = ? , email = ? , phone_number = ?  WHERE id = ?");
        $stmt->execute([$name,$email,$phone,$id]);
        if($stmt){
           echo successMessage('تم تحديث بياناتك بنجاح');
        }
    }