<?php   
        session_start();
        include 'connect.php';
        include 'inc/App/lang.php';
        $func = 'inc/App/function.php';
        include $func;
        if(isset($_SESSION['id'])){ ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./css/basket.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <link rel="stylesheet" href="css/color.css">
    <title> <?php echo translate('21'); ?> </title>
</head>
<body>
    <nav>
        <div class="title">
            <h4> <?php echo translate('21'); ?> </h4>
        </div>
        <div class="icon">
            <a href="<?php echo goBack(); ?>"><i class="fas fa-chevron-left"></i></a>
        </div>
    </nav>
   <?php 
        include 'inc/pages/nav.php';
        $stmt = $con->prepare('SELECT * FROM cart WHERE user = ? ORDER BY id DESC');
        $stmt->execute([$_SESSION['id']]);
        $rows = $stmt->fetchAll();
        $Count = $stmt->rowCount();
    
        $stmt = $con->prepare('SELECT SUM(total) FROM cart WHERE user = ? ORDER BY id DESC');
        $stmt->execute([$_SESSION['id']]);
        $info = $stmt->fetch();
        $total = $info['SUM(total)'];
                                   
        $stmt = $con->prepare('SELECT shipping_cost FROM settings');
        $stmt->execute([$_SESSION['id']]);
        $shipping_cost = $stmt->fetch();
    
        if($Count > 0){ ?> 
    <section class="orders" id="ajax">
        <?php foreach($rows as $row){
            if($row['unit'] == "unite1"){
                $price = "price";
            }else{
                $price = 'price2';
            }
            if($row['unit'] == "unite1"){
                $unite = "unite";
            }else{
                $unite = 'unite2';
            } ?>
        <div class="order-item" >
            <div class="img-order">
                <img src="img/products/<?php echo getColumn('img','products','id',$row['product']); ?>" alt="">
            </div>
            <div class="info-order">
                <div class="name title"><?php echo getColumn('name','products','id',$row['product']); ?></div>
                <div class="salary-order prag"><span class="salary"><?php echo getColumn($price,'products','id',$row['product'])-getColumn('discount','products','id',$row['product']); ?></span> <span>ج</span></div>
            </div>
            <div class="info-order">
                <div class="name title"> <?php echo getColumn($unite,'products','id',$row['product']); ?> </div>
                <div class="salary-order prag"><span class="salary"><?php echo $row['qty']; ?></span>  </div>
            </div>
            <div class="info-order">
                <div class="name title"> <?php echo translate('22'); ?> </div>
                <div class="salary-order prag"><span class="salary"><?php echo $row['total']; ?></span>  </div>
            </div>
            <div class="remove">
                <button class="delete" data-id=<?php echo $row['id'] ?> ><i class="fas fa-trash"></i></button>
            </div>
        </div>
        <?php } ?>
    </section>
    
    <div class="all-salary">
        <div class="text">
            <h3>  <?php echo translate('23'); ?> <span class="fansh-slary"><?php echo $total; ?></span> EUR  + <?php echo $shipping_cost['shipping_cost'] .' '. translate('25'); ?></h3>
        </div>
    </div>

    <div class="btn">
        <a href="complete.php" style="margin-bottom: 80px;"> <i class="fab fa-shopify icon"></i> <?php echo translate('24'); ?></a>
    </div>
    <?php }else{ ?>
    <section class="orders"  >
        
        <img class="center" src="img/cart-empty.png" >
        <h3 style="text-align:center;font-family: 'Cairo', sans-serif;color:#BDBEC0" >سلة الشراء فارغه</h3>
    </section>
    <?php } ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="js/all.min.js"></script>
<script>
    $(document).on('click','.delete',function(e){
       e.preventDefault();
       var id  = $(this).data('id');
       $.ajax({
           type:'GET',
           url:'inc/cart/delete.php?id='+id,
           beforeSend: function() {  
                $("#ajax-remove").remove();
                $("#ajax").prepend('<div class="text-center"><div class="spinner-grow text-warning" role="status"></div></div>');
           },
           contentType: false,
           cache: false,
           processData:false,
           success:function(data){
               $("#ajax").html(data);
           }
       })
    });
</script>
</body>
</html>
<?php } else { 
   redirect('login.php');
} ?>