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
       $product = $_POST['product_id'];
    $name  = $_POST['product_name'];
    $price = $_POST['price'];
    $unit  = $_POST['unit'];  
      
    $qty   = $_POST['qty'];
    if(isset($price)&&isset($qty)){
        $total = $price * $qty;
    }
    

    $Errors=array();
        
        if(!isset($product)){
            $Errors[] = 'أدخل رقم المنتج';
        } 
        if(!isset($name)){
            $Errors[] = 'أدخل اسم المنتج';
        }
        if(!isset($price)){
            $Errors[] = 'أدخل سعر المنتج';
        }
        if(!isset($unit)){
            $Errors[] = 'أدخل وحدة المنتج';
        } 

        if(!isset($qty)){
            $Errors[] = 'أدخل كمية المنتج';
        } 

        if(empty($Errors)){ 
            $stmt = $con->prepare("SELECT * FROM cart WHERE user = ? AND product = ?");
            $stmt->execute([$id,$product]); 
            $Count = $stmt->rowCount();
            
            if($Count > 0){
                $row = $stmt->fetch(); 
               
                $qty+=$row['qty'];
                $total=$qty*$price;
                $stmt = $con->prepare("UPDATE cart SET unit = ? , price = ? , qty = ? , total = ? WHERE user = ? AND product = ? ");
                $stmt->execute([$unit,$price,$qty,$total,$id,$product]);
                $response['message']='تم اضافة عناصر جديدة الى السلة الحالية';
            }else{
                $stmt = $con->prepare("INSERT INTO `cart` ( `product`,`name`,`unit`, `price`, `qty`, `total`, `user`) VALUES (?,?,?,?,?,?,?)");
                $stmt->execute([$product,$name,$unit,$price,$qty,$total,$id]); 
                $response['message']='تم انشاء سلة جديدة واضافة عناصر اليها';
            } 
        
                
            $stmt = $con->prepare("SELECT id FROM cart WHERE user = ?");
            $stmt->execute([$id]); 
            $newCount = $stmt->rowCount();
            $response['cart_items_no']=$newCount;
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