<?PHP 
include('header.php');
if(isset($_POST["justArrival"]) && isset($_POST["specialOfferMain"])){
  $justArrival = $_POST["justArrival"];
  $specialOfferMain = $_POST["specialOfferMain"];
  $bestSellerMain = $_POST["bestSellerMain"];


  //print_r($_POST);
  foreach ($_POST as $name => $value) {
   //$name;
    $val = implode(',', $_POST[$name]);
    $sqlUpdate = "UPDATE `config` SET `value` = '$val' WHERE `name` = '$name'";
    $conn->query($sqlUpdate);
  }
  echo "<script>location.replace('mainpageSetting.php?');</script>";

}
?>
<link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice{
  color: #fff;
  background: #367fa9;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice span{
  color: #000;
}
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Front Page
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Front Page Setting</h3>
            </div>
            <div class="box-body">
            <form method="post" enctype="multipart/form-data">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Latest Arrival Categories</label>
                    <select class="form-control select2 lastestArrival" multiple="multiple" name="justArrival[]" data-placeholder="Select Categories" style="width: 100%;">
                      <?PHP echo listCategory($conn); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Special Offer Categories</label>
                    <select class="form-control select2 specialOfferMain" multiple="multiple" name="specialOfferMain[]" data-placeholder="Select Categories" style="width: 100%;">
                      <?PHP echo listCategory($conn); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Best Seller Categories</label>
                    <select class="form-control select2 bestSellerMain" multiple="multiple" name="bestSellerMain[]" data-placeholder="Select Categories" style="width: 100%;">
                      <?PHP echo listCategory($conn); ?>
                    </select>
                </div> 
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?PHP
include('footer.php');
?>
<script src="AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
  var lastestArrival = "<?PHP echo getConfigData($conn, 'justArrival');  ?>";
  $.each(lastestArrival.split(","), function(i,e){
      $(".lastestArrival option[value='" + e + "']").prop("selected", true);
  });

  var bestSellerMain = "<?PHP echo getConfigData($conn, 'bestSellerMain');  ?>";
  $.each(bestSellerMain.split(","), function(i,e){
      $(".bestSellerMain option[value='" + e + "']").prop("selected", true);
  });
  
  var specialOfferMain = "<?PHP echo getConfigData($conn, 'specialOfferMain');  ?>";
  $.each(specialOfferMain.split(","), function(i,e){
      $(".specialOfferMain option[value='" + e + "']").prop("selected", true);
  });
  

</script>
