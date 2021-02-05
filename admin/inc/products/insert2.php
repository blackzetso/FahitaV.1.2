<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    $name = $_POST['name'];
    $unit = $_POST['unit'];
    $unit2 = $_POST['unit2'];
    $price = $_POST['price'];
    $order = $_POST['order'];
    $price2 = $_POST['price2'];
    $discount = $_POST['discount'];
    $decimal  = $_POST['decimal'];
    $Availability = $_POST['Availability'];
    $category = $_POST['category'];
    $subCat = $_POST['subCat'];
    $short_desc = 'empty';
    $description = 'empty';

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
            move_uploaded_file($tmp ,'../../../img/products/' . $neName);
            
            $stmt = $con->prepare("INSERT INTO `products` ( `name`, `img`, `description`, `short_desc`, `price`,`price2`, `unite`, `unite2`, `Decimal_number`, `discount`,`order_product`,`Availability`, `category`, `subcategory`) 
                                                    VALUES 
                                                          (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute([$name,$neName,$description,$short_desc,$price,$price2,$unit,$unit2,$decimal,$discount,$order,$Availability,$category,$subCat]);

        if($stmt){
            echo successMessage('تم إضافة منتج جديد');
        }
    }else{
        foreach($formError as $error){
            echo errorMessage($error);
        }
    }
     