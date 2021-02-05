<?php
    session_start();
    include '../../connect.php';
    include '../App/function.php';

    $stmt = $con->prepare("SELECT * FROM cart WHERE user = ?");
    $stmt->execute([$_SESSION['id']]);
    $rows = $stmt->fetchAll();
    $Count = $stmt->rowCount();

    $user      = $_SESSION['id'];
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
        if($Count > 0){
            $stmt = $con->prepare("INSERT INTO `orders` ( `city`, `zone`, `street`, `build`, `storey`, `user`, `time_from`, `time_to`,`date`) 
                                            VALUES 
                                                        (?,?,?,?,?,?,?,?,now())");
            $stmt->execute([$city,$zone,$street,$build,$storey,$user,$time_from,$time_to]);

            if($stmt){
                
                $stmt = $con->prepare("SELECT id FROM orders WHERE user = ? ORDER BY ID DESC LIMIT 1");
                $stmt->execute([$user]);
                $info = $stmt->fetch(); 
               
                $_SESSION['order'] = $info['id'];
                foreach($rows as $row){
                     
                    $stmt = $con->prepare("INSERT INTO `order_items` (`item_id`,`name`,`order_id`,`date`,`price`,`qty`,`total`) VALUES (?,?,?,now(),?,?,?)");
                    $stmt->execute([$row['product'],$row['name'],$info['id'],$row['price'],$row['qty'],$row['total']]);
                } 
                
                $stmt = $con->prepare("DELETE FROM cart WHERE user = ? ");
                $stmt->execute([$user]); 
                
                echo redirect('order_success.php');
            }
        }else {
            echo errorMessage('سلة المشتريات فارغه');
        }
    }else{
        foreach($Errors as $error){
            echo errorMessage($error);
        }
    } 