
<?php
include('header.php');

if(isset($_POST["productId"]) && isset($_POST["optionId"]) && isset($_POST["optionValue"])){
	$optionId = $_POST["optionId"];
    $optionValue = $_POST["optionValue"];
    $optionGroup = $_POST["optionGroup"];
    $productId = input($_POST["productId"]);
	$disableOption = "UPDATE `productoption` SET `enable` = 0 WHERE `productId` = '$productId'";
	$conn->query($disableOption);
    foreach ($optionId as $oi) {
    	if(!empty($optionValue[$oi])){
    		echo $oi.' - '.$optionValue[$oi] .' - '. $optionGroup[$oi];
    		$sqlOp = "INSERT INTO `productoption`(`id`, `optionId`, `productId`, `optionGroupId`, `priceIncrement`, `enable`) VALUES (NULL, '$oi', '$productId', '$optionGroup[$oi]', '$optionValue[$oi]', '1')";
    		$conn->query($sqlOp);
    	}
    }
  echo "<script>window.location.href= 'manageProducts.php';</script>"; 
}

if(isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["url"]) && !empty($_POST["url"]) && isset($_POST["sku"]) && !empty($_POST["sku"])){
  $productId = input($_POST["productId"]);
  $sku = input($_POST["sku"]);
  $name = input($_POST["name"]);
  $mrp = input($_POST["mrp"]);
  $sellprice = input($_POST["sellprice"]);
  $comission = input($_POST["comission"]);
  $ptotal = input($_POST["ptotal"]);
  $stock = input($_POST["stock"]);
  $category = input($_POST["category"]);
  $shortdesc = input($_POST["shortdesc"]);
  $desc = input($_POST["desc"]);
  if(isset($_POST["preturn"]) && $_POST["preturn"] == "YES"){
    $preturn = 1;
  }else{
    $preturn = 0;
  }
  $keyword = input($_POST["keyword"]);
  $url = input($_POST["url"]);
  $userId = input($_SESSION["userId"]);
  
  if($productId == 0){
    $sql = "INSERT INTO `product`(`id`, `productsku`, `productName`, `productPrice`, `productTax`, `productSell`, `productComission`, `productTotal`, `productWeight`, `productShortDesc`, `productDesc`, `productCategory`, `productStock`, `productLive`, `productUser`, `productReturn`, `metaKeyword`, `metaUrl`) VALUES (NULL, '$sku', '$name', '$mrp', '0', '$sellprice', '$comission', '$ptotal', '0', '$shortdesc', '$desc', '$category', '$stock', '1', '$userId', '$preturn', '$keyword', '$url')";
    $a = 1;
  }else{
    $sql = "UPDATE `product` SET `productsku`='$sku',`productName`='$name', `productPrice`='$mrp', `productTax`= 0,`productSell`= '$sellprice', `productComission`= '$comission',`productTotal`='$ptotal',`productShortDesc`='$shortdesc',`productDesc`='$desc',`productCategory`='$category',`productStock`='$stock', `productReturn`='$preturn',`metaKeyword`='$keyword' WHERE `id` = '$productId'";
    $a = 0;
  }
 
  if($conn->query($sql)){
    if($productId == 0){
     $productId = $conn->insert_id;
    }
    $data = array();
    $data["id"] = $productId;
    $data["type"] = $a;
    echo "<script>window.location.href= 'addProduct.php?productId=".$productId."&next';</script>";
  }
}





