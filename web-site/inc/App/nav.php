<?php 
    $stmt = $con->prepare("SELECT * FROM language");
    $stmt->execute();
    $langs = $stmt->fetchAll();


    if(isset($_SESSION['id'])){
        $stmt = $con->prepare("SELECT * FROM cart WHERE user = ?");
        $stmt->execute([$_SESSION['id']]);  
        $items = $stmt->fetchAll();
        $CartCount = $stmt->rowCount();
        
        $stmt = $con->prepare('SELECT SUM(total) FROM cart WHERE user = ? ORDER BY id DESC');
        $stmt->execute([$_SESSION['id']]);
        $info = $stmt->fetch();
        $total = $info['SUM(total)'];
    }
?>
<header class="header style7">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="header-message">
                    <?php echo translate('33'); ?> 
                </div>
            </div>
            <div class="top-bar-right">
                <div class="header-language">
                    <div class="gnash-language gnash-dropdown">
                        
                        <a href="#" class="active language-toggle" data-gnash="gnash-dropdown">
									<span>
										English (USD)
									</span>
                        </a>
                        <ul class="gnash-submenu">
                            <?php foreach($langs as $lang){ ?>
                            <li class="switcher-option">
                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?lang=<?php echo $lang['code']; ?>" class="lang">
                                    <span>
                                        <?php echo $lang['name']; ?>
                                    </span>
                                </a>
                            </li> 
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <ul class="header-user-links"> 
                      <?php echo login_link(translate('37'),translate('34')) ; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-header">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                    <div class="logo">
                        <a href="index.html">
                            <img style="height:90px" src="assets/images/logo.png" alt="img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                    <div class="block-search-block">
                        <form action="search.php" class="form-search form-search-width-category">
                            <div class="form-content"> 
                                <div class="inner">
                                    <input type="text" class="input" name="s" value="" placeholder="Search here">
                                </div>
                                <button class="btn-search" type="submit">
                                    <span class="icon-search"></span>
                                </button> 
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                    <div class="header-control">
                        <div class="block-minicart gnash-mini-cart block-header gnash-dropdown">
                            <a href="javascript:void(0);" class="shopcart-icon" data-gnash="gnash-dropdown">
                                Cart
                                <span id="CartCount" class="count">
										<?php if(isset($_SESSION['id'])){ echo $CartCount; }else { echo '0'; } ?>
								</span>
                            </a>
                            <?php if(isset($_SESSION['id'])){ ?>
                            <div class="shopcart-description gnash-submenu">
                                <div class="content-wrap">
                                    <h3 class="title"><?php echo translate('21') ?></h3>
                                    <?php if($CartCount > 0){ ?>
                                    <ul class="minicart-items">
                                        <?php  
                                            foreach($items as $item){
                                            $stmt = $con->prepare("SELECT * FROM products WHERE id = ? ");
                                            $stmt->execute([$item['product']]);
                                            $product = $stmt->fetch();
                                        ?>
                                        <li class="product-cart mini_cart_item">
                                            <a href="#" class="product-media">
                                                <img src="../img/products/<?php echo $product['img'] ?>" alt="img">
                                            </a>
                                            <div class="product-details">
                                                <h5 class="product-name">
                                                    <a href="productdetails.php?id=<?php echo $item['product']; ?>"><?php echo $product['name']; ?></a>
                                                </h5> 
                                                <span class="product-price">
															<span class="price">
																<span>$<?php echo $item['price'] ?></span>
															</span>
														</span>
                                                <span class="product-quantity">
															(x1)
														</span>
                                                <div class="product-remove">
                                                    <a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </li> 
                                        <?php } ?>
                                    </ul>
                                    <div class="subtotal">
                                        <span class="total-title"><?php echo translate('20'); ?>: </span>
                                        <span class="total-price">
													<span class="Price-amount">
														$<?php echo $total; ?>
													</span>
												</span>
                                    </div>
                                    <div class="actions">
                                        <a class="button button-viewcart" href="cart.php">
                                            <span><?php echo translate('58') ?></span>
                                        </a>
                                        <a href="checkout.php" class="button button-checkout">
                                            <span><?php echo translate('56') ?></span>
                                        </a>
                                    </div>
                                    <?php } else { ?> 
                                    <div class="alert alert-warning text-center">Cart empty!</div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="block-account block-header gnash-dropdown">
                            <a href="javascript:void(0);" data-gnash="gnash-dropdown">
                                <span class="flaticon-user"></span>
                            </a>
                            <div class="header-account gnash-submenu">
                                <div class="header-user-form-tabs">
                                    <ul class="tab-link">
                                        <li class="active">
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">Login</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">Register</a>
                                        </li>
                                    </ul>
                                    <div class="tab-container">
                                        <div id="header-tab-login" class="tab-panel active">
                                            <form method="post" class="login form-login">
                                                <p class="form-row form-row-wide">
                                                    <input type="email" placeholder="Email" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <label class="form-checkbox">
                                                        <input type="checkbox" class="input-checkbox">
                                                        <span>
																	Remember me
																</span>
                                                    </label>
                                                    <input type="submit" class="button" value="Login">
                                                </p>
                                                <p class="lost_password">
                                                    <a href="#">Lost your password?</a>
                                                </p>
                                            </form>
                                        </div>
                                        <div id="header-tab-rigister" class="tab-panel">
                                            <form method="post" class="register form-register">
                                                <p class="form-row form-row-wide">
                                                    <input type="email" placeholder="Email" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <input type="submit" class="button" value="Register">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="menu-bar mobile-navigation menu-toggle" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav-container rows-space-20">
        <div class="container">
            <div class="header-nav-wapper main-menu-wapper">
                <div class="vertical-wapper block-nav-categori">
                    <div class="block-title">
							<span class="icon-bar">
								<span></span>
								<span></span>
								<span></span>
							</span>
                        <span class="text"><?php echo translate('35'); ?></span>
                    </div>
                    <div class="block-content verticalmenu-content">
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM categories ORDER BY order_number");
                            $stmt->execute();
                            $cats = $stmt->fetchAll();
                        ?>
                        <ul class="gnash-nav-vertical vertical-menu gnash-clone-mobile-menu">
                            <?php foreach($cats as $cat){ 
                                $stmt = $con->prepare("SELECT * FROM subcategories WHERE category = ? ORDER BY category_order");
                                $stmt->execute([$cat['id']]);
                                $subcats = $stmt->fetchAll();
                               
                            ?>
                            <li class="menu-item menu-item-has-children">
                                <a title="Healthy" href="category.php?id=<?php echo $cat['id']; ?>" class="gnash-menu-item-title"><?php echo $cat['name']; ?></a>
                                <span class="toggle-submenu"></span>
                                <ul role="menu" class=" submenu">
                                    <?php  foreach($subcats as $cat){ ?>
                                    <li class="menu-item">
                                        <a title="<?php echo $cat['name']; ?>" href="subcategory.php?id=<?php echo $cat['id']; ?>" class="gnash-item-title"><?php echo $cat['name']; ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div> 
                <div class="header-nav">
                    <div class="container-wapper">
                        <ul class="gnash-clone-mobile-menu gnash-nav main-menu " id="menu-main-menu">
                            <li class="menu-item  menu-item-has-children ">
                                <a href="index.php" class="gnash-menu-item-title" title="Home"><?php echo translate('1'); ?></a>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="contact.php" class="gnash-menu-item-title" title="<?php echo translate('4'); ?>"><?php echo translate('4'); ?></a>
                              
                            </li>
                            <!--
                            <li class="menu-item  menu-item-has-children item-megamenu dwon">
                                <a href="#" class="gnash-menu-item-title" title="Pages">Pages</a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu mega-menu menu-page">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                            <div class="gnash-custommenu default">
                                                <h2 class="widgettitle">Shop Pages</h2>
                                                <ul class="menu">
                                                    <li class="menu-item">
                                                        <a href="shoppingcart.html">Shopping Cart</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="checkout.html">Checkout</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="contact.html">Contact us</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="404page.html">404</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="login.html">Login/Register</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                            <div class="gnash-custommenu default">
                                                <h2 class="widgettitle">Product</h2>
                                                <ul class="menu">
                                                    <li class="menu-item">
                                                        <a href="productdetails-fullwidth.html">Product Fullwidth</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="productdetails-leftsidebar.html">Product left
                                                            sidebar</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="productdetails-rightsidebar.html">Product right
                                                            sidebar</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                        </div>
                                    </div>
                                </div>
                            </li> -->
                            <li class="menu-item">
                                <a href="policy.php" class="gnash-menu-item-title" title="About"><?php echo translate('39') ?></a>
                            </li>
                            <li class="menu-item">
                                <a href="about.php" class="gnash-menu-item-title" title="About"><?php echo translate('38') ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>