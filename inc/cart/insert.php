<?php 
    session_start();
    include '../../connect.php'; 
    if(isset($_SESSION['id'])){
    $user = $_SESSION['id']; 
    $product = $_POST['id'];
    $name  = $_POST['name'];
    $price = $_POST['price'];
    $unit  = $_POST['unit'];  
      
    $qty   = $_POST['qty'];
    $total = $price * $qty;
    
    $stmt = $con->prepare("SELECT id FROM cart WHERE user = ? AND product = ?");
    $stmt->execute([$user,$product]); 
    $Count = $stmt->rowCount();
    
    if($Count > 0){
        $stmt = $con->prepare("UPDATE cart SET unit = ? , price = ? , qty = ? , total = ? WHERE user = ? AND product = ? ");
        $stmt->execute([$unit,$price,$qty,$total,$user,$product]);
    }else{
        $stmt = $con->prepare("INSERT INTO `cart` ( `product`,`name`,`unit`, `price`, `qty`, `total`, `user`) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([$product,$name,$unit,$price,$qty,$total,$user]); 
    } 
        
    $stmt = $con->prepare("SELECT id FROM cart WHERE user = ?");
    $stmt->execute([$user]); 
    $newCount = $stmt->rowCount();

    echo $newCount; }else{
        echo 0;
    }
    