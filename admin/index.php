<?php 
    include 'init.php';
    
?>

				<div class="app-content">
					<section class="section">  
                       <div class="row">
                             
							<div class="col-xl-3 col-lg-6 col-sm-6 col-md-12">
								<div class="card">
									<div class="card-body knob-chart">
										<div class="row mb-0">
											<div class="col-6">
												<div class="card-icon d-flex">
                                                    <i style="font-size: 80px;" class="fe fe-tag text-success" ></i>
 												</div>
											</div>
											<div class="col-6">
												<div class="dash3 text-center">
													<small class="text-muted mt-0"> إجمالى المنتجات </small>
													<h2 class="text-success mb-0"><?php echo getAllRowCount('products'); ?></h2>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-sm-6 col-md-12">
								<div class="card">
									<div class="card-body knob-chart">
										<div class="row mb-0">
											<div class="col-6">
												<div class="card-icon d-flex">
                                                    <i style="font-size: 80px;" class="fa fa-desktop text-info" ></i>
 												</div>
											</div>
											<div class="col-6">
												<div class="dash3 text-center">
													<small class="text-muted mt-0"> إجمالى الأقسام </small>
													<h2 class="text-info mb-0"><?php echo getAllRowCount('categories'); ?></h2>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-sm-6 col-md-12">
								<div class="card">
									<div class="card-body knob-chart">
										<div class="row mb-0">
											<div class="col-6">
												<div class="card-icon d-flex">
                                                    <i style="font-size: 80px;" class="fe fe-users text-dark" ></i>
 												</div>
											</div>
											<div class="col-6">
												<div class="dash3 text-center">
													<small class="text-muted mt-0">   المستخدمين </small>
													<h2 class="text-dark mb-0"><?php echo getAllRowCount('users'); ?></h2>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-sm-6 col-md-12">
								<div class="card">
									<div class="card-body knob-chart">
										<div class="row mb-0">
											<div class="col-6">
												<div class="card-icon d-flex">
                                                    <i style="font-size: 80px;" class="icon icon-handbag text-primary" ></i>
 												</div>
											</div>
											<div class="col-6">
												<div class="dash3 text-center">
													<small class="text-muted mt-0">   إجمالي الطلبات </small>
													<h2 class="text-primary mb-0">143</h2>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                           <?php //echo date("Y-d-m"); ?>
						</div>   
					</section>
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

		<!--Chart.min js-->
		<script src="assets/js/chart.min.js"></script>

		<!--Othercharts js-->
		<script src="assets/plugins/othercharts/jquery.knob.js"></script>
		<script src="assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!--Morris js-->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/morris/raphael.min.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Min Calendar -->
		<script src="assets/plugins/fullcalendar/calendar.min.js"></script>

		<!--Scripts js-->
		<script src="assets/js/apexcharts.js"></script>
		<script src="assets/js/scripts.js"></script>
		<script src="assets/js/dashboard.js"></script>

		<!-- ECharts -->
		<script src="assets/plugins/echarts/echarts.js"></script>

		<!--OtherCharts js-->
		<script src="assets/js/othercharts.js"></script>

	</body>
</html>