<?php
    session_start();
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    $email  = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $pass   = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $hashed = md5($pass);

    $Count = getRowCount('users','email',$email);

    if($Count > 0){
          $stmt = $con->prepare("SELECT id,email,password FROM `users` WHERE email = ? AND password = ? AND permission = 'admin' ");
          $stmt->execute([$email,$hashed]);
          $row = $stmt->fetch(); 
          $count = $stmt->rowCount();
        
          if($count > 0){
              $_SESSION['admin'] = $row['id'];
              redirect('index.php');
          }else{
              echo errorMessage('لقد ادخلت بيانات غير صحيحة');
          }
            
    }else {
        echo errorMessage('هذا الحساب غير مسجل من قبل');
    }