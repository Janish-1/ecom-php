<?php
include('header.php');

$userId = $_SESSION["userId"];
$uniqueVisitorId = $_GET["sessionId"];

$wallet = getUserDetails($conn, $userId, 'userCredits');
if(isset($_GET["pcode"]) && isset($_GET["sessionId"]) && !empty($_GET["pcode"]) && !empty($_GET["sessionId"])){
    $pcode = input($_GET["pcode"]);
    $sessionId = input($_GET["sessionId"]);
    $cartVal = input($_GET["cartVal"]);
    $date = date("Y-m-d");
    $return = 0;
    $sqlPromo = "SELECT * FROM `promocodes` WHERE `promoCode` = '$pcode' AND `quantity` >= 0 AND `dateFrom` <= '$date' AND `dateTo` > '$date' LIMIT 1";
    $resultPromo = $conn->query($sqlPromo);
    if ($resultPromo->num_rows > 0) {
        while($rowPromo = $resultPromo->fetch_assoc()) {
            $promoDiscount = $rowPromo["promoDiscount"];
            $promoMinPerUser = $rowPromo["promoMinPerUser"];
            $promocod = $rowPromo["cod"];
            $minCartValue = $rowPromo["minCartValue"];
            $promoDesc = $rowPromo["promoDescription"];

            $sqlPromoApp = "SELECT * FROM `orderpromo` WHERE `promo` = '$pcode' AND `userId` = '$userId' AND `promoApplied` = '1'";
            $resultPromoApp = $conn->query($sqlPromoApp);
            if ($resultPromoApp->num_rows < $promoMinPerUser) {
                if($cartVal >= $minCartValue){
                    $result = '<div class="alert alert-success alert-dismissible fade show" role="alert">Woola! Promo Code Successfully Applied. You will receive cashback into your account within 24 hours of order confirmation<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    $return = 1;
                }else{
                    $result = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Oops! Your Cart Value should equal to or grater than Rs.'.$minCartValue.' to avil the Coupen<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                }
            }else{
                $result = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Oops! This Promo Code can be Applied only '.$promoMinPerUser.'time Per User <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
        }
    }else{
        $result = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Oops! It Seems Promo was Expired or Invalid</div>';
    }
}
?>
            <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="index.php">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            Checkout
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div class="content-area" id="primary">
                            <main class="site-main" id="main">
                                <div class="type-page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="woocommerce-info">Have a Promo? <a data-toggle="collapse" href="#checkoutCouponForm" aria-expanded="false" aria-controls="checkoutCouponForm" class="showlogin">Click here to enter your code</a>
                                            </div>
                                            <div class="<?PHP if(!isset($_GET["pcode"]) && empty($_GET["pcode"])){ echo "collapse";} ?>" id="checkoutCouponForm">
                                                <form method="GET" class="checkout_coupon">
                                                    <p class="form-row form-row-first">
                                                        <input type="hidden" name="sessionId" value="<?PHP echo $_GET["sessionId"];?>"><input type="hidden" name="opration" value="<?PHP echo sha1($_GET["sessionId"]).sha1(md5($_GET["sessionId"]));?>"><input type="hidden" name="cartVal" id="cOcartVal">
                                                        <input type="text" value="<?PHP if(isset($_GET["pcode"])){ echo strtoupper($_GET["pcode"]); } ?>" id="coupon_code"  autocomplete="off" placeholder="Promo Code" class="input-text" name="pcode">
                                                    </p>
                                                    <p class="form-row form-row-last">
                                                        <input type="submit" value="Apply coupon" class="button">
                                                    </p>
                                                    <div class="clear"></div>
                                                </form>
                                            </div>
                                            <?PHP 
                                            if(isset($pcode) && !empty($pcode)){
                                                echo $result;
                                            }

                                            ?>
                                            <!-- .collapse -->
                                            <form action="process/checkout.php?sessionId=<?PHP echo $_GET["sessionId"]; ?>&opration=<?PHP echo sha1($_GET["sessionId"]).sha1(md5($_GET["sessionId"])); ?>" class="checkout woocommerce-checkout" id="checkoutForm" method="post" name="checkout">
                                                <input type="hidden" value="<?PHP echo $_GET["sessionId"]; ?>" name="sessionId">
                                                <div id="customer_details" class="col2-set">
                                                    <div class="col-1">
                                                        <div class="woocommerce-billing-fields">
                                                            <h3>Billing Details</h3>
                                                            <div class="woocommerce-billing-fields__field-wrapper-outer">
                                                                <div class="woocommerce-billing-fields__field-wrapper">
                                                                    <p id="billing_first_name_field" class="form-row form-row-first validate-required ">
                                                                        <label class="" for="billing_first_name">First Name
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="" required placeholder="First Name" id="firstname" name="firstname" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                                        <label class="" for="billing_last_name">Last Name
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" required value="" placeholder="Last Name" id="lastname" name="lastname" class="input-text ">
                                                                    </p>
                                                                    <div class="clear"></div>
                                                                    <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="billing_address_1">Street address
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="" placeholder="Street address" id="address1" name="address1" required class="input-text ">
                                                                    </p>
                                                                    <p id="billing_address_2_field" class="form-row form-row-wide address-field">
                                                                        <input type="text" value="" placeholder="Apartment, suite, unit etc. (optional)" id="address2" name="address2" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="billing_city">Town / City
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="" required placeholder="Town / City" id="city" name="city" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_state_field" class="form-row form-row-wide validate-required validate-email">
                                                                        <label class="" for="billing_state">State
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <select data-placeholder="" required autocomplete="address-level1" class="state_select select2-hidden-accessible" id="state" name="state" tabindex="-1" aria-hidden="true">
                                                                            <option value="">Select an option…</option>
                                                                            <option>Andhra Pradesh</option>
                                                                            <option>Arunachal Pradesh</option>
                                                                            <option>Assam</option>
                                                                            <option>Bihar</option>
                                                                            <option>Chhattisgarh</option>
                                                                            <option>Goa</option>
                                                                            <option>Gujarat</option>
                                                                            <option>Haryana</option>
                                                                            <option>Himachal Pradesh</option>
                                                                            <option>Jammu and Kashmir</option>
                                                                            <option>Jharkhand</option>
                                                                            <option>Karnataka</option>
                                                                            <option>Kerala</option>
                                                                            <option>Madhya Pradesh</option>
                                                                            <option>Maharashtra</option>
                                                                            <option>Manipur</option>
                                                                            <option>Meghalaya</option>
                                                                            <option>Mizoram</option>
                                                                            <option>Nagaland</option>
                                                                            <option>Orissa</option>
                                                                            <option>Punjab</option>
                                                                            <option>Rajasthan</option>
                                                                            <option>Sikkim</option>
                                                                            <option>Tamil Nadu</option>
                                                                            <option>Telangana</option>
                                                                            <option>Tripura</option>
                                                                            <option>Uttarakhand</option>
                                                                            <option>Uttar Pradesh</option>
                                                                            <option>West Bengal</option>
                                                                            <option>Andaman and Nicobar Islands</option>
                                                                            <option>Chandigarh</option>
                                                                            <option>Dadra and Nagar Haveli</option>
                                                                            <option>Daman and Diu</option>
                                                                            <option>Delhi</option>
                                                                            <option>Lakshadeep</option>
                                                                            <option>Pondicherry</option>
                                                                        </select>
                                                                    </p>
                                                                    <p id="billing_postcode_field" class="form-row form-row-wide address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode">
                                                                        <label class="" for="billing_postcode">Postcode / ZIP
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" autocomplete="off" value="" placeholder="" id="pincode" name="pincode" required class="input-text ">
                                                                        <errorpin></errorpin>
                                                                    </p>
                                                                    <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                                        <label class="" for="billing_phone">Alterate Contact No
                                                                        </label>
                                                                        <input type="tel" value="" placeholder="" id="contact2" name="contact2" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                                        <label class="" for="billing_email">Email Address
                                                                        </label>
                                                                        <input type="email" value="" placeholder="" id="email" name="email" class="input-text ">
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                                                        </div>
                                                        <!-- .woocommerce-billing-fields -->
                                                    </div>
                                                </div>
                                                <!-- .col2-set -->
                                                <h3 id="order_review_heading">Your order</h3>
                                                <div class="woocommerce-checkout-review-order" id="order_review">
                                                    <div class="order-review-wrapper">
                                                        <h3 class="order_review_heading">Your Order</h3>
                                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-name">Product</th>
                                                                    <th class="product-total">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?PHP
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
                                                                <tr class="cart_item">
                                                                    <td class="product-name">
                                                                        <strong class="product-quantity"><?PHP echo $row["productQuantity"]; ?> ×</strong> <?PHP echo $row["productName"]; ?>&nbsp;
                                                                    </td>
                                                                    <td class="product-total">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <i class="fa fa-rupee"></i> <?PHP echo $sum = $row["productQuantity"]*$row["productPrice"]; $carttotal += $sum; ?></span>
                                                                    </td>
                                                                </tr>
                                                            <?PHP 
                                                                }
                                                            }
                                                            ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr class="cart-subtotal">
                                                                    <th>Subtotal</th>
                                                                    <td>
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <input type="hidden" value="<?PHP echo $carttotal; ?>" name="carttotal">
                                                                            <i class="fa fa-rupee"></i> <?PHP echo $carttotal; ?></span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="cart-subtotal">
                                                                    <th>Shipping</th>
                                                                    <td>
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <?PHP echo $shippingonCart = get_Shipping($conn, $carttotal, $minshipping, $freesheepingLimit, $shippingCharges); ?></span>
                                                                            <input type="hidden" value="<?PHP if($shippingonCart != "Free"){ echo (int)filter_var($shippingonCart, FILTER_SANITIZE_NUMBER_INT)*(-1); }else{ echo 0; } ?>" name="shipping">

                                                                    </td>
                                                                </tr>
                                                                <?PHP
                                                                if(isset($wallet) && !empty($wallet) && $wallet > 0){
                                                                ?>
                                                                <tr class="cart-subtotal">
                                                                    <th>Wallet</th>
                                                                    <td>
                                                                        <span class="woocommerce-Price-amount amount">
                                                                          - <i class="fa fa-rupee"></i> <?PHP if($wallet >= $carttotal){ echo $carttotal; }else{ echo $wallet; } ?></span>
                                                                          <input type="hidden" value="<?PHP if($wallet >= $carttotal){ echo $carttotal; }else{ echo $wallet; } ?>" name="wallet">
                                                                          <?PHP if($wallet >= $carttotal){ $wallet = $carttotal; } ?>
                                                                    </td>
                                                                </tr>
                                                                <?PHP 
                                                                }
                                                                ?>
                                                                <?PHP
                                                                if(isset($pcode) && !empty($pcode) && $return === 1){
                                                                ?>
                                                                <tr class="cart-subtotal">
                                                                    <th>Cashback</th>
                                                                    <td>
                                                                        <span class="woocommerce-Price-amount amount">
                                                                          - <i class="fa fa-rupee"></i> <?PHP echo $promoDiscount; ?></span>
                                                                          <input type="hidden" value="<?PHP echo $promoDiscount; ?>" name="cashback">
                                                                          <input type="hidden" value="<?PHP echo $_GET["pcode"]; ?>" name="promo">
                                                                    </td>
                                                                </tr>
                                                                <?PHP 
                                                                }
                                                                ?>
                                                                <tr class="order-total">
                                                                    <th>Payble Amount</th>
                                                                    <td>
                                                                        <strong>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <i class="fa fa-rupee"></i> <?PHP echo $carttotal+$shippingonCart-$wallet; ?></span>
                                                                                <input type="hidden" value="<?PHP echo $carttotal+$shippingonCart-$wallet; ?>" name="payable">
                                                                        </strong>
                                                                    </td>
                                                                </tr>
                                                                <?PHP
                                                                if(isset($pcode) && !empty($pcode) && $return === 1){
                                                                ?>
                                                                <tr class="order-total">
                                                                    <th>Effective Price</th>
                                                                    <td>
                                                                        <strong>
                                                                            <span class="woocommerce-Price-amount  amount">
                                                                                <i class="fa fa-rupee"></i> <?PHP echo $carttotal+$shippingonCart-$promoDiscount-$wallet; ?></span>
                                                                                <input type="hidden" value="<?PHP echo $carttotal+$shippingonCart-$promoDiscount-$wallet; ?>" name="effective">
                                                                        </strong>
                                                                    </td>
                                                                </tr>
                                                                <?PHP 
                                                                }
                                                                ?>
                                                            </tfoot>
                                                        </table>
                                                        <!-- /.woocommerce-checkout-review-order-table -->
                                                        <div class="woocommerce-checkout-payment" id="payment">
                                                            <ul class="wc_payment_methods payment_methods methods">
                                                                <?PHP /*
                                                                <li class="wc_payment_method payment_method_bacs">
                                                                    <input type="radio" data-order_button_text="" checked="checked" value="online" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                                    <label for="payment_method_bacs">Online Payment</label>
                                                                </li>
                                                                */ ?>
                                                                <li class="wc_payment_method payment_method_cod">
                                                                    <input type="radio" checked data-order_button_text="" value="cod" name="payment_method" <?PHP if(isset($pcode) && !empty($pcode) && $return === 1 && $promocod != 1){ echo "disabled readonly "; } ?> class="input-radio" id="payment_method_cod">
                                                                    <label id="code_label" for="payment_method_cod"><?PHP if(isset($pcode) && !empty($pcode) && $return === 1 && $promocod != 1){ echo "<del>"; } ?>Cash on delivery<?PHP if(isset($pcode) && !empty($pcode) && $return === 1 && $promocod != 1){ echo "</del><br><sub class='text-warning'>Cod not available on this Promocode</sub>"; } ?><br><errorcod></errorcod></label>
                                                                </li>
                                                            </ul>
                                                            <div class="form-row place-order">
                                                                <p class="form-row terms wc-terms-and-conditions woocommerce-validated">
                                                                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                                        <input type="checkbox" id="terms" name="terms" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox required">
                                                                        <span>I’ve read and accept the <a class="woocommerce-terms-and-conditions-link" href="terms-and-conditions.html">terms &amp; conditions</a></span>
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <input type="hidden" value="1" name="terms-field" required>
                                                                </p>
                                                                <button id="placeOrder" class="placeOrder button wc-forward text-center">Place order</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.woocommerce-checkout-payment -->
                                                    </div>
                                                    <!-- /.order-review-wrapper -->
                                                </div>
                                                <!-- .woocommerce-checkout-review-order -->
                                            </form>
                                            <!-- .woocommerce-checkout -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    <!-- .entry-content -->
                                </div>
                                <!-- #post-## -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>
            <!-- #content -->
