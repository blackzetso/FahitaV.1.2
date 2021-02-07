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
//$d=getheader('authorization');
/*$headers[] = getallheaders();
$h='Authorization';
$d=isset($h) ? str_replace('Bearer ','',$headers[0]['Authorization']) : null;

//echo isset('authorization') ? $headers['Authorization'] : null;
/*$d=$_SERVER['authorization'];
echo $d;*/
      
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
       // $response['message']='access granted';
       $id=$data->id;
        $stmt2 = $con->prepare("SELECT * FROM orders WHERE user = '$id' ");
$stmt2->execute();
if($stmt->rowCount()==0){
    $response['message']='لا يوجد  طلبات لك';
}
else {
    $rows = $stmt2->fetchAll();
foreach($rows as $k=>$v){
    $response[$k]['city']=$v['city'];
    $response[$k]['zone']=$v['zone'];
    $response[$k]['street']=$v['street'];
    $response[$k]['build']=$v['build'];
    $response[$k]['storey']=$v['storey'];
    $response[$k]['time_from']=$v['time_from'];
    $response[$k]['time_to']=$v['time_to'];
    $response[$k]['order_status']=$v['order_status'];
    $response[$k]['date']=$v['date'];
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

?>