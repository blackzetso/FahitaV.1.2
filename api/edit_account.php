<?php
include_once '../connect.php'; 

header('Content-Type: JSON');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Africa/Cairo');
 
// variables used for jwt

$issued_at = time();
$expiration_time = $issued_at + (60 * 60);
include_once '../inc/lib/php-jwt-master/src/BeforeValidException.php';
include_once '../inc/lib/php-jwt-master/src/ExpiredException.php';
include_once '../inc/lib/php-jwt-master/src/SignatureInvalidException.php';
include_once '../inc/lib/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
$response=array();
//$d=getheader('authorization');
/*$headers[] = getallheaders();
$h='Authorization';
$d=isset($h) ? str_replace('Bearer ','',$headers[0]['Authorization']) : null;

//echo isset('authorization') ? $headers['Authorization'] : null;
/*$d=$_SERVER['authorization'];
echo $d;*/
//print_r(file_get_contents("php://input"));
    
//$data = json_decode(file_get_contents("php://input"));
$key="test";
$headers = getallheaders();
if(isset($headers['Authorization'])){
    $jwt=$headers['Authorization'];
}
else {
    $jwt="";
}

//$jwt=!empty($data->token) ? $data->token : "";

if($jwt){
    
    try {
        // decode jwt
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        
        // set response code
        http_response_code(200);
 
        // show user details
       // $response['message']='access granted';
      
       
       $id=$decoded->data->id;

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
        
        if(!isset($phone)){
            $Errors[] = 'phone number input is required';
        } 
        
        if(isset($password) && mb_strlen($password) < 6){
            $Errors[] = 'password must be more than 5 characters';
        } 
        if(empty($Errors)){ 
            $stmt = $con->prepare("select * from users  WHERE id = $id");
            $stmt->execute();
            $row=$stmt->fetch();
            $new_pass=isset($_POST['password'])?$hashed:$row['password'];
            $stmt = $con->prepare("UPDATE users SET full_name = ? , email = ? , phone_number = ?  WHERE id = ?");
            $stmt->execute([$fname,$email,$phone,$id]);
            if($stmt){
              $response['message']="تم تحديث بياناتك بنجاح";
            }
        }
        else {
            foreach($Errors as $error){
                $response['errors'][]=$error;
            }
        }
       }
       
   


 
    }
    catch (Exception $e){

        // set response code
        http_response_code(401);
     
        // tell the user access denied  & show error message
        $response['message']='access denied wrong access token';
    }
}
else {
    http_response_code(401);
    $response['message']='access denied missing access token';
}
echo json_encode($response);
?>