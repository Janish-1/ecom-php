            <footer class="site-footer footer-v1">
                <div class="col-full">
                    <div class="before-footer-wrap">
                        <div class="col-full">
                            <?PHP /*
                            <div class="footer-newsletter">
                                <div class="media">
                                    <i class="footer-newsletter-icon tm tm-newsletter"></i>
                                    <div class="media-body">
                                        <div class="clearfix">
                                            <div class="newsletter-header">
                                                <h5 class="newsletter-title">Sign up to Newsletter</h5>
                                                <span class="newsletter-marketing-text">...and receive
                                                    <strong>$20 coupon for first shopping</strong>
                                                </span>
                                            </div>
                                            <!-- .newsletter-header -->
                                            <div class="newsletter-body">
                                                <form class="newsletter-form">
                                                    <input type="text" placeholder="Enter your email address">
                                                    <button class="button" type="button">Sign up</button>
                                                </form>
                                            </div>
                                            <!-- .newsletter body -->
                                        </div>
                                        <!-- .clearfix -->
                                    </div>
                                    <!-- .media-body -->
                                </div>
                                <!-- .media -->
                            </div>
                            */ ?>
                            <!-- .footer-newsletter -->
                            <div class="footer-social-icons">
                                <ul class="social-icons nav">
                                    <li class="nav-item">
                                        <a class="sm-icon-label-link nav-link" href="#">
                                            <i class="fa fa-facebook"></i> Facebook</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="sm-icon-label-link nav-link" href="#">
                                            <i class="fa fa-twitter"></i> Twitter</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="sm-icon-label-link nav-link" href="#">
                                            <i class="fa fa-google-plus"></i> Google+</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- .footer-social-icons -->
                        </div>
                        <!-- .col-full -->
                    </div>
                    <!-- .before-footer-wrap -->
                    <div class="footer-widgets-block">
                        <div class="row">
                            <div class="footer-contact">
                                <div class="footer-logo">
                                    <a href="index.php" class="custom-logo-link" rel="home">
                                        <img src="images/logo.png" title="TheChandniChowk.com" alt="TheChandniChowk.com" /> 
                                    </a>
                                </div>
                                <!-- .footer-logo -->
                                <div class="contact-payment-wrap">
                                    <div class="footer-contact-info">
                                        <div class="media">
                                            <span class="media-left icon media-middle">
                                                <i class="tm tm-call-us-footer"></i>
                                            </span>
                                            <div class="media-body">
                                                <span class="call-us-title">Got Questions ? Call us 24/7!</span>
                                                <span class="call-us-text">(800) 8001-8588, (0600) 874 548</span>
                                                <address class="footer-contact-address">17 Princess Road, London, Greater London NW1 8JR, UK</address>
                                                <a href="#" class="footer-address-map-link">
                                                    <i class="tm tm-map-marker"></i>Find us on map</a>
                                            </div>
                                            <!-- .media-body -->
                                        </div>
                                        <!-- .media -->
                                    </div>
                                    <!-- .footer-contact-info -->
                                    <div class="footer-payment-info">
                                        <div class="media">
                                            <span class="media-left icon media-middle">
                                                <i class="tm tm-safe-payments"></i>
                                            </span>
                                            <div class="media-body">
                                                <h5 class="footer-payment-info-title">We are using safe payments</h5>
                                                <div class="footer-payment-icons">
                                                    <ul class="list-payment-icons nav">
                                                        <li class="nav-item">
                                                            <img class="payment-icon-image" src="assets/images/credit-cards/mastercard.svg" alt="mastercard" />
                                                        </li>
                                                        <li class="nav-item">
                                                            <img class="payment-icon-image" src="assets/images/credit-cards/visa.svg" alt="visa" />
                                                        </li>
                                                        <li class="nav-item">
                                                            <img class="payment-icon-image" src="assets/images/credit-cards/paypal.svg" alt="paypal" />
                                                        </li>
                                                        <li class="nav-item">
                                                            <img class="payment-icon-image" src="assets/images/credit-cards/maestro.svg" alt="maestro" />
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .footer-payment-icons -->
                                                <div class="footer-secure-by-info">
                                                    <h6 class="footer-secured-by-title">Secured by:</h6>
                                                    <ul class="footer-secured-by-icons">
                                                        <li class="nav-item">
                                                            <img class="secure-icons-image" src="assets/images/secured-by/norton.svg" alt="norton" />
                                                        </li>
                                                        <li class="nav-item">
                                                            <img class="secure-icons-image" src="assets/images/secured-by/mcafee.svg" alt="mcafee" />
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .footer-secure-by-info -->
                                            </div>
                                            <!-- .media-body -->
                                        </div>
                                        <!-- .media -->
                                    </div>
                                    <!-- .footer-payment-info -->
                                </div>
                                <!-- .contact-payment-wrap -->
                            </div>
                            <!-- .footer-contact -->
                            <div class="footer-widgets">
                                <div class="columns">
                                    <aside class="widget clearfix">
                                        <div class="body">
                                            <h4 class="widget-title">Find it Fast</h4>
                                            <div class="menu-footer-menu-1-container">
                                                <ul id="menu-footer-menu-1" class="menu">
                                            <?PHP
                                            $sqlCat = "SELECT * FROM productcategories WHERE `categoryParent` = 0 ORDER BY `categoryOrder` LIMIT 9";
                                            $resultCat = $conn->query($sqlCat);

                                            if ($resultCat->num_rows > 0) {
                                                // output data of each row
                                                while($rowCat = $resultCat->fetch_assoc()) {
                                                    $catid = $rowCat["id"];
                                            ?>
                                                    <li class="menu-item">
                                                        <a href="shop.html"><?PHP echo $rowCat["categoryName"]; ?></a>
                                                    </li>
                                            <?PHP
                                                }
                                            }
                                            ?>
                                                </ul>
                                            </div>
                                            <!-- .menu-footer-menu-1-container -->
                                        </div>
                                        <!-- .body -->
                                    </aside>
                                    <!-- .widget -->
                                </div>
                                <!-- .columns -->
                                <div class="columns">
                                    <aside class="widget clearfix">
                                        <div class="body">
                                            <h4 class="widget-title">&nbsp;</h4>
                                            <div class="menu-footer-menu-2-container">
                                                <ul id="menu-footer-menu-2" class="menu">
                                                <?PHP
                                                $sqlCat = "SELECT * FROM productcategories WHERE `categoryParent` != 0 ORDER BY `categoryOrder` LIMIT 5";
                                                $resultCat = $conn->query($sqlCat);

                                                if ($resultCat->num_rows > 0) {
                                                    // output data of each row
                                                    while($rowCat = $resultCat->fetch_assoc()) {
                                                        $catid = $rowCat["id"];
                                                ?>
                                                        <li class="menu-item">
                                                            <a href="shop.html"><?PHP echo $rowCat["categoryName"]; ?></a>
                                                        </li>
                                                <?PHP
                                                    }
                                                }
                                                ?>
                                                </ul>
                                            </div>
                                            <!-- .menu-footer-menu-2-container -->
                                        </div>
                                        <!-- .body -->
                                    </aside>
                                    <!-- .widget -->
                                </div>
                                <!-- .columns -->
                                <div class="columns">
                                    <aside class="widget clearfix">
                                        <div class="body">
                                            <h4 class="widget-title">Customer Care</h4>
                                            <div class="menu-footer-menu-3-container">
                                                <ul id="menu-footer-menu-3" class="menu">
                                                    <li class="menu-item">
                                                        <a href="login-and-register.html">My Account</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="track-your-order.html">Track Order</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="shop.html">Shop</a>
                                                    </li>
                                                    <?PHP /*
                                                    <li class="menu-item">
                                                        <a href="wishlist.html">Wishlist</a>
                                                    </li>
                                                    */ ?>
                                                    <li class="menu-item">
                                                        <a href="about.html">About Us</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="terms-and-conditions.html">Returns/Exchange</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="faq.html">FAQs</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- .menu-footer-menu-3-container -->
                                        </div>
                                        <!-- .body -->
                                    </aside>
                                    <!-- .widget -->
                                </div>
                                <!-- .columns -->
                            </div>
                            <!-- .footer-widgets -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .footer-widgets-block -->
                    <div class="site-info">
                        <div class="col-full">
                            <div class="copyright">Copyright &copy; 2018 <a href="index.php"><?PHP echo $sitename; ?></a> All rights reserved.</div>
                            <!-- .copyright -->
                            <div class="credit"><a rel="follow" target="_blank" href="http://www.freewayweb.in?">FreewayWeb</a></div>
                            <!-- .credit -->
                        </div>
                        <!-- .col-full -->
                    </div>
                    <!-- .site-info -->
                </div>
                <!-- .col-full -->
            </footer>
            <!-- .site-footer -->
        </div>
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/tether.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="assets/js/hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="assets/js/hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="assets/js/scrollup.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="assets/js/waypoints-sticky.min.js"></script>
        <script type="text/javascript" src="assets/js/pace.min.js"></script>
        <script type="text/javascript" src="assets/js/slick.min.js"></script>
        <script type="text/javascript" src="assets/js/scripts.js"></script>
        
    </body>
