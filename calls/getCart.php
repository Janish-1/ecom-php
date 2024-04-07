<?php
include('../libs/index.php');

if(isset($_POST["uniqueVisitorId"])){
	$uniqueVisitorId = $_POST["uniqueVisitorId"];
	
	$sql = "SELECT * FROM `cartitem` WHERE `uniqueuserid` = '$uniqueVisitorId' AND `active` = '1'";
	$result = $conn->query($sql);
	
	
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
		    	$pId = get_productId($conn, $row["productid"]);
		    	$pUrl = get_productURL($conn, $row["productid"]);
		    	$item = '';
		    	$get_options = get_options($conn, $pId);
		    	$get_optionsid = get_options_id($conn, $pId);
		    	$image = "product/". get_productImage($conn, $pId);
			    echo '<li class="woocommerce-mini-cart-item shopping-cart mini_cart_item">';
				echo '<a href="#" class="remove delete-btn" aria-label="Remove this item">×</a>';
				echo '<data data-product-id="'. $row["productid"] .'" data-product-name="'. $row["productName"] .'" data-product-option="'. $row["productOption"] .'"  data-product-option-id="'.  $row["productOption"] .'" data-product-price="'. $row["productPrice"] .'" data-product-image="'. $image .'"></data>';
				echo '<a href="product.php?producturl='. $pUrl .'">';
				echo '<img src="'.$image.'" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="'. $row["productName"] .'">'. $row["productName"];
				echo '</a>';
				echo '<span class="quantity">'. $row["productQuantity"] .'</span> × <span class="woocommerce-Price-amount amount"><span class="fa fa-rupee"></span> '. $row["productPrice"] .' = <span class="woocommerce-Price-amount-total amount"><span class="fa fa-rupee"></span> '. $row["productPrice"]*$row["productQuantity"] .'</span>';
				echo '';
				echo '</li>';
	    }
	}
}

?>