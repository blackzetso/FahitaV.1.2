<?php 
     
    $title = 'البيانات الشخصيه';
    include 'init.php'; ?>
<div class="app-content">
					<section class="section"> 
                        
						<div class="row">
                            <div class="col-12">
									<div class="card  text-right" style="direction:rtl"  >
										<div class="card-header">
											<h4> اعدادات الحساب </h4>
										</div>
										<div class="card-body">
											<div class="row">
                                                <div id="Acontent" ></div>
												<div class="col-12 col-sm-12 col-md-4">
													<ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
														<li class="nav-item">
															<a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true"> بيانات الحساب </a>
														</li>
														<li class="nav-item">
															<a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false"> البيانات الشخصيه </a>
														</li>
														<li class="nav-item">
															<a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false"> كلمة المرور </a>
														</li>
													</ul>
												</div>
												<div class="col-12 col-sm-12 col-md-8">
													<div class="tab-content border p-3" id="myTab3Content">
														<div class="tab-pane fade show active p-0" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                                            <div class="card">
                                                                <div class="card-header text-right">
                                                                    <h4> تعديل بيانات الحساب </h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form id="account-setting" class="form-horizontal text-right" style="direction:rtl;" >
                                                                        <div class="form-group row"> 
                                                                            <label for="inputName" class="col-md-3 col-form-label"> الاسم </label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" class="form-control" name="Adminname" value="<?php echo $users['full_name']; ?>">
                                                                            </div> 
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3" class="col-md-3 col-form-label"> البريد الإلكترونى </label> 
                                                                            <div class="col-md-9">
                                                                                <input type="email" class="form-control" name="Adminemail" value="<?php echo $users['email']; ?>">
                                                                            </div> 
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="inputPassword3" class="col-md-3 col-form-label"> كلمة السر الحاليه </label> 
                                                                            <div class="col-md-9">
                                                                                <input type="password" name="Adminpassword" class="form-control"   placeholder="Password">
                                                                            </div> 
                                                                        </div>  
                                                                        <div class="form-group mb-0 mt-2 row justify-content-end">
                                                                            <div class="col-md-9">
                                                                                <button type="submit" name="submit" class="btn btn-info"> حفظ </button> 
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="tab-pane fade p-0" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                                            <div class="card">
                                                                <div class="card-header text-right">
                                                                    <h4> تعديل البيانات الشخصيه </h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form id="personal-setting" class="form-horizontal text-right" style="direction:rtl;" > 
                                                                        <div class="form-group row"> 
                                                                            <label for="inputName" class="col-md-3 col-form-label">  الصورة الشخصيه </label>
                                                                            <div class="col-md-9 ">
                                                                                <input type="file" name="img" class="form-control text-right"  >
                                                                            </div> 
                                                                        </div>  
                                                                        <div class="form-group mb-0 mt-2 row justify-content-end">
                                                                            <div class="col-md-9">
                                                                                <button type="submit" class="btn btn-info"> حفظ </button> 
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="tab-pane fade p-0" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                                            <div class="card">
                                                                <div class="card-header text-right">
                                                                    <h4> تعديل  كلمة المرور   </h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form id="password" class="form-horizontal text-right" style="direction:rtl;" >
                                                                        <div class="form-group row"> 
                                                                            <label for="inputName" class="col-md-3 col-form-label">  كلمة المرور الحاليه </label>
                                                                            <div class="col-md-9">
                                                                                <input type="password" name="password" class="form-control text-right" id="inputName" > 
                                                                            </div> 
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3" class="col-md-3 col-form-label">  كلمة المرور الجديده  </label> 
                                                                            <div class="col-md-9">
                                                                                <input type="password" name="newpass" class="form-control text-right" id="inputEmail3"  >
                                                                            </div> 
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="inputPassword3" class="col-md-3 col-form-label"> تأكيد كلمة المرور </label> 
                                                                            <div class="col-md-9">
                                                                                <input type="password" name="confpass" class="form-control text-right" id="inputPassword3"  >
                                                                            </div> 
                                                                        </div> 

                                                                        <div class="form-group mb-0 mt-2 row justify-content-end">
                                                                            <div class="col-md-9">
                                                                                <button type="submit" class="btn btn-info"> حفظ </button> 
                                                                            </div>
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
                        </div>
                            
            </section>
</div>
<?php include $App . 'footer.php'; ?>
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

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--Othercharts js-->
		<script src="assets/plugins/othercharts/jquery.knob.js"></script>
		<script src="assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--DataTables js-->
		<script src="assets/plugins/Datatable/js/jquery.dataTables.js"></script>
		<script src="assets/plugins/Datatable/js/dataTables.bootstrap4.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>
        <!-- Icon Picker -->
        <script type="text/javascript" src="assets/plugins/icon-picker/bootstrap-iconpicker.bundle.min.js"></script>

	    <script src="assets/plugins/toastr/build/toastr.min.js"></script>

	
<script > 
$(document).ready(function(e){   
        $("#account-setting").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'inc/Account/account.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        //$('.disable').attr("disabled","disabled");
                       // $('#book').css("opacity",".5");
                    },
                    success:function(data){
                    $('#Acontent').html(data);
                 }
                });
            }); 



         $("#personal-setting").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'inc/Account/profile.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        //$('.disable').attr("disabled","disabled");
                       // $('#book').css("opacity",".5");
                    },
                    success:function(data){
                    $('#Acontent').html(data);
                 }
                });
            });


            $("#img").change(function() {
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg","image/Gif"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                    alert('(JPEG/JPG/PNG/Gif) من فضلك ادخل نوع ملف مدعوم ');
                    $("#img").val('');
                    return false;
                }
            });  

        $("#password").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'inc/Account/password.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        //$('.disable').attr("disabled","disabled");
                       // $('#book').css("opacity",".5");
                    },
                    success:function(data){
                    $('#Acontent').html(data);
                 }
                });
            });

        });
 
</script> 
</body>
</html>