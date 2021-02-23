<?php 
    $title = 'checkout';
    include 'init.php';

    //$coin = $_GET['coin'];
    //$point = 100;

    //$result = $coin - $point;

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
<div class="main-content main-content-checkout">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.php"><?php echo translate('1'); ?></a>
                        </li>
                        <li class="trail-item trail-end active">
                            <?php echo translate('56'); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <h3 class="custom_blog_title">
            <?php echo translate('56'); ?>
        </h3>
        <div class="checkout-wrapp">
            <div class="shipping-address-form-wrapp">
                <div class="shipping-address-form  checkout-form">
                    <form id="checkout" >
                        <div class="row-col-1 row-col">
                            <div class="shipping-address">
                                <h3 class="title-form">
                                    <?php echo translate('73'); ?>
                                </h3>
                                <p class="form-row form-row-first">
                                    <label class="text"> <?php echo translate('66'); ?> </label>
                                    <input title="<?php echo translate('66'); ?>" name="city" type="text" class="input-text">
                                </p>
                                <p class="form-row form-row-last">
                                    <label class="text"> <?php echo translate('67'); ?> </label>
                                    <input title="<?php echo translate('67'); ?>" name="zone" type="text" class="input-text">
                                </p>
                                <p class="form-row form-row-first">
                                    <label class="text"><?php echo translate('68'); ?></label>
                                    <input title="<?php echo translate('68'); ?>" name="street" type="text" class="input-text">
                                </p>
                                <p class="form-row form-row-last">
                                    <label class="text"><?php echo translate('69'); ?></label>
                                    <input title="<?php echo translate('69'); ?>" name="build" type="text" class="input-text">
                                </p>
                                <p class="form-row form-row-last" style="width: 100%;">
                                    <label class="text"><?php echo translate('70'); ?></label>
                                    <input title="<?php echo translate('70'); ?>" name="storey" type="text" class="input-text">
                                </p>
                                <button type="submit" class="button btn-return" > <?php echo translate('26'); ?> </button>
                                <p id="Success" class="form-row form-row-last" style="width: 100%;"></p>
                            </div>
                        </div>
                    </form>
                    <div class="row-col-2 row-col">
                        <div class="your-order">
                            <h3 class="title-form">
                                <?php echo translate('71'); ?>
                            </h3>
                            <ul class="list-product-order">
                                <?php foreach($items as $item){ 
                                        $stmt = $con->prepare("SELECT * FROM products WHERE id = ? ");
                                        $stmt->execute([$item['product']]);
                                        $product = $stmt->fetch(); ?>
                                <li class="product-item-order">
                                    <div class="product-thumb">
                                        <a href="#">
                                            <img src="../img/products/<?php echo $product['img'] ?>" alt="img">
                                        </a>
                                    </div>
                                    <div class="product-order-inner">
                                        <h5 class="product-name">
                                            <a href="productdetails.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                                        </h5> 
                                        <div class="price">
                                            $<?php echo $item['price'] ?>
                                            <span class="count">x<?php echo $item['qty'] ?></span>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                            <div class="order-total">
									<span class="title">
										<?php echo translate('20'); ?> :
									</span>
                                <span class="total-price">
										$<?php echo $total; ?>
									</span>
                            </div>
                        </div>
                    </div>
                </div>
               <!-- <a href="#" class="button button-payment">Payment</a> -->
            </div>
            <!--
            <div class="payment-method-wrapp">
                <div class="payment-method-form checkout-form">
                    <div class="row-col-1 row-col">
                        <div class="payment-method">
                            <h3 class="title-form">
                                Payment Method
                            </h3>
                            <div class="group-button-payment">
                                <a href="#" class="button btn-credit-card">Credit Card</a>
                                <a href="#" class="button btn-paypal">paypal</a>
                            </div>
                            <p class="form-row form-row-card-number">
                                <label class="text">Card number</label>
                                <input type="text" class="input-text" placeholder="xxx - xxx - xxx - xxx">
                            </p>
                            <p class="form-row forn-row-col forn-row-col-1">
                                <label class="text">Month</label>
                                <select title="month" data-placeholder="01" class="chosen-select" tabindex="1">
                                    <option value="thang01">01</option>
                                    <option value="thang02">02</option>
                                    <option value="thang03">03</option>
                                    <option value="thang04">04</option>
                                    <option value="thang05">05</option>
                                    <option value="thang06">06</option>
                                    <option value="thang07">07</option>
                                    <option value="thang08">08</option>
                                    <option value="thang09">09</option>
                                    <option value="thang10">10</option>
                                    <option value="thang11">11</option>
                                    <option value="thang12">12</option>
                                </select>
                            </p>
                            <p class="form-row forn-row-col forn-row-col-2">
                                <label class="text">Year</label>
                                <select title="Year" data-placeholder="2017" class="chosen-select" tabindex="1">
                                    <option value="nam2010">2010</option>
                                    <option value="nam2011">2011</option>
                                    <option value="nam2012">2012</option>
                                    <option value="nam2013">2013</option>
                                    <option value="nam2014">2014</option>
                                    <option value="nam2015">2015</option>
                                    <option value="nam2016">2016</option>
                                    <option value="nam2017">2017</option>
                                    <option value="nam2018">2018</option>
                                    <option value="nam2020">2020</option>
                                </select>
                            </p>
                            <p class="form-row forn-row-col forn-row-col-3">
                                <label class="text">CVV</label>
                                <select title="CVV" data-placeholder="238" class="chosen-select" tabindex="1">
                                    <option value="cvv1">238</option>
                                    <option value="cvv2">354</option>
                                    <option value="cvv3">681</option>
                                    <option value="cvv4">254</option>
                                    <option value="cvv5">687</option>
                                    <option value="cvv6">123</option>
                                    <option value="cvv7">951</option>
                                    <option value="cvv8">852</option>
                                    <option value="cvv9">753</option>
                                    <option value="vcc10">963</option>
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="row-col-2 row-col">
                        <div class="your-order">
                            <h3 class="title-form">
                                Your Order
                            </h3>
                            <ul class="list-product-order">
                                <li class="product-item-order">
                                    <div class="product-thumb">
                                        <a href="#">
                                            <img src="assets/images/item-order1.jpg" alt="img">
                                        </a>
                                    </div>
                                    <div class="product-order-inner">
                                        <h5 class="product-name">
                                            <a href="#">3D Soybeans Chair</a>
                                        </h5>
                                        <span class="attributes-select attributes-color">Black,</span>
                                        <span class="attributes-select attributes-size">XXL</span>
                                        <div class="price">
                                            $45
                                            <span class="count">x1</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item-order">
                                    <div class="product-thumb">
                                        <a href="#">
                                            <img src="assets/images/item-order2.jpg" alt="img">
                                        </a>
                                    </div>
                                    <div class="product-order-inner">
                                        <h5 class="product-name">
                                            <a href="#">3D Soybeans Chair</a>
                                        </h5>
                                        <span class="attributes-select attributes-color">Black,</span>
                                        <span class="attributes-select attributes-size">XXL</span>
                                        <div class="price">
                                            $45
                                            <span class="count">x1</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="order-total">
									<span class="title">
										Total Price:
									</span>
                                <span class="total-price">
										$95
									</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-control">
                    <a href="#" class="button btn-back-to-shipping">Back to shipping</a>
                    <a href="#" class="button btn-pay-now">Pay now</a>
                </div>
            </div>
            -->
           
        </div>
    </div>
</div>
<?php 
    include $App . 'footer.php';
?>

<script src="assets/js/jquery-1.12.4.min.js"></script>
<script>
     $(document).on('submit','#checkout',function(event){
            event.preventDefault(); 
            var Form = $(this);
            $.ajax({
                type:'POST',
                url:'inc/checkout/insert.php',
                beforeSend:function(){
                    Form.find("button[type='submit']").prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                    Form.find("button[type='submit']").attr('disabled','true');
                },
                data:new FormData(this),
                contentType:false,
                processData:false, 
                success:function(data){
                    $("#Success").html(data);
                },
                complete:function(data){
                    $('.spinner-border').remove();
                    Form.find("button[type='submit']").removeAttr('disabled');
                }
            })
        });
</script>
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
        <script src="assets/js/frontend-plugin.js"></script>
    </body>
</html>