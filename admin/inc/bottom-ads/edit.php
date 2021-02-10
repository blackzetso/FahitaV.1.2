<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id  = $_POST['id'];
    //$number = $_POST['number'];
    $url  = $_POST['url'];
    
    $stmt = $con->prepare("UPDATE bottom_ads SET url = ? WHERE id = ? ");
    $stmt->execute([$url,$id]);
    if($stmt){ ?>
        <script>
            toastr.success('تم تعديل البيانات');
        </script>
    <?php }
 }