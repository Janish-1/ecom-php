<?php
include('header.php');
?>
            <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="home-v1.html">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            Track Order
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <header class="entry-header">
                                        <div class="page-header-caption">
                                            <h1 class="entry-title">Track Order</h1>
                                        </div>
                                    </header>
                                    <!-- .entry-header -->
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <form class="track_order" method="post" action="#">
                                                <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                                <p class="form-row form-row-first">
                                                    <label for="orderid">Order ID</label>
                                                    <input type="text" placeholder="Found in your order confirmation email." id="orderid" name="orderid" class="input-text">
                                                </p>
                                                <p class="form-row form-row-last">
                                                    <label for="order_email">Billing email</label>
                                                    <input type="text" placeholder="Email you used during checkout." id="order_email" name="order_email" class="input-text">
                                                </p>
                                                <div class="clear"></div>
                                                <p class="form-row">
                                                    <input type="submit" class="button" name="track" value="Track" />
                                                </p>
                                            </form>
                                            <!-- .track_order -->
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
