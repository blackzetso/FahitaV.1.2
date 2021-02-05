<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    $name = $_POST['name']; 
 
        if(empty($formError)){   
            $stmt = $con->prepare("INSERT INTO `unit` (`name`) VALUES (?)");
            $stmt->execute([$name]);

        if($stmt){
            echo successMessage('تم إضافة وحدة جديدة');
        }
    }else{
        foreach($formError as $error){
            echo errorMessage($error);
        }
    }
     