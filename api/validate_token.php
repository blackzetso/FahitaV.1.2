<?php
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
    
 


    if ($_SERVER['REQUEST_METHOD']=='POST') {
        /*$data[]=getallheaders();
        $x= json_encode(str_replace('Bearer ','',$data[0]['Authorization']));*/

        $data = json_decode(file_get_contents("php://input"));
        $key="test";
        $jwt=isset($data->token) ? $data->token : "";
       
        if($jwt){
            
            try {
                // decode jwt
                $decoded = JWT::decode($jwt, $key, array('HS256'));
                
                // set response code
                http_response_code(200);
         
                // show user details
                $response['message']='access granted';
         
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
    }
    else {
        http_response_code(403);
        $response[]='get request is not available for this link' ;
    }
    echo json_encode($response);
?>