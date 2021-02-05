<?php 
    if(isset($_SESSION['id'])){
    $stmt = $con->prepare("SELECT * FROM cart WHERE user = ?");
    $stmt->execute([$_SESSION['id']]);
    $Count = $stmt->rowCount(); } ?>
<body>

    <nav class="nav nav-website">
        <div class="container d-flex  align-items-center justify-content-between">
            <div class="logo">
                <img src="img/logo.png" style="width:55px" >
            </div>
            <div class="basket">
                <a href="basket.php"><i class="fas fa-cart-arrow-down"></i><span id="Success" class="badge" ><?php if(isset($_SESSION['id'])){ echo $Count; }else{ echo '0'; } ?></span></a>
            </div>
        </div>
    </nav>