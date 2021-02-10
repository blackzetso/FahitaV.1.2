<?php 
    $title = 'الرئيسية';
    include 'init.php';

    $stmt = $con->prepare("SELECT * FROM slides ORDER BY number");
    $stmt->execute();
    $slides = $stmt->fetchAll();

    $stmt = $con->prepare("SELECT * FROM products WHERE Deal_Of_Day = '1'");
    $stmt->execute();
    $Deals = $stmt->fetchAll();

    $stmt = $con->prepare("SELECT * FROM top_ads WHERE active = '1' ORDER BY order_number ");
    $stmt->execute();
    $top_ads = $stmt->fetchAll();
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
<div>
    <div class="fullwidth-template">
        <div class="home-slider-banner">
            <div class="container">
                <div  id="Success" ></div>
                <div class="row10">
                    <div class="col-lg-8 silider-wrapp">
                        <div class="home-slider">
                            <div class="slider-owl owl-slick equal-container nav-center"
                                 data-slick='{"autoplay":true, "autoplaySpeed":9000, "arrows":false, "dots":true, "infinite":true, "speed":1000, "rows":1}'
                                 data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>
                                <?php foreach($slides as $slide){ ?>
                                <div class="slider-item style7">
                                    <div class="slider-inner  " style="background-image: url(../img/slides/<?php echo $slide['img']; ?>);height: 459px !important;" >
                                        
                                        <div class="slider-infor">
                                            
                                            
                                        </div> 
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                   <?php foreach($top_ads as $row){ ?>
                    <div class="col-lg-4 banner-wrapp">
                        <div class="banner">
                            <div class="item-banner style7">
                                <div class="inner" style="background-image: url(../img/slides/<?php echo $row['img']; ?>);" >
                                    
                                    <div class="banner-content" style="height: 220px;" >
                                     
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="gnash-product produc-featured rows-space-65">
            <div class="container">
                <h3 class="custommenu-title-blog">
                    <?php echo translate('46') ?>
                </h3>
                <div class="owl-products owl-slick equal-container nav-center"
                     data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":true, "infinite":false, "speed":800, "rows":1}'
                     data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":4}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
                   <?php foreach($Deals as $row){ ?>
                    <div id="ajax<?php echo $row['id']; ?>" class="product-item style-5">
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
                                        <div class="loop-form-add-to-cart">
                                            <a href="javascript:void(0)" onclick="getinfo('inc/cart/insert.php?id=<?php echo $row['id']; ?>','#CartCount')" class="single_add_to_cart_button button">Add to cart </a>
                                        </div>
                                    </div>
                                </div>
                                 
                            </div> 
                            <div class="product-info">
                                <h5 class="product-name product_title">
                                    <a href="productdetails.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                                </h5>
                                <div class="group-info">
                                    
                                    <div class="price">
                                        <del>
                                            €<?php echo $row['price']; ?>
                                        </del>
                                        <ins>
                                            €<?php echo $row['price']-$row['discount']; ?> 
                                        </ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                 <?php } ?>
                </div>
            </div>
        </div>
        <div class="banner-wrapp">
            <div class="container">
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="banner" >
                             <?php 
                                $stmt = $con->prepare("SELECT * FROM bottom_ads WHERE id = '1' ");
                                $stmt->execute();
                                $bunner1 = $stmt->fetch();
                            ?>
                            <div class="item-banner style4">
                                <div class="inner" style="background-image:url('../img/slides/<?php echo $bunner1['img']; ?>'); background-size:100% 100%;height: 300px;background-repeat: unset;" >
                                    <div class="banner-content">
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="banner" >
                            <?php 
                                $stmt = $con->prepare("SELECT * FROM bottom_ads WHERE id = '2' ");
                                $stmt->execute();
                                $bunner2 = $stmt->fetch();
                            ?>
                            <div class="item-banner style5" >
                                <div class="inner" style="background-image:url('../img/slides/<?php echo $bunner2['img']; ?>'); background-size:100% 100%;height: 300px;background-repeat: unset;" >
                                    <div class="banner-content">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-wrapp rows-space-65">
            <div class="container">
                <div class="banner">
                    <?php 
                        $stmt = $con->prepare("SELECT * FROM bottom_ads WHERE id = '3' ");
                        $stmt->execute();
                        $bunner3 = $stmt->fetch();
                    ?>
                    <div class="item-banner style17">
                        <div class="inner" style="background-image:url('../img/slides/<?php echo $bunner3['img']; ?>') !important; background-size:100% 100%;height: 300px;background-repeat: unset;" >
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gnash-tabs  default rows-space-40">
            <div class="container">
                <h3 class="custommenu-title-blog product">
                    <?php echo translate('36') ?>
                </h3>
                <div class="tab-head">
                    <ul class="tab-link">
                        <li class="active">
                            <a data-toggle="tab" aria-expanded="true" href="#bestseller"><?php echo translate('43') ?></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" aria-expanded="true" href="#new_arrivals"><?php echo translate('44') ?></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" aria-expanded="true" href="#top-rated"><?php echo translate('45') ?></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-container">
                    <div id="bestseller" class="tab-panel active">
                        <?php
                            $stmt = $con->prepare("SELECT * FROM products WHERE best_seller = 1");
                            $stmt->execute();
                            $BestSellers = $stmt->fetchAll();
                        ?>
                        <div class="gnash-product">
                            <ul class="row list-products auto-clear equal-container product-grid">
                                <?php foreach($BestSellers as $row){ ?>
                                <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                    <div class="product-inner equal-element">
                                        <div class="product-top">
                                            <?php echo discount($row['price'],$row['discount']); ?>
                                        </div>
                                        <div class="product-thumb">
                                            <div class="thumb-inner">
                                                <a href="productdetails.php?id=<?php echo $row['id']; ?>">
                                                    <img style="height:269px;" src="../img/products/<?php echo $row['img']; ?>" alt="img">
                                                </a>
                                                <div class="thumb-group">
                                                    <a href="#" class="button quick-wiew-button">Quick View</a>
                                                    <div class="loop-form-add-to-cart">
                                                       <a href="javascript:void(0)" onclick="getinfo('inc/cart/insert.php?id=<?php echo $row['id']; ?>','#CartCount')" class="single_add_to_cart_button button">Add to cart </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name product_title">
                                                <a href="productdetails.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                                            </h5>
                                            <div class="group-info">
                                               
                                                <div class="price">
                                                    <del>
                                                        €<?php echo $row['price']; ?>
                                                    </del>
                                                    <ins>
                                                        €<?php echo $row['price']-$row['discount']; ?> 
                                                    </ins>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?> 
                                
                            </ul>
                        </div>
                    </div>
                    <div id="new_arrivals" class="tab-panel">
                        <div class="gnash-product">
                            <?php
                            $stmt = $con->prepare("SELECT * FROM products WHERE new_arrivals = 1");
                            $stmt->execute();
                            $newArrivals = $stmt->fetchAll();
                        ?>
                            <ul class="row list-products auto-clear equal-container product-grid">
                                <?php foreach($newArrivals as $row){ ?>
                                   <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <?php echo discount($row['price'],$row['discount']); ?> 
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="productdetails.php?id=<?php echo $row['id']; ?>">
                                                        <img style="height:269px;" src="../img/products/<?php echo $row['img']; ?>" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <a href="javascript:void(0)" onclick="getinfo('inc/cart/insert.php?id=<?php echo $row['id']; ?>','#CartCount')" class="single_add_to_cart_button button">Add to cart </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="productdetails.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                                                </h5>
                                                <div class="group-info">

                                                    <div class="price">
                                                        <del>
                                                            €<?php echo $row['price']; ?>
                                                        </del>
                                                        <ins>
                                                            €<?php echo $row['price']-$row['discount']; ?> 
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div id="top-rated" class="tab-panel">
                        <div class="gnash-product">
                             <?php
                            $stmt = $con->prepare("SELECT * FROM products WHERE featured = 1");
                            $stmt->execute();
                            $featured = $stmt->fetchAll();
                        ?>
                            <ul class="row list-products auto-clear equal-container product-grid">
                                <?php foreach($featured as $row){ ?>
                                   <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <?php echo discount($row['price'],$row['discount']); ?> 
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="productdetails.php?id=<?php echo $row['id']; ?>">
                                                        <img style="height:269px;" src="../img/products/<?php echo $row['img']; ?>" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <a href="javascript:void(0)" onclick="getinfo('inc/cart/insert.php?id=<?php echo $row['id']; ?>','#CartCount')" class="single_add_to_cart_button button">Add to cart </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="productdetails.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                                                </h5>
                                                <div class="group-info">

                                                    <div class="price">
                                                        <del>
                                                            €<?php echo $row['price']; ?>
                                                        </del>
                                                        <ins>
                                                            €<?php echo $row['price']-$row['discount']; ?> 
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gnash-iconbox-wrapp default">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="gnash-iconbox  default">
                            <div class="iconbox-inner">
                                <div class="icon-item">
                                    <span class="icon flaticon-rocket-ship"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        <?php echo translate('60') ?>
                                    </h4>
                                    <div class="text">
                                        <?php echo nl2br(translate('61')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="gnash-iconbox  default">
                            <div class="iconbox-inner">
                                <div class="icon-item">
                                    <span class="icon flaticon-return"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        <?php echo translate('62') ?>
                                    </h4>
                                    <div class="text">
                                        <?php echo nl2br(translate('63')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="gnash-iconbox  default">
                            <div class="iconbox-inner">
                                <div class="icon-item">
                                    <span class="icon flaticon-padlock"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        <?php echo translate('64') ?>
                                    </h4>
                                    <div class="text">
                                        <?php echo nl2br(translate('65')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php include $App . 'footer.php'; ?>
<a href="#" class="backtotop">
    <i class="fa fa-angle-double-up"></i>
</a>
<script src="assets/js/jquery-1.12.4.min.js"></script>
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
<script src="assets/js/toastr.js" ></script>
<script> 
       
    /*
        $(document).on('click','.lang',function(event){
                event.preventDefault(); 
                var id  = $(this).data('id');
                $.ajax({
                    type:'GET',
                    url:'inc/settings/lang.php',
                    data:new FormData(this),
                    contentType:false,
                    processData:false, 
                    success:function(data){
                        $("#Success").html(data);
                    }
                }); *.
</script>
</body>
</html>