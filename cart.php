<?php
include('header.php');
?>
<div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="index.php">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            Cart
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="cart-wrapper">
                                                <form method="post" action="#" class="woocommerce-cart-form">
                                                    <table class="shop_table shop_table_responsive cart">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-remove">&nbsp;</th>
                                                                <th class="product-thumbnail">&nbsp;</th>
                                                                <th class="product-name">Product</th>
                                                                <th class="product-price">Price</th>
                                                                <th class="product-quantity">Quantity</th>
                                                                <th class="product-subtotal">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                    <?PHP
                                                    $uniqueVisitorId = $_GET["sessionId"];
                                                    $sql = "SELECT * FROM `cartitem` WHERE `uniqueuserid` = '$uniqueVisitorId' AND `active` = '1'";
                                                    $result = $conn->query($sql);
                                                    $carttotal = 0;
                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                                $pId = get_productId($conn, $row["productid"]);
                                                                $pUrl = get_productURL($conn, $row["productid"]);
                                                                $item = '';
                                                                $get_options = get_options($conn, $pId);
                                                                $get_optionsid = get_options_id($conn, $pId);
                                                                $image = "product/". get_productImage($conn, $pId);

                                                    ?>
                                                            <tr>
                                                            	<td class="product-remove">
                                                                    <a class="remove" href="#">Remove</a>
                                                                </td>
                                                                <td class="product-thumbnail">
                                                                    <a href="product.php?producturl=<?PHP echo $pUrl; ?>">
                                                                        <img width="180" height="180" alt="" class="wp-post-image" src="<?PHP echo $image; ?>">
                                                                    </a>
                                                                </td>
                                                                <td data-title="Product" class="product-name">
                                                                    <div class="media cart-item-product-detail">
                                                                        <a href="product.php?producturl=<?PHP echo $pUrl; ?>">
                                                                            <img width="180" height="180" alt="<?PHP echo $row["productName"]; ?>" class="wp-post-image" src="<?PHP echo $image; ?>">
                                                                        </a>
                                                                        <div class="media-body align-self-center">
                                                                            <a href="product.php?producturl=<?PHP echo $pUrl; ?><?PHP echo $row["productName"]; ?></a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td data-title="Price" class="product-price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol"><i class="fa fa-rupee"></i> </span><?PHP echo $row["productPrice"]; ?>
                                                                    </span>
                                                                </td>
                                                                <td class="product-quantity" data-title="Quantity">
                                                                    <div class="quantity">
                                                                    	<span class="minus-btn">-</span>
                                                                        <label for="quantity-input-1">Quantity</label>
                                                                        <span id="quantity-input-1" type="number" class="woocommerce-Price-amount" name="" disabled value="1" title="Qty" size="4"><?PHP echo $row["productQuantity"]; ?></span>
                                                                        <input type="hidden" value="<?PHP echo $row["productQuantity"]; ?>"> 
                                                                        <span class="plus-btn ">+</span>
                                                                    </div>
                                                                </td>
                                                                <td data-title="Total" class="product-subtotal">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol"><i class="fa fa-rupee"></i></span> <?PHP echo $sum = $row["productQuantity"]*$row["productPrice"]; $carttotal += $sum; ?>
                                                                    </span>
                                                                    <a title="Remove this item" class="remove" href="#">×</a>
                                                                    <data data-product-id="<?PHP echo $row["productid"]; ?>" data-product-name="<?PHP echo $row["productName"]; ?>" data-product-option="<?PHP echo $row["productOption"]; ?>"  data-product-option-id="<?PHP echo $row["productOption"]; ?>" data-product-price="<?PHP echo $row["productPrice"]; ?>" data-product-image="<?PHP echo $image ?>"></data>
                                                                </td>
                                                            </tr>



                                                    <?PHP 
                                                        }
                                                    }else{
                                                    	echo "<tr><td>Cart is Empty... <u><a href='index.php'>Place Order</a></u></td></tr>";
                                                    }
                                                    ?>        
                                                        </tbody>
                                                    </table>

                                              <!-- .shop_table shop_table_responsive -->
                                                </form>
                                                <!-- .woocommerce-cart-form -->
                                                <div class="cart-collaterals">
                                                    <div class="cart_totals">
                                                        <h2>Cart totals</h2>
                                                        <table class="shop_table shop_table_responsive">
                                                            <tbody>
                                                                <tr class="cart-subtotal">
                                                                    <th>Subtotal</th>
                                                                    <td data-title="Subtotal">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol"><i class=	"fa fa-rupee"></i></span> <?PHP echo $carttotal; ?></span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="ShippingCharges">
                                                                    <th>Shipping</th>
                                                                    <td data-title="ShippingCharges">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol"> <?PHP 
                                                                            if($carttotal >= $freesheepingLimit){
                                                                                echo $shippingonCart = get_Shipping($conn, $carttotal, $minshipping, $freesheepingLimit, $shippingCharges); } else{ echo $shippingonCart = 0; } ?></span>
                                                                    </td>
                                                                </tr>
                                                                <?PHP if($carttotal < $freesheepingLimit){ ?>
                                                                <tr class="ShippingCharges">
                                                                    <th><sub>Add Worth <b><i class="fa fa-rupee"></i><?PHP echo ($freesheepingLimit-$carttotal); ?></b> to Get Free Shipping.</sub></th>
                                                                </tr>
                                                                <?PHP } ?>
                                                                <tr class="order-total">
                                                                    <th>Total</th>
                                                                    <td data-title="Total">
                                                                        <strong>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol"><i class="fa fa-rupee"></i></span> <?PHP echo $carttotal+$shippingonCart; ?></span>
                                                                        </strong>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- .shop_table shop_table_responsive -->
                                                        <div class="wc-proceed-to-checkout">
                                                        	<?PHP if($carttotal >= $minshipping){ ?>
                                                            <a class="checkout-button button alt wc-forward" href="checkout.php?sessionId=<?PHP echo $uniqueVisitorId; ?>&opration=<?PHP echo base64_encode($uniqueVisitorId.$uniqueVisitorId); ?>">
                Proceed to checkout</a>
                											<?PHP }else{ if($carttotal > 0){ echo "Cart is Below Minimum Order Price Rs. $minshipping. Kindly Reach above the Minimum Order Price.<br><br>";} } ?>
                                                            <a class="checkout-button button alt wc-forward" href="index.php">Shop More</a>
                                                        </div>
                                                        <!-- .wc-proceed-to-checkout -->
                                                    </div>
                                                    <!-- .cart_totals -->
                                                </div>
                                                <!-- .cart-collaterals -->
                                            </div>
                                            <!-- .cart-wrapper -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    <!-- .entry-content -->
                                </div>
                                <!-- .hentry -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>
<?php
include('footer.php');
?>