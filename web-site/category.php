<?php 
    $title = 'category';
    include 'init.php';

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

    $stmt = $con->prepare("SELECT * FROM products WHERE category = ?");
    $stmt->execute([$id]);
    $rows = $stmt->fetchAll();
    $Count = $stmt->rowCount();
?>
	<div class="header-device-mobile">
		<div class="wapper">
			<div class="item mobile-logo">
				<div class="logo">
					<a href="#">
						<img src="assets/images/logo.png" alt="img">
					</a>
				</div>
			</div>
			<div class="item item mobile-search-box has-sub">
				<a href="#">
						<span class="icon">
							<i class="fa fa-search" aria-hidden="true"></i>
						</span>
				</a>
				<div class="block-sub">
					<a href="#" class="close">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
					<div class="header-searchform-box">
						<form class="header-searchform">
							<div class="searchform-wrap">
								<input type="text" class="search-input" placeholder="Enter keywords to search...">
								<input type="submit" class="submit button" value="Search">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="item mobile-settings-box has-sub">
				<a href="#">
						<span class="icon">
							<i class="fa fa-cog" aria-hidden="true"></i>
						</span>
				</a>
				<div class="block-sub">
					<a href="#" class="close">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
                </div>
			</div>
			<div class="item menu-bar">
				<a class=" mobile-navigation  menu-toggle" href="#">
					<span></span>
					<span></span>
					<span></span>
				</a>
			</div>
		</div>
	</div>
	<div class="main-content main-content-product no-sidebar">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-trail breadcrumbs">
						<ul class="trail-items breadcrumb">
							<li class="trail-item trail-begin">
								<a href="index.php"><?php echo translate('1'); ?></a>
							</li>
							<li class="trail-item trail-end active">
								Grid Products
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="site-main">
						<h3 class="custom_blog_title">
							Grid Products
						</h3>
						<div class="shop-top-control">
							<form id="sort" class="select-item select-form">
								<span class="title">Sort</span>
								<select title="sort" data-placeholder="9 Products/Page" name="limit" class="chosen-select">
									<option value="6">6 Products/Page</option>
									<option value="9">9 Products/Page</option>
									<option value="12">12 Products/Page</option>
									<option value="18">18 Products/Page</option>
									<option value="21">21 Products/Page</option>
								</select>
                                <input type="hidden" name="id" value="<?php echo $id; ?>" >
							</form>
							<form class="filter-choice select-form">
								<span class="title">Sort by</span>
								<select title="sort-by" data-placeholder="Price: Low to High" class="chosen-select">
									<option value="1">Price: Low to High</option>
									<option value="2">Sort by popularity</option>
									<option value="4">Sort by newness</option>
									<option value="5">Sort by price: low to high</option>
								</select>
							</form>
							<div class="grid-view-mode">
								<div class="inner">
									<a href="listproducts.html" class="modes-mode mode-list">
										<span></span>
										<span></span>
									</a>
									<a href="category.php?id=<?php echo $id; ?>" class="modes-mode mode-grid  active">
										<span></span>
										<span></span>
										<span></span>
										<span></span>
									</a>
								</div>
							</div>
						</div>
						<ul id="Success" class="row list-products auto-clear equal-container product-grid">
                            
                            <?php foreach($rows as $row){ ?>
							<li id="ajax-<?php echo $row['id'] ?>" class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
								<div class="product-inner equal-element">
									<div class="product-top">
										<?php echo discount($row['price'],$row['discount']); ?>
									</div>
									<div class="product-thumb">
										<div class="thumb-inner">
											<a href="productdetails.php?id=<?php echo $row['id']; ?>">
												<img style="height: 269px;" src="../img/products/<?php echo $row['img']; ?>" alt="img">
											</a>
											<div class="thumb-group">
												
												<a href="#" class="button quick-wiew-button">Quick View</a>
												<div  class="loop-form-add-to-cart"> 
													<a href="javascript:void(0)" onclick="getinfo('inc/cart/insert.php?id=<?php echo $row['id']; ?>','#CartCount')" class="single_add_to_cart_button button">Add to cart </a>
												</div>
											</div>
										</div>
									</div> 
									<div class="product-info">
										<h5 class="product-name product_title">
											<a href="#"><?php echo $row['name']; ?></a>
										</h5>
										<div class="group-info">
											 
											<div class="price">
												<del>
													$<?php echo $row['price']-$row['discount']; ?>
												</del>
												<ins>
													$<?php echo $row['price']; ?>
												</ins>
											</div>
										</div>
									</div>
								</div>
							</li>
						    <?php } ?>
                        </ul>
						<div class="pagination clearfix style2">
							<div class="nav-link">
								<a href="#" class="page-numbers"><i class="icon fa fa-angle-left" aria-hidden="true"></i></a>
								<a href="#" class="page-numbers">1</a>
								<a href="#" class="page-numbers">2</a>
								<a href="#" class="page-numbers current">3</a>
								<a href="#" class="page-numbers"><i class="icon fa fa-angle-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
			 
			</div>
		</div>
	</div>
    <?php include $App . 'footer.php'; ?>
    <div class="footer-device-mobile">
		<div class="wapper">
			<div class="footer-device-mobile-item device-home">
				<a href="index-2.html">
					<span class="icon">
						<i class="fa fa-home" aria-hidden="true"></i>
					</span>
					Home
				</a>
			</div>
			<div class="footer-device-mobile-item device-home device-wishlist">
				<a href="#">
					<span class="icon">
						<i class="fa fa-heart" aria-hidden="true"></i>
					</span>
					Wishlist
				</a>
			</div>
			<div class="footer-device-mobile-item device-home device-cart">
				<a href="#">
					<span class="icon">
						<i class="fa fa-shopping-basket" aria-hidden="true"></i>
						<span class="count-icon">
							0
						</span>
					</span>
					<span class="text">Cart</span>
				</a>
			</div>
			<div class="footer-device-mobile-item device-home device-user">
				<a href="#">
					<span class="icon">
						<i class="fa fa-user" aria-hidden="true"></i>
					</span>
					Account
				</a>
			</div>
		</div>
	</div>
	<a href="#" class="backtotop">
		<i class="fa fa-angle-double-up"></i>
	</a>

	<script src="assets/js/jquery-1.12.4.min.js"></script>
	<script src="assets/js/jquery.plugin-countdown.min.js"></script>
	<script src="assets/js/jquery-countdown.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/magnific-popup.min.js"></script>
	<script src="assets/js/isotope.min.js"></script>
	<script src="assets/js/jquery.scrollbar.min.js"></script>
	<script src="assets/js/jquery-ui.min.js"></script>
	<script src="assets/js/mobile-menu.js"></script>
	<script src="assets/js/chosen.min.js"></script>
	<script src="assets/js/slick.js"></script>
	<script src="assets/js/jquery.elevateZoom.min.js"></script>
	<script src="assets/js/jquery.actual.min.js"></script>
	<script src="assets/js/fancybox/source/jquery.fancybox.js"></script>
	<script src="assets/js/lightbox.min.js"></script>
	<script src="assets/js/owl.thumbs.min.js"></script>
	<script src="assets/js/jquery.scrollbar.min.js"></script>
	<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>
	<script src="assets/js/frontend-plugin.js"></script>
    <script src="assets/js/toastr.js" ></script>
    <script> 
        
         window.onload = function(){

          window.getinfo = function(urlx,id){
                $.get(urlx).done(function(data){

                    $(id).html(data);
                    $(hide).hide();
                });  
          }
        }; 
        /*
         $(document).on('change','#sort',function(e){
               e.preventDefault();
               var id  = $(this).data('id');
               $.ajax({
                   type:'POST',
                   url:'inc/filter/sort.php',
                   beforeSend: function() {  
                        $("#ajax-remove").remove();
                        $("#Success").prepend('<div class="text-center"><div class="spinner-grow text-warning" role="status"></div></div>');
                   },
                   contentType: false,
                   cache: false,
                   processData:false,
                   success:function(data){
                       $("#Success").html(data);
                   }
               })
            }); */
    </script>
</body>

 </html>