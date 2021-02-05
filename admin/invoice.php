<?php include 'init.php'; 

      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    
      $stmt = $con->prepare("SELECT * FROM order_items WHERE order_id = ? ");
      $stmt->execute([$id]);
      $rows = $stmt->fetchAll();

      $stmt = $con->prepare("SELECT * FROM orders WHERE id = ? ");
      $stmt->execute([$id]);
      $order = $stmt->fetch();

      $stmt = $con->prepare("SELECT * FROM users WHERE id = ? ");
      $stmt->execute([$order['user']]);
      $user = $stmt->fetch();

      $stmt = $con->prepare("SELECT SUM(total) FROM order_items WHERE order_id = ? ");
      $stmt->execute([$id]);
      $info = $stmt->fetch();
?>

				<div class="app-content">
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">إدارة المنتجات</li>				 
                        </ol>
                        
                        <div class="row">
							<div class="col-12">
								<div class="card">
									<div class=" mb-0">
										<div class="clearfix card-body p-3 border-bottom">
											<div class="pull-left">
												<h5 class="mb-0">فاتورة رقم #<?php echo $id; ?></h5>
											</div>
											<div class="pull-right">
												<p class="text-muted mb-0 mt-1">تاريخ الفاتورة ( <?php echo $order['date']; ?> )</p>
											</div>
										</div>
										<div class="row card-body">
											<div class="col-md-12 text-right" dir="rtl">
												<div class="pull-left m-t-5 m-b-5">
													<h6>معلومات العميل</h6>
													<address class="mb-0">
														<?php echo $user['full_name']; ?><br>
                                                        <?php echo $order['city']; ?> , <?php echo $order['zone']; ?> , <?php echo $order['street']; ?><br>
														رقم المبنى / العمارة <?php echo $order['build']; ?><br> 
                                                        رقم الشقه / الدور <?php echo $order['storey']; ?><br>
													</address>
												</div>
												<div class="pull-right m-t-5 m-b-5">
													<h6>وقت التوصيل :</h6> 
													<p class="mb-1"><span class="text-muted">من : </span> <?php echo $order['time_from']; ?> </p>
													<p class="mb-0"><span class="text-muted">الى : </span> <?php echo $order['time_to']; ?> </p>
                                                    <p class="mb-0"><span class="text-muted">هاتف : </span> <?php echo $user['phone_number']; ?> </p>
												</div>
											</div><!-- end col -->
										</div>
										<!-- end row -->

										<div class="card-body pt-0">
											<div class="row">
												<div class="col-md-12">
													<div class="table-responsive">
														<table class="table border text-center table-bordered text-nowrap">
															<thead>
																<tr>
																	<th class="border-0 text-uppercase  font-weight-bold">ID</th>
																	<th class="border-0 text-uppercase  font-weight-bold">المنتج</th> 
																	<th class="border-0 text-uppercase  font-weight-bold"> سعر الوحدة </th>
																	<th class="border-0 text-uppercase  font-weight-bold"> الكمية </th>
																	<th class="border-0 text-uppercase  font-weight-bold">الإجمالى</th>
																</tr>
															</thead>
															<tbody>
                                                                <?php foreach($rows as $cat) { ?>
																<tr>
																	<td><?php echo $cat['item_id']; ?></td>
																	<td><?php echo $cat ['name']; ?></td>
																	<td><?php echo $cat ['price']; ?></td>
																	<td><?php echo $cat ['qty']; ?></td>
																	<td><?php echo $cat ['total']; ?></td> 
																</tr> 
                                                                <?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</div> 
                                            <div class="row text-right" dir="rtl">
												<div class="col-xl-3 col-12 offset-xl-9">
													<p class="text-right"><strong>تكلفة المشتريات:</strong> <?php echo $info['SUM(total)']; ?> جنية  </p>
													<p class="text-right"> تكلفة الشحن : 15</p>
													<hr>
													<h4 class="text-right">  : الإجمالي<strong> <?php echo $info['SUM(total)']+15; ?> جنية  </strong></h4>
												</div>
											</div> 
											<div class=" mb-0">
												<div class="pull-right">
													<a href="javascript:void(0)" onclick="window.print()" class="btn btn-primary  m-b-5 m-t-5"><i class="fa fa-print"></i> طباعه </a> 
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					 
					</section>
				</div>
                
                <!-- Message Modal --> 
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
                $(document).on('click','.delete',function(e){
                   e.preventDefault();
                   var id  = $(this).data('id');
                   $("#item .del-btn").attr('data-id',id);
                   $("#item .hidden-input").attr('value',id);
                });

                $(document).on('submit','#delForm',function(e){
                   e.preventDefault();
                    var idd = $('#item .del-btn').data('id');
                   $.ajax({
                       type: 'POST',
                       url: 'inc/products/delete.php',
                       data: new FormData(this),
                       contentType: false,
                       cache: false,
                       processData:false,
                       success:function(data){
                           //$('#success').html(data);
                           $('.delete[data-id='+ idd +']').parent().parent().remove();
                       }
                   })
                });
            
                $(document).on('submit','#add',function(event){
                    event.preventDefault(); 
                    var Form = $(this);
                    $.ajax({
                        type:'POST',
                        url:'inc/products/insert.php',
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