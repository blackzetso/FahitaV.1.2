<?php ob_start();  
      session_start();
      include 'connect.php';
      include 'inc/App/lang.php';
      include 'inc/pages/nav.php'; ?>
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
            <a href="index.php"><i class="fas fa-chevron-left"></i></a>
        </div>
    </nav>


    <section class="requests">
        <?php 
        
            if(isset($_SESSION['id'])){ 
            $stmt = $con->prepare("SELECT * FROM orders WHERE user = ? ORDER BY ID DESC");
            $stmt->execute([$_SESSION['id']]);
            $rows = $stmt->fetchAll();
            foreach($rows as $row){ ?>
        
            <div class="requests-item"> 
                <div class="info-requests rows">
                    <div class="name-requests title">  #id</div>
                    <div class="name prag"><?php echo $row['id']; ?></div>
                </div>
                <div class="salary-requests rows">
                    <div class="salary-requests title"> <?php echo translate('12'); ?>  </div>
                    <div class="salary prag"><span class="num-salary"><?php echo $row['date'] ?></span> </div>
                </div>
                <div class="status-requests rows">
                    <div class="status title"> <?php echo translate('11'); ?> </div>
                    <div class="status-value prag"><?php echo $row['order_status']; ?></div>
                </div>
                <div class="number-requests rows">
                    <div class="number-title title"><i class="fa fa-eye" ></i> </div>
                    <div class="number-value prag">
                        <a href="order-item.php?id=<?php echo $row['id']; ?>" > <?php echo translate('13'); ?> </a>
                    </div>
                </div>
            </div> 
        <?php } } ?>
    </section>
    <script src="./js/main.js"></script>
    <script src="./js/all.min.js"></script>
</body>
</html>