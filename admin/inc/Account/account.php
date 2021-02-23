<?php 
    session_start();
    include '../../../connect.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name       = filter_var($_POST['Adminname'],FILTER_SANITIZE_STRING);
        $email      = filter_var($_POST['Adminemail'],FILTER_SANITIZE_STRING);
        $password   = filter_var($_POST['Adminpassword'],FILTER_SANITIZE_STRING);
        $hashed     = md5($password);
        
        $stmt = $con->prepare("SELECT * FROM users WHERE id = ".$_SESSION['admin']." ");
        $stmt->execute();
        $info = $stmt->fetch();
        
        $errors = array();
        
        if(!$name){
            $errors[] = 'حقل الاسم فارغ';
        }
        if(!$email){
            $errors[] = 'حقل البريد الإلكترونى فارغ';
        }
        if(!filter_var($_POST['Adminemail'],FILTER_VALIDATE_EMAIL)){
            $errors[] =  $_POST['Adminemail'] .'بريد الإلكترونى غير صالح';
        }
        if($info['password'] == $hashed){  
            if(empty($errors)){ 
                $stmt = $con->prepare("UPDATE users SET full_name = ? , email = ? WHERE id = ".$_SESSION['admin']." ");
                $stmt->execute(array($name,$email)); ?>
                <script >
                    toastr.success('تم تحديث البيانات ');
                </script>
      <?php }else{ foreach($errors as $error){ ?>
               <script >
                   toastr.error('<?php echo $error; ?>');
               </script> 
            <?php } 
            }
        }else{ ?>
               <script >
                   toastr.error('كلمة المرور غير صحيحة');
               </script>  
          <?php }
            }
        ?>