<?php 
    $title = 'checkout';
    include 'init.php';

    if(!isset($_SESSION['order'])){
        header('location:index.php');
    }
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
        <div class="checkout-wrapp">
            
            <div class="end-checkout-wrapp">
                <div class="end-checkout checkout-form">
                    <div class="icon">
                    </div>
                    <h3 class="title-checkend">
                        Congratulation! Your order has been processed.
                    </h3>
                    <div class="sub-title">
                        Aenean dui mi, tempus non volutpat eget, molestie a orci.
                        Nullam eget sem et eros laoreet rutrum.
                        Quisque sem ante, feugiat quis lorem in.
                    </div>
                    <a href="#" class="button btn-return">Return to Store</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include $App . 'footer.php';
?>

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
        <script src="assets/js/frontend-plugin.js"></script>
    </body>
</html>