<?php
include('footer.php');
?>
<script>
    $('#pincode').on("input change focusout", function(e){
        var pincode = $('#pincode').val();
        if(pincode.match('[0-9]{6}')){
            $('errorpin').html('');
            $.ajax({  
                type: "POST",  
                url: "calls/checkPincode.php",  
                data: {'pincode': pincode},  
                success: function(data) {  
                    //$('errorpin').html(data);
                    if(data == "ok"){
                        $('.placeOrder').removeAttr('disabled');
                        $('#payment_method_cod').removeAttr('disabled').removeAttr('readonly');
                        $('#code_label').html("Cash on delivery");
                        $('errorcod').html('');
                    }
                    if(data == "na"){
                        $('.placeOrder').removeAttr('disabled');
                        $('#payment_method_cod').attr('disabled', 'disabled').attr('readonly', 'readonly');
                        $('#code_label').html("<del>Cash on delivery</del><br><errorcod></errorcod>");
                        $('errorcod').html("<sub class='text-warning'>Cod not available at your location/pincode</sub>");
                    }
                    if(data == "ne"){
                        $('.placeOrder').attr('disabled', 'disabled');
                        $('errorpin').html("<span class='text-danger'>Sorry! We are unable to ship at Your Location</span>");
                    }
                }  
            }); 
        }else{
            var data = "<span class='text-danger'>Enter a Vaild Pincode</span>";
            $('#pincode').focus();;
            $('errorpin').html(data);
        }
    });



window.onload = function () {
  var form = document.getElementById('checkoutForm');
  $(".placeOrder").on("click", function(){
    for(var i=0; i < form.elements.length; i++){
      $(element).parents().removeClass("woocommerce-invalid woocommerce-invalid-required-field");
      if(form.elements[i].value === '' && form.elements[i].hasAttribute('required')){
        form.elements[i].focus();
        var element = form.elements[i];
        $(element).parents().addClass("woocommerce-invalid woocommerce-invalid-required-field");
        return false;
      }
    }
    form.submit();
  }); 
};

</script>