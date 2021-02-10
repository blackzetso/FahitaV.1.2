<?php include 'init.php';  
     
      $stmt = $con->prepare("SELECT * FROM top_ads ORDER BY id DESC");
      $stmt->execute();
      $rows = $stmt->fetchAll(); 


      function ActiveBtn($active){
          //global $active;
          if($active == '0') {
              $icon = '<i class="fa fa-check" ></i>';
          } else {
              $icon = '<i class="fa fa-times" ></i>';
          } 
          return $icon;
      } 

      function BtnColor($active){
          //global $active;
          if($active == '0') {
              $class = 'btn-success';
          } else {
              $class = 'btn-warning';
          } 
          return $class;
      } ?> 
				<div class="app-content">
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">إدارة الإعلانات</li>				 
                        </ol>

						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4> الإعلانات </h4>
									</div>
									<div class="card-body">
                                        <div class="row" dir="rtl" >
                                             
                                        </div>
										<div class="table-responsive">
                                            <div id="success" ></div>
											<table id="example" class="table table-striped text-center table-bordered border-t0 w-100 text-nowrap">
												<thead>
													<tr> 
                                                        <th class="wd-15p"> صورة </th>
														<th class="wd-15p"> url </th> 
                                                        <th class="wd-15p"><i class="fa fa-cog" ></i> </th> 
													</tr>
												</thead>
												<tbody> 
                                                    <?php foreach($rows as $cat) { ?>
													<tr> 
                                                        <td>
                                                            <img height="50px" width="50px" src="../img/slides/<?php echo $cat['img']; ?>" >
                                                        </td>
														<td><?php echo $cat['url']; ?></td>
 														<th id="id<?php echo $cat['id'] ?>" class="wd-15p">  
                                                            <a href="javascript:void(0)" onclick="getinfo('inc/top-ads/active.php?id=<?php echo $cat['id'] ?>','#id<?php echo $cat['id'] ?>')" class="btn <?php echo BtnColor($cat['active']); ?>" ><?php echo ActiveBtn($cat['active']); ?></a>
                                                            <a href="top-ads-edit.php?id=<?php echo $cat['id'] ?>" class="btn btn-info" ><i class="fa fa-edit" ></i></a>
                                                            <a href="javascript:void(0)" class="btn btn-danger delete" data-toggle="modal" data-target="#item" data-id="<?php echo $cat['id']; ?>" ><i class="fa fa-trash" ></i> </a>
                                                        </th> 
													</tr> 
                                                    <?php } ?>
												</tbody>
											</table> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
                 <!-- Message Modal -->
				<div class="modal fade" id="slide" tabindex="-1" role="dialog"  aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
				            <form id="addSlide" enctype="multipart/form-data">
                                <div class="modal-body">
                                        
                                        <div class="form-group text-right" >
                                            <label for="recipient-name" class="form-control-label " dir="rtl"> رقم الترتيب   :</label>
                                            <input type="number" class="form-control text-right" dir="rtl" name="number">
                                        </div>
                                        <div class="form-group text-right" >
                                            <label for="recipient-name" class="form-control-label " dir="rtl"> url :</label>
                                            <input type="text" class="form-control text-right" dir="rtl" name="url">
                                        </div>
                                        <div class="form-group files text-right">
                                            <label for="recipient-name" class="form-control-label " dir="rtl"> صورة :</label>
                                            <input type="file" class="form-control1" name="img" >
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

               
                <div id="item" class="modal fade">
					<div class="modal-dialog modal-sm" role="document">
						<form id="delForm" >
                            <div class="modal-content ">  
                                <div class="modal-body text-right" dir="rtl">
                                     <p class="mb-0">هل أنت متأكد من حذف هذا المنتج ؟</p>
                                </div><!-- modal-body -->
                                <div class="modal-footer"> 
                                    <input type="hidden" class="hidden-input" name="id" value="" >
                                    <button type="submit" class="btn btn-default del-btn" data-id="" onclick="$('#item').modal('hide');"> نعم </button>
                                    <button type="button" class="btn btn-light" data-dismiss="modal"> لا </button>
                                </div> 
                            </div>
                        </form> 
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
        <script src="assets/plugins/toastr/build/toastr.min.js"></script>
        <script>
             window.onload = function(){ 
              window.getinfo = function(urlx,id){
                $.get(urlx).done(function(data){ 
                    $(id).html(data);
                    $(hide).hide();
                });  
              }
            };
        </script>
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
                       url: 'inc/bottom-ads/delete.php',
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
            
                $(document).on('submit','#addSlide',function(event){
                    event.preventDefault(); 
                    var Form = $(this);
                    $.ajax({
                        type:'POST',
                        url:'inc/bottom-ads/insert.php',
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
                            $('#slide').modal('hide')
                        }
                    })
                });
             
            </script>

	</body>
</html>