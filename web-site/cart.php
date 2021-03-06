<?php 
    $title = 'cart';
    include 'init.php';
    if(!isset($_SESSION['id'])){
        header('location:login.php');
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
								<?php echo translate('21') ?>
							</span>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title">
                        <?php echo translate('21') ?>
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
                                    <?php foreach($items as $item){ 
                                        $stmt = $con->prepare("SELECT * FROM products WHERE id = ? ");
                                        $stmt->execute([$item['product']]);
                                        $product = $stmt->fetch(); ?>
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a href="javascript:void(0)" onclick="getinfo('inc/cart/delete.php?id=<?php echo $item['id']; ?>','#items')" class="remove"></a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img src="../img/products/<?php echo $product['img'] ?>" alt="img"
                                                     class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                            </a>
                                        </td>
                                        <td class="product-name" data-title="Product">
                                            <a href="productdetails.php?id=<?php echo $item['product']; ?>" class="title"><?php echo $product['name']; ?></a> 
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <div class="control">
                                                    <a class="btn-number qtyminus quantity-minus" href="#">-</a>  
                                                    <input type="text" data-step="1" data-min="0" value="<?php echo $item['qty']; ?>" title="Qty"
                                                           class="input-qty qty" size="4" disabled>
                                                     <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">
                                                    $
                                                </span>
                                                <?php echo $item['total']; ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php } ?>   
                                    <tr>
                                        <td class="actions">
                                            <!--
                                            <div class="coupon">
                                                <label class="coupon_code">Coupon Code:</label>
                                                <input type="text" class="input-text" placeholder="Promotion code here">
                                                <a href="#" class="button"></a>
                                            </div> -->
                                            <div class="order-total">
                                                <span class="title">
                                                    <?php echo translate('20'); ?>:
                                                </span>
                                                <span class="total-price">
                                                    $<?php echo $total; ?>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div class="control-cart">
                                <a href="index.php" class="button btn-continue-shopping">
                                    <?php echo translate('57'); ?>
                                </a> 
                                <a href="checkout.php" class="button btn-cart-to-checkout">
                                    <?php echo translate('56'); ?>
                                </a>
                            </div>
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