<?php include 'init.php'; 

      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
 
      $stmt = $con->prepare("SELECT * FROM orders WHERE user = ? ");
      $stmt->execute([$id]);
      $rows = $stmt->fetchAll(); ?>

				<div class="app-content">
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> فواتير العميل </li>				 
                        </ol>
                        
                        <div class="row">
							<div class="col-12">
								<div class="card">
									<div class=" mb-0"> 
										<!-- end row -->
										<div class="card-body pt-0">
                                            <div class="row mb-3 mt-3" dir="rtl">
                                                <div class="col-md-4" >
                                                    <form id="date" >
                                                        <div class="form-group text-right">
                                                            <label> اظهار حسب التاريخ </label>
                                                            <input type="date" class="form-control" name="date" >
                                                            <input type="hidden" name="id" value="<?php echo $id; ?>" >
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
																	<th class="border-0 text-uppercase  font-weight-bold"> رقم الطلب </th> 
                                                                    <th class="border-0 text-uppercase  font-weight-bold"> تاريخ الطلب </th>
																	<th class="border-0 text-uppercase  font-weight-bold"> حالة الطلب </th>  
                                                                    <th class="border-0 text-uppercase  font-weight-bold"> تفاصيل الطلب </th> 
																</tr>
															</thead>
															<tbody id="ajax" > 
                                                                <?php foreach($rows as $row) { ?> 
																<tr id="ajax-remove" dir="rtl" > 
																	<td><?php echo $row['id']; ?></td>
                                                                    <td><?php echo $row['date']; ?></td> 
																	<td><b><?php echo $row['order_status']; ?></b></td>
                                                                    <td>
                                                                        <a href="userInvoice.php?id=<?php echo $row['id']; ?>" class="btn btn-info" ><i class="ti-pencil-alt" ></i> </a>
                                                                    </td> 
																</tr>
                                                                <?php } ?>
															</tbody>
														</table>
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
                        url:'inc/users/orders.php',
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