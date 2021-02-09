<?php

if(isset($_SERVER['HTTPS'])){
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https://" : "http://";
}
else{
    $protocol = 'http://';
}
    include_once '../connect.php'; 
   
    $response=array();
    header('Content-Type: JSON');
    $id = isset($_GET['category_id']) && is_numeric($_GET['category_id']) ? intval($_GET['category_id']) : 0;
    $stmt = $con->prepare("SELECT * FROM `subcategories` where category = $id");
    $stmt->execute();
    $row = $stmt->fetchAll(); 
    //echo realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'); 
    __DIR__ . '/..';
    $x=$_SERVER['REQUEST_URI'];
    $x=str_replace('/api/get_sub_categories.php','',$x);
    
   $count=$stmt->rowCount();
   if($count>0){
    foreach($row as $k=>$v){
        $response[$k]['id']=$v['id'];
        $response[$k]['name']=$v['name'];
        $response[$k]['img']=$protocol.$_SERVER['HTTP_HOST'].$x."/img/products/".$v['img'];
        
        
    }
   }
   else {
       $response['message']="لا يوجد تصنيفات فرعية لهذا التصنيف";
   }
   
    
    
    echo json_encode($response);
?>