<?php
    include_once '../connect.php'; 
    include '../inc/App/function.php';
    include_once '../inc/lib/php-jwt-master/src/BeforeValidException.php';
    include_once '../inc/lib/php-jwt-master/src/ExpiredException.php';
    include_once '../inc/lib/php-jwt-master/src/SignatureInvalidException.php';
    include_once '../inc/lib/php-jwt-master/src/JWT.php';
    use \Firebase\JWT\JWT;
    $response=array();
    header('Content-Type: JSON');
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        if(isset($_POST['email'])){
            $email  = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
        }
        //$lname  = filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
        if(isset($_POST['password'])){
            $password   = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
            $hashed = md5($_POST['password']);
        }
       
      
        $Errors=array();
        
      
        if(!isset($email)){
            $Errors[] = 'email input is required';
        }
        if(!isset($password)){
            $Errors[] = 'password input is required';
        }
        if(empty($Errors)){ 
            $Count = getRowCount('users','email',$email);
            if($Count==0){
                $response[]='ايميل غير مسجل من قبل';
            }
            else {
                $stmt = $con->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? ");
                $stmt->execute([$email,$hashed]);
                $row = $stmt->fetch(); 
                
                $count = $stmt->rowCount();
                if($count>0){
                    date_default_timezone_set('Africa/Cairo');
 
                    // variables used for jwt
                    $key ="test";
                    $issued_at = time();
                    $expiration_time = $issued_at + (3 * 60 * 60);
                    $token = array(
                        "iat" => $issued_at,
                        "exp" => $expiration_time,
                        "data" => array(
                            "id" => $row['id'],
                            "name" => $row['full_name'],
                            "email" => $row['email'],
                            'phone'=>$row['phone_number']
                        )
                     );
                  
                     // set response code
                     http_response_code(200);
                  
                     // generate jwt
                     $jwt = JWT::encode($token, $key);
                     $response['message']='login success';
                     $response['user']=$token['data'];
                     $response['token']=$jwt;

                }
                else {
                    http_response_code(401);
                    $response[]='البيانات غير سليمة حاول مرة أخرى';
                }
            }
        }
        else {
                foreach($Errors as $error){
                    $response['errors'][]=$error;
                }
        }
        
    }
    else {
        http_response_code(403);
        $response[]='get request is not available for this link' ;
    }
    echo json_encode($response);
?>