</html>

<script>

    $(".addtocart").click(function(e){
        e.preventDefault();
        var addtocart = $(this).siblings('data');
        var product = [];
        product["id"] = addtocart.attr("data-product-id");
        product["name"] = addtocart.attr("data-product-name");
        product["option"] = addtocart.attr("data-product-option");
        product["option-id"] = addtocart.attr("data-product-option-id");
        product["price"] = addtocart.attr("data-product-price");
        product["image"] = addtocart.attr("data-product-image");
        add_product(this, product);
        changeQty();
    });

    function add_product(element, data){
        $(element).html('<i class="fa fa-check"></i>');
        //(data["id"]);
        var product = data;
        $.ajax({
          type: "POST",
          url: 'calls/addtoCart.php',
          type: 'post',
          data: {data_id : product["id"],data_name : product["name"],data_option : product["option-id"],data_price : product["price"],data_user : localStorage.getItem("uniqueVisitorId")},
          success: function(data){
            if(data == 1){
                var item = '';
                item +=  '<li class="woocommerce-mini-cart-item shopping-cart mini_cart_item">';
                item +=  '<a href="#" class="remove delete-btn" aria-label="Remove this item">×</a>';
                item +=  '<data data-product-id="'+ product["id"] +'" data-product-name="'+ product["name"] +'" data-product-option="'+ product["option"] +'"  data-product-option-id="'+ product["option-id"] +'" data-product-price="'+ product["price"] +'" data-product-image="'+ product["image"] +'"></data>';
                item +=  '<a href="">';
                item +=  '<img src="'+product["image"]+'" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="'+ product["name"] +'">'+ product["name"];
                item +=  '</a>';
                item +=  '<span class="quantity">1</span> × <span class="woocommerce-Price-amount amount"><span class="fa fa-rupee"></span> '+ product["price"] +'</span>';
                item +=  '</li>';
                $('.cart_list').append(item);
                window.location.reload();
            }else{
                window.location.reload();
            }

          },
          complete: function(){
            setTimeout(function(){ 
                $(element).text('ADD TO CART');
            }, 2000);   
          },
          error: function(error){
            console.log(error);
          }
        });
    }

    function subtract_product(element, data){
        var product = data;
        $.ajax({
          type: "POST",
          url: 'calls/subtractFromCart.php',
          type: 'post',
          data: {data_id : product["id"],data_name : product["name"],data_option : product["option-id"],data_price : product["price"],data_user : localStorage.getItem("uniqueVisitorId")},
          success: function(data){
            var qty = $(element).val();
            window.location.reload();
          }
        });
    }

    function delete_product(element, data){
        var product = data;
        $.ajax({
          type: "POST",
          url: 'calls/deleteCartItem.php',
          type: 'post',
          data: {data_id : product["id"], data_name : product["name"], data_option : product["option-id"], data_price : product["price"], data_user : localStorage.getItem("uniqueVisitorId")},
          success: function(data){
            changeQty();
          }
        });
    }
    if(localStorage.getItem("uniqueVisitorId")){
        var uniqueVisitorId = localStorage.getItem("uniqueVisitorId");
        jQuery.post("calls/getCart.php", {uniqueVisitorId: uniqueVisitorId}, function(data){
            $('.cart_list').append(data);
            changeQty();
        }).fail(function(){
            alert("Damn, something broke");
            window.location.reload();
        });
    }else{
        uniqueVisitorId = get_uniqueVisitorId(20);
        localStorage.setItem('uniqueVisitorId', uniqueVisitorId);

        jQuery.post("calls/setUser.php", {uniqueVisitorId: uniqueVisitorId}, function(data){
        }).fail(function(){
            alert("Damn, something broke");
            window.location.reload();
        });
    }

