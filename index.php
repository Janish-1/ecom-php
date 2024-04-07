<?php
include('header.php');
?>

            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="home-v4-slider home-slider">
                                    <div class="slider-1" style="background-image: url(assets/images/slider/home-v4-background.jpg);">
                                        <div class="caption">
                                            <div class="title">The gift they are
                                                <br>wishing for is right here </div>
                                            <div class="sub-title">The curved display has a curvature level equivalent to that of a circle, tracks the rounded shape of the eyes better </div>
                                            <div class="button">Get Yours now
                                                <i class="tm tm-long-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="banners">
                                    <div class="row">
                                        <div class="banner small-banner text-in-left">
                                            <a href="shop.html">
                                                <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/3-1.jpg); height: 259px;" class="banner-bg">
                                                    <div class="caption">
                                                        <div class="banner-info">
                                                            <h3 class="title">New Arrivals
                                                                <br> in
                                                                <strong>Accessories</strong>
                                                                <br> at Best Prices.</h3>
                                                        </div>
                                                        <!-- .banner-info -->
                                                        <span class="banner-action button">View all</span>
                                                    </div>
                                                    <!-- .caption -->
                                                </div>
                                                <!-- .banner-bg -->
                                            </a>
                                        </div>
                                        <!-- .banner -->
                                        <div class="banner large-banner text-in-right">
                                            <a href="shop.html">
                                                <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/3-4.jpg); height: 259px;" class="banner-bg">
                                                    <div class="caption">
                                                        <div class="banner-info">
                                                            <h3 class="title">Catch Hottest
                                                                <br>
                                                                <strong>Deals</strong> on the
                                                                <br> Curved Soundbars.</h3>
                                                        </div>
                                                        <!-- .banner-info -->
                                                        <span class="banner-action button">Browse</span>
                                                    </div>
                                                    <!-- .caption -->
                                                </div>
                                                <!-- .banner-bg -->
                                            </a>
                                        </div>
                                        <!-- .banner -->
                                        <div class="banner small-banner text-in-left">
                                            <a href="shop.html">
                                                <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/3-3.jpg); height: 259px;" class="banner-bg">
                                                    <div class="caption">
                                                        <div class="banner-info">
                                                            <h3 class="title">
                                                                <strong>1000 mAh</strong>
                                                                <br> Power Bank Pro</h3>
                                                        </div>
                                                        <!-- .banner-info -->
                                                        <span class="price">$34.99</span>
                                                        <span class="banner-action button">Buy Now</span>
                                                    </div>
                                                    <!-- .caption -->
                                                </div>
                                                <!-- .banner-bg -->
                                            </a>
                                        </div>
                                        <!-- .banner -->
                                    </div>
                                    <!-- .row -->
                                </div>
                                <!-- .banners -->
                                
                                <!-- .section-single-carousel-with-tab-product -->
                                <div class="fullwidth-notice stretch-full-width">
                                    <div class="col-full">
                                        <p class="message">Download our new app today! Dont miss our mobile-only offers and shop with Android Play.</p>
                                    </div>
                                    <!-- .col-full -->
                                </div>
                                <!-- .fullwidth-notice -->
                                <!-- .section-landscape-product-card-with-gallery -->
                                <div class="banners home4-banner techmarket-banner">
                                    <div class="row">
                                        <div class="banner text-in-right">
                                            <a href="#">
                                                <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/4-1.jpg); height: 484px;" class="banner-bg">
                                                    <div class="caption">
                                                        <div class="banner-info">
                                                            <h3 class="title">Your Home
                                                                <br> on every screen
                                                                <br>imagination</h3>
                                                        </div>
                                                        <!-- .banner-info -->
                                                        <span class="banner-action button">Check More</span>
                                                    </div>
                                                    <!-- .caption -->
                                                </div>
                                                <!-- .banner-bg -->
                                            </a>
                                        </div>
                                        <!-- .banner -->
                                        <div class="banner text-in-left">
                                            <a href="#">
                                                <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/4-2.jpg); height: 484px;" class="banner-bg">
                                                    <div class="caption">
                                                        <div class="banner-info">
                                                            <h3 class="title">No worry anymore
                                                                <br> with Fast Charge</h3>
                                                            <h4 class="subtitle">Discover up to 6000mAh in one device</h4>
                                                        </div>
                                                        <!-- .banner-info -->
                                                        <span class="banner-action button">Buy Now</span>
                                                    </div>
                                                    <!-- .caption -->
                                                </div>
                                                <!-- .banner-bg -->
                                            </a>
                                        </div>
                                        <!-- .banner -->
                                    </div>
                                    <!-- .row -->
                                </div>
                                <!-- .banners -->
                                <div class="row section-products-carousel-widget-with-tabs">
                                    <div class="products-carousel-with-brands">
                                        <section class="section-landscape-products-widget-carousel">
                                            <header class="section-header">
                                                <h2 class="section-title">Top Rated Products</h2>
                                            </header>
                                            <div class="products-carousel">
                                                <div class="container-fluid">
                                                    <div class="woocommerce columns-1">
                                                        <div class="products">
                                                        <?php
                                                            $sqlFeatured = "SELECT * FROM `product` WHERE `featured` = '1' AND `productLive` = '1' AND `productStock` > 0 LIMIT 2";
                                                            $resultFeatured = $conn->query($sqlFeatured);
                                                            if ($resultFeatured->num_rows > 0) {
                                                                // output data of each row
                                                                while($rowFeatured = $resultFeatured->fetch_assoc()) {
                                                        ?>   
                                                            <div class="landscape-product-widget product">
                                                                <a class="woocommerce-LoopProduct-link" href="product.php?producturl=<?PHP echo $rowFeatured["metaUrl"]; ?>">
                                                                <?PHP if($rowFeatured["productTotal"] < $rowFeatured["productPrice"]){ ?>
                                                                    <span class="onsale">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol"></span><?PHP echo round(100-($rowFeatured["productTotal"]/$rowFeatured["productPrice"])*100); ?>% Off
                                                                        </span>
                                                                    </span>
                                                                <?PHP 
                                                                    } 
                                                                ?>
                                                                    <div class="media">
                                                                        <img class="wp-post-image" src="<?PHP echo $siteurl; ?>product/<?PHP echo get_productImage($conn, $rowFeatured["id"]); ?>" alt="">
                                                                        <div class="media-body">
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
                                                                            <!-- .price -->
                                                                            <h2 class="woocommerce-loop-product__title"><?PHP echo $rowFeatured["productName"]; ?></h2>
                                                                            <div class="techmarket-product-rating">
                                                                                <span class="review-count"><?PHP echo trim_text($rowFeatured["productShortDesc"], 10); ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <!-- .media-body -->
                                                                    </div>
                                                                    <!-- .media -->
                                                                </a>
                                                                <!-- .woocommerce-LoopProduct-link -->
                                                            </div>
                                                        <?PHP 
                                                            }
                                                        }
                                                        ?>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .products-carousel -->
                                        </section>
                                        <!-- .section-landscape-products-widget-carousel -->
                                        
                                        <!-- .section-brands -->
                                    </div>
                                    <div class="products-carousel-tabs-block">
                                        <section class="section-hot-new-arrivals section-products-carousel-tabs">
                                            <div class="section-products-carousel-tabs-wrap">
                                                <header class="section-header">
                                                    <h2 class="section-title">Latest Arrival</h2>
                                                    <ul role="tablist" class="nav justify-content-end">
                                                    <?PHP
                                                    $getJustArrival = explode(',',getConfigData($conn, 'justArrival'));
                                                    $size = count($getJustArrival);
                                                    for($i=0;$i<$size;$i++){
                                                    ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link <?PHP if($i==0){ echo "active"; } ?>" href="#<?PHP echo getCategoryUrl($conn,$getJustArrival[$i]); ?>" data-toggle="tab" role="tab" aria-controls="<?PHP echo getCategoryUrl($conn,$getJustArrival[$i]); ?>"><?PHP echo getCategoryName($conn,$getJustArrival[$i]); ?></a>
                                                        </li>
                                                    <?PHP 
                                                    }
                                                    ?>
                                                    </ul>
                                                </header>
                                                <!-- .section-header -->
                                                <div class="tab-content">
                                                <?PHP 
                                                $size = count($getJustArrival);
                                                for($i=0;$i<$size;$i++){
                                                ?>
                                                    <div role="tabpanel" class="tab-pane <?PHP if($i==0){ echo "active"; } ?>" id="<?PHP echo getCategoryUrl($conn,$getJustArrival[$i]); ?>">
                                                        <div class="products-carousel carousel-tabs-with-no-hover section-products-carousel-tabs" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                                            <div class="container-fluid">
                                                                <div class="woocommerce columns-4">
                                                                    <div class="products">
                                                                    <?PHP 
                                                                    $sqlFeatured = "SELECT * FROM `product` WHERE `productCategory` = '".$getJustArrival[$i]."' AND `productLive` = '1' AND `productStock` > 0 LIMIT 10";
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
                                                                            <a href="" class="button add_to_cart_button addtocart" rel="nofollow">Add to cart</a>
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
                                                        <!-- .slick-dots -->
                                                    </div>
                                                <?PHP 
                                                }
                                                ?>
                                                </div>
                                                <!-- .tab-content -->
                                            </div>
                                            <!-- .section-products-carousel-tabs-wrap -->
                                        </section>
                                        <!-- .section-products-carousel-tabs -->
                                        
                                        <!-- .section-products-carousel-tabs -->
                                    </div>
                                </div>
                                <section class="section-product-cards-carousel-tabs stretch-full-width section-products-carousel-tabs">
                                    <div class="section-products-carousel-tabs-wrap">
                                        <header class="section-header">
                                            <h2 class="section-title">Hurry up!
                                                <span>Special Offers</span>
                                            </h2>
                                            <ul role="tablist" class="nav justify-content-center">
                                            <?PHP
                                            $getSpecialOffer = explode(',',getConfigData($conn, 'specialOfferMain'));
                                            $size = count($getSpecialOffer);
                                            for($i=0;$i<$size;$i++){
                                            ?>
                                                <li class="nav-item"><a class="nav-link <?PHP if($i==0){ echo "active"; } ?>" href="#<?PHP echo getCategoryUrl($conn,$getSpecialOffer[$i]); ?>1" data-toggle="tab"><?PHP echo getCategoryName($conn,$getSpecialOffer[$i]); ?></a></li>
                                            <?PHP 
                                            }
                                            ?>
                                            </ul>
                                        </header>
                                        <div class="tab-content">
                                        <?PHP 
                                        $size = count($getSpecialOffer);
                                        for($i=0;$i<$size;$i++){
                                        ?>
                                            <div id="<?PHP echo getCategoryUrl($conn,$getSpecialOffer[$i]); ?>1" class="tab-pane <?PHP if($i==0){ echo "active"; } ?>" role="tabpanel">
                                                <div class="products-carousel special-offer-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:3,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1160,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToShow&quot;:1}}]}">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce columns-3">
                                                            <div class="products">
                                                                <?PHP 
                                                                $sqlFeatured = "SELECT * FROM `product` WHERE `productCategory` = '".$getSpecialOffer[$i]."' AND `productLive` = '1' AND `productStock` > 0 LIMIT 10";
                                                                $resultFeatured = $conn->query($sqlFeatured);
                                                                if ($resultFeatured->num_rows > 0) {
                                                                    while($rowFeatured = $resultFeatured->fetch_assoc()) {
                                                                ?>
                                                                <div class="landscape-product-card product">
                                                                    <div class="media">
                                                                        <a class="woocommerce-LoopProduct-link" href="product.php?producturl=<?PHP echo $rowFeatured["metaUrl"]; ?>">
                                                                            <img class="wp-post-image" width="200" height="200"  src="<?PHP echo $siteurl; ?>product/<?PHP echo get_productImage($conn, $rowFeatured["id"]); ?>" alt="<?PHP echo $rowFeatured["productName"]; ?>">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <a class="woocommerce-LoopProduct-link " href="single-product-fullwidth.html">
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
                                                                                <!-- .price -->
                                                                                <h2 class="woocommerce-loop-product__title"><?PHP echo $rowFeatured["productName"]; ?></h2>
                                                                                    <div class="techmarket-product-rating">
                                                                                        <span class="review-count"><?PHP echo trim_text($rowFeatured["productShortDesc"], 10); ?></span>
                                                                                    </div>
                                                                                
                                                                            </a>
                                                                            <?PHP /*
                                                                            <div class="hover-area">
                                                                                <data data-product-id="<?PHP echo $rowFeatured["productsku"]; ?>" data-product-name="<?PHP echo $rowFeatured["productName"]; ?>" data-product-option="<?PHP echo get_options($rowFeatured["id"]); ?>"  data-product-option-id="<?PHP echo get_options_id($rowFeatured["id"]); ?>" data-product-price="<?PHP echo $rowFeatured["productSell"]; ?>" data-product-image="product/<?PHP echo get_productImage($conn, $rowFeatured["id"]); ?>"></data>
                                                                                <a class="button add_to_cart_button addtocart" href="cart.html">Add to cart</a>
                                                                            </div>
                                                                            */ ?>
                                                                            <!-- .hover-area -->
                                                                        </div>
                                                                        <!-- .media-body -->
                                                                    </div>
                                                                    <!-- .media -->
                                                                </div>
                                                                <?PHP 
                                                                    }
                                                                }
                                                                ?>
                                                                <!-- .woocommerce-LoopProduct-link -->
                                                            </div>

                                                            <!-- .products-->
                                                        </div>
                                                        <!-- .woocommerce-->
                                                    </div>
                                                    <!-- .container-fluid -->
                                                </div>
                                                <!-- .products-carousel -->
                                            </div>
                                            <?PHP 
                                            }
                                            ?>
                                            <!-- .tab-pane -->
                                        </div>
                                        <!-- .tab-content -->
                                    </div>
                                    <!-- .section-products-carousel-tabs-wrap -->
                                </section>
                                <!-- .section-product-cards-carousel-tabs-->
                                <section class="section-hot-new-arrivals section-products-carousel-tabs">
                                    <div class="section-products-carousel-tabs-wrap">
                                        <header class="section-header">
                                            <h2 class="section-title">Best Seller</h2>
                                            <ul role="tablist" class="nav justify-content-end">
                                            <?PHP
                                            $getBestSeller = explode(',',getConfigData($conn, 'bestSellerMain'));
                                            $size = count($getJustArrival);
                                            for($i=0;$i<$size;$i++){
                                            ?>
                                                <li class="nav-item">
                                                    <a class="nav-link <?PHP if($i==0){ echo "active"; } ?>" href="#<?PHP echo getCategoryUrl($conn,$getBestSeller[$i]); ?>2" data-toggle="tab" role="tab" aria-controls="<?PHP echo getCategoryUrl($conn,$getJustArrival[$i]); ?>"><?PHP echo getCategoryName($conn,$getBestSeller[$i]); ?></a>
                                                </li>
                                            <?PHP 
                                            }
                                            ?>
                                            </ul>
                                        </header>
                                        <!-- .section-header -->
                                        <div class="tab-content">
                                        <?PHP 
                                        $size = count($getBestSeller);
                                        for($i=0;$i<$size;$i++){
                                        ?>
                                            <div role="tabpanel" class="tab-pane <?PHP if($i==0){ echo "active"; } ?>" id="<?PHP echo getCategoryUrl($conn,$getBestSeller[$i]); ?>2">
                                                <div class="products-carousel carousel-tabs-with-no-hover section-products-carousel-tabs" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce columns-4">
                                                            <div class="products">
                                                            <?PHP 
                                                            $sqlFeatured = "SELECT * FROM `product` WHERE `productCategory` = '".$getBestSeller[$i]."' AND `productLive` = '1' AND `productStock` > 0 LIMIT 10";
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
                                                <!-- .slick-dots -->
                                            </div>
                                        <?PHP 
                                        }
                                        ?>
                                        </div>
                                        <!-- .tab-content -->
                                    </div>
                                    <!-- .section-products-carousel-tabs-wrap -->
                                </section><!-- .section-products-carousel-tabs -->
                                <div class="banner full-width-banner">
                                    <a href="shop.html">
                                        <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/full-width.png); height: 236px;" class="banner-bg">
                                            <div class="caption">
                                                <div class="banner-info">
                                                    <h3 class="title">
                                                        <strong>Extremely Portable</strong>, learn
                                                        <br> to ride in just 3 minutes</h3>
                                                    <h4 class="subtitle">Travel up to 22km in a single charge</h4>
                                                </div>
                                                <span class="banner-action button">Browse now
                                                    <i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>
                                                </span>
                                            </div>
                                            <!-- /.caption -->
                                        </div>
                                        <!-- /.banner-b -->
                                    </a>
                                    <!-- /.section-header -->
                                </div>
                                <!-- /.banner -->

                <?PHP /*
                                <div class="products-4-column-widgets">
                                    <section id="section-products-carousel-1" class="section-landscape-products-widget-carousel type-3">
                                        <header class="section-header">
                                            <h2 class="section-title">Best Rated Products</h2>
                                        </header>
                                        <!-- .section-header -->
                                        <div class="products-carousel">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-1">
                                                    <div class="products">
                                                        <div class="landscape-product-widget product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/sm-1.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 50.99</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">26.99</span>
                                                                            </del>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
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
                                                        
                                                    </div>
                                                    <!-- .products -->
                                                </div>
                                                <!-- .woocommerce -->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </section>
                                    <!-- .section-landscape-products-widget-carousel -->
                                    <section id="section-products-carousel-2" class="section-landscape-products-widget-carousel type-3">
                                        <header class="section-header">
                                            <h2 class="section-title">Virtual Reality Headsets</h2>
                                        </header>
                                        <!-- .section-header -->
                                        <div class="products-carousel">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-1">
                                                    <div class="products">
                                                        <div class="landscape-product-widget product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/sm-1.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 50.99</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">26.99</span>
                                                                            </del>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
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
                                                        
                                                    </div>
                                                    <!-- .products -->
                                                </div>
                                                <!-- .woocommerce -->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </section>
                                    <!-- .section-landscape-products-widget-carousel -->
                                    <section id="section-products-carousel-3" class="section-landscape-products-widget-carousel type-3">
                                        <header class="section-header">
                                            <h2 class="section-title">Deals of the Day</h2>
                                        </header>
                                        <!-- .section-header -->
                                        <div class="products-carousel">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-1">
                                                    <div class="products">
                                                        <div class="landscape-product-widget product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/sm-4.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 50.99</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">26.99</span>
                                                                            </del>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
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
                                                    </div>
                                                    <!-- .products -->
                                                </div>
                                                <!-- .woocommerce -->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </section>
                                    <!-- .section-landscape-products-widget-carousel -->
                                    <section id="section-products-carousel-4" class="section-landscape-products-widget-carousel type-3">
                                        <header class="section-header">
                                            <h2 class="section-title">Video Cameras</h2>
                                        </header>
                                        <!-- .section-header -->
                                        <div class="products-carousel">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-1">
                                                    <div class="products">
                                                        <div class="landscape-product-widget product">
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <div class="media">
                                                                    <img class="wp-post-image" src="assets/images/products/sm-1.jpg" alt="">
                                                                    <div class="media-body">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> 50.99</span>
                                                                            </ins>
                                                                            <del>
                                                                                <span class="amount">26.99</span>
                                                                            </del>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
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
                                                        
                                                    </div>
                                                    <!-- .products -->
                                                </div>
                                                <!-- .woocommerce -->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </section>
                                    <!-- .section-landscape-products-widget-carousel -->
                                </div>
                                <!-- .products-4-column-widgets -->
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

                                */?>
                                <!-- .brands-carousel -->
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