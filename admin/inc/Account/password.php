<?php 
    session_start();
    include '../../../connect.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $stmt = $con->prepare("SELECT * FROM users WHERE id = ".$_SESSION['admin']." ");
        $stmt->execute();
        $row = $stmt->fetch();
        
        $myPass   = $row['password'];
        $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
        $newPass  = filter_var($_POST['newpass'],FILTER_SANITIZE_STRING);
        $confPass = filter_var($_POST['confpass'],FILTER_SANITIZE_STRING);
        $hashed   = md5($newPass);
        
        $formError = array();
        
        if($myPass !== $hashed){
            $formError[] = 'كلمة السر الحاليه غير صحيحه';//$myPass.'<br>'.$hashed;//
        }
        if($newPass !== $confPass){
            $formError[] = 'كلمات المرور غير متطابقتين';
        }
        
        if(empty($formError)){
            /***************Update*********************/
            $stmt = $con->prepare("UPDATE users SET password = ? WHERE id = ".$_SESSION['admin']." ");
            $stmt->execute([$hashed]);
            if($stmt){ ?>
<script>
toastr.success('تم تحديث كلمة المرور بنجاح');
</script>
<audio autoplay>
    <source src="inc/sound/Success.mp3" type="audio/mpeg">
    <source src="Success.ogg" type="audio/ogg">
</audio>
<?php }
        }else{
            /***************Error*********************/ foreach($formError as $error){ ?>
<script>
toastr.warning('<?php echo $error; ?>');
</script>
<?php } } 
    } ?>