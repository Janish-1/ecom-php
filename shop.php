<?php
include('header.php');
$caturl = mysqli_real_escape_string($conn,$_GET['catid']);
$caturl = input($caturl);
$caturl= strtolower($caturl);
$sqlnews10 = "SELECT `id` FROM `productcategories` WHERE `categoryUrl` = '$caturl' OR `id` = '$caturl' LIMIT 1";
$resultnews10 = $conn->query($sqlnews10);
if ($resultnews10->num_rows > 0) {
    $catid = array();
    while($rownews10 = $resultnews10->fetch_assoc()) {
        $catid[] = $cat =  $rownews10["id"];
        $sqlnews = "SELECT `id` FROM `productCategories` WHERE `categoryParent` = '$cat' ORDER BY `categoryOrder`";
        $resultnews = $conn->query($sqlnews);
        if ($resultnews->num_rows > 0) {
            while($rownews = $resultnews->fetch_assoc()) {
                $catid[] = $rownews["id"];
            }
        }
    }
    $catids = implode(',', $catid);
}

?>
            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="home-v1.html">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>Shop
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span><?PHP echo getCategoryName($conn,$cat); ?>
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="shop-control-bar">
                                    <h1 class="woocommerce-products-header__title page-title"><?PHP echo getCategoryName($conn,$cat); ?></h1>
                                    <!-- .shop-view-switcher -->
                                    <form  class="woocommerce-ordering" name="sortby" id="sortby" onchange="return this.submit()">
                                        <select class="orderby" name="orderby">
                                            <option selected="selected" value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                        <input type="hidden" value="<?PHP echo $cat; ?>" name="catid">
                                    </form>
                                </div>
                                <!-- .shop-control-bar -->
                                <div class="tab-content">
                                    <div id="grid" class="tab-pane active" role="tabpanel">
                                        <div class="woocommerce columns-4">
                                            <div class="products">
                                                <?PHP 
                                                $addQ = '';
                                                if(isset($_GET["orderby"])){
                                                	$orderby = $_GET["orderby"];
                                                }else{
                                                	$orderby = "0";
                                                }
                                                switch($orderby){
                                                		case "date":{
                                                			$addQ = "`productDate` DESC";
                                                			break;
                                                		}
                                                		case "price":{
                                                			$addQ = "`productTotal` ASC";
                                                			break;
                                                		}
                                                		case "price-desc":{
                                                			$addQ = "`productTotal` DESC";
                                                			break;
                                                		}
                                                		default:{
                                                			$addQ = "`productDate` DESC";
                                                			break;
                                                		}
                                                }
                                                $sqlCount = "SELECT * FROM `product` WHERE `productCategory` IN (".$catids.") AND `productLive` = '1' ";
                                                $resultCount = $conn->query($sqlCount);
                                                $size = $resultCount->num_rows;

                                                
                                                $sqlFeatured = "SELECT * FROM `product` WHERE `productCategory` IN (".$catids.") AND `productLive` = '1' ORDER BY".$addQ ." LIMIT 2" ;
                                                $resultFeatured = $conn->query($sqlFeatured);
                                                $size1 = $resultFeatured->num_rows;
                                                $count = 0;
                                                if ($resultFeatured->num_rows > 0) {
                                                    while($rowFeatured = $resultFeatured->fetch_assoc()) {
                                                        $count++;
                                                ?>
                                                <div class="product <?PHP if($count == 1){ echo "first"; } if($count == $size){ echo "last"; } ?>" id="<?PHP echo $count; ?>">
                                                    <?PHP /*
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                    </div>
                                                    */ ?>
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
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                    <?PHP /*
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
                                            </div>
                                            <!-- .products -->
                                            	<?PHP
                                                if($count < $size){
                                                ?>
	                                            <div class="col-xs-1 ajax-load text-center" align="center" style="display:none">
												    <p><img width="150px" src="images/loading.gif">Loading...</p>
												</div>
												<?PHP 
												}
												?>
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    
                                </div>
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
<script type="text/javascript">
	$(window).scroll(function() {
    	if(isScrolledIntoView(".product:last") == true){
			var last_id = $(".product:last").attr("id");
			loadMoreData(last_id);			
		}
	});


	function isScrolledIntoView(elem) {
	        var docViewTop = $(window).scrollTop();
		    var docViewBottom = docViewTop + $(window).height();

		    var elemTop = $(elem).offset().top;
		    var elemBottom = elemTop + $(elem).height();

		    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
	}
    function loadMoreData(last_id){
		$.ajax({
		    url: 'calls/shopLoadMore.php?last_id=' + last_id + '&orderby=<?PHP if(isset($_GET["orderby"])){ echo $_GET["orderby"];}else{ echo "date";} ?>&catid=<?PHP echo $cat; ?>',
		    type: "get",
		    beforeSend: function(){
		        $('.ajax-load').show();
		    }
		})
		.done(function(data){
			$('.ajax-load').hide();
		    $(".products").append(data);
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
		      alert('Server Error! Try Reloading...');
		});
    }
</script>