function get_uniqueVisitorId(length){
    var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz'.split('');
    if (! length) {
        length = Math.floor(Math.random() * chars.length);
    }
    var str = '';
    for (var i = 0; i < length; i++) {
        str += chars[Math.floor(Math.random() * chars.length)];
    }
    return str;
}



$(document).on('click', '.minus-btn', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());
    var addtocart = $this.closest('tr').children('.product-subtotal').children('data');
    var product = [];
    product["id"] = addtocart.attr("data-product-id");
    product["name"] = addtocart.attr("data-product-name");
    product["option"] = addtocart.attr("data-product-option");
    product["option-id"] = addtocart.attr("data-product-option-id");
    product["price"] = addtocart.attr("data-product-price");
    product["image"] = addtocart.attr("data-product-image");
    if(value > 1){
        value = value - 1;
        subtract_product($input, product);
    }else{
        delete_product($input, product);
        this.closest('tr').remove('tr');

    }
   $input.val(value);
   changeQty();
});

 
$(document).on('click', '.plus-btn', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());
    value = value + 1;
    $input.val(value);

    var addtocart = $this.closest('tr').children('.product-subtotal').children('data');
    var product = [];
    product["id"] = addtocart.attr("data-product-id");
    product["name"] = addtocart.attr("data-product-name");
    product["option"] = addtocart.attr("data-product-option");
    product["option-id"] = addtocart.attr("data-product-option-id");
    product["price"] = addtocart.attr("data-product-price");
    product["image"] = addtocart.attr("data-product-image");
    add_product($input, product);
});


