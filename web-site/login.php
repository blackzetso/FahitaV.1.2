<?php 
    $title = 'login - signup';
    include 'init.php'; 
    if(isset($_SESSION['id'])){
        echo redirect('index.php');
    } ?>
<div class="header-device-mobile">
		<div class="wapper">
			<div class="item mobile-logo">
                <div class="logo">
                    <a href="#">
                        <img src="assets/images/logo.png" alt="img">
                    </a>
                </div>
			</div>
			<div class="item item mobile-search-box has-sub">
				<a href="#">
						<span class="icon">
							<i class="fa fa-search" aria-hidden="true"></i>
						</span>
				</a> 
				<div class="block-sub">
					<a href="#" class="close">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
					<div class="header-searchform-box">
						<form class="header-searchform">
							<div class="searchform-wrap">
								<input type="text" class="search-input" placeholder="Enter keywords to search...">
								<input type="submit" class="submit button" value="Search">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="item mobile-settings-box has-sub">
				<a href="#">
						<span class="icon">
							<i class="fa fa-cog" aria-hidden="true"></i>
						</span>
				</a>
				<div class="block-sub">
					<a href="#" class="close">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a> 
				</div>
			</div>
			<div class="item menu-bar">
				<a class=" mobile-navigation  menu-toggle" href="#">
					<span></span>
					<span></span>
					<span></span>
				</a>
			</div>
		</div>
	</div>
	<div class="main-content main-content-login">
		<div class="container">
			 
			<div class="row">
				<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="site-main">
						 
						<div class="customer_login">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="login-item">
										<h5 class="title-login"><?php echo translate('76') ?></h5>
										<form id="login" class="login">
											 
											<p class="form-row form-row-wide">
												<label class="text"><?php echo translate('9') ?></label>
												<input title="<?php echo translate('9') ?>" name="email" type="text" class="input-text">
											</p>
											<p class="form-row form-row-wide">
												<label class="text"><?php echo translate('40') ?></label>
												<input title="<?php echo translate('40') ?>" name="password" type="password" class="input-text">
											</p>
											<p class="lost_password">
												<span class="inline">
													<input type="checkbox" id="cb1">
													<label for="cb1" class="label-text">Remember me</label>
												</span>
												<a href="#" class="forgot-pw">Forgot password?</a>
											</p>
											<p class="form-row">
                                                <button type="submit" class="button-submit" > <?php echo translate('41') ?> </button>
											</p>
                                            <div class="form-row" >
                                                <div id="loginSuccess" ></div>
                                            </div>
										</form>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="login-item">
										<h5 class="title-login"><?php echo translate('75') ?></h5>
										<form id="register" class="register">
                                            <p class="form-row form-row-wide">
												<label class="text"><?php echo translate('6') ?></label>
												<input title="<?php echo translate('6') ?>" name="name" type="text" class="input-text">
											</p>
											<p class="form-row form-row-wide">
												<label class="text"><?php echo translate('9') ?></label>
												<input title="<?php echo translate('9') ?>" name="email" type="email" class="input-text">
											</p>
											<p class="form-row form-row-wide">
												<label class="text"><?php echo translate('10') ?></label>
												<input title="<?php echo translate('10') ?>" type="text" name="phone" class="input-text">
											</p>
											<p class="form-row form-row-wide">
												<label class="text"><?php echo translate('40') ?></label>
												<input title="<?php echo translate('40') ?>" name="password" type="password" class="input-text">
											</p>
											<p class="form-row">
												<span class="inline">
													<input type="checkbox" id="cb2">
													<label for="cb2" class="label-text">I agree to <span>Terms & Conditions</span></label>
												</span>
											</p>
											<p class="">
                                                <button type="submit" class="button-submit"  ><?php echo translate('42') ?></button>
											</p>
                                            <div class="form-row" >
                                                <div id="registerSuccess" ></div>
                                            </div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php include $App . 'footer.php'; ?>
    
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