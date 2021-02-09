<?php 
    session_start();
    include '../../connect.php';
    include '../App/lang.php';

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

    $stmt = $con->prepare("DELETE FROM cart WHERE id = ?");
    $stmt->execute([$id]); 

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

    foreach($items as $item){ 
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
                       class="input-qty qty" size="4">
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
  
    