<?php 
    include '../../../connect.php'; 

    if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id     = $_POST['id'];
    $date   = $_POST['date']; 
        
    $stmt = $con->prepare("SELECT * FROM orders WHERE user = ? AND date = ? ");
    $stmt->execute([$id,$date]);
    $rows = $stmt->fetchAll();
 
    foreach($rows as $row) { ?> 
<tr id="ajax-remove" dir="rtl" > 
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['date']; ?></td> 
    <td><b><?php echo $row['order_status']; ?></b></td>
    <td>
        <a href="userOrders.php?id=<?php echo $row['id']; ?>" class="btn btn-info" ><i class="ti-pencil-alt" ></i> </a>
    </td> 
</tr>
<?php } } ?>