$(document).on('click', '.shopping-cart .remove', function(e){
    e.preventDefault();
    this.parentNode.remove(this);
    var $this = $(this);
    var removeThis = $this.siblings('data');
    var product = [];
    product["id"] = removeThis.attr("data-product-id");
    product["name"] = removeThis.attr("data-product-name");
    product["option"] = removeThis.attr("data-product-option");
    product["option-id"] = removeThis.attr("data-product-option-id");
    product["price"] = removeThis.attr("data-product-price");
    product["image"] = removeThis.attr("data-product-image");
    delete_product(removeThis, product);
    changeQty();
});

$(document).on('click', '.cart-wrapper .remove', function(e){
    e.preventDefault();
    var $this = $(this);
    this.parentNode.parentNode.remove(this);
    var removeThis = $this.siblings('data');
    var product = [];
    product["id"] = removeThis.attr("data-product-id");
    product["name"] = removeThis.attr("data-product-name");
    product["option"] = removeThis.attr("data-product-option");
    product["option-id"] = removeThis.attr("data-product-option-id");
    product["price"] = removeThis.attr("data-product-price");
    product["image"] = removeThis.attr("data-product-image");
    delete_product(removeThis, product);
    location.reload();
});


function changeQty(){
    var items = 0;
    $(".quantity").each(function(i, val) {
      if ($(this).html() > 0) {
        var qty = $(this).html();
        items += parseInt(qty);
      }
    });
    var tprice = 0;
    $(".mini_cart_item .woocommerce-Price-amount-total").each(function(i, val) {
      if (parseInt($(this).text()) > 0) {
        var price = $(this).text();
        tprice += parseInt(price);
      }
    });
    if(items){
        //items = items.replace(/^0+/, '');
        $('.cart-contents .count').text(items);
        $('.handheld-header-cart-link .count').text(items);
        $('.woocommerce-mini-cart__total .woocommerce-Price-currencySymbol').after().text(tprice);        
        $('.cartValueTotal').html(tprice);
        $('#cOcartVal').val(tprice);
    }else{
        $('.woocommerce-mini-cart__total .woocommerce-Price-currencySymbol').after().text(0);        
        $('.cartValueTotal').html(0);
        $('#cOcartVal').val(0);
    }
}

<?PHP
if($page == "product"){
    if(count($optionGroups) > 0){
        for($i=0;$i<count($optionGroups);$i++){
?>
        $(document).on('change', '#optionid_<?PHP echo $optionGroups[$i]; ?>', function(e){
            get_options('<?PHP echo json_encode($optionGroups); ?>');
            var returnCheckOptionData = checkAddtocartAll();
        });

<?PHP 
        }
?>
function checkAddtocartAll(){
<?PHP  for($i=0;$i<count($optionGroups);$i++){
?>
        var data = 1;
        if($('#optionid_<?PHP echo $optionGroups[$i]; ?>').val() != ''){
            data = 1;
        }else{
            data = 0;
        }
<?PHP 
        }
?>
        if(data == 1){
            $('.hiddenAddtoCart').show();
        }
}
$('.hiddenAddtoCart').hide();
function add(a, b) {
    return parseInt(a) + parseInt(b);
}
function get_options(no){
    var bprice = $('baseprice').attr("value");
    var obj = JSON.parse(no);
    var a = obj.toString().split(',');
    var valueData = [];
    var opIdData = [];
    for(var i=0; i<no.length;i++){
        if(a[i]){
            if($('#optionid_'+a[i]).val() != ''){
        //        alert(a[i]);
                valueData.push($('#optionid_'+a[i]).val());
            //    var optionId = $("#optionid_"+a[i]+" option[value="+valuea+"]", this).attr('optionId');
              //  alert(optionId);

                opIdData.push($('#optionid_'+a[i]).find('option:selected').attr('optionId'));
              //  alert($('#optionid_'+a[i]).attr('option-id'));
            }
            var opIds = opIdData.toString();
            var priceIncrement = parseInt(bprice) + valueData.reduce(add, 0);
            $('data').attr("data-product-price", priceIncrement);
            $('data').attr("data-product-option-id", opIds);
            $('.productPriceContain').html(priceIncrement);
            $('data').siblings('button').addClass("addtocart");
            $("#optionsForm").removeAttr("id");
        }
    }

}

$("#optionsForm").submit(function(e){
    e.preventDefault();
});
<?PHP
    }

}
?>

</script>
