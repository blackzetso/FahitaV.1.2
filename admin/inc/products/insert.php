<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    $name = $_POST['name'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];
    $name = $_POST['name'];
    $order = $_POST['order'];
    $discount = $_POST['discount'];
    $decimal  = $_POST['decimal'];
    $Availability = $_POST['Availability'];
    $category = $_POST['category'];
    $subCat = $_POST['subCat'];
    $short_desc = 'empty';
    $description = $_POST['area'];
    $brand  = $_POST['brand'];
    $lang = $_POST['lang']; 
    $taken = generateRandomString();

 
    //$feature = $_POST['feature'];
    //$bestSeller = $_POST['bestSeller'];
    //$newArrival = $_POST['newArrival'];
    if(isset($_POST['feature'])){ $feature = '1'; } else { $feature = '0';  }
    if(isset($_POST['bestSeller'])){ $bestSeller = '1'; } else { $bestSeller = '0';  }
    if(isset($_POST['newArrival'])){ $newArrival = '1'; } else { $newArrival = '0';  }
    if(isset($_POST['deal'])){ $deal = '1'; } else { $deal = '0';  }


    $iname  =  $_FILES['img']['name'];
    $type   =  $_FILES['img']['type'];
    $tmp    =  $_FILES['img']['tmp_name'];
    $size   =  $_FILES['img']['size'];
    
    $image_name  =  $_FILES['files']['name'];
    $image_type  =  $_FILES['files']['type'];
    $image_tmp   =  $_FILES['files']['tmp_name'];
    $image_size  =  $_FILES['files']['size'];
    

    $files_count = count($image_name);

    

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
            // توليد اسم عشوائى لإسم الصورة الأساسية
            $neName   = rand(10000,10000000) .'.' . $filetype; 
            // رفع الصورة داخل فولدر المنتجات 
            move_uploaded_file($tmp ,'../../../img/products/' . $neName);
            // إدخال اسم الصورة الأساسية داخل قاعدة البيانات
            $stmt = $con->prepare("INSERT INTO `products` ( `name`, `img`, `description`, `short_desc`, `price`, `unite`, `Decimal_number`, `discount`,`order_product`,`Availability`, `category`, `subcategory`,`best_seller`,`new_arrivals`,`featured`,`Deal_Of_Day`,`brand`,`lang`,`taken`) 
                                                    VALUES 
                                                          (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute([$name,$neName,$description,$short_desc,$price,$unit,$decimal,$discount,$order,$Availability,$category,$subCat,$bestSeller,$newArrival,$feature,$deal,$brand,$lang,$taken]);
            
            if($stmt){ //ادخال الصور الإضافية للمنتج 
                for($i = 0;$i < $files_count; $i++){
                    $multiimge[$i]   = explode('.', $image_name[$i]);
                    $Extension[$i] = strtolower(end($multiimge[$i])); 
                    
                    $filename[$i]    = rand(100000,10000000) .'.' . $Extension[$i];
                    move_uploaded_file($image_tmp[$i] ,'../../../img/products/' . $filename[$i]);
                     
                    $stmt = $con->prepare("INSERT INTO `product_images` (`img`, `taken`) VALUES (?,?)");
                    $stmt->execute([$filename[$i],$taken]);
                }
            }
        if($stmt){
            echo successMessage('تم إضافة منتج جديد');
        }
    }else{
        foreach($formError as $error){
            echo errorMessage($error);
        }
    }