<?php
include('header.php');
$today = date("Y-m-d");
if(isset($_POST["promoId"]) && isset($_POST["promo"]) && !empty($_POST["promo"])){
	$promoId = $_POST["promoId"];
	$promo = $_POST["promo"];
	$promodesc = $_POST["promodesc"];
	$promodiscount = $_POST["promodiscount"];
	$promoperuser = $_POST["promoperuser"];
	if(isset($_POST["cod"]) && $_POST["cod"] == 1){
		$cod = 1;
	}else{
		$cod = 0;
	}
	$promomincart = $_POST["promomincart"];
	$start_date = $_POST["start_date"];
	$end_date = $_POST["end_date"];
	$quantity = $_POST["quantity"];

	if($promoId == 0){
		$sqlData = "INSERT INTO `promocodes`(`dateFrom`, `dateTo`, `quantity`, `promoCode`, `promoDescription`, `promoDiscount`, `promoMinPerUser`, `cod`, `minCartValue`) VALUES ('$start_date', '$end_date', '$promo', '$promodesc', '$promodiscount', '$promoperuser', '$cod', '$promomincart')";
	}else{
		$sqlData = "UPDATE `promocodes` SET `dateFrom`='$start_date',`dateTo`='$end_date',`quantity`='$quantity',`promoCode`='$promo',`promoDescription`='$promodesc',`promoDiscount`='$promodiscount',`promoMinPerUser`='$promoperuser',`cod`='$cod',`minCartValue`='$promomincart' WHERE `id` = '$promoId'";
	}
	if($conn->query($sqlData)){
		echo "<script>location.replace('managePromo.php?');</script>";
	}

}
if(isset($_GET["id"]) && !empty($_GET["id"])){
	$Gid = $_GET["id"];
	$sqlz = "SELECT * FROM `promocodes` WHERE `id` = '$Gid'";
	$resultz = $conn->query($sqlz);
	if ($resultz->num_rows > 0) {
	    while($rowz = $resultz->fetch_assoc()) {
			$Gstart_date = $rowz["dateFrom"];
			$Gend_date = $rowz["dateTo"];
			$Gquantity = $rowz["quantity"];
			$Gpromo = $rowz["promoCode"];
			$Gpromodesc = $rowz["promoDescription"];
			$Gpromodiscount = $rowz["promoDiscount"];
			$Gpromoperuser = $rowz["promoMinPerUser"];
			$Gcod = $rowz["cod"];
			$Gpromomincart = $rowz["minCartValue"];
	    }
	}
}else{
	$Gid = 0;
	$Gstart_date = "";
	$Gend_date = "";
	$Gquantity = 1;
	$Gpromo = "";
	$Gpromodesc = "";
	$Gpromodiscount = 0;
	$Gpromoperuser = 1;
	$Gcod = 0;
	$Gpromomincart = 0;
}
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["name"]) && !empty($_GET["name"]) && isset($_GET["did"]) && isset($_GET["delete"])){
  $Gname = $_GET["name"];
  $Gid = $_GET["id"];
  $sqlDelete = "DELETE FROM `productcategories` WHERE `id` = '$Gid'";
  if($conn->query($sqlDelete)){
    echo "<script>gotoPage('". basename($_SERVER['PHP_SELF']) ."');</script>";
  }
}

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Promo</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Promo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="optionForm" method="POST">
              <input type="hidden" name="promoId" id="promoId" value="<?PHP echo $Gid; ?>">
              <div class="box-body">
                <div class="form-group col-xs-6">
                  <label for="categoryName">Promo Start Date</label>
                  <input type="date" autocomplete="off" class="form-control" id="" name="start_date" placeholder="" value="<?PHP echo $Gstart_date; ?>" />
                </div>
                <div class="form-group col-xs-6">
                  <label for="categoryName">Promo End Date</label>
                  <input type="date" autocomplete="off" class="form-control" id="" name="end_date" placeholder="" value="<?PHP echo $Gend_date; ?>" />
                </div>
                <div class="form-group col-xs-12">
                  <label for="categoryUrl">Promo Quantity</label>
                  <input type="number" autocomplete="off" class="form-control" id="" placeholder="Promo Quantity" name="quantity" value="<?PHP echo $Gquantity; ?>" required>
                </div>
                <div class="form-group col-xs-12">
                  <label for="categoryUrl">Promo Code</label>
                  <input type="text" autocomplete="off" class="form-control" id="" placeholder="Promo Code" name="promo" value="<?PHP echo $Gpromo; ?>" required>
                </div>
                <div class="form-group col-xs-12">
                  <label for="categoryUrl">Promo Code Description</label>
                  <input type="text" autocomplete="off" class="form-control" id="" placeholder="Promo Code Description" name="promodesc" value="<?PHP echo $Gpromodesc; ?>" required>
                </div>
                <div class="form-group col-xs-6">
                  <label for="categoryUrl">Promo Discount(in Figure)</label>
                  <input type="text" autocomplete="off" class="form-control" id="" placeholder="Promo Discount" name="promodiscount" value="<?PHP echo $Gpromodiscount; ?>" required>
                </div>
                <div class="form-group col-xs-6">
                  <label for="categoryUrl">Minimum Promo Per User</label>
                  <input type="number" autocomplete="off" class="form-control" id="" placeholder="Promo Per User" name="promoperuser" value="<?PHP echo $Gpromoperuser; ?>" required>
                </div>
                <div class="form-group col-xs-6">
                  <label for="categoryUrl">
                  	<input type="checkbox" name="cod" value="1" <?PHP if($Gcod == 1){ echo "checked";} ?> /> Cash on Delivery Available on Promo
                  </label>
                  
                </div>
                <div class="form-group col-xs-6">
                  <label for="categoryUrl">Minimum Cart Value</label>
                  <input type="text" autocomplete="off" class="form-control" id="" placeholder="Minimum Cart Value" name="promomincart" value="<?PHP echo $Gpromomincart; ?>" required>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary optionAdd">Submit</button>
              </div>
            </form>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Promo</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                <tr>
                  <th>S.No.</th><th>Promo</th><th>Start Date</th><th>End Date</th><th>Quantity</th><th>Discount</th><th>Status</th><th>Action</th>
                </tr>
                <?php
                	$sqlz = "SELECT * FROM `promocodes` ORDER BY `quantity`";
					$resultz = $conn->query($sqlz);
					if ($resultz->num_rows > 0) {
                    $i = 0;
                    while($rowz = $resultz->fetch_assoc()) {
							$Gstart_date = $rowz["dateFrom"];
							$Gend_date = $rowz["dateTo"];
							$Gquantity = $rowz["quantity"];
							$Gpromo = $rowz["promoCode"];
							$Gpromodesc = $rowz["promoDescription"];
							$Gpromodiscount = $rowz["promoDiscount"];
							$Gpromoperuser = $rowz["promoMinPerUser"];
							$Gcod = $rowz["cod"];
							$Gpromomincart = $rowz["minCartValue"];
                      		$i++;
                ?>
                <tr>
                  <td><?PHP echo $i; ?></td>
                  <td><?PHP echo $Gpromo; ?></td>
                  <td><?PHP echo date("d M Y", strtotime($Gstart_date)); ?></td>
                  <td><?PHP echo date("d M Y", strtotime($Gend_date)); ?></td>
                  <td><?PHP echo $Gquantity; ?></td>
                  <td><?PHP echo $Gpromodiscount; ?></td>
                  <td><?PHP if($today >= $Gstart_date && $today <= $Gend_date && $Gquantity > 0){ echo "<span class='label label-success'>Active</span>"; }else{ echo "<span class='label label-danger'>Inactive</span>";} ?></td>
                  <td><a href="?id=<?PHP echo $rowz["id"]; ?>" class="btn btn-primary btn-sm">Edit</a></td>
                </tr>
                <?php
                   }
                }
                ?>
                </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include('footer.php');
?>

<script>
</script>
