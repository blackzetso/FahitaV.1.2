<?php include 'init.php'; 

      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

      $today = date('Y-m-d');
      $stmt = $con->prepare("SELECT DISTINCT item_id FROM order_items WHERE date = ? ");
      $stmt->execute([$today]);
      $rows = $stmt->fetchAll();

  

      $stmt = $con->prepare("SELECT SUM(total) FROM order_items WHERE date = ? ");
      $stmt->execute([$today]);
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
												<p class="text-muted mb-0 mt-1">تاريخ الفاتورة ( <?php echo $today; ?> )</p>
											</div>
										</div>
										<div class="row card-body">
											 
										</div>
										<!-- end row -->

										<div class="card-body pt-0">
                                            <div class="row mb-3" dir="rtl">
                                                <div class="col-md-4" >
                                                    <form id="date" >
                                                        <div class="form-group text-right">
                                                            <label> اظهار حسب التاريخ </label>
                                                            <select  class="form-control" name="date" >
                                                                <?php 
                                                                    $begin = new DateTime("01-01-2021");
                                                                    $end   = new DateTime("01-01-2022");
                                                                    for($i = $begin; $i <= $end; $i->modify('+1 day')){ ?>
                                                                    <option <?php if($i->format("Y-m-d") == $today){ echo 'selected'; } ?> value="<?php echo $i->format("Y-m-d"); ?>" ><?php echo $i->format("Y-m-d"); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div> 
                                                    </form>
                                                </div>
                                            </div>
											<div class="row">
												<div class="col-md-12">
                                                    
													<div class="table-responsive">
														<table class="table border text-center table-bordered text-nowrap">
															<thead>
																<tr> 
																	<th class="border-0 text-uppercase  font-weight-bold">المنتج</th> 
                                                                    <th class="border-0 text-uppercase  font-weight-bold"> عدد الطلبات </th>
																	<th class="border-0 text-uppercase  font-weight-bold"> سعر الوحدة </th>
																	<th class="border-0 text-uppercase  font-weight-bold"> إجمالى الكمية </th>
																	<th class="border-0 text-uppercase  font-weight-bold">الإجمالى</th>
																</tr>
															</thead>
															<tbody id="ajax" >
                                                                
                                                                <?php foreach($rows as $cat) {
                                                             
                                                                    $stmt = $con->prepare("SELECT * FROM order_items WHERE item_id = ? ");
                                                                    $stmt->execute([$cat['item_id']]);
                                                                    $row = $stmt->fetch(); 
                                                                    $Count = $stmt->rowCount();
    
                                                                    $stmt = $con->prepare("SELECT SUM(qty) FROM order_items WHERE item_id = ? AND date = ? ");
                                                                    $stmt->execute([$cat['item_id'],$today]);
                                                                    $qty = $stmt->fetch(); 
    
                                                                    $total = $qty['SUM(qty)'] * $row['price']; ?>
                                                                
																<tr id="ajax-remove" dir="rtl" > 
																	<td><?php echo $row['name']; ?></td>
                                                                    <td><?php echo $Count; ?></td>
																	<td><?php echo $row['price']; ?> جنيه</td>
																	<td><b><?php echo $qty['SUM(qty)']; ?></b></td>
																	<td><?php echo $total; ?> جنيه</td> 
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
													<hr>
													<h4 class="text-right">  : الإجمالي<strong> <?php echo $info['SUM(total)']; ?> جنية  </strong></h4>
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
                $(document).on('change','#date',function(event){
                    event.preventDefault(); 
                    var Form = $(this);
                    $.ajax({
                        type:'POST',
                        url:'inc/invoice/data.php',
                        beforeSend:function(){
                             $("#ajax-remove").remove();
                             $("#ajax").prepend('<tr dir="rtl" ><td class="border-0" ></td><td class="border-0" ></td><td class="border-0" ><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></td><td class="border-0" ></td></tr>');
                        },
                        data:new FormData(this),
                        contentType:false,
                        processData:false, 
                        success:function(data){
                            $("#ajax").html(data);
                        },
                        complete:function(data){
                            $('.spinner-border').remove();
                        }
                    })
                });
            
             
            </script>

	</body>
</html>