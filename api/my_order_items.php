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
      
        $order_id=$_GET['order_id'];
        $stmt = $con->prepare("SELECT * FROM order_items WHERE order_id = '$order_id' ");
        $stmt->execute();
        if($stmt->rowCount()==0){
            $response['message']='لا يوجد عناصر لهذا الطلب';
        }
        else {
            $rows = $stmt->fetchAll();
            foreach($rows as $k=>$v){
                $response[$k]['id']=$v['id'];
                $response[$k]['item_id']=$v['item_id'];
                $response[$k]['name']=$v['name'];
                $response[$k]['price']=$v['price'];
                $response[$k]['qty']=$v['qty'];
                $response[$k]['total']=$v['total'];
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