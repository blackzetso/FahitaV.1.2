<?php include 'init.php'; 
      
      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

      $stmt = $con->prepare("SELECT * FROM products WHERE id = ? ");
      $stmt->execute([$id]);
      $row = $stmt->fetch();
  ?> 

				<div class="app-content">
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> اتصل بنا </li>				 
                        </ol>

						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4> اتصل بنا </h4>
									</div>
									<div class="card-body">
                                        <div id="success" ></div>  
                                        <form id="edit" >
                                            <div class="row text-right" dir="rtl" >  
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> اسم المنتج : <span class="text-danger" >*</span></label>
                                                        <input type="text" class="form-control text-right" value="<?php echo $row['name'] ?>" dir="rtl" name="name"required > 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> الوحدة   : <span class="text-danger" >*</span></label>
                                                        <select class="form-control" name="unit" >
                                                            <?php foreach($units as $unit){ ?>
                                                            <option <?php if($row['unite'] == $unit['name']){ echo 'selected'; } ?> value="<?php echo $unit['name'] ?>" ><?php echo $unit['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> سعر المنتج بالوحده الأولى : <span class="text-danger" >*</span></label>
                                                        <input type="text" class="form-control text-right" value="<?php echo $row['price'] ?>" dir="rtl" name="price"required >
                                                    </div> 
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl">  الخصم  :  </label>
                                                        <input type="text" class="form-control text-right" value="<?php echo $row['discount'] ?>" dir="rtl" name="discount" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> الأرقام العشريه للوحده :  </label>
                                                        <input type="text" class="form-control text-right" dir="rtl" name="decimal"required value="<?php echo $row['Decimal_number'] ?>"> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl">  ترتيب المنتج  :  </label>
                                                        <input type="number" class="form-control text-right" dir="rtl" name="order" value="<?php if(!$row['order_product']){ echo '0'; }else{ echo $row['order_product']; } ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-12" >
                                                    <div class="form-group text-center" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl">  الأكثر مبيعا  :  </label>
                                                        <input type="checkbox" class="form-control text-right" dir="rtl" name="bestSeller" <?php if($row['best_seller'] == '1'){ echo 'checked'; } ?> >
                                                    </div>
                                                </div> 
                                                <div class="col-md-3 col-sm-12" >
                                                    <div class="form-group text-center" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> وافد جديد :  </label>
                                                        <input type="checkbox" class="form-control text-right" dir="rtl" name="newArrival" <?php if($row['new_arrivals'] == '1'){ echo 'checked'; } ?> >
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-12" >
                                                    <div class="form-group text-center" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> مميز :  </label>
                                                        <input type="checkbox" class="form-control text-right" dir="rtl" name="feature" <?php if($row['featured'] == '1'){ echo 'checked'; } ?> >
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-12" >
                                                    <div class="form-group text-center" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> صفقة اليوم :  </label>
                                                        <input type="checkbox" class="form-control text-right" dir="rtl" name="deal" <?php if($row['Deal_Of_Day'] == '1'){ echo 'checked'; } ?> >
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> الماركه : <span class="text-danger" >*</span></label>
                                                        <select class="form-control" name="brand" >
                                                            <option value="0" >اختر الماركه</option>
                                                            <?php foreach($brands as $brand){ ?>
                                                            <option value="<?php echo $brand['id'] ?>" ><?php echo $brand['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> الإتاحه : <span class="text-danger" >*</span></label>
                                                        <select class="form-control" name="Availability" required > 
                                                            <option <?php if($row['Availability'] == 'متوفر فى المخزن'){ echo 'selected'; } ?> value="متوفر فى المخزن" > متوفر فى المخزن </option>
                                                            <option <?php if($row['Availability'] == 'غير متوفر فى المخزن'){ echo 'selected'; } ?> value="غير متوفر فى المخزن" > غير متوفر فى المخزن</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> القسم : <span class="text-danger" >*</span></label>
                                                        <select class="form-control" name="category" id="category" > 
                                                            <?php foreach($cats as $cat){ ?>
                                                            <option <?php if($cat['id'] == $row['category']){ echo 'selected'; } ?> value="<?php echo $cat['id']; ?>" ><?php echo $cat['name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label for="recipient-name" class="form-control-label " dir="rtl"> القسم الفرعى : <span class="text-danger" >*</span></label>
                                                        <select class="form-control" name="subCat" id="subCat" >
                                                            <?php foreach($scats as $scat){ ?>
                                                            <option value="<?php echo $scat['id'] ?>" > <?php echo $scat['name'] ?> </option> 
                                                            <?php } ?>
                                                        </select>
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
                        url:'inc/products/edit.php',
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
                        url:'inc/products/img.php',
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