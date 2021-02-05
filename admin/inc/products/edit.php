<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id  = $_POST['id'];
    $name = $_POST['name'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];
    $order = $_POST['order'];
    //$unit2 = $_POST['unit2'];
    //$price2 = $_POST['price2'];
    $discount = $_POST['discount'];
    $decimal  = $_POST['decimal'];
    $Availability = $_POST['Availability'];
    $category = $_POST['category'];
    $subCat = $_POST['subCat']; 
    
    if(isset($_POST['feature'])){ $feature = '1'; } else { $feature = '0';  }
    if(isset($_POST['bestSeller'])){ $bestSeller = '1'; } else { $bestSeller = '0';  }
    if(isset($_POST['newArrival'])){ $newArrival = '1'; } else { $newArrival = '0';  }
    if(isset($_POST['deal'])){ $deal = '1'; } else { $deal = '0';  }
        
    $stmt = $con->prepare("UPDATE products 
                                    SET 
                                name = ? ,
                                unite = ?, 
                                price = ?, 
                                discount = ?,
                                order_product = ?,
                                Decimal_number = ?,
                                Availability = ?,
                                category = ?,
                                subcategory = ? ,
                                best_seller = ? ,
                                new_arrivals = ? ,
                                featured = ? ,
                                Deal_Of_Day = ?
                                    WHERE id = ? ");
    $stmt->execute([$name,$unit,$price,$discount,$order,$decimal,$Availability,$category,$subCat,$bestSeller,$newArrival,$feature,$deal,$id]);
    if($stmt){
        echo successMessage('تم تعديل بيانات المنتج بنجاح');
    }
 }