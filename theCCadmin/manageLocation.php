<?php
include('header.php');
$today = date("Y-m-d");
if(isset($_POST["zipId"]) && isset($_POST["zip"]) && !empty($_POST["zip"])){
	$zipId = $_POST["zipId"];
	$zip = $_POST["zip"];
  if(isset($_POST["paymode"]) && $_POST["paymode"] == 1){
    $paymode = 1;
  }else{
    $paymode = 0;
  }
	if($zipId == 0){
		$sqlData = "INSERT INTO `pincodes`( `pincode`, `paymode`) VALUES ('$zip', '$paymode')";
	}else{
		$sqlData = "UPDATE `pincodes` SET `pincode`='$zip',`paymode`='$paymode' WHERE `id` = '$zipId'";
	}
	if($conn->query($sqlData)){
		echo "<script>location.replace('manageLocation.php?');</script>";
	}

}
if(isset($_GET["id"]) && !empty($_GET["id"])){
	$Gid = $_GET["id"];
	$sqlz = "SELECT * FROM `pincodes` WHERE `id` = '$Gid'";
	$resultz = $conn->query($sqlz);
	if ($resultz->num_rows > 0) {
	    while($rowz = $resultz->fetch_assoc()) {
			$Gpincode = $rowz["pincode"];
			$Gpaymode = $rowz["paymode"];
	    }
	}
}else{
	$Gid = 0;
	$Gpincode = "";
  $Gpaymode = 0;
}
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["did"]) && isset($_GET["delete"])){
  $Gid = $_GET["id"];
  $sqlDelete = "DELETE FROM `pincodes` WHERE `id` = '$Gid'";
  if($conn->query($sqlDelete)){
    echo "<script>gotoPage('". basename($_SERVER['PHP_SELF']) ."');</script>";
  }
}

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Pincodes</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Pincode</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="optionForm" method="POST">
              <input type="hidden" name="zipId" id="zipId" value="<?PHP echo $Gid; ?>">
              <div class="box-body">
                <div class="form-group col-xs-12">
                  <label for="categoryUrl">Pincode</label>
                  <input type="text" autocomplete="off" class="form-control" id="" placeholder="Pincode" name="zip" value="<?PHP echo $Gpincode; ?>" required>
                </div>
                <div class="form-group col-xs-6">
                  <label for="categoryUrl">
                  	<input type="checkbox" name="paymode" value="1" <?PHP if($Gpaymode == 1){ echo "checked";} ?> /> Cash on Delivery Available
                  </label>
                  
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
              <h3 class="box-title">Manage Pincodes</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                <tr>
                  <th>S.No.</th><th>Pincode</th><th>Paymode</th><th>Action</th>
                </tr>
                <?php
                	$sqlz = "SELECT * FROM `pincodes` ORDER BY `pincode`";
        					$resultz = $conn->query($sqlz);
        					if ($resultz->num_rows > 0) {
                            $i = 0;
                            while($rowz = $resultz->fetch_assoc()) {
        							$Gpaymode = $rowz["paymode"];
        							$Gpincode = $rowz["pincode"];
                      		$i++;
                ?>
                <tr>
                  <td><?PHP echo $i; ?></td>
                  <td><?PHP echo $Gpincode; ?></td>
                  <td><?PHP if($Gpaymode == 1){ echo "COD & Online Payment"; }else{ echo "Online Payment"; } ?></td>
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
