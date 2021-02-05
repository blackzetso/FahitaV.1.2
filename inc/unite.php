<?php
//Include database configuration file
 
include('../connect.php');

if(isset($_GET["unite"]) && !empty($_GET["unite"])){
    //Get all state data
    $unite = $_GET['unite'];
    $id = $_GET['id'];
    if($unite == 'unite1'){
        
    $query = $con->prepare("SELECT * FROM products WHERE id = ? ");
    $query->execute([$id]);
    $row = $query->fetch(); ?>
    <input type="text" class="salary-item" value="<?php echo $row['price']; ?>" disabled> ج
<?php  }elseif($unite == 'unite2'){ 
    $query = $con->prepare("SELECT * FROM products WHERE id = ? ");
    $query->execute([$id]);
    $row = $query->fetch(); ?>
    <input type="text" class="salary-item" value="<?php echo $row['price2']; ?>" disabled> ج
<?php } } ?>

<script>
    //get element use in calculate Weight
    salaryItem = document.querySelector(".salary-item"),
    salaryAll = document.querySelector(".salary-all");
    
    salaryAll.value = salaryItem.value * Weight.value;
        
    $('#addToCart [name=price]').val(salaryItem.value);

</script>