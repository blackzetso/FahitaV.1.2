<?php 
    session_start();
    include '../../connect.php';
    include '../App/function.php';

    $fname  = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    //$lname  = filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
    $email  = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $pass   = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $phone  = filter_var($_POST['phone'],FILTER_SANITIZE_STRING); 
    $hashed = md5($pass);

    $Errors = array();

    if(!$fname){
        $Errors[] = 'first name input is required';
    } 
    if(!$email){
        $Errors[] = 'email input is required';
    }
    if(!$pass){
        $Errors[] = 'password input is required';
    }
    if(!$phone){
        $Errors[] = 'phone number input is required';
    } 
    if(mb_strlen($pass) < 6){
        $Errors[] = 'password must be more than 5 characters';
    } 

    $Count  = getRowCount('users','email',$email); 

    if($Count > 0){
        echo errorMessage('هذا الحساب مسجل من قبل');
    } else { 
        if(empty($Errors)){ 
            $stmt = $con->prepare("INSERT INTO `users` 
                                   ( `full_name`,`email`, `password`,`phone_number`) 
                                  VALUES 
                                   (?,?,?,?)");
            $stmt->execute([$fname,$email,$hashed,$phone]);
            
            $_SESSION['id'] = getColumn('id','users','email',$email);
            redirect('index.php');
        }else{
            foreach($Errors as $error){
                echo errorMessage($error);
            }
        } 
    }
     