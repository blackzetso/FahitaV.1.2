<?php
    include '../../../connect.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $date  = $_POST['date'];
    $stmt = $con->prepare("SELECT DISTINCT item_id FROM order_items WHERE date = ? ");
    $stmt->execute([$date]);
    $rows = $stmt->fetchAll();
    
    $stmt = $con->prepare("SELECT SUM(total) FROM order_items WHERE date = ? ");
    $stmt->execute([$date]);
    $info = $stmt->fetch();
    foreach($rows as $cat) {

        $stmt = $con->prepare("SELECT * FROM order_items WHERE item_id = ? ");
        $stmt->execute([$cat['item_id']]);
        $row = $stmt->fetch(); 
        $Count = $stmt->rowCount();

        $stmt = $con->prepare("SELECT SUM(qty) FROM order_items WHERE item_id = ? AND date = ? ");
        $stmt->execute([$cat['item_id'],$date]);
        $qty = $stmt->fetch(); 

        $total = $qty['SUM(qty)'] * $row['price']; ?>

    <tr dir="rtl" > 
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $Count; ?></td>
        <td><?php echo $row['price']; ?> جنيه</td>
        <td><b><?php echo $qty['SUM(qty)']; ?></b></td>
        <td><?php echo $total; ?> جنيه</td> 
    </tr> 
<?php } } ?>