<?php
    include '../connect.php'; 
    include '../inc/App/function.php';
    $response=array();
    header('Content-Type: JSON');
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        if(isset($_POST['name'])){
            $fname  = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        }
        if(isset($_POST['email'])){
            $email  = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
        }
        //$lname  = filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
        if(isset($_POST['password'])){
            $password   = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
            $hashed = md5($_POST['password']);
        }
    
       if(isset($_POST['phone'])){
        $phone  = filter_var($_POST['phone'],FILTER_SANITIZE_STRING); 
        }
        
        
       
        
        $Errors=array();
        
        if(!isset($fname)){
            $Errors[] = 'name input is required';
        } 
        if(!isset($email)){
            $Errors[] = 'email input is required';
        }
        if(!isset($password)){
            $Errors[] = 'password input is required';
        }
        if(!isset($phone)){
            $Errors[] = 'phone number input is required';
        } 
        
        if(isset($password) && mb_strlen($password) < 6){
            $Errors[] = 'password must be more than 5 characters';
        } 
    
        
        
            if(empty($Errors)){ 
                
                $Count  = getRowCount('users','email',$email); 
                if($Count>0){
                    $response[]='هذا الحساب مسجل من قبل';
                }
                else {
                    $stmt = $con->prepare("INSERT INTO `users` 
                    ( `full_name`,`email`, `password`,`phone_number`) 
                   VALUES 
                    (?,?,?,?)");
                    $stmt->execute([$fname,$email,$hashed,$phone]);

                    $stmt2 = $con->prepare("SELECT * FROM users where email='{$email}'");
                    $stmt2->execute();
                    $user = $stmt2->fetch();
                    $response['message']="succesfully register";
                    $response['user']['id']=$user['id'];
                    $response['user']['name']=$user['full_name'];
                    $response['user']['phone']=$user['phone_number'];
                    $response['user']['email']=$user['email'];
                }
                
                
            }
            else{
                foreach($Errors as $error){
                    $response['errors'][]=$error;
                }
            } 
    
            
        
        
        }
        else  {
            $response[]='get request is not available for this link' ;
        }
    
    echo json_encode($response);
?>