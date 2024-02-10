<?php
if ($resultFeatured->num_rows > 0) {
    while($rowFeatured = $resultFeatured->fetch_assoc()) {
        $count++;
?>
<div class="product" id="<?PHP echo $count; ?>">
    <div class="yith-wcwl-add-to-wishlist">
        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
    </div>
    <!-- .yith-wcwl-add-to-wishlist -->
    <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="product.php?producturl=<?PHP echo $rowFeatured["metaUrl"]; ?>">
        <img width="224" height="197" style="max-height: 197px;" alt="<?PHP echo $rowFeatured["productName"]; ?>" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="<?PHP echo $siteurl; ?>product/<?PHP echo get_productImage($conn, $rowFeatured["id"]); ?>">
        <span class="price">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol fa fa-rupee"> </span> <?PHP echo $rowFeatured["productTotal"]; ?> </span>
                <?PHP if($rowFeatured["productTotal"] < $rowFeatured["productPrice"]){ ?>
                <del>
                    <span class="amount"><?PHP echo $rowFeatured["productPrice"]; ?></span>
                </del>
                <?PHP } ?>
        </span>
        <h2 class="woocommerce-loop-product__title"><?PHP echo $rowFeatured["productName"]; ?></h2>
    </a>
    <?PHP /*
    <!-- .woocommerce-LoopProduct-link -->
    <div class="hover-area">
        <data data-product-id="<?PHP echo $rowFeatured["productsku"]; ?>" data-product-name="<?PHP echo $rowFeatured["productName"]; ?>" data-product-option="<?PHP echo get_options($rowFeatured["id"]); ?>"  data-product-option-id="<?PHP echo get_options_id($rowFeatured["id"]); ?>" data-product-price="<?PHP echo $rowFeatured["productSell"]; ?>" data-product-image="product/<?PHP echo get_productImage($conn, $rowFeatured["id"]); ?>"></data>
        <a class="button addtocart" href="#">Add to cart</a>
    </div>
    */ ?>
    <!-- .hover-area -->
</div>
<?PHP 
	}
}
?>