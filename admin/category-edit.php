<?php include 'init.php'; 
      
      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

      $stmt = $con->prepare("SELECT * FROM categories WHERE id = ? ");
      $stmt->execute([$id]);
      $row = $stmt->fetch(); ?>

				<div class="app-content">
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">إدارة الأقسام</li>				 
                        </ol>

						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4> تعديل القسم </h4>
									</div>
									<div class="card-body">
                                        <div id="success" ></div>
                                          <div class="row" >
                                            <div class="col-12" >
                                                <div class="form-group text-center">
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#image-edit" >
                                                        <img style="width:300px;width:300px;" src="../img/categories/<?php echo $row['img']; ?>" >
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <form id="edit" >
                                            <div class="row text-right" dir="rtl" >  
                                                <div class="col-md-12 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> اسم المنتج : <span class="text-danger" >*</span></label>
                                                        <input type="text" class="form-control text-right" value="<?php echo $row['name'] ?>" dir="rtl" name="name"required > 
                                                    </div>
                                                </div> 
                                            </div> 

                                            <div class="form-group text-right" >
                                                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                                                <button class="btn btn-success" >حفظ</button>
                                            </div>
                                        </form>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
                
                    <!-- Message Modal -->
				<div class="modal fade" id="image-edit" tabindex="-1" role="dialog"  aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
				            <form id="img-edit" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group files" >
                                        <input type="file" class="form-control1" name="img" >
                                    </div>
                                    <div class="form-group text-right" >
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                                        <button type="submit" class="btn btn-success" >حفظ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

				<?php include $App . 'footer.php'; ?>

			</div>
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

		<script>
			$(function(e) {
				$('#example').DataTable();
			} );
		</script>
        <script > 
                $(document).on('submit','#edit',function(event){
                    event.preventDefault(); 
                    var Form = $(this);
                    $.ajax({
                        type:'POST',
                        url:'inc/categories/edit.php',
                        beforeSend:function(){
                            Form.find("button[type='submit']").prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                            Form.find("button[type='submit']").attr('disabled','true');
                        },
                        data:new FormData(this),
                        contentType:false,
                        processData:false, 
                        success:function(data){
                            $("#success").html(data);
                        },
                        complete:function(data){
                            $('.spinner-border').remove();
                            Form.find("button[type='submit']").removeAttr('disabled');
                            $('#addCategory').modal('hide')
                        }
                    })
                });
            
                $(document).on('submit','#img-edit',function(event){
                    event.preventDefault(); 
                    var Form = $(this);
                    $.ajax({
                        type:'POST',
                        url:'inc/categories/img.php',
                        beforeSend:function(){
                            Form.find("button[type='submit']").prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                            Form.find("button[type='submit']").attr('disabled','true');
                        },
                        data:new FormData(this),
                        contentType:false,
                        processData:false, 
                        success:function(data){
                            $("#success").html(data);
                        },
                        complete:function(data){
                            $('.spinner-border').remove();
                            Form.find("button[type='submit']").removeAttr('disabled');
                            $('#image-edit').modal('hide')
                        }
                    })
                });
                $(document).ready(function(){
                    $('#category').on('change',function(){
                        var ID = $(this).val();
                        if(ID){
                            $.ajax({
                                type:'POST',
                                url:'inc/ajaxData.php',
                                data:'category='+ID,
                                success:function(html){
                                    $('#subCat').html(html);

                                }
                            }); 
                        }else{
                            $('#subCat').html('<option value="">Select Category first</option>'); 
                        }
                    });  
                })
            </script>

	</body>
</html>