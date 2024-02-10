<?PHP
//include('libs/index.php');
include('libs/conn.php');
include('libs/static.php');
include('libs/function.php');
include('pageCheck.php');
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title><?PHP echo $sitename; ?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reboot.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-techmarket.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/slick.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/techmarket-font-awesome.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/slick-style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/colors/blue.css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
        <link rel="shortcut icon" href="assets/images/fav-icon.png">
    </head>
    <body class="woocommerce-active page-template-template-homepage-v4 can-uppercase">
        <div id="page" class="hfeed site">
            <div class="top-bar top-bar-v2">
                <div class="col-full">
                    <ul id="menu-top-bar-right" class="nav menu-top-bar-right">
                        <li class="menu-item animate-dropdown">
                            <a title="Quality Guarantee of products" >Quality Guarantee of products</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="Fast returnings program">Fast returnings program</a>
                        </li>
                        <li class="hidden-sm-down menu-item animate-dropdown">
                            <a title="Track Your Order" href="track.php">
                                <i class="tm tm-order-tracking"></i>Track Your Order</a>
                        </li>
                        <?PHP if(isLogin() == true){ ?>
                        <li class="menu-item">
                            <a title="My Account" href="myaccount.php">
                                <i class="tm tm-login-register"></i>Welcome! <?PHP echo getUserDetails($conn, $_SESSION["userId"], 'firstname');  ?></a>
                        </li>
                        <?PHP }else{ ?>
                        <li class="menu-item">
                            <a title="My Account" href="login.php">
                                <i class="tm tm-login-register"></i>Register or Sign in</a>
                        </li>
                        <?PHP } ?>
                        <li class="menu-item">
                            <a>
                                <i class="fa fa-phone"></i>+91-9039993702</a>
                        </li>
                        <?PHP if(isLogin() == true){ ?>
                        <li class="menu-item">
                            <a title="My Account" href="logout.php">
                                <i class="fa fa-sign-out"></i>Sign Out</a>
                        </li>
                        <?PHP } ?>
                    </ul>
                    <!-- .nav -->
                </div>
                <!-- .col-full -->
            </div>
            <!-- .top-bar-v2 -->
            <header id="masthead" class="site-header header-v2" style="background-image: none; ">
                <div class="col-full desktop-only">
                    <div class="row">
                        <div class="site-branding">
                            <a href="index.php" class="custom-logo-link" rel="home">
                                <img src="images/logo.png" title="TheChandniChowk.com" alt="TheChandniChowk.com" /> 
                            </a>
                            <!-- /.custom-logo-link -->
                        </div>
                        <!-- /.site-branding -->
                        <!-- ============================================================= End Header Logo ============================================================= -->
                        <div id="departments-menu" class="dropdown departments-menu">
                            <button class="btn dropdown-toggle btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="tm tm-departments-thin"></i>
                                <span>All Departments</span>
                            </button>
                            <ul id="menu-departments-menu" class="dropdown-menu yamm departments-menu-dropdown">
                            	<?PHP /*
                                <li class="highlight menu-item animate-dropdown">
                                    <a title="Value of the Day" href="">Value of the Day</a>
                                </li>
                                <li class="highlight menu-item animate-dropdown">
                                    <a title="Top 100 Offers" href="home-v3.html">Top Offers</a>
                                </li>
                                <li class="highlight menu-item animate-dropdown">
                                    <a title="New Arrivals" href="home-v4.html">New Arrivals</a>
                                </li>
								*/
                                $sqlCat = "SELECT * FROM productcategories WHERE `categoryParent` = 0 ORDER BY `categoryOrder`";
                                $resultCat = $conn->query($sqlCat);

                                if ($resultCat->num_rows > 0) {
                                    // output data of each row
                                    while($rowCat = $resultCat->fetch_assoc()) {
                                        $catid = $rowCat["id"];
                                            $sqlCat_child = "SELECT * FROM productcategories WHERE `categoryParent` = '$catid' ORDER BY `categoryOrder`";
                                            $resultCat_child = $conn->query($sqlCat_child);
                                ?>
                                <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                    <a title="<?PHP echo $rowCat["categoryName"]; ?>" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="<?PHP echo $rowCat["categoryUrl"]; ?>"><?PHP echo $rowCat["categoryName"]; ?><span class="caret"></span></a>
                                <?PHP
                                    $sqlCat_child = "SELECT * FROM productcategories WHERE `categoryParent` = '$catid' ORDER BY `categoryOrder`";
                                    $resultCat_child = $conn->query($sqlCat_child);

                                    if ($resultCat_child->num_rows > 0) {
                                ?>
                                    <ul role="menu" class=" dropdown-menu">
                                        <li class="menu-item menu-item-object-static_block animate-dropdown">
                                            <div class="yamm-content">
                                                <div class="row yamm-content-row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="kc-col-container">
                                                            <div class="kc_text_block">
                                                                <ul>
                                                                    <li class="nav-title"><?PHP echo $rowCat["categoryName"]; ?></li>
                                                                    <?PHP 
                                                                          while($rowCat_child = $resultCat_child->fetch_assoc()) {
                                                                    ?>
                                                                    <li><a href="<?PHP echo $rowCat_child["categoryUrl"]; ?>"><?PHP echo $rowCat_child["categoryName"]; ?></a></li>
                                                                    <?PHP 
                                                                           }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                            <!-- .kc_text_block -->
                                                        </div>
                                                        <!-- .kc-col-container -->
                                                    </div>
                                                </div>
                                                <!-- .kc_row -->
                                            </div>
                                            <!-- .yamm-content -->
                                        </li>
                                    </ul>
                                <?PHP 
                                    }
                                ?>
                                </li>
                            <?PHP
                                }
                            }
                            ?>
                            </ul>
                        </div>
                        <!-- .departments-menu -->
                        <form class="navbar-search" method="get" action="">
                            <label class="sr-only screen-reader-text" for="search">Search for:</label>
                            <div class="input-group">
                                <input type="text" id="search" class="form-control search-field product-search-field" dir="ltr" value="" name="s" placeholder="Search for products" />
                                <!-- .input-group-addon -->
                                <div class="input-group-btn">
                                    <input type="hidden" id="search-param" name="post_type" value="product" />
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                        <span class="search-btn">Search</span>
                                    </button>
                                </div>
                                <!-- .input-group-btn -->
                            </div>
                            <!-- .input-group -->
                        </form>
                        <!-- .header-compare -->
                        <?PHP /*
                        <ul class="header-wishlist nav navbar-nav">
                            <li class="nav-item">
                                <a href="wishlist.html" class="nav-link">
                                    <i class="tm tm-favorites"></i>
                                    <span id="top-cart-wishlist-count" class="value">3</span>
                                </a>
                            </li>
                        </ul>
                        */ ?>
                        <!-- .header-wishlist -->
                        <ul id="site-header-cart" class="site-header-cart menu">
                            <li class="animate-dropdown dropdown ">
                                <a class="cart-contents" href="cart.php" data-toggle="dropdown" title="View your shopping cart">
                                    <i class="tm tm-shopping-bag"></i>
                                    <span class="count">0</span>
                                    <span class="amount">
                                        <span class="price-label">Your Cart</span><div class="fa fa-inr"></div> <span class="cartValueTotal"> 0</span></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-mini-cart">
                                    <li>
                                        <div class="widget woocommerce widget_shopping_cart">
                                            <div class="widget_shopping_cart_content">
                                                <ul class="woocommerce-mini-cart cart_list product_list_widget shopping-cart">
                                                 <?PHP /*   
                                                    <li class="woocommerce-mini-cart-item mini_cart_item">
                                                        <a href="#" class="remove" aria-label="Remove this item" data-product_id="27" data-product_sku="">×</a>
                                                        <a href="single-product-sidebar.html">
                                                            <img src="assets/images/products/mini-cart2.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">Gear Virtual Reality 3D with Bluetooth Glasses&nbsp;
                                                        </a>
                                                        <span class="quantity">1 ×
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">$</span>72.00</span>
                                                        </span>
                                                    </li>
                                                */ ?>
                                                </ul>
                                                <!-- .cart_list -->
                                                <p class="woocommerce-mini-cart__total total">
                                                    <strong>Subtotal:</strong>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol"><i class="fa fa-rupee"></i></span>
                                                    </span>
                                                </p>
                                                <p class="woocommerce-mini-cart__buttons buttons">
                                                    <a href="cart.php" class="button wc-forward">View cart</a>
                                                    <a href="checkout.php" class="button checkout wc-forward">Checkout</a>
                                                </p>
                                            </div>
                                            <!-- .widget_shopping_cart_content -->
                                        </div>
                                        <!-- .widget_shopping_cart -->
                                    </li>
                                </ul>
                                <!-- .dropdown-menu-mini-cart -->
                            </li>
                        </ul>
                        <!-- .site-header-cart -->
                    </div>
                    <!-- /.row -->
                    <div class="techmarket-sticky-wrap">
                        <div class="row">
                            <nav id="navbar-primary" class="navbar-primary" aria-label="Navbar Primary" data-nav="flex-menu">
                                <ul id="menu-navbar-primary" class="nav yamm">
                                <?PHP
                                $sqlCat = "SELECT * FROM productcategories WHERE `categoryParent` = 0 ORDER BY `categoryOrder`";
                                $resultCat = $conn->query($sqlCat);

                                if ($resultCat->num_rows > 0) {
                                    // output data of each row
                                    while($rowCat = $resultCat->fetch_assoc()) {
                                        $catid = $rowCat["id"];
                                            $sqlCat_child = "SELECT * FROM productcategories WHERE `categoryParent` = '$catid' ORDER BY `categoryOrder`";
                                            $resultCat_child = $conn->query($sqlCat_child);
                                ?>
                                    <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                                        <a title="<?PHP echo $rowCat["categoryName"]; ?>" <?PHP if ($resultCat_child->num_rows > 0) { ?> data-toggle="dropdown" class="dropdown-toggle" <?PHP } ?> aria-haspopup="true" href="shop.php?catid=<?PHP echo $rowCat["categoryUrl"]; ?>"><?PHP echo $rowCat["categoryName"]; ?> <span class="caret"></span></a>
                                        <ul role="menu" class=" dropdown-menu">
                                            <?PHP 
                                                  while($rowCat_child = $resultCat_child->fetch_assoc()) {
                                            ?>
                                            <li class="menu-item animate-dropdown">
                                                <a title="<?PHP echo $rowCat_child["categoryName"]; ?>" href="shop.php?catid=<?PHP echo $rowCat_child["categoryUrl"]; ?>"><?PHP echo $rowCat_child["categoryName"]; ?></a>
                                            </li>
                                            <?PHP } ?>
                                        </ul>
                                        <!-- .dropdown-menu -->
                                    </li>
                                <?PHP 
                                    }
                                }
                                ?>
                                </ul>
                                <!-- .nav -->
                            </nav>
                            <!-- .navbar-primary -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- .techmarket-sticky-wrap -->
                </div>
                <!-- .col-full -->
                <div class="col-full handheld-only">
                    <div class="handheld-header">
                        <div class="row">
                            <div class="site-branding">
                                <a href="index.php" class="custom-logo-link" rel="home">
                                <img src="images/logo.png" title="TheChandniChowk.com" alt="TheChandniChowk.com" /> 
                            </a>
                                <!-- /.custom-logo-link -->
                            </div>
                            <!-- /.site-branding -->
                            <!-- ============================================================= End Header Logo ============================================================= -->
                            <div class="handheld-header-links">
                                <ul class="columns-3">
                                    <li class="my-account">
                                        <a href="login-and-register.html" class="has-icon">
                                            <i class="tm tm-login-register"></i>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="wishlist.html" class="has-icon">
                                            <i class="tm tm-favorites"></i>
                                            <span class="count">0</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- .columns-3 -->
                            </div>
                            <!-- .handheld-header-links -->
                        </div>
                        <!-- /.row -->
                        <div class="techmarket-sticky-wrap">
                            <div class="row">
                                <nav id="handheld-navigation" class="handheld-navigation" aria-label="Handheld Navigation">
                                    <button class="btn navbar-toggler" type="button">
                                        <i class="tm tm-departments-thin"></i>
                                        <span>Menu</span>
                                    </button>
                                    <div class="handheld-navigation-menu">
                                        <span class="tmhm-close">Close</span>
                                        <ul id="menu-departments-menu-1" class="nav">
                                        	<?PHP /*
                                            <li class="highlight menu-item animate-dropdown">
                                                <a title="Value of the Day" href="shop.html">Value of the Day</a>
                                            </li>
                                            <li class="highlight menu-item animate-dropdown">
                                                <a title="Top 100 Offers" href="shop.html">Top 100 Offers</a>
                                            </li>
                                            <li class="highlight menu-item animate-dropdown">
                                                <a title="New Arrivals" href="shop.html">New Arrivals</a>
                                            </li>
                                            */
                                            $sqlCat = "SELECT * FROM productcategories WHERE `categoryParent` = 0 ORDER BY `categoryOrder`";
                                            $resultCat = $conn->query($sqlCat);

                                            if ($resultCat->num_rows > 0) {
                                                // output data of each row
                                                while($rowCat = $resultCat->fetch_assoc()) {
                                                    $catid = $rowCat["id"];
                                                        $sqlCat_child = "SELECT * FROM productcategories WHERE `categoryParent` = '$catid' ORDER BY `categoryOrder`";
                                                        $resultCat_child = $conn->query($sqlCat_child);
                                            ?>
                                            <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                                <a title="<?PHP echo $rowCat["categoryName"]; ?>" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="shop.php?catid=<?PHP echo $rowCat["categoryUrl"]; ?>"><?PHP echo $rowCat["categoryName"]; ?><span class="caret"></span></a>
                                                <?PHP if ($resultCat_child->num_rows > 0) { ?>
                                                <ul role="menu" class=" dropdown-menu">
                                                    <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                        <div class="yamm-content">
                                                            <div class="row yamm-content-row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="kc-col-container">
                                                                        <div class="kc_text_block">
                                                                            <ul>
                                                                        <?PHP 
                                                                              while($rowCat_child = $resultCat_child->fetch_assoc()) {
                                                                        ?>
                                                                                <li><a href="shop.php?catid=<?PHP echo $rowCat_child["categoryUrl"]; ?>"><?PHP echo $rowCat_child["categoryName"]; ?></a></li>
                                                                        <?PHP } ?>      
                                                                            </ul>
                                                                        </div>
                                                                        <!-- .kc_text_block -->
                                                                    </div>
                                                                    <!-- .kc-col-container -->
                                                                </div>
                                                                <!-- .kc_column -->
                                                            </div>
                                                            <!-- .kc_row -->
                                                        </div>
                                                        <!-- .yamm-content -->
                                                    </li>
                                                </ul>
                                                <?PHP } ?>
                                            </li>
                                            <?PHP
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <!-- .handheld-navigation-menu -->
                                </nav>
                                <!-- .handheld-navigation -->
                                <div class="site-search">
                                    <div class="widget woocommerce widget_product_search">
                                        <form role="search" method="get" class="woocommerce-product-search" action="search.php">
                                            <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
                                            <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products&hellip;" value="" name="s" />
                                            <input type="submit" value="Search" />
                                            <input type="hidden" name="post_type" value="product" />
                                        </form>
                                    </div>
                                    <!-- .widget -->
                                </div>
                                <!-- .site-search -->
                                <a class="handheld-header-cart-link has-icon" href="cart.php" title="View your shopping cart">
                                    <i class="tm tm-shopping-bag"></i>
                                    <span class="count">0</span>
                                </a>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- .techmarket-sticky-wrap -->
                    </div>
                    <!-- .handheld-header -->
                </div>
                <!-- .handheld-only -->
            </header>
            <!-- .header-v2 -->
            <!-- ============================================================= Header End ============================================================= -->