<?php
    include '../../../connect.php';

    if(isset($_POST['about'])){
        $about = $_POST['about'];
        
        $stmt = $con->prepare("UPDATE about Set about =  ? ");
        $stmt->execute([$about]); 

        if($stmt){ ?>
        <div class="alert alert-success text-center"> تم التحديث بنجاح  </div>
<?php } }

