<?php
    session_start();
    include '../../connect.php';

    $name =  filter_var($_POST['search'],FILTER_SANITIZE_STRING);
    
    //echo '<h1>'.$name.'</h1>';

    $stmt = $con->prepare("SELECT * FROM `products` WHERE (CONVERT(`name` USING utf8) LIKE '%$name%')");
    $stmt->execute();
    $rows = $stmt->fetchAll();
        
        foreach($rows as $row){ ?>
    <div class=" col-6  p-0">
        <div class="item">
            <?php if($row['Availability'] == 'غير متوفر فى المخزن'){ ?>
                <span class="notvalible" > غير متوفر </span>
            <?php } ?>
            <a href="single-product.php?id=<?php echo $row['id']; ?>">
                <div class="photo">
                    <img height="350px" class="lazy" src="img/products/<?php echo $row['img']; ?>" alt="">
                </div>
               <div class="name">
                    <span> <?php  mb_internal_encoding("UTF-8"); echo mb_substr($row['name'],0,25); ?> </span>
               </div>
            </a>
        </div>
    </div>
    <?php } ?>