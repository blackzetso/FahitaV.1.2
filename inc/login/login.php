<?php
    session_start();
    include '../../connect.php';
    include '../App/function.php';

    $stmt = $con->prepare("SELECT * FROM settings ");
    $stmt->execute();
    $settings = $stmt->fetch();

    $email  = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $pass   = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $hashed = md5($pass);  

    $Count = getRowCount('users','email',$email);

    if($Count > 0){
          if($settings['users_auto_approved'] == '0'){
              $stmt = $con->prepare("SELECT id,email,password FROM `users` WHERE email = ? AND password = ? ");
              $stmt->execute([$email,$hashed]);
              $row = $stmt->fetch(); 
              $count = $stmt->rowCount();

              if($count > 0){ 
                    $_SESSION['id'] = $row['id'];
                    setcookie('session',$_SESSION['id'],time()+(86400 * 365),"/");
                    redirect('index.php'); 
              }else{
                  echo errorMessage('لقد ادخلت بيانات غير صحيحة');
              }
          }else{
              $stmt = $con->prepare("SELECT id,email,password,approve FROM `users` WHERE email = ? AND password = ? ");  
              $stmt->execute([$email,$hashed]);
              $row = $stmt->fetch(); 
              $count = $stmt->rowCount();

               if($count > 0){ 
                    $stmt = $con->prepare("SELECT id,email,password,approve FROM `users` WHERE email = ? AND password = ? AND approve = 1 ");  
                    $stmt->execute([$email,$hashed]);
                    $row = $stmt->fetch(); 
                    $approve = $stmt->rowCount();

                    if($approve > 0){
                        $_SESSION['id'] = $row['id'];
                        setcookie('session',$_SESSION['id'],time()+(86400 * 365),"/");
                        redirect('index.php'); 
                    }else{
                        echo warningMessage('بانتظار تفعيل حسابك من قبل الإدارة');
                    }
               }else{
                   echo errorMessage('لقد ادخلت بيانات غير صحيحة');
               }
              
          }
    }else {
        echo errorMessage('هذا الحساب غير مسجل من قبل');
    }