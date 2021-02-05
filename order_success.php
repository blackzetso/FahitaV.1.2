<?php 
    include 'connect.php';
    include 'inc/App/lang.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/order.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <link rel="stylesheet" href="css/color.css">
    <title><?php echo translate('3'); ?></title>
</head>
<body>
    <nav>
        <div class="title">
            <h4><?php echo translate('3'); ?></h4>
        </div>
        <div class="icon">
            <a href=".index.php"><i class="fas fa-chevron-left"></i></a>
        </div>
    </nav>
    <?php include 'inc/pages/nav.php'; ?>

    <section class="requests">
        
            <img style="height:180px;width:180px;margin-top:100px;" class="center" src="img/success-icon-10.png" >
            <h4 class="text-center" ><?php echo translate('31'); ?></h4>
    </section>

    <script src="./js/main.js"></script>
    <script src="./js/all.min.js"></script>
</body>
</html>