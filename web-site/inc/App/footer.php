<div id="wanted" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form id="wantedOrders" >
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo translate('74') ?></h4>
          </div>
          <div class="modal-body">
             <label class="mb-5" ><?php echo translate('79') ?></label>
             <input type="text" name="name" class="form-control" placeholder="اكتب ما تريده هنا" >
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"  ><?php echo translate('77'); ?></button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo translate('78'); ?></button>
          </div>
      </form>
    </div>

  </div>
</div>
<footer class="footer style7">
    <div class="container">
        <div class="container-wapper">
            <div class="row">
                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-sm hidden-md hidden-lg">
                    <div class="gnash-newsletter style1">
                        <div class="newsletter-head">
                            <h3 class="title">Newsletter</h3>
                        </div>
                        <div class="newsletter-form-wrap">
                            <div class="list">
                                Sign up for our free video course and <br/> urban garden inspiration
                            </div>
                            <input type="email" class="input-text email email-newsletter"
                                   placeholder="Your email letter">
                            <button class="button btn-submit submit-newsletter">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="gnash-custommenu default">
                        <h2 class="widgettitle">Categories</h2>
                        <ul class="menu">
                            <?php foreach($ncats as $cat){ ?> 
                            <li class="menu-item">
                                <a href="category.php?id=<?php echo $cat['id']; ?>"> <?php echo $cat['name']; ?>  </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs">
                    <div class="gnash-newsletter style1">
                        <div class="newsletter-head">
                            <h3 class="title">Newsletter</h3>
                        </div>
                        <div class="newsletter-form-wrap">
                            <div class="list">
                                Sign up for our free video course and <br/> urban garden inspiration
                            </div>
                            <input type="email" class="input-text email email-newsletter"
                                   placeholder="Your email letter">
                            <button class="button btn-submit submit-newsletter">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="gnash-custommenu default">
                        <h2 class="widgettitle">Information</h2>
                        <ul class="menu">
                          
                            <li class="menu-item">
                                <a href="about"><?php echo translate('38') ?></a>
                            </li>
                            <li class="menu-item">
                                <a href="policy.php"><?php echo translate('39') ?></a>
                            </li>
                            <li class="menu-item">
                                <a href="contact.php"><?php echo translate('4'); ?></a>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#wanted" ><?php echo translate('74') ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-end">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="gnash-socials">
                            <ul class="socials">
                                <li>
                                    <a href="#" class="social-item" target="_blank">
                                        <i class="icon fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-item" target="_blank">
                                        <i class="icon fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-item" target="_blank">
                                        <i class="icon fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="coppyright">
                            Copyright © 2020 Develobment By
                            <a href="https://semi-colen.com"> سيمي كولن </a>
                            . All rights reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

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
                        $("#wantedSuccess").html(data);
                    },
                    complete:function(data){
                        $('.spinner-border').remove();
                        Form.find("button[type='submit']").removeAttr('disabled');
                    }
                })
            });
    
            $(document).on('submit','#password',function(event){
                event.preventDefault(); 
                var Form = $(this);
                $.ajax({
                    type:'POST',
                    url:'inc/account/password.php',
                    beforeSend:function(){
                        Form.find("button[type='submit']").prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                        Form.find("button[type='submit']").attr('disabled','true');
                    },
                    data:new FormData(this),
                    contentType:false,
                    processData:false, 
                    success:function(data){
                        $("#wantedSuccess").html(data);
                    },
                    complete:function(data){
                        $('.spinner-border').remove();
                        Form.find("button[type='submit']").removeAttr('disabled');
                    }
                })
            });
            
            $(document).on('submit','#addToCart',function(event){
                event.preventDefault(); 
                var Form = $(this);
                $.ajax({
                    type:'POST',
                    url:'inc/cart/insert.php',
                    beforeSend:function(){
                        Form.find("button[type='submit']").prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                        Form.find("button[type='submit']").attr('disabled','true');
                    },
                    data:new FormData(this),
                    contentType:false,
                    processData:false, 
                    success:function(data){
                        $("#CartCount").html(data);
                    },
                    complete:function(data){
                        $('.spinner-border').remove();
                        Form.find("button[type='submit']").removeAttr('disabled');
                    }
                })
            });
    
            $(document).ready(function(){
                $('#category').on('change',function(){
                    var ID = $(this).val();
                    if(ID){
                        $.ajax({
                            type:'POST',
                            url:'inc/category.php',
                            data:'category='+ID,
                            success:function(html){
                                $('#subCategory').html(html);

                            }
                        }); 
                    }else{
                        $('#subCategory').html('<option value="">Select Category first</option>'); 
                    }
                });  
            });
</script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>