if(isset($_GET["productId"]) && !empty($_GET["productId"])){
$Gid = $_GET["productId"];
        
    $sqlUser = "SELECT * FROM `product` WHERE `id` = '$Gid' LIMIT 1";
    $resultUser = $conn->query($sqlUser);
    if ($resultUser->num_rows > 0) {
        while($rowUser = $resultUser->fetch_assoc()) {
            $Gname = $rowUser["productName"];
            $Gid = $rowUser["id"];
            $Gmrp = $rowUser["productPrice"];
            $Gsellprice = $rowUser["productSell"];
            $Gcomission = $rowUser["productComission"];
            $Gstock = $rowUser["productStock"];
            $Gcategory = $rowUser["productCategory"];
            $Gshortdesc = $rowUser["productShortDesc"];
            $Gdesc = $rowUser["productDesc"];
            $Greturn = $rowUser["productReturn"];
            $Gkeyword = $rowUser["metaKeyword"];
            $Gurl = $rowUser["metaUrl"];
            $Gptotal = $rowUser["productTotal"];
            $Gsku = $rowUser["productsku"];

            $sqlUser = "SELECT * FROM `productoption` WHERE `productId` = '$Gid' AND `enable` = 1";
		    $resultUser = $conn->query($sqlUser);
		    $GoptionId = array();
		    $GpriceIncrement = array();
		    if ($resultUser->num_rows > 0) {
		    	$setOption = 1;
		        while($rowUser = $resultUser->fetch_assoc()) {
		        	$GoptionId[] = $rowUser["optionId"];
		        	$GpriceIncrement[] = $rowUser["priceIncrement"];
		        }
		    }else{
		    	$setOption = 0;
		    }
        }
    }
}else{
  $productId = 0;
  $Gname = '';
  $Gid = 0;
  $Gmrp = '';
  $Gsellprice = '';
  $Gcomission = '';
  $Gstock = '';
  $Gcategory = '';
  $Gshortdesc = '';
  $Gdesc = '';
  $Greturn = '';
  $Gkeyword = '';
  $Gurl = '';
  $Gptotal = '';
  $Gsku = '';
}
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["productId"]) && !empty($_GET["productId"]) && isset($_GET["delid"]) && isset($_GET["delid"])){
  $Gproduct = $_GET["productId"];
  $Gid = $_GET["id"];
  $Gdelid = $_GET["delid"];
  $location = '../product/'.$Gdelid;
  $sqlDelete = "DELETE FROM `productimages` WHERE `id` = '$Gid'";
  if($conn->query($sqlDelete)){
    unlink($location);
    echo "<script>gotoPage('". basename($_SERVER['PHP_SELF']) ."?productId=".$Gproduct."&next');</script>";
  }
}
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Products</h1>
    </section>

    <!-- Main content -->
    <?PHP if(!isset($_GET["next"])){ ?>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          
            <form action="#" method="POST" id="porductFormA">
              <input type="hidden" name="productId" id="productId" value="<?PHP echo $Gid; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="optionname">Product SKU</label>
                  <input type="text" autocomplete="off" onchange="ToSeoUrl(this)" class="form-control" id="sku" name="sku" placeholder="Product Unique Code" autofocus value="<?PHP echo $Gsku; ?>" required>
                </div>
                <div class="form-group">
                  <label for="optionname">Product Name</label>
                  <input type="text" autocomplete="off" onchange="ToSeoUrl(this)" class="form-control" id="name" name="name"placeholder="Name" value="<?PHP echo $Gname; ?>" required>
                </div>
                <div class="form-group">
                  <label for="optionname">Product MRP</label>
                  <input type="text" autocomplete="off" class="form-control" id="mrp" placeholder="Product MRP" value="<?PHP echo $Gmrp; ?>" name="mrp" required>
                </div>
                <div class="form-group">
                  <label for="optionname">Product Sell Price</label>
                  <input type="text" autocomplete="off" class="form-control" id="sellprice" placeholder="Product Sell MRP" value="<?PHP echo $Gsellprice; ?>" name="sellprice" required>
                </div>
                <div class="form-group">
                  <label for="optionname">Product Comission</label>
                  <input type="text" autocomplete="off" class="form-control" id="comission" placeholder="Product Comission" value="<?PHP echo $Gcomission; ?>" readonly name="comission" required>
                </div>
                <div class="form-group">
                  <label for="optionname">Product Total Selling Price</label>
                  <input type="text" autocomplete="off" class="form-control" name="ptotal" id="ptotal" placeholder="Product Total Selling Price" value="<?PHP echo $Gptotal; ?>" readonly required>
                </div>
                <div class="form-group">
                  <label for="optionname">Product Stock</label>
                  <input type="text" autocomplete="off" class="form-control" id="stock" name="stock" placeholder="Product Stock" value="<?PHP echo $Gstock; ?>" required>
                </div>
                <div class="form-group">
                  <label for="optionname">Product Category</label>
                  <select autocomplete="off" class="form-control" id="category" name="category" required>
                    <option value="">-- Select --</option>
                    <?PHP echo listCategory($conn); ?>
                  </select>
                </div>               
                <div class="form-group">
                  <label for="optionname">Product Short Description</label>
                  <textarea autocomplete="off" class="form-control" id="shortdesc" name="shortdesc" placeholder="Product Short Description" required><?PHP echo $Gshortdesc; ?></textarea>
                </div>
                
                <div class="form-group">
                  <label for="optionname">Product Description</label>
                  <textarea autocomplete="off" class="form-control" id="desc" name="desc" placeholder="Product Description" required><?PHP echo $Gdesc; ?></textarea>
                </div>
                <div class="form-group">
                    <label>
                      <input type="checkbox" class="minimal" name="preturn" id="preturn" value="YES">
                      Return [By Checking this You agree terms & Consitions of Our Return Policy]
                    </label>
                </div> 
                <div class="form-group">
                  <label for="optionname">Meta Keyword</label>
                  <input type="text" autocomplete="off" class="form-control" id="keyword" name="keyword" placeholder="Meta Keyword" value="<?PHP echo $Gkeyword; ?>" required>
                </div>
                <div class="form-group">
                  <label for="optionname">Product Url</label>
                  <input type="text" autocomplete="off" readonly class="form-control" id="url" name="url" placeholder="Product URL" value="<?PHP echo $Gurl; ?>" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary optionAdd">Save & Continue</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <?PHP } ?>
    <!-- /.content -->
    <?PHP
    if(isset($_GET["productId"]) && isset($_GET["next"])){
    ?>
    <input type="hidden" name="productId" id="productId" value="<?PHP echo $Gid; ?>">
    <section class="content">
      <form id="imgForm">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-body">
              <div class="box-header with-border">
                <h3 class="box-title">Images</h3>
              </div>
              <div class="form-group imageLoadHide">
                <input type="file" accept="image/*" autocomplete="off" class="form-control" id="images" multiple required>
              </div>
              <div class="form-group imageLoadShow" style="display:none;">
                  <img src="images/loading.gif" style="width: 100%;" />
              </div>
              <div class="form-group">
                <label for="optionname">Rearrange Images to Order</label>
                <div style='float: left; width: 100%;'>
                  <!-- List Images -->
                  <ul id="sortable" >
                  <?php
                  // Fetch images
                  $productId = $_GET["productId"];
                  $fetch_images = mysqli_query($conn,"SELECT * FROM `productimages` WHERE `productId` = '$productId' ORDER BY `orderBy` ASC");
                  if($fetch_images->num_rows > 0){
                    while($row = mysqli_fetch_assoc($fetch_images)){
                      $id = $row['id']; 
                      $image = $row['image'];
                      $location = 'product/'.$image;
                      echo '<li class="ui-state-default text-center" id="image_'.$id.'">
                        <img src="../'.$location.'" ><br><a href="?productId='.$productId.'&delid='.$image.'&id='.$id.'" onclick="verifyDelete()" class="btn btn-primary">Delete</a>
                      </li>';
                      
                    }
                  }else{
                    echo "<div class='alert alert-danger'>No Image is Uploaded, Kindly Upload Image First!</div>";
                  }

                  ?>
                  </ul>
                </div>
              </div>
          </div>
          
        </div>
      </div>
      </form>
    </section>
    <section class="content">
      <form name="productOptionSaver" method="post">
      	<input type="hidden" value="<?PHP echo $Gid; ?>" name="productId" />
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-body">
              <div class="box-header with-border">
                <h3 class="box-title">Options</h3>
              </div>
              <?PHP 
              $sqlOptionMain = "SELECT * FROM `optiongroup` ORDER BY `optionGroupName`";
              $resultOptionMain = $conn->query($sqlOptionMain);
              if ($resultOptionMain->num_rows > 0) {
                  while($rowOptionMain = $resultOptionMain->fetch_assoc()) {
                    $groupid = $rowOptionMain["id"];
              ?>
              <div class="form-group">
                <h3><?PHP echo $rowOptionMain["optionGroupName"]; ?></h3>
              </div>
              <div class="col-md-12">
                  <?PHP 
                  $sqlOption = "SELECT * FROM `options` WHERE `optionGroup` = '$groupid' ORDER BY `optionName`";
                  $resultOption = $conn->query($sqlOption);
                  if ($resultOption->num_rows > 0) {
                      while($rowOption = $resultOption->fetch_assoc()) {
                  ?>
                  <div class="col-md-12">
                    <div class="col-md-1">
                      <div class="form-group">
                        <label>
                          <input type="hidden"  name="optionGroup[<?PHP echo $rowOption["id"]; ?>]" value="<?PHP echo $rowOption["optionGroup"]; ?>">
                          <input type="checkbox" class="minimal" name="optionId[]" id="optionId_<?PHP echo $rowOption["id"]; ?>" value="<?PHP echo $rowOption["id"]; ?>">
                          <?PHP echo $rowOption["optionName"]; ?>
                        </label>
                      </div>
                    </div>

                    <div class="col-md-1">
                      <div class="form-group">
                        <input type="text" placeholder="Option Price Change" class="form-group" id="optionValue_<?PHP echo $rowOption["id"]; ?>" name="optionValue[<?PHP echo $rowOption["id"]; ?>]">
                      </div>
                    </div>
                  </div>
                  <?PHP
                      }
                  }
                  ?>
              </div>
              <?PHP 
                  }
              }
              ?>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary optionAdd">Save</button>
            </div>
          </div>
        </div>
      </div>
      </form>
    </section>
    
    <?PHP 
	}
    ?>
  </div>
  <!-- /.content-wrapper -->
<?php
include('footer.php');
?>
<script src="AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
$('.imageLoadShow').hide();
$('#porductForm').submit(function(){
      var id = $('#productId').val();
      var sku = $('#sku').val();
      var name = $('#name').val();
      var mrp = $('#mrp').val();
      var sellprice = $('#sellprice').val();
      var comission = $('#comission').val();
      var ptotal = $('#ptotal').val();
      var stock = $('#stock').val();
      var category = $('#category').val();
      var shortdesc = $('#shortdesc').val();
      var desc = $('#desc').val();
      if($('#preturn').is(":checked")){
        var preturn = 1;
      }else{
        var preturn = 0;
      }
      var keyword  = $('#keyword');
      var url = $('#url');
      
      $.ajax({
          url: 'calls/addProduct.php',
          type: 'POST',
          dataType: 'json', 
          data: {
            productId:id,
            sku:sku,
            name:name,
            mrp:mrp,
            sellprice:sellprice,
            comission:comission,
            ptotal:ptotal,
            stock:stock,
            category:category,
            shortdesc:shortdesc,
            desc:desc,
            preturn:preturn,
            keyword :keyword ,
            url:url,
            userId: <?PHP echo $_SESSION["userId"]; ?>
          },            
          success: function (response) {
            //console.log(response);
            url = 'addProduct.php'+response["id"];
            alert(url);
            
//              gotoPage(url);
          }
      });
      alert(response);
      //e.preventDefault();
  });

  $('#images').change( function(){
      var image = $('#images').prop('files')[0];
      var productId = $('#productId').val();
      var data = new FormData();
      data.append('file', image);
      data.append('productId', productId);
      $('.imageLoadHide').hide();
      $('.imageLoadShow').show();
      $.ajax({
          url: 'calls/addImage.php',
          type: "POST",
          contentType: false,
          cache: false,
          processData:false,
          data: data,            
          success: function (response) {
            //alert(response);
            gotoPage('<?PHP echo basename($_SERVER['PHP_SELF']); ?>?productId=<?PHP echo $productId; ?>&next');
            $('.imageLoadShow').hide();
            $('.imageLoadHide').show();
          }
      });
      //e.preventDefault();
  });

  $(function () {
    CKEDITOR.replace('desc');
  })
  $('#sellprice').on('change', function(e){
      var sellprice = $('#sellprice').val();
      var comission = <?PHP if($comission != 0){ echo $comission; }else{ echo 0;} ?>;
      var comissionAmount = sellprice*(comission/100);
      $('#comission').val(comissionAmount);
      var price = parseInt(comissionAmount)+parseInt(sellprice);
      $('#ptotal').val(price);
  });
  function ToSeoUrl(data){
    var sku = $('#sku').val();
    var name = $('#name').val(); 
    // make the url lowercase         
    var url = name + ' '+ sku;
    var encodedUrl = url.toString().toLowerCase(); 
    // replace & with and           
    encodedUrl = encodedUrl.split(/\&+/).join("-and-")
    // remove invalid characters 
    encodedUrl = encodedUrl.split(/[^a-z0-9]/).join("-");       
    // remove duplicates 
    encodedUrl = encodedUrl.split(/-+/).join("-");
    // trim leading & trailing characters 
    encodedUrl = encodedUrl.trim('-'); 
      if(encodedUrl.substr(0,1) == "-") {
          encodedUrl = encodedUrl.substr(1);
      }
    document.getElementById("url").value = encodedUrl; 
  }
$( "#sortable" ).sortable({
    update: function(event,ui){
      var imageids_arr = [];
      $('#sortable li').each(function(){
         var id = $(this).attr('id');
         var split_id = id.split("_");
         imageids_arr.push(split_id[1]);
      });

      // AJAX request
      var productId = $('#productId').val();
      $.ajax({
        url: 'calls/sortImage.php',
        type: 'post',
        data: {imageids: imageids_arr, productId : productId},
        success: function(response){
          alert('Save successfully.');
        }
      });
    }
});
function verifyDelete(){
  return confirm("Are you sure?");
}
</script>
<?PHP
	if(!empty($Gcategory)){
		echo "<script>$('#category option:eq(".$Gcategory.")').prop('selected', true)</script>";
	}
  if(isset($Greturn) && $Greturn == 1){
    echo "<script>$('#preturn').prop('checked', true)</script>";
  }
	if(isset($setOption) && $setOption == 1){
		$size = count($GoptionId);
		echo "<script>";
		for($i=0;$i<$size;$i++){
			echo "$('#optionId_".$GoptionId[$i]."').prop('checked', true);";
			echo "$('#optionValue_".$GoptionId[$i]."').val('".$GpriceIncrement[$i]."');";
		}
		echo "</script>";			
	}
?>
<style>
  #sortable { 
    list-style-type: none; 
    margin: 0; 
    padding: 0; 
    width: 90%; 
  }
  #sortable li { 
    margin: 3px 3px 3px 0; 
    padding: 1px; 
    float: left; 
    border: 0;
    background: none;
  }
  #sortable li img{
    width: 180px;
    height: 140px;
  }
</style>


