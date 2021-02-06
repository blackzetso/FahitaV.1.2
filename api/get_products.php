<?php

if(isset($_SERVER['HTTPS'])){
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https://" : "http://";
}
else{
    $protocol = 'http://';
}
    include_once '../connect.php'; 
    include '../inc/App/function.php';
    $response=array();
    header('Content-Type: JSON');
    $stmt = $con->prepare("SELECT * FROM `products`");
    $stmt->execute();
    $row = $stmt->fetchAll(); 
    //echo realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'); 
    __DIR__ . '/..';
    $x=$_SERVER['REQUEST_URI'];
    $x=str_replace('/api/get_products.php','',$x);
    
   // print_r(posix_getuid());
   foreach($row as $k=>$v){
        $response[$k]['id']=$v['id'];
        $response[$k]['name']=$v['name'];
        $response[$k]['img']=$protocol.$_SERVER['HTTP_HOST'].$x."/img/products/".$v['img'];
        $response[$k]['description']=strip_tags(stripslashes($v['description']));
        $response[$k]['short_desc']=strip_tags(stripslashes($v['short_desc']));
        $response[$k]['price']=$v['price'];
        $response[$k]['price2']=$v['price2'];
        $response[$k]['unite']=$v['unite'];
        $response[$k]['unite2']=$v['unite2'];
        $response[$k]['Decimal_number']=$v['Decimal_number'];
        if($v['discount']==0){
            $discount='no';
        }
        else {
            $discount='yes';
        }
        $response[$k]['discount']= $discount;
        $response[$k]['order_product']=$v['order_product'];
        if($v['Additional_img']==''||$v['Additional_img']==null){
            $add='';
            $response[$k]['Additional_img']=$add;
        }
        else {
            $add=$v['Additional_img'];
            $response[$k]['Additional_img']=$protocol.$_SERVER['HTTP_HOST'].$x."/img/products/".$add;
        }
        $response[$k]['Availability']=$v['Availability'];

        $response[$k]['category']=getCategoryName($v['category']);
         if($v['subcategory']==''){
            $response[$k]['subcategory']=$v['subcategory'];
         }
         else {
            $response[$k]['subcategory']=getSubCategoryName($v['subcategory']);
         }

         if($v['best_seller']==0){
            $best_seller='no';
        }
        else {
            $best_seller='yes';
        }
        $response[$k]['best_seller']= $best_seller;
        if($v['new_arrivals']==0){
            $new_arrivals='no';
        }
        else {
            $new_arrivals='yes';
        }
        $response[$k]['new_arrivals']= $new_arrivals;
        if($v['featured']==0){
            $featured='no';
        }
        else {
            $featured='yes';
        }
        $response[$k]['featured']= $featured;
       
        if($v['Deal_Of_Day']==0){
            $Deal_Of_Day='no';
        }
        else {
            $Deal_Of_Day='yes';
        }
        $response[$k]['Deal_Of_Day']= $Deal_Of_Day;
        
    }
    
    
    echo json_encode($response);
?>