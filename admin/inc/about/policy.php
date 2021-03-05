<?php
    include '../../../connect.php';

    if(isset($_POST['policy'])){
        $policy = $_POST['policy'];
        
        $stmt = $con->prepare("UPDATE about Set policy =  ? ");
        $stmt->execute([$policy]); 

        if($stmt){ ?>
        <div class="alert alert-success text-center"> تم التحديث بنجاح  </div>
<?php } }

