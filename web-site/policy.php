<?php 
    $title = 'Store Policy';
    include 'init.php';

    $stmt = $con->prepare("SELECT * FROM team");
    $stmt->execute();
    $team = $stmt->fetchAll();

    $stmt = $con->prepare("SELECT policy FROM `about`");
    $stmt->execute();
    $policy = $stmt->fetch();
?> 
<div class="main-content main-content-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.php"><?php echo translate('1'); ?></a>
                        </li>
                        <li class="trail-item trail-end active">
                            <?php echo translate('39'); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-about col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title"><?php echo translate('39'); ?></h3>
                    <div class="page-main-content"> 
                                
                           <?php echo $policy['policy']; ?> 
                            
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include $App . 'footer.php'; ?>
 
<a href="#" class="backtotop">
    <i class="fa fa-angle-double-up"></i>
</a>
<script src="assets/js/jquery-1.12.4.min.js"></script>
<script>
     window.onload = function(){

          window.getinfo = function(urlx,id){
                $.get(urlx).done(function(data){

                    $(id).html(data);
                    $(hide).hide();
                });  
          }
        };
    
     $(document).on('submit','#wantedOrders',function(event){
            event.preventDefault(); 
            var Form = $(this);
            $.ajax({
                type:'POST',
                url:'inc/wanted/insert.php',
                beforeSend:function(){
                    Form.find("button[type='submit']").prepend('<i class="fas fa-spinner fa-spin"></i>');
                    Form.find("button[type='submit']").attr('disabled','true');
                },
                data:new FormData(this),
                contentType:false,
                processData:false, 
                success:function(data){
                    $("#wantedSuccess").html(data);
                },
                complete:function(data){
                    $('#wanted').modal('hide');
                }
            })
        });
</script>
<script src="assets/js/jquery.plugin-countdown.min.js"></script>
<script src="assets/js/jquery-countdown.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/magnific-popup.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/jquery.scrollbar.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/mobile-menu.js"></script>
<script src="assets/js/chosen.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/jquery.elevateZoom.min.js"></script>
<script src="assets/js/jquery.actual.min.js"></script>
<script src="assets/js/fancybox/source/jquery.fancybox.js"></script>
<script src="assets/js/lightbox.min.js"></script>
<script src="assets/js/owl.thumbs.min.js"></script>
<script src="assets/js/jquery.scrollbar.min.js"></script>
<script src="assets/js/frontend-plugin.js"></script>
<script src="assets/js/toastr.js" ></script>
<script> 
        $(document).on('submit','#register',function(event){
            event.preventDefault(); 
            var Form = $(this);
            $.ajax({
                type:'POST',
                url:'inc/login/signup.php',
                beforeSend:function(){
                    Form.find("button[type='submit']").prepend('<i class="fas fa-spinner fa-spin"></i>');
                    Form.find("button[type='submit']").attr('disabled','true');
                },
                data:new FormData(this),
                contentType:false,
                processData:false, 
                success:function(data){
                    $("#registerSuccess").html(data);
                },
                complete:function(data){
                    $('.fa-spinner').remove();
                    Form.find("button[type='submit']").removeAttr('disabled');
                }
            })
        });
        $(document).on('submit','#login',function(event){
            event.preventDefault(); 
            var Form = $(this);
            $.ajax({
                type:'POST',
                url:'inc/login/login.php',
                beforeSend:function(){
                    Form.find("button[type='submit']").prepend('<i class="fas fa-spinner fa-spin"></i>');
                    Form.find("button[type='submit']").attr('disabled','true');
                },
                data:new FormData(this),
                contentType:false,
                processData:false, 
                success:function(data){
                    $("#loginSuccess").html(data);
                },
                complete:function(data){
                    $('.fa-spinner').remove();
                    Form.find("button[type='submit']").removeAttr('disabled');
                }
            })
        });
</script>
</body>
</html>