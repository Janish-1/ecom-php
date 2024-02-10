<?PHP
include('header.php');
if(isset($_GET['producturl'])){
    $producturl = mysqli_real_escape_string($conn,$_GET['producturl']);
    $producturl = input($producturl);
    $producturl= strtolower($producturl);
    $sqlnews10 = "SELECT * FROM `product` WHERE `metaUrl` = '$producturl' OR `id` = '$producturl' LIMIT 1";
    $resultnews10 = $conn->query($sqlnews10);
    if ($resultnews10->num_rows > 0) {
        $catid = '';
        while($rownews10 = $resultnews10->fetch_assoc()) {
            $rowFeatured = $rownews10;
            $productId = $rownews10["id"];
            $catid = $rownews10["productCategory"];
            $productName = $rownews10["productName"];
?>
<div class="single-product full-width extended">
            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="<?PHP echo url; ?>">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span><a href="shop.php?catid=<?PHP echo getCategoryUrl($conn, $catid); ?>"><?PHP echo getCategoryName($conn, $catid); ?></a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span><?PHP echo $productName; ?>
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="product">
                                    <div class="single-product-wrapper">
                                        <div class="product-images-wrapper thumb-count-4">
                                            <span class="onsale">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol"></span><?PHP echo round(100-($rowFeatured["productTotal"]/$rowFeatured["productPrice"])*100); ?>% Off
                                                </span>
                                            </span>
                                            <!-- .onsale -->
                                            <div id="techmarket-single-product-gallery" class="techmarket-single-product-gallery techmarket-single-product-gallery--with-images techmarket-single-product-gallery--columns-4 images" data-columns="4">
                                                <div class="techmarket-single-product-gallery-images" data-ride="tm-slick-carousel" data-wrap=".woocommerce-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .techmarket-single-product-gallery-thumbnails__wrapper&quot;}">
                                                    <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">
                                                        <a href="#" class="woocommerce-product-gallery__trigger">🔍</a>
                                                        <figure class="woocommerce-product-gallery__wrapper ">
                                                    <?PHP
                                                    $sqlimage = "SELECT * FROM `productimages` WHERE `productId` = '$productId' ORDER BY `orderBy` ASC";
                                                    $resultimage = $conn->query($sqlimage);
                                                    if ($resultimage->num_rows > 0) {
                                                        while($rowimage = $resultimage->fetch_assoc()) {
                                                    ?>
                                                            <div data-thumb="<?PHP echo $url; ?>product/<?PHP echo $rowimage["image"]; ?>" class="woocommerce-product-gallery__image">
                                                                <a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?producturl=<?PHP echo $rowFeatured["metaUrl"]; ?>" tabindex="0">
                                                                    <img width="600" height="600" src="<?PHP echo $url; ?>product/<?PHP echo $rowimage["image"]; ?>" class="attachment-shop_single size-shop_single wp-post-image" alt="">
                                                                </a>
                                                            </div>

                                                    <?PHP
                                                        }
                                                    }else{
                                                    ?>
                                                            <div data-thumb="<?PHP echo $url; ?>product/default.jpg" class="woocommerce-product-gallery__image">
                                                                <a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?producturl=<?PHP echo $rowFeatured["metaUrl"]; ?>" tabindex="0">
                                                                    <img width="600" height="600" src="<?PHP echo $url; ?>product/default.jpg" class="attachment-shop_single size-shop_single wp-post-image" alt="">
                                                                </a>
                                                            </div>
                                                    <?PHP
                                                    }
                                                    ?>
                                                        </figure>
                                                    </div>
                                                    <!-- .woocommerce-product-gallery -->
                                                </div>
                                                <!-- .techmarket-single-product-gallery-images -->
                                                <div class="techmarket-single-product-gallery-thumbnails" data-ride="tm-slick-carousel" data-wrap=".techmarket-single-product-gallery-thumbnails__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=https://freewayweb.in/"#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=https://freewayweb.in/"#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .woocommerce-product-gallery__wrapper&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:765,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;horizontal&quot;:true,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:4}}]}">
                                                    <figure class="techmarket-single-product-gallery-thumbnails__wrapper">
                                                    <?PHP 

                                                    $sqlimage = "SELECT * FROM `productimages` WHERE `productId` = '$productId' ORDER BY `orderBy` ASC";
                                                    $resultimage = $conn->query($sqlimage);
                                                    if ($resultimage->num_rows > 0) {
                                                        while($rowimage = $resultimage->fetch_assoc()) {
                                                    ?>
                                                        <figure data-thumb="<?PHP echo $url; ?>product/<?PHP echo $rowimage["image"]; ?>" class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" src="<?PHP echo $url; ?>product/<?PHP echo $rowimage["image"]; ?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">
                                                        </figure>
                                                    <?PHP 
                                                    	}
                                                    }
                                                    ?>
                                                    
                                                    </figure>
                                                    <!-- .techmarket-single-product-gallery-thumbnails__wrapper -->
                                                </div>
                                                <!-- .techmarket-single-product-gallery-thumbnails -->
                                            </div>
                                            <!-- .techmarket-single-product-gallery -->
                                        </div>
                                        <!-- .product-images-wrapper -->
                                        <div class="summary entry-summary">
                                            <div class="single-product-header">
                                                <h1 class="product_title entry-title"><?PHP echo $rowFeatured["productName"]; ?></h1>
                                                <?PHP /*
                                                <a class="add-to-wishlist" href="wishlist.html"> Add to Wishlist</a>
                                                */ ?>
                                            </div>
                                            <!-- .single-product-header -->
                                            <div class="single-product-meta">
                                                <div class="brand">
                                                    Sold By<br>                                                        
                                                    <a href="#">
                                                        <?PHP echo getSellerName($conn, $rowFeatured["productUser"]); ?>
                                                    </a>
                                                </div>
                                                <div class="cat-and-sku">
                                                    <span class="posted_in categories">
                                                        <a rel="tag" href="shop.php?catid=<?PHP echo getCategoryUrl($conn, $catid); ?>"><?PHP echo getCategoryName($conn, $catid); ?></a>
                                                    </span>
                                                    <span class="sku_wrapper">SKU:
                                                        <span class="sku"><?PHP echo $rowFeatured["productsku"]; ?></span>
                                                    </span>
                                                </div>
                                                <div class="product-label">
                                                    <div class="ribbon label green-label">
                                                        <span>Verified</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .single-product-meta -->
                                            <?PHP /*
                                            <div class="rating-and-sharing-wrapper">
                                                <div class="woocommerce-product-rating">
                                                    <div class="star-rating">
                                                        <span style="width:100%">Rated
                                                            <strong class="rating">5.00</strong> out of 5 based on
                                                            <span class="rating">1</span> customer rating</span>
                                                    </div>
                                                    <a rel="nofollow" class="woocommerce-review-link" href="#reviews">(<span class="count">1</span> customer review)</a>
                                                </div>
                                            </div>
                                            */ ?>
                                            <!-- .rating-and-sharing-wrapper -->
                                            <div class="woocommerce-product-details__short-description">
                                                <?PHP echo $rowFeatured["productShortDesc"]; ?>
                                            </div>
                                            <!-- .woocommerce-product-details__short-description -->
                                        </div>
                                        <!-- .entry-summary -->
                                        <div class="product-actions-wrapper">
                                            <div class="product-actions">
                                                <div class="availability">
                                                    Availability:
                                                    <p class="stock in-stock"><?PHP echo $rowFeatured["productStock"]; ?> in stock</p>
                                                </div>
                                                <!-- .availability -->
                                                <div class="additional-info">
                                                    <i class="tm tm-free-delivery"></i> Item with
                                                    <strong>Free Delivery</strong><br>
                                                    <?PHP if($rowFeatured["productReturn"] == 1){ ?>
                                                    <i class="fa fa-refresh tm"></i>Hassle Free <strong>Easy Return</strong>
                                                    <?PHP } ?>
                                                </div>
                                                <!-- .additional-info -->
                                                <p class="price">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol"><i class="fa fa-rupee"></i> </span><span class="productPriceContain"><?PHP echo $rowFeatured["productTotal"]; ?></span>
                                                        <?PHP if($rowFeatured["productTotal"] < $rowFeatured["productPrice"]){ ?>
                                                        <del>
                                                            <span class="amount"><i class="fa fa-rupee"></i> <?PHP echo $rowFeatured["productPrice"]; ?></span>
                                                        </del>
                                                        <?PHP } ?>
                                                    </span>
                                                </p>
                                                <!-- .price -->
                                                <form id="optionsForm" class="variations_form cart">
                                                	<?PHP 
                                                	$sqloption = "SELECT * FROM `productoption` WHERE `productId` = '$productId' AND `optionGroupId` != 0 GROUP BY `optionGroupId`";
													$resultoption = $conn->query($sqloption);
													$optionGroups = array();
													if ($resultoption->num_rows > 0) {
                                                        $option = 1;
													    while($rowoption = $resultoption->fetch_assoc()) {
													    	$optionGroups[] = $rowoption["optionGroupId"];
													    }
													?>
                                                    <table class="variations">
                                                        <tbody>
                                                        <?PHP
                                                        for($i=0;$i<count($optionGroups);$i++){
                                                        ?>
                                                        	<tr>
                                                                <td class="label">
                                                                    <label for="pa_"><?PHP echo getOptionGroupName($conn, $optionGroups[$i]); ?></label>
                                                                </td>
                                                                <td class="value">
                                                                    <select data-show_option_none="yes" data-attribute_name="attribute_pa_screen-size" name="attribute_pa_screen-size" class="" id="optionid_<?PHP echo $optionGroups[$i]; ?>" required>
                                                                    	<option value="">Choose an option</option>
                                                                    <?PHP
																	$sqloptionContent = "SELECT * FROM `productoption` WHERE `productId` = '$productId' AND `optionGroupId` = ".$optionGroups[$i]." AND `enable` = 1 ORDER BY `priceIncrement`";
																	$resultoptionContent = $conn->query($sqloptionContent);
																	$optionContentGroups = array();
																	if ($resultoptionContent->num_rows > 0) {
                                                                        while($rowoptionContent = $resultoptionContent->fetch_assoc()) {
                                                                    ?>
                                                                        <option value="<?PHP echo $rowoptionContent["priceIncrement"]; ?>" optionId="<?PHP echo $rowoptionContent["id"]; ?>" class="attached enabled"><?PHP echo getOptionName($conn, $rowoptionContent["optionId"]); ?> <?PHP if($rowoptionContent["priceIncrement"] > 0){ echo "( +".$rowoptionContent['priceIncrement']." )";} ?></option>
                                                                    <?PHP
                                                                   		}
                                                                   	}else{
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                    <a href="#" class="reset_variations" style="visibility: hidden;">Clear</a>
                                                                </td>
                                                            </tr>
                                                        <?PHP 
                                                    	}
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                    <?PHP
                                                	}else{
                                                        $option = 0;
                                                    }
                                                    ?>
                                                    <div class="single_variation_wrap">
                                                        <div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-disabled">
                                                        <?PHP /*
                                                            <div class="quantity">
                                                                <label for="quantity-input">Quantity</label>
                                                                <input id="quantity-input" type="number" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
                                                            </div>
                                                        */ ?>
                                                            <data data-product-id="<?PHP echo $rowFeatured["productsku"]; ?>"  data-product-name="<?PHP echo $rowFeatured["productName"]; ?>" data-product-option="<?PHP echo get_options($rowFeatured["id"]); ?>"  data-product-option-id="<?PHP echo get_options_id($rowFeatured["id"]); ?>" data-product-price="<?PHP echo $rowFeatured["productTotal"]; ?>" data-product-image="product/<?PHP echo get_productImage($conn, $rowFeatured["id"]); ?>"></data>
                                                            <baseprice value="<?PHP echo $rowFeatured["productTotal"]; ?>"></baseprice>
                                                            <button class="single_add_to_cart_button button alt wc-variation-selection-needed <?PHP if(count($optionGroups) != 0){ echo "hiddenAddtoCart"; } ?> addtocart">Add to cart</button>
                                                        </div>
                                                    </div>
                                                    <!-- .single_variation_wrap -->
                                                </form>
                                            </div>
                                            <!-- .product-actions -->
                                        </div>
                                        <!-- .product-actions-wrapper -->
                                    </div>
                                    <!-- .single-product-wrapper -->
                                    <div class="techmarket-tabs techmarket-tabs-wrapper wc-tabs-wrapper">
                                        <div id="tab-description" class="techmarket-tab">
                                            <div class="tab-content">
                                                <h2>Description</h2>
                                                <div>
                                                	<?PHP echo html_entity_decode($rowFeatured["productDesc"]); ?>
                                                </div>
                                            </div>
                                            <!-- .tab-content -->
                                        </div>
                                    </div>
                                    <!-- .techmarket-tabs -->

                                    <div class="products-carousel carousel-tabs-with-no-hover section-products-carousel-tabs" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                        <header class="section-header">
                                            <h2 class="section-title">Related Product</h2>
                                        </header>
                                        <div class="container-fluid">
                                            <div class="woocommerce columns-4">
                                                <div class="products">
                                                <?PHP 
                                                $getBestSeller = getConfigData($conn, 'bestSellerMain');
                                                $sqlFeatured = "SELECT * FROM `product` WHERE `productCategory` IN (".$getBestSeller.") AND `productLive` = '1' AND `productStock` > 0 LIMIT 10";
                                                $resultFeatured = $conn->query($sqlFeatured);
                                                if ($resultFeatured->num_rows > 0) {
                                                    while($rowFeatured = $resultFeatured->fetch_assoc()) {
                                                ?>
                                                    <div class="product product-featured">
                                                        <a href="product.php?producturl=<?PHP echo $rowFeatured["metaUrl"]; ?>" class="woocommerce-LoopProduct-link">
                                                            <img width="224" height="197" style="max-height: 197px;" src="<?PHP echo $siteurl; ?>product/<?PHP echo get_productImage($conn, $rowFeatured["id"]); ?>" class="wp-post-image" alt="<?PHP echo $rowFeatured["productName"]; ?>">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"><i class="fa fa-rupee"></i> <?PHP echo $rowFeatured["productTotal"]; ?></span>
                                                                </ins>
                                                                <?PHP if($rowFeatured["productTotal"] < $rowFeatured["productPrice"]){ ?>
                                                                <del>
                                                                    <span class="amount"><?PHP echo $rowFeatured["productPrice"]; ?></span>
                                                                </del>
                                                                <?PHP } ?>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title"><?PHP echo $rowFeatured["productName"]; ?></h2>
                                                        </a>
                                                        <?PHP /*
                                                        <data data-product-id="<?PHP echo $rowFeatured["productsku"]; ?>" data-product-name="<?PHP echo $rowFeatured["productName"]; ?>" data-product-option="<?PHP echo get_options($rowFeatured["id"]); ?>"  data-product-option-id="<?PHP echo get_options_id($rowFeatured["id"]); ?>" data-product-price="<?PHP echo $rowFeatured["productSell"]; ?>" data-product-image="product/<?PHP echo get_productImage($conn, $rowFeatured["id"]); ?>"></data>
                                                        <a class="button add_to_cart_button addtocart" rel="nofollow">Add to cart</a>
                                                        */ ?>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                <?PHP
                                                    }
                                                }
                                                ?>
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>

                                    <div class="tm-related-products-carousel section-products-carousel" id="tm-related-products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=https://freewayweb.in/"#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=https://freewayweb.in/"#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#tm-related-products-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                        <section class="related">

                                        </section>
                                    </div>
                            <?PHP /*
                                    <!-- .tm-related-products-carousel -->
                                    <section class="section-landscape-products-carousel recently-viewed" id="recently-viewed">
                                        <header class="section-header">
                                            <h2 class="section-title">Recently viewed products</h2>
                                            <nav class="custom-slick-nav"></nav>
                                        </header>
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:2,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=https://freewayweb.in/"#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=https://freewayweb.in/"#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#recently-viewed .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-5">
                                                    <div class="products">
                                                        <div class="landscape-product product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> $3,788.00</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">$4,780.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                                        <div class="techmarket-product-rating">
                                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                                <span style="width:0%">
                                                                                    <strong class="rating">0</strong> out of 5</span>
                                                                            </div>
                                                                            <span class="review-count">(0)</span>
                                                                        </div>
                                                                        <!-- .techmarket-product-rating -->
                                                                    </div>
                                                                    <!-- .media-body -->
                                                                </div>
                                                                <!-- .media -->
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                        </div>
                                                        <!-- .landscape-product -->
                                                        <div class="landscape-product product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/card-1.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> $3,788.00</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">$4,780.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">Unlocked Android 6″ Inch 4.4.2 Dual Core</h2>
                                                                        <div class="techmarket-product-rating">
                                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                                <span style="width:0%">
                                                                                    <strong class="rating">0</strong> out of 5</span>
                                                                            </div>
                                                                            <span class="review-count">(0)</span>
                                                                        </div>
                                                                        <!-- .techmarket-product-rating -->
                                                                    </div>
                                                                    <!-- .media-body -->
                                                                </div>
                                                                <!-- .media -->
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                        </div>
                                                        <!-- .landscape-product -->
                                                        <div class="landscape-product product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> $3,788.00</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">$4,780.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                                        <div class="techmarket-product-rating">
                                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                                <span style="width:0%">
                                                                                    <strong class="rating">0</strong> out of 5</span>
                                                                            </div>
                                                                            <span class="review-count">(0)</span>
                                                                        </div>
                                                                        <!-- .techmarket-product-rating -->
                                                                    </div>
                                                                    <!-- .media-body -->
                                                                </div>
                                                                <!-- .media -->
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                        </div>
                                                        <!-- .landscape-product -->
                                                        <div class="landscape-product product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> $800</span>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                                        <div class="techmarket-product-rating">
                                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                                <span style="width:0%">
                                                                                    <strong class="rating">0</strong> out of 5</span>
                                                                            </div>
                                                                            <span class="review-count">(0)</span>
                                                                        </div>
                                                                        <!-- .techmarket-product-rating -->
                                                                    </div>
                                                                    <!-- .media-body -->
                                                                </div>
                                                                <!-- .media -->
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                        </div>
                                                        <!-- .landscape-product -->
                                                        <div class="landscape-product product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/card-6.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> $600</span>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                                        <div class="techmarket-product-rating">
                                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                                <span style="width:0%">
                                                                                    <strong class="rating">0</strong> out of 5</span>
                                                                            </div>
                                                                            <span class="review-count">(0)</span>
                                                                        </div>
                                                                        <!-- .techmarket-product-rating -->
                                                                    </div>
                                                                    <!-- .media-body -->
                                                                </div>
                                                                <!-- .media -->
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                        </div>
                                                        <!-- .landscape-product -->
                                                        <div class="landscape-product product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/card-5.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> $3,788.00</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">$4,780.00</span>
                                                                            </del>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                                        <div class="techmarket-product-rating">
                                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                                <span style="width:0%">
                                                                                    <strong class="rating">0</strong> out of 5</span>
                                                                            </div>
                                                                            <span class="review-count">(0)</span>
                                                                        </div>
                                                                        <!-- .techmarket-product-rating -->
                                                                    </div>
                                                                    <!-- .media-body -->
                                                                </div>
                                                                <!-- .media -->
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                        </div>
                                                        <!-- .landscape-product -->
                                                        <div class="landscape-product product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> $800</span>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                                        <div class="techmarket-product-rating">
                                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                                <span style="width:0%">
                                                                                    <strong class="rating">0</strong> out of 5</span>
                                                                            </div>
                                                                            <span class="review-count">(0)</span>
                                                                        </div>
                                                                        <!-- .techmarket-product-rating -->
                                                                    </div>
                                                                    <!-- .media-body -->
                                                                </div>
                                                                <!-- .media -->
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                        </div>
                                                        <!-- .landscape-product -->
                                                        <div class="landscape-product product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/card-2.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> $500</span>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">Headset 3D Glasses VR for Android</h2>
                                                                        <div class="techmarket-product-rating">
                                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                                <span style="width:0%">
                                                                                    <strong class="rating">0</strong> out of 5</span>
                                                                            </div>
                                                                            <span class="review-count">(0)</span>
                                                                        </div>
                                                                        <!-- .techmarket-product-rating -->
                                                                    </div>
                                                                    <!-- .media-body -->
                                                                </div>
                                                                <!-- .media -->
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                        </div>
                                                        <!-- .landscape-product -->
                                                    </div>
                                                </div>
                                                <!-- .woocommerce -->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </section>
                                                              
                                    <!-- .section-landscape-products-carousel -->
                                    <section class="brands-carousel">
                                        <h2 class="sr-only">Brands Carousel</h2>
                                        <div class="col-full" data-ride="tm-slick-carousel" data-wrap=".brands" data-slick="{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;responsive&quot;:[{&quot;breakpoint&quot;:400,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:800,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                            <div class="brands">
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>apple</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="apple" src="assets/images/brands/1.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>bosch</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="bosch" src="assets/images/brands/2.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>cannon</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="cannon" src="assets/images/brands/3.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>connect</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="connect" src="assets/images/brands/4.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>galaxy</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="galaxy" src="assets/images/brands/5.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>gopro</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="gopro" src="assets/images/brands/6.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>handspot</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="handspot" src="assets/images/brands/7.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>kinova</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="kinova" src="assets/images/brands/8.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>nespresso</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="nespresso" src="assets/images/brands/9.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>samsung</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="samsung" src="assets/images/brands/10.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>speedway</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="speedway" src="assets/images/brands/11.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                                <div class="item">
                                                    <a href="shop.html">
                                                        <figure>
                                                            <figcaption class="text-overlay">
                                                                <div class="info">
                                                                    <h4>yoko</h4>
                                                                </div>
                                                                <!-- /.info -->
                                                            </figcaption>
                                                            <img width="145" height="50" class="img-responsive desaturate" alt="yoko" src="assets/images/brands/12.png">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- .item -->
                                            </div>
                                        </div>
                                        <!-- .col-full -->
                                    </section>
                                    <!-- .brands-carousel -->
                                <?PHP */ ?>
                                </div>
                                <!-- .product -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>

</div>
<?PHP
        }
    }else{
        echo "<script>gotoPage('index.php');</script>";
    }
}else{
    echo "<script>gotoPage('index.php');</script>";
}

include('footer.php');

?>