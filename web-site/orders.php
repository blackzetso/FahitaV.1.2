<?php 
    $title = 'cart';
    include 'init.php';
    if(!isset($_SESSION['id'])){
        header('location:login.php');
    }
    
    $stmt = $con->prepare("SELECT * FROM orders WHERE user = ? ");
    $stmt->execute([$_SESSION['id']]);
    $orders = $stmt->fetchAll(); ?>
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
<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">
            <div class="breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin">
                        <a href="">
                            <span>
                                <?php echo translate('1') ?>
                            </span>
                        </a> 
                    </li>
                    <li class="trail-item trail-end active">
                        <span>
                            <?php echo translate('3') ?>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title">
                        <?php echo translate('3') ?>
                    </h3>
                    <div class="page-main-content">
                        <div class="shoppingcart-content">
                            <form   class="cart-form">
                                <table class="shop_table">
                                    <thead>
                                    <tr>
                                        <th class="product-remove"></th>
                                        <th class="product-thumbnail"></th>
                                        <th class="product-name"></th>
                                        <th class="product-price"></th>
                                        <th class="product-quantity"></th>
                                        <th class="product-subtotal"></th>
                                    </tr>
                                    </thead>
                                    <tbody id="items">
                                    <?php foreach($orders as $item){ 
                                        $stmt = $con->prepare("SELECT * FROM order_items WHERE order_id = ? ");
                                        $stmt->execute([$item['id']]);
                                        $orderItems = $stmt->fetch(); 
    
                                        $stmt = $con->prepare("SELECT * FROM products WHERE  id = ? ");
                                        $stmt->execute([$orderItems['item_id']]);
                                        $product = $stmt->fetch();
                                        ?>
                                    <tr class="cart_item "> 
                                        <td class="product-thumbnail">
                                            <a href="order_itmes.php?id=<?php echo $orderItems['order_id']; ?>">
                                                <img src="../img/products/<?php echo $product['img'] ?>" alt="img"
                                                     class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                            </a>
                                        </td>
                                        <td class="product-name text-center" style="text-align: center !important;" data-title="Product">
                                            <a href="order_itmes.php?id=<?php echo $orderItems['order_id']; ?>" class="title">عرض تفاصيل الطلب</a> 
                                        </td>
                                        <td class="product-price text-center" style="text-align: center !important;" >
                                            <?php echo $item['order_status'] ?>
                                        </td>
                                        <td class="product-price " style="text-align: center !important;" data-title="Price">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">
                                                    #id
                                                </span>
                                                <?php echo $item['id']; ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php } ?>   
                                    
                                    </tbody>
                                </table>
                            </form>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
 <?php include $App .'footer.php'; ?>
 
</body>
</html>