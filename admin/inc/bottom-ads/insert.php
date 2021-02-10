<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    $number = $_POST['number']; 
    $url    = $_POST['url'];

    $iname  =  $_FILES['img']['name'];
    $type   =  $_FILES['img']['type'];
    $tmp    =  $_FILES['img']['tmp_name'];
    $size   =  $_FILES['img']['size']; 

    $allowed =  array("jpg","jpeg","png","gif","webp"); 

    $explode  = explode('.',$iname);
    $filetype = strtolower(end($explode));

    $formError = array();

    if(!$iname){
      $formError[]  =  'يجب اضافة صورة';
    } 
    if(strlen($iname) > 1){ 
        if(!in_array($filetype,$allowed)){ 
          $formError[]  =  'انت تحاول رفع ملف غير مدعوم';  
        } 
    }
   if(empty($formError)){ 
            $multiimge = explode('.', $iname);
            $Extension = strtolower(end($multiimge));

            $neName   = rand(0,10000000) .'.' . $Extension;
            move_uploaded_file($tmp ,'../../../img/slides/' . $neName);
            
            $stmt = $con->prepare("INSERT INTO `bottom_ads` (`img`,`url`,`order_number`) VALUES (?,?,?);");
            $stmt->execute([$neName,$url,$number]);

        if($stmt){
            echo successMessage('تم إضافة إعلان جديد');
        }
    }else{
        foreach($formError as $error){
            echo errorMessage($error);
        }
    }
     