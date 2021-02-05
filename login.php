<?php ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <link rel="stylesheet" href="css/color.css">
    <title>تسجيل الدخول</title>
</head>
<body>
    <?php if(isset($_SESSION['id'])){
        header('location:index.php');
    } ?>
    <div class="logo">
        <div class="logo-img">
            <img src="img/logo.png" alt="">
        </div>
    </div>
    <section class="forms">
        <div id="Success"></div>
        <form id="login" > 
            <div class="item email">
                <input type="email" name="email" required> <label for="">البريد الالكتروني @</label>
            </div>
            <div class="item password">
                <input type="password" name="password" required> <label for="">الرقم السري</label>
            </div>
            <div class="btn-save">
                <input type="submit"  class="save" value="تسجيل الدخول">
            </div>
        </form>
    </section>

    <div class="option">
        <div class="sigup">
            <span class="text">لا تملك حساب؟ <span><a href="./siginup.php" >انشاء حساب</a></span> </span>
        </div>
        <div class="password">
            <span><a href="./forgetPass.php">نسيت كلمة المرور</a></span>
        </div>
        <div class="viwe-proudct">
            <span><a href="index.php">تصفح المتجات</a></span>
        </div>
    </div> 

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="../js/all.min.js"></script>
    <script>
          $(document).on('submit','#login',function(event){
                    event.preventDefault(); 
                    var Form = $(this);
                    $.ajax({
                        type:'POST',
                        url:'inc/login/login.php',
                        beforeSend:function(){
                            Form.find("button[type='submit']").prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                            Form.find("button[type='submit']").attr('disabled','true');
                        },
                        data:new FormData(this),
                        contentType:false,
                        processData:false, 
                        success:function(data){
                            $("#Success").html(data);
                        },
                        complete:function(data){
                            $('.spinner-border').remove();
                            Form.find("button[type='submit']").removeAttr('disabled');
                        }
                    })
                });
    </script>
</body>
</html>