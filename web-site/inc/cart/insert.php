<?php 
    session_start();
    include '../../connect.php';  
 
    if(isset($_SESSION['id'])){
    $user       = $_SESSION['id']; 
    $product_id = $_GET['id']; 
    
    $stmt = $con->prepare("SELECT * FROM products WHERE id = ? ");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();
        
    $price = $product['price'];
    $name  = $product['name'];
    $qty   = 1; 
    $total = $price * $qty; 
 
    $stmt = $con->prepare("SELECT id,qty FROM cart WHERE user = ? AND product = ?");
    $stmt->execute([$user,$product_id]); 
    $Count = $stmt->rowCount();
    $cart = $stmt->fetch();
    
 
    if($Count > 0){
        $Qty = $cart['qty']+1;
        $stmt = $con->prepare("UPDATE cart SET price = ? , qty = ? , total = ? WHERE user = ? AND product = ? ");
        $stmt->execute([$price,$Qty,$total,$user,$product_id]);
        if($stmt){ ?> 
            <script>
                toastr.success("Success","Product Added");
            </script>
        <?php }
    }else{
        $stmt = $con->prepare("INSERT INTO `cart` ( `product`,`name`,`price`, `qty`, `total`, `user`) VALUES (?,?,?,?,?,?)");
        $stmt->execute([$product_id,$name,$price,$qty,$total,$user]); 
        if($stmt){ ?> 
            <script>
                toastr.success("Success","Product Added");
            </script>
        <?php }
    } 
        
    $stmt = $con->prepare("SELECT id FROM cart WHERE user = ?");
    $stmt->execute([$user]); 
    $newCount = $stmt->rowCount();

    echo $newCount; }else{
        echo 0;
    }  
    