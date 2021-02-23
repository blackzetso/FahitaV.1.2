<?php
    $title = 'product';
    include 'init.php';
    
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

    $stmt = $con->prepare("SELECT * FROM products WHERE id = ? ");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
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
<div class="main-content main-content-details single no-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.php"><?php echo translate('1'); ?></a>
                        </li>
                        <li class="trail-item">
                            <a href="category.php?id=<?php echo $row['category']; ?>"><?php echo $row['name']; ?></a>
                        </li>
                        <li class="trail-item trail-end active">
                            <?php echo $row['name']; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="details-product">
                        <div class="details-thumd">
                            <div class="image-preview-container image-thick-box image_preview_container">
                                <img id="img_zoom" data-zoom-image="../img/products/<?php echo $row['img']; ?>"
                                     src="../img/products/<?php echo $row['img']; ?>" alt="img">
                                <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                            <!--
                            <div class="product-preview image-small product_preview">
                                <div id="thumbnails" class="thumbnails_carousel owl-carousel" data-nav="true"
                                     data-autoplay="false" data-dots="false" data-loop="false" data-margin="10"
                                     data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}'>
                                    <a href="#" data-image="assets/images/details-item-1.jpg"
                                       data-zoom-image="assets/images/details-item-1.jpg" class="active">
                                        <img src="assets/images/details-item-1.jpg"
                                             data-large-image="assets/images/details-item-1.jpg" alt="img">
                                    </a>
                                    <a href="#" data-image="assets/images/details-item-2.jpg"
                                       data-zoom-image="assets/images/details-item-2.jpg">
                                        <img src="assets/images/details-item-2.jpg"
                                             data-large-image="assets/images/details-item-2.jpg" alt="img">
                                    </a>
                                    <a href="#" data-image="assets/images/details-item-3.jpg"
                                       data-zoom-image="assets/images/details-item-3.jpg">
                                        <img src="assets/images/details-item-3.jpg"
                                             data-large-image="assets/images/details-item-3.jpg" alt="img">
                                    </a>
                                    <a href="#" data-image="assets/images/details-item-4.jpg"
                                       data-zoom-image="assets/images/details-item-4.jpg">
                                        <img src="assets/images/details-item-4.jpg"
                                             data-large-image="assets/images/details-item-4.jpg" alt="img">
                                    </a>
                                </div> -->
                            </div>
                        </div>
                        <div class="details-infor">
                            <h1 class="product-title">
                                <?php echo $row['name']; ?>
                            </h1>
                             
                            <div class="availability">
                                availability:
                                <a href="#">in Stock</a>
                            </div>
                            <div class="price">
                                <span>$<?php echo $row['price']-$row['discount']; ?></span>
                            </div>
                            <div class="product-details-description">
                                <!--<ul>
                                    <li>Vestibulum tortor quam</li>
                                    <li>Imported</li>
                                    <li>Art.No. 06-7680</li>
                                </ul>-->
                            </div> 
                            <div class="group-button">
                                <!--
                                <div class="yith-wcwl-add-to-wishlist">
                                    <div class="yith-wcwl-add-button">
                                        <a href="#">Add to Wishlist</a>
                                    </div>
                                </div> -->
                                <div class="size-chart-wrapp">
                                    <div class="btn-size-chart">
                                        <a id="size_chart" href="../img/products/<?php echo $row['img'] ?>" class="fancybox">View
                                            Size Chart</a>
                                    </div>
                                </div>
                                <div class="quantity-add-to-cart">
                                    <form id="addToCart" >
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" name="qty" data-step="1" data-min="0" value="1" title="Qty"
                                                       class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $id ?>" >
                                        <button type="submit" class="single_add_to_cart_button button"><?php echo translate('19'); ?></button>
                                    </form>
                                    <div id="cArt" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear: left;"></div>
              <!--
                    <div class="related products product-grid">
                        <h2 class="product-grid-title">You may also like</h2>
                        <div class="owl-products owl-slick equal-container nav-center"  data-slick ='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":2}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
                            
                            <div class="product-item style-1">
                                <div class="product-inner equal-element">
                                    <div class="product-top">
                                        <div class="flash">
													<span class="onnew">
														<span class="text">
															new
														</span>
													</span>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="thumb-inner">
                                            <a href="#">
                                                <img src="assets/images/product-item-1.jpg" alt="img">
                                            </a>
                                            <div class="thumb-group">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <div class="yith-wcwl-add-button">
                                                        <a href="#">Add to Wishlist</a>
                                                    </div>
                                                </div>
                                                <a href="#" class="button quick-wiew-button">Quick View</a>
                                                <div class="loop-form-add-to-cart">
                                                    <button class="single_add_to_cart_button button">Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="#">Aluminum Plant</a>
                                        </h5>
                                        <div class="group-info">
                                            <div class="stars-rating">
                                                <div class="star-rating">
                                                    <span class="star-3"></span>
                                                </div>
                                                <div class="count-star">
                                                    (3)
                                                </div>
                                            </div>
                                            <div class="price">
                                                <del>
                                                    $65
                                                </del>
                                                <ins>
                                                    $45
                                                </ins>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             
                        </div>
                    
                    </div>
              -->
                </div>
            </div>
        </div>
    </div> 
<?php include $App . 'footer.php'; ?> 
</body>
</html>