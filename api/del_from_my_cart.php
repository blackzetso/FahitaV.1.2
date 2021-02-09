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
        
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
        http_response_code(200);
        $stmt = $con->prepare("select * FROM cart WHERE id = $id");
        $stmt->execute();
        $Count = $stmt->rowCount();
        if($Count>0){
            $stmt = $con->prepare("DELETE FROM cart WHERE id = $id");
            $stmt->execute();
            
            if($stmt){
                
                $response['message']='تم حذف العنصر من السلة';
            }
            else {
                $response['message']="خطأ فى حذف العنصر من السلة حاول لاحقا";
            }
        }
        else {
            $response['message']="رقم العنصر غير معروف او لا يوجد عنصر بهذا الرقم داخل السلة";
        }
        // set response code
       
 
        // show user details
       // $response['message']='access granted';

 
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