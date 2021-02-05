<?php
include 'connect.php';
include 'inc/App/lang.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <link rel="stylesheet" href="css/color.css">
    <title><?php echo translate('4'); ?></title>
</head>
<body> 
    <nav>
        <div class="title">
            <h4><?php echo translate('4'); ?></h4>
        </div>
        <div class="icon">
            <a href="./indux.php"><i class="fas fa-chevron-left"></i></a>
        </div>
    </nav>

    <?php include 'inc/pages/nav.php'; ?>
    
    <section class="info">
        <div class="content">
            <div class="socail"> 
                <div class="title">
                    <h4><?php echo translate('14'); ?></h4>
                </div>   
                <ul>
                    <li><a href="https://www.facebook.com/facboxx" target="_blank"><i class="fab fa-facebook icon"></i></a></li>
                    <li><a href="https://wa.me/+201117952435" target="_blank"><i class="fab fa-whatsapp icon"></i></a></li> 
                </ul> 
            </div>
            <div class="email">
                <h4><?php echo translate('9'); ?></h4>
                <ul>
                    <li><a href="#">info@facbox.com</a></li> 
                </ul>
            </div>           
        </div>
    </section>
    <script src="js/all.min.js"></script>
</body>
</html>