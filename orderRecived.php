<?php
include('header.php');

$orderId = $_GET["orderId"];
$sessionId = $_GET["sessionId"];
$userid = $_SESSION["userId"];

$sql = "SELECT * FROM `orders` WHERE `id` = '$orderId' AND `userid` = '$userid' AND `orderStatus` = 1 LIMIT 1";
$result = $conn->query($sql);
$carttotal = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $orderNo = $row["orderNo"];
            $orderDate = $row["orderDate"];
            $orderAmount = $row["orderAmount"];
            $orderShipping = $row["orderShipping"];
            $walletPaid = $row["walletPaid"];
            $cashback = $row["cashback"];
            $orderPayble = $row["paybleAmount"];
            $promoApplied = $row["promoApplied"];
            $orderAddress = $row["orderAddress"];
            $orderPaymentType = $row["orderPaymentType"];
            $cashback = $row["cashback"];

            $sqlA = "SELECT * FROM `orderpromo` WHERE `orderId` = '$orderId' AND `userId` = '$userid' AND `promoApplied` = 1 LIMIT 1";
            $resultA = $conn->query($sqlA);
            if ($resultA->num_rows > 0) {
                while($rowA = $resultA->fetch_assoc()) {
                    $promo = $rowA["promo"];
                }
            }
    }
}else{
    echo "<script>location.replace('index.php');</script>";
}
?>
            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="index.php">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            Checkout
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>Order received
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="woocommerce-order">
                                                <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received alert alert-success">Thank you. Your order has been received.</p>
                                                <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                                                    <li class="woocommerce-order-overview__order order">
                                                        Order number:
                                                        <strong><?PHP echo $orderNo; ?></strong>
                                                    </li>
                                                    <li class="woocommerce-order-overview__date date">
                                                        Date:
                                                        <strong><?PHP echo date("F d, Y", strtotime($orderDate)); ?></strong>
                                                    </li>
                                                    <li class="woocommerce-order-overview__total total">
                                                        Total:
                                                        <strong>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <i class="fa fa-rupee"></i> <?PHP echo $orderPayble; ?>
                                                            </span>
                                                        </strong>
                                                    </li>
                                                    <li class="woocommerce-order-overview__payment-method method">
                                                        Payment method:
                                                        <strong><?PHP if($orderPaymentType == "cod"){ echo "CASH ON DELIVERY"; }else{echo "ONLINE PAYMENT"; } ?></strong>
                                                    </li>
                                                </ul>
                                                <!-- .woocommerce-order-overview -->
                                                <section class="woocommerce-order-details">
                                                    <h2 class="woocommerce-order-details__title">Order details</h2>
                                                    <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                                        <thead>
                                                            <tr>
                                                                <th class="woocommerce-table__product-name product-name">Product</th>
                                                                <th class="woocommerce-table__product-table product-total">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?PHP 
                                                        $sqlI = "SELECT * FROM `orderdetails` WHERE `orderId` = '$orderId'";
                                                        $resultI = $conn->query($sqlI);
                                                        $carttotalI = 0;
                                                        if ($resultI->num_rows > 0) {
                                                            while($rowI = $resultI->fetch_assoc()) {
                                                               $pUrl = get_productURL($conn, $rowI["productId"]);
                                                        ?>
                                                            <tr class="woocommerce-table__line-item order_item">
                                                                <td class="woocommerce-table__product-name product-name">
                                                                    <a href="product.php?producturl=<?PHP echo $pUrl; ?>">
                                                                        <?PHP echo strtoupper($rowI["productName"]); ?>
                                                                    </a>
                                                                    <strong class="product-quantity">× <?PHP echo $rowI["productQuantity"]; ?></strong>
                                                                </td>
                                                                <td class="woocommerce-table__product-total product-total">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <i class="fa fa-rupee"></i> <?PHP echo $rowI["productTotal"]; ?>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        <?PHP
                                                            }
                                                        }
                                                        ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th scope="row">Subtotal:</th>
                                                                <td>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <i class="fa fa-rupee"></i> <?PHP echo $orderAmount; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Shipping:</th>
                                                                <td>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <i class="fa fa-rupee"></i> <?PHP echo $orderShipping; ?>
                                                                </td>
                                                            </tr>
                                                            <?PHP if($walletPaid > 0){ ?>
                                                            <tr>
                                                                <th scope="row">Wallet Paid:</th>
                                                                <td>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <i class="fa fa-rupee"></i> <?PHP echo $walletPaid; ?>
                                                                </td>
                                                            </tr>
                                                            <?PHP } ?>
                                                            <?PHP if($promoApplied == 1 && $cashback > 0){ ?>
                                                            <tr>
                                                                <th scope="row">Cashback Recived <small> <b> <span class="text-success" ><?PHP echo $promo; ?></span> (Cashback will Added to Wallet within<br>the 24hours of Order Confirmation)</b></small></th>
                                                                <td>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                         <i class="fa fa-rupee"></i> <?PHP echo $cashback; ?>
                                                                </td>
                                                            </tr>
                                                            <?PHP } ?>
                                                            <tr>
                                                                <th scope="row">Order Total:</th>
                                                                <td>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <i class="fa fa-rupee"></i> <?PHP echo $orderPayble; ?>
                                                                </td>
                                                            </tr>
                                                            <?PHP if($cashback > 0){ ?>
                                                            <tr>
                                                                <th scope="row">Effective Price:</th>
                                                                <td>
                                                                    <span class="woocommerce-Price-amount amount text-success">
                                                                        <i class="fa fa-rupee"></i> <?PHP echo $orderPayble-$cashback; ?>
                                                                </td>
                                                            </tr>
                                                            <?PHP } ?>
                                                        </tfoot>
                                                    </table>
                                                    <!-- .woocommerce-table -->
                                                </section>
                                                <!-- .woocommerce-order-details -->
                                            </div>
                                            <!-- .woocommerce-order -->
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
