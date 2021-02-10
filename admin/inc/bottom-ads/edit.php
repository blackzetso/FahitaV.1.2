<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id  = $_POST['id'];
    $number = $_POST['number'];
    $url  = $_POST['url'];
    
    $stmt = $con->prepare("UPDATE top_ads SET order_number = ? , url = ? WHERE id = ? ");
    $stmt->execute([$number,$url,$id]);
    if($stmt){ ?>
        <script>
            toastr.success('تم تعديل البيانات');
        </script>
    <?php }
 }