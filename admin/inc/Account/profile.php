<?php 
    session_start();
    include '../../../connect.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $stmt = $con->prepare("SELECT * FROM users WHERE id = ".$_SESSION['admin']." ");
        $stmt->execute();
        $info = $stmt->fetch();
        
        $iname  =  $_FILES['img']['name'];
        $type   =  $_FILES['img']['type'];
        $tmp    =  $_FILES['img']['tmp_name'];
        $size   =  $_FILES['img']['size'];
 
            if(!$iname){  
                $stmt = $con->prepare("UPDATE users SET about = ? WHERE id = ".$_SESSION['admin']." ");
                $stmt->execute(array($about)); ?>
                <script>
                    toastr.success('تم تحديث البيانات ');
                </script>
      <?php }else{ $fileImg = '../../../img/avatar/'.$info['img'];
             
                if(file_exists($fileImg)){ 
                    $delete = unlink('../../img/avatar/'.$info['img']);
                }  
                  
                $multiimge = explode('.', $iname);
                $Extension = strtolower(end($multiimge)); 
                $neName  = rand( 0, 1000000 ) . '.' . $Extension;
                move_uploaded_file($tmp ,'../../img/avatar/' . $neName ); 
                
                $stmt = $con->prepare("UPDATE users SET img = ?  WHERE id = ".$_SESSION['admin']." ");
                $stmt->execute(array($neName)); ?>
                <script>
                    toastr.success('تم تحديث البيانات ');
                </script>
            <?php } } ?>