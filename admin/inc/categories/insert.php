<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    $name = $_POST['name']; 
    $view = isset($_POST['view']) ? '1' : '0';
    $Order = $_POST['Order'];
    $lang = $_POST['lang'];

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
            move_uploaded_file($tmp ,'../../../img/categories/' . $neName);
            
            $stmt = $con->prepare("INSERT INTO `categories` (`name`, `img`,`order_number`,`navbar`,`lang`) VALUES (?,?,?,?,?)");
            $stmt->execute([$name,$neName,$Order,$view,$lang]);

        if($stmt){
            echo successMessage('تم إضافة قسم جديد');
        }
    }else{
        foreach($formError as $error){
            echo errorMessage($error);
        }
    } 