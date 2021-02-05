<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/siginup.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <link rel="stylesheet" href="css/color.css">
    <title>تسجيل الدخول</title>
</head>
<body>

    <div class="logo">
        <div class="logo-img">
            <img src="img/logo.png" alt="">
        </div>
    </div>
    <section class="forms">
        <form id="SignUp" >
            <div class="item full-name">
                <input type="text" name="name" required> <label for="">الاسم كاملا</label>
            </div>
            <div class="item email">
                <input type="email" name="email" required> <label for="">البريد الالكتروني @</label>
            </div>
            <div class="item phone-number">
                <input type="text" name="phone" required> <label for="">رقم الموبيل</label>
            </div>
            <div class="item password">
                <input type="password" name="password" required> <label for="">الرقم السري</label>
            </div>
            <div class="btn-save">
                <input type="submit"  class="save" value="تسجيل ">
            </div>
            <div class="btn-save" id="ajax" ></div>
        </form>
    </section>  



    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/all.min.js"></script>
    <script>
         $(document).on('submit','#SignUp',function(event){
                event.preventDefault(); 
                var Form = $(this);
                $.ajax({
                    type:'POST',
                    url:'inc/login/signup.php',
                    beforeSend:function(){
                        Form.find("button[type='submit']").prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                        Form.find("button[type='submit']").attr('disabled','true');
                    },
                    data:new FormData(this),
                    contentType:false,
                    processData:false, 
                    success:function(data){
                        $("#ajax").html(data);
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