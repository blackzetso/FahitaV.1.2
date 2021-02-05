<?php include 'init.php'; 
      
      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

      $stmt = $con->prepare("SELECT * FROM products WHERE id = ? ");
      $stmt->execute([$id]);
      $row = $stmt->fetch();

      $stmt = $con->prepare("SELECT * FROM unit ORDER BY id DESC");
      $stmt->execute();
      $units = $stmt->fetchAll();

      $stmt = $con->prepare("SELECT * FROM categories ORDER BY id DESC");
      $stmt->execute();
      $cats = $stmt->fetchAll(); 

      $stmt = $con->prepare("SELECT * FROM subcategories WHERE category = ? ORDER BY id DESC");
      $stmt->execute([$row['category']]);
      $scats = $stmt->fetchAll(); ?>

				<div class="app-content">
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">إدارة المنتجات</li>				 
                        </ol>

						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4> المنتجات </h4>
									</div>
									<div class="card-body">
                                        <div id="success" ></div> 
                                        
                                         <form id="add" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                    <div class="row" >
                                                        <div class="col-12" >
                                                            <div class="form-group files text-right">
                                                                <label for="recipient-name" class="form-control-label " dir="rtl"> صورة المنتج : <span class="text-danger" >*</span></label>
                                                                <input type="file" class="form-control1" name="img" required >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row text-right" dir="rtl" >  
                                                        <div class="col-md-12 col-sm-12" >
                                                            <div class="form-group text-right" >
                                                                <label for="recipient-name" class="form-control-label " dir="rtl"> اسم المنتج : <span class="text-danger" >*</span></label>
                                                                <input type="text" class="form-control text-right" dir="rtl" name="name"required > 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" >
                                                            <div class="form-group text-right" >
                                                                <label for="recipient-name" class="form-control-label " dir="rtl"> الوحدة الأولي : <span class="text-danger" >*</span></label>
                                                                <select class="form-control" name="unit" >
                                                                    <?php foreach($units as $unit){ ?>
                                                                    <option value="<?php echo $unit['name'] ?>" ><?php echo $unit['name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" >
                                                            <div class="form-group text-right" >
                                                                <label for="recipient-name" class="form-control-label " dir="rtl"> الوحده الثانية : <span class="text-danger" >*</span></label>
                                                                <select class="form-control" name="unit2" >
                                                                    <?php foreach($units as $unit){ ?>
                                                                    <option value="<?php echo $unit['name'] ?>" ><?php echo $unit['name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" > 
                                                            <div class="form-group text-right" >
                                                                <label for="recipient-name" class="form-control-label " dir="rtl"> سعر المنتج بالوحده الأولى : <span class="text-danger" >*</span></label>
                                                                <input type="text" class="form-control text-right" dir="rtl" name="price"required >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" > 
                                                            <div class="form-group text-right" >
                                                                <label for="recipient-name" class="form-control-label " dir="rtl"> سعر المنتج بالوحده الثانيه : <span class="text-danger" >*</span></label>
                                                                <input type="text" class="form-control text-right" dir="rtl" name="price2"required >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" >
                                                            <div class="form-group text-right" >
                                                                <label for="recipient-name" class="form-control-label " dir="rtl">  الخصم  :  </label>
                                                                <input type="text" class="form-control text-right" dir="rtl" name="discount" value="0">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" >
                                                            <div class="form-group text-right" >
                                                                <label for="recipient-name" class="form-control-label " dir="rtl">  ترتيب المنتج  :  </label>
                                                                <input type="number" class="form-control text-right" dir="rtl" name="order" value="0">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" >
                                                            <div class="form-group text-right" >
                                                                <label for="recipient-name" class="form-control-label " dir="rtl"> الأرقام العشريه للوحده :  </label>
                                                                <input type="text" class="form-control text-right" dir="rtl" name="decimal"required value="0.5"> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" >
                                                            <div class="form-group text-right" >
                                                                <label for="recipient-name" class="form-control-label " dir="rtl"> الإتاحه : <span class="text-danger" >*</span></label>
                                                                <select class="form-control" name="Availability" required > 
                                                                    <option selected value="متوفر فى المخزن" > متوفر فى المخزن </option>
                                                                    <option value="غير متوفر فى المخزن" > غير متوفر فى المخزن</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" >
                                                            <div class="form-group text-right" >
                                                                <label for="recipient-name" class="form-control-label " dir="rtl"> القسم : <span class="text-danger" >*</span></label>
                                                                <select class="form-control" name="category" id="category" > 
                                                                    <?php foreach($cats as $cat){ ?>
                                                                    <option value="<?php echo $cat['id']; ?>" ><?php echo $cat['name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" >
                                                            <div class="form-group text-right" >
                                                                <label for="recipient-name" class="form-control-label " dir="rtl"> القسم الفرعى : <span class="text-danger" >*</span></label>
                                                                <select class="form-control" name="subCat" id="subCat" > 
                                                                    <option  > قم بتحديد القسم الرئيسي أولا </option> 
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>  
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"> Save  </button>
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
                 $(document).on('submit','#add',function(event){
                    event.preventDefault(); 
                    var Form = $(this);
                    $.ajax({
                        type:'POST',
                        url:'inc/products/insert2.php',
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