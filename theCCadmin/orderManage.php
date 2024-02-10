<?PHP 
include('header.php');
if(isset($_POST["orderStatus"]) && isset($_POST["orderid"]) && isset($_POST["userid"])){
  $orderStatus = $_POST["orderStatus"];
  $orderid = $_POST["orderid"];
  $userid = $_POST["userid"];
  if(isset($_POST["addCashback"])){
    $addCashback = $_POST["addCashback"];
    $sqlAC = "UPDATE `users` SET `userCredits`=`userCredits`+'$addCashback ' WHERE `id` = '$userid'";
    $conn->query($sqlAC);
    $sqlO = "UPDATE `orders` SET `cashbackAdded` = 1 WHERE `id` = '$orderid'";
    $conn->query($sqlO);
  }
  if(isset($_POST["trackingid"])){
    $trackingid = $_POST["trackingid"];
  }else{
    $trackingid = '';
  }
  if(isset($_POST["trackingurl"])){
    $trackingurl = $_POST["trackingurl"];
  }else{
    $trackingurl = '';
  }
  if(isset($_POST["orderPaid"]) && $_POST["orderPaid"] == 1){
    $orderPaid = $_POST["orderPaid"];
  }else{
    $orderPaid = '0';
  }
  $statusDate = date("y-m-d H:i:s");
  $sqlOrderUpdate = "UPDATE `orders` SET `orderStatus`='$orderStatus',`statusDate`='$statusDate',`orderTracking`='$trackingurl',`orderTrackingCode`='$trackingid', `orderPaid`='$orderPaid' WHERE `id` = '$orderid'";
  if($conn->query($sqlOrderUpdate)){
 //   echo "<script>location.replace('orderManage.php?orderId=".$orderid."');</script>";
  }
}
if(isset($_GET["orderId"]) && !empty($_GET["orderId"])){
  $orderId = $_GET["orderId"];
  $sqlOrder = "SELECT * FROM `orders` WHERE `id` = '$orderId' LIMIT 1";
  $resultOrder = $conn->query($sqlOrder);
    if ($resultOrder->num_rows > 0) {
        while($rowOrder = $resultOrder->fetch_assoc()) {
          $id = $rowOrder["id"];
          $userData = getUserData($conn, $rowOrder["userid"]);
          $userAddress = getOrderAddresss($conn, $rowOrder["orderAddress"]);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <small>#<?PHP echo $rowOrder["orderNo"]; ?></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <?PHP echo sitename; ?>
            <small class="pull-right">Date: <?PHP echo date("d-M-Y", strtotime($rowOrder["orderDate"])); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?PHP echo $userAddress["firstname"].' '.$userAddress["lastname"]; ?></strong><br>
            <?PHP echo $userAddress["streetaddress"]; ?><br>
            <?PHP if(!empty( $userAddress["streetaddress2"])){ echo $userAddress["streetaddress2"]."<br>"; } ?>
            <?PHP echo $userAddress["city"]; ?>, <?PHP echo $userAddress["state"]; ?> - <?PHP echo $userAddress["pincode"]; ?><br>
            Phone: <?PHP echo $userAddress["contactno"]; if(!empty($userAddress["contactno2"])){ echo ', '.$userAddress["contactno2"]; } ?><br>
            <?PHP if(!empty($userAddress["email"])){ echo "Email: ".$userAddress["email"]; } ?>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #<?PHP echo $rowOrder["orderNo"]; ?></b><br>
          <br>
          <b>Order ID:</b> <?PHP echo $rowOrder["orderNo"]; ?><br>
          <b>Order Date:</b> <?PHP echo date("d-M-Y h:i A", strtotime($rowOrder["orderDate"])); ?><br>
          <b>Account:</b> <?PHP echo $rowOrder["userid"]; ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Image</th>
              <th>SKU</th>
              <th>Product</th>
              <th>Options</th>
              <th>Qty</th>
              <th>Price</th>
              <th>Subtotal</th>
              <th>Vendor</th>
            </tr>
            </thead>
            <tbody>
            <?PHP
            $sqlOrderi = "SELECT * FROM `orderdetails` WHERE `orderId` = '$id'";
            $resultOrderi = $conn->query($sqlOrderi);
              if ($resultOrderi->num_rows > 0) {
                  while($rowOrderi = $resultOrderi->fetch_assoc()) {
                   $productData = getProductData($conn, $rowOrderi["productId"]);
            ?>
            <tr>
              <td><a href="../product.php?producturl=<?PHP echo $productData["metaUrl"] ?>" target="_blank"><img src="../product/<?PHP echo get_productImage($conn, $rowOrderi["productId"]); ?>" width="50px" height="50px" /></a> </td>
              <td><?PHP echo $productData["productsku"]; ?></td>
              <td><?PHP echo $productData["productName"]; ?></td>
              <td><?PHP echo $rowOrderi["productOption"]; ?></td>
              <td><?PHP echo $rowOrderi["productQuantity"]; ?></td>
              <td>Rs. <?PHP echo $rowOrderi["productPrice"]; ?></td>
              <td>Rs. <?PHP echo $rowOrderi["productPrice"]*$rowOrderi["productQuantity"]; ?></td>
              <td><?PHP echo  get_userName($conn, $productData["productUser"]); ?></td>
            </tr>
            <?PHP
                }
              }
            ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Order Status: <?PHP $orderStatus =  $rowOrder["orderStatus"]; echo getOrderStatus($rowOrder["orderStatus"]); ?></p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Payment Mode : <?PHP if($rowOrder["orderPaymentType"] == "cod"){ echo "COD"; }else{ echo "Prepaid"; } ?></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>Rs. <?PHP echo $rowOrder["orderAmount"]; ?></td>
              </tr>
              <?PHP if(!empty($rowOrder["orderShipping"])){ ?>
              <tr>
                <th>Shipping</th>
                <td>Rs. <?PHP echo $rowOrder["orderShipping"]; ?></td>
              </tr>
              <?PHP } ?>
              <?PHP if(!empty($rowOrder["walletPaid"])){ ?>
              <tr>
                <th>Wallet Paid</th>
                <td>Rs. <?PHP echo $rowOrder["walletPaid"]; ?></td>
              </tr>
              <?PHP } ?>
              <?PHP if(!empty($rowOrder["promoApplied"]) && $rowOrder["promoApplied"] == 1){ ?>
              <tr>
                <th>CashBack</th>
                <td>Rs. <?PHP echo $rowOrder["cashback"]; ?></td>
              </tr>
              <?PHP } ?>
              <tr>
                <th>Payble Amount</th>
                <td>Rs. <?PHP echo $rowOrder["paybleAmount"]; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Order Details</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="box-body">
                  <div class="form-group col-xs-12">
                    <label>Order Status</label>
                    <select class="form-control" name="orderStatus" id="orderSelect">
                      <option value="0">Cancel Order</option>
                      <option value="1">Order Recived & Pending</option>
                      <option value="2">Confirm Order</option>
                      <option value="3">Shipped from Vendor</option>
                      <option value="4">Dispached & In Transist</option>
                      <option value="5">Deliverd</option>
                      <option value="6">Return Requested</option>
                      <option value="7">Return Accepted</option>
                      <option value="8">Pickup Scheduled</option>
                      <option value="9">Picked Up & Processing</option>
                      <option value="10">Money Refunded</option>
                      <option value="11">Recived in Inventory</option>
                      <option value="12">Return Denied</option>
                    </select>
                  </div>
                  <input type="hidden" value="<?PHP echo $rowOrder["userid"]; ?>" name="userid" >
                  <input type="hidden" value="<?PHP echo $rowOrder["id"]; ?>" name="orderid" >
                  <?PHP if(!empty($rowOrder["promoApplied"]) && $rowOrder["promoApplied"] == 1  && $rowOrder["cashbackAdded"] == 0){ ?>
                  <div class="form-group col-xs-5 checkbox">
                    <label>
                      <input type="checkbox" name="addCashback" value="<?PHP echo $rowOrder["cashback"] ?>">
                      Add Cashback to User Wallet <b>Rs. <?PHP echo $rowOrder["cashback"] ?></b>
                    </label>
                  </div>
                  <?PHP } ?>
                  <div class="form-group col-xs-12">
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="exampleInputEmail1">Tracking Url</label>
                    <input type="text" name="trackingurl" class="form-control" value="<?PHP if($rowOrder["orderTracking"]){echo $rowOrder["orderTracking"];} ?>" placeholder="Tracking Url">
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="exampleInputEmail1">Tracking Id</label>
                    <input type="text" name="trackingid" class="form-control" id="exampleInputEmail1" value="<?PHP if($rowOrder["orderTrackingCode"]){echo $rowOrder["orderTrackingCode"];} ?>" placeholder="Tracking Id">
                  </div>
                  <div class="form-group col-xs-5 checkbox">
                    <label>
                      <input type="checkbox" name="orderPaid" value="1" <?PHP if($rowOrder["orderPaid"] == 1){echo "checked";} ?>>
                      <b>Order Paid</b>
                    </label>
                  </div>
                  
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  
<?PHP
    }
  }
}
include('footer.php');

?>
<script>
  $('#orderSelect option[value=<?PHP echo $orderStatus; ?>]').attr('selected','selected');
</script>