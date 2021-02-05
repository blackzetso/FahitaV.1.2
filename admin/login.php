<?php 
    ob_start();
    if(isset($_SESSION['admin'])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Admin Login </title>

		<!--Favicon -->
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!--Icons css-->
		<link rel="stylesheet" href="assets/css/icons.css">

		<!--Style css-->
		<link rel="stylesheet" href="assets/css/style.css">

		<!--mCustomScrollbar css-->
		<link rel="stylesheet" href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css">

		<!--Sidemenu css-->
		<link rel="stylesheet" href="assets/plugins/toggle-menu/sidemenu.css">

	</head>

	<body class="bg-light">
		<div id="app" class="page">
			<section class="section section-2">
                <div class="container">
					<div class="row">
						<div class="single-page single-pageimage construction-bg cover-image " data-image-src="assets/img/weather1.jpeg">
							<div class="row">
							    <div class="col-lg-6 col-xl-6">
									<div class="mt-xl-5">
										<div class="bg-transparent carouselTestimonial1 p-4 mx-auto mt-xl-5 mb-3 w-600">
											<div id="carouselTestimonial" class="carousel carousel-testimonial slide" data-ride="carousel">
												 
												<div class="carousel-inner">
													<div class="carousel-item text-center active">
														<img style="height: 150px;" src="../img/logo.png" class="mb-2  mt-lg-0 " alt="logo">
														<p class="m-0 pt-2 text-white">Welcome In FaceBox Admin Panel</p>
													</div> 
												</div>

											</div>
									    </div>
									</div>
								</div>
								<div class="col-lg-6 col-xl-6">
									<div class="login-sec">
										<div class=" text-center card mb-0">
											<form id="login" class="card-body" tabindex="500">
												<h4 class="mb-3">Login</h4>
												<div class="">
													<div class="form-group">
														<input type="email" class="form-control" name="email" placeholder="Enter email">
													</div>
													<div class="form-group">
														<input type="password" class="form-control" name="password" placeholder="Password">
													</div> 
													<div class="checkbox">
														<div class="custom-checkbox custom-control">
															<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
															<label for="checkbox-1" class="custom-control-label">Check me Out</label>
														</div>
													</div> 
												</div>
												<div class="submit mt-3 mb-3">
                                                    <button class="btn btn-primary btn-block"  type="submit" >Login</button>
												</div>
                                                <div class="submit mt-3 mb-3" id="loginSuccess" ></div>
								            </form> 
									    </div>
								    </div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<!--Jquery.min js-->
		<script src="assets/js/jquery.min.js"></script>

		<!--popper js-->
		<script src="assets/js/popper.js"></script>

		<!--Tooltip js-->
		<script src="assets/js/tooltip.js"></script>

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery.nicescroll.min js-->
		<script src="assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

		<!--Scroll-up-bar.min js-->
		<script src="assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

		<script src="assets/js/moment.min.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>
        <script > 
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
                            $("#loginSuccess").html(data);
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