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
    $stmt = $con->prepare("SELECT * FROM `categories`");
    $stmt->execute();
    $row = $stmt->fetchAll(); 
    //echo realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'); 
    __DIR__ . '/..';
    $x=$_SERVER['REQUEST_URI'];
    $x=str_replace('/api/get_categories.php','',$x);
    
   // print_r(posix_getuid());
   foreach($row as $k=>$v){
        $response[$k]['id']=$v['id'];
        $response[$k]['name']=$v['name'];
        $response[$k]['img']=$protocol.$_SERVER['HTTP_HOST'].$x."/img/products/".$v['img'];
        
        
    }
    
    
    echo json_encode($response);
?>