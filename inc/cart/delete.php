<?php 
    session_start();
    include '../../connect.php';
    include '../App/function.php';
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    $stmt = $con->prepare("DELETE FROM cart WHERE id = $id");
    $stmt->execute();
    
    if($stmt){
        $stmt = $con->prepare("SELECT * FROM cart WHERE user = ? ORDER BY id DESC");
        $stmt->execute([$_SESSION['id']]);
        $rows = $stmt->fetchAll(); 

        foreach($rows as $row){ ?>
        <div class="order-item" >
            <div class="img-order">
                <img src="img/products/<?php echo getColumn('img','products','id',$row['product']); ?>" alt="">
            </div>
            <div class="info-order">
                <div class="name title"><?php echo getColumn('name','products','id',$row['product']); ?></div>
                <div class="salary-order prag"><span class="salary"><?php echo getColumn('price','products','id',$row['product']); ?></span> <span>ج</span></div>
            </div>
            <div class="info-order">
                <div class="name title"> <?php echo getColumn('unite','products','id',$row['product']); ?> </div>
                <div class="salary-order prag"><span class="salary"><?php echo $row['qty']; ?></span>  </div>
            </div>
            <div class="info-order">
                <div class="name title"> الإجمالى </div>
                <div class="salary-order prag"><span class="salary"><?php echo $row['total']; ?></span>  </div>
            </div>
            <div class="remove">
                <button class="delete" data-id=<?php echo $row['id'] ?> ><i class="fas fa-trash"></i></button>
            </div>
        </div>
   <?php } } 