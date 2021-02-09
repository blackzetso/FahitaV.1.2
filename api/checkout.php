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
       $stmt = $con->prepare("SELECT * FROM cart WHERE user = $id");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    $Count = $stmt->rowCount();
   
    $city      = filter_var($_POST['city'],FILTER_SANITIZE_STRING);
    $zone      = filter_var($_POST['zone'],FILTER_SANITIZE_STRING);
    $street    = filter_var($_POST['street'],FILTER_SANITIZE_STRING);
    $build     = filter_var($_POST['build'],FILTER_SANITIZE_STRING);
    $storey    = filter_var($_POST['storey'],FILTER_SANITIZE_STRING);
    $time_from = $_POST['time_from'];
    $time_to   = $_POST['time_to'];

    

    $Errors = array();

    if(!$city){
        $Errors[] = 'يجب ملئ حقل المدينة';
    }
    if(!$zone){
        $Errors[] = 'يجب ملئ حقل المنطقة';
    }
    if(!$street){
        $Errors[] = 'يجب ملئ حقل الشارع';
    }
    if(!$build){
        $Errors[] = 'يجب ملئ حقل اسم العمارة';
    }
    if(!$storey){
        $Errors[] = 'يجب ملئ حقل رقم الطابق';
    }
    if(!$time_from){
        $Errors[] = 'يجب تحديد وقت استلام الطلب';
    }
    if(!$time_to){
        $Errors[] = 'يجب تحديد وقت استلام الطلب';
    }

   

        if(empty($Errors)){ 
            if($Count>0){
                $stmt = $con->prepare("INSERT INTO `orders` ( `city`, `zone`, `street`, `build`, `storey`, `user`, `time_from`, `time_to`,`date`) 
                                            VALUES 
                                                        (?,?,?,?,?,?,?,?,now())");
            $stmt->execute([$city,$zone,$street,$build,$storey,$id,$time_from,$time_to]);
                if($stmt){
                    $stmt = $con->prepare("SELECT * FROM orders WHERE user = ? ORDER BY ID DESC LIMIT 1");
                $stmt->execute([$id]);
                $info = $stmt->fetch(); 
               
                //$_SESSION['order'] = $info['id'];
                foreach($rows as $row){
                     
                    $stmt = $con->prepare("INSERT INTO `order_items` (`item_id`,`name`,`order_id`,`date`,`price`,`qty`,`total`) VALUES (?,?,?,now(),?,?,?)");
                    $stmt->execute([$row['product'],$row['name'],$info['id'],$row['price'],$row['qty'],$row['total']]);
                } 
                
                $stmt = $con->prepare("DELETE FROM cart WHERE user = ? ");
                $stmt->execute([$id]); 
                $response['message']="تم انشاء الطلب بنجاح";
                }
                else {
                    $response['message']="لم يتم انشاء الطلب  حاول لاحقا";
                }
            }
            else {
                $response['message']='سلة المشتريات فارغة';
            }
            
        }
        else {
            foreach($Errors as $error){
                $response['errors'][]=$error;
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