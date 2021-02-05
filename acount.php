<?php session_start();
      include 'connect.php'; 
      include 'inc/App/lang.php';

      if(isset($_SESSION['id'])){
          $stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
          $stmt->execute([$_SESSION['id']]);
          $row = $stmt->fetch();
      } ?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./css/acount.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <link rel="stylesheet" href="css/color.css">
    <title><?php echo translate('4'); ?></title>
</head>
<body> 
    <nav>
        <div class="title">
            <h4> <?php echo translate('7'); ?>  </h4>
        </div>
        <div class="icon">
            <a href="./index.php"><i class="fas fa-chevron-left"></i></a>
        </div>
    </nav>
    
    <?php include 'inc/pages/nav.php';     
    
        $stmt = $con->prepare("SELECT * FROM `language`");
        $stmt->execute();
        $langs = $stmt->fetchAll();
        if(isset($_SESSION['id'])) { ?>
    
    <section class="forms">
        <form id="lang" >
            <div class="form-group">
                <label><?php echo translate('5'); ?></label>
                <select class="form-control" name="lang" >
                    <?php foreach($langs as $lang){ ?>
                    <option <?php if($lang['code'] == $_COOKIE['langauge']){ echo 'selected'; } ?> value="<?php echo $lang['code'] ?>" ><?php echo $lang['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </form>
        <form id="edit">
            <div class="item user">
                <input type="text" name="name" value="<?php if(isset($_SESSION['id'])){ echo $row['full_name']; } ?>" required> <label for=""><?php echo translate('6'); ?></label>
            </div>
            <div class="item email">
                <input type="email" name="email" value="<?php if(isset($_SESSION['id'])){ echo $row['email']; } ?>" required> <label for=""> <?php echo translate('9'); ?> @ </label>
            </div>
            <div class="item phone-number">
                <input type="text" name="phone" value="<?php if(isset($_SESSION['id'])){ echo $row['phone_number']; } ?>" required> <label for=""> <?php echo translate('10'); ?>  </label>
            </div>
            <div class="btn-save">
                <input type="submit"  class="save" value="<?php echo translate('8'); ?>">
            </div>
            <div id="Success" ></div>
        </form>
    </section>
<?php } else{
          header('location:login.php');
        } ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/all.min.js"></script>
    <script>
          $(document).on('submit','#edit',function(event){
                event.preventDefault(); 
                var Form = $(this);
                $.ajax({
                    type:'POST',
                    url:'inc/account/edit.php',
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
        
            $(document).on('change','#lang',function(event){
                event.preventDefault(); 
                var Form = $(this);
                $.ajax({
                    type:'POST',
                    url:'inc/settings/lang.php',
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