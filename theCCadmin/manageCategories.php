<?php
include('header.php');
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["name"]) && !empty($_GET["name"])  && isset($_GET["url"])){
  $Gname = $_GET["name"];
  $Gid = $_GET["id"];
  $parent = $_GET["group"];
  $Gurl = $_GET["url"];

}else{
  $Gname = '';
  $Gid = 0;
  $Gurl = '';
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
      <h1>Manage Categories</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="optionForm">
              <input type="hidden" name="categoryId" id="categoryId" value="<?PHP echo $Gid; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="categoryName">Category Name</label>
                  <input type="text" autocomplete="off" onchange="ToSeoUrl(this)" onfocus="ToSeoUrl(this)" onkeypress="ToSeoUrl(this)" class="form-control" id="categoryName" placeholder="Category Name" value="<?PHP echo $Gname; ?>" required>
                </div>
                <div class="form-group">
                  <label for="categoryUrl">Category Url</label>
                  <input type="text" autocomplete="off" class="form-control" id="categoryUrl" placeholder="Category Url" value="<?PHP echo $Gurl; ?>" required>
                </div>
                <div class="form-group">
                  <label for="categoryParent">Category Parent</label>
                  <select autocomplete="off" class="form-control" id="categoryParent"  required>
                    <option value="">Select</option>
                    <option value="0">Parent</option>
                    <?PHP echo listCategoryParent($conn); ?>
                  </select>
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
              <h3 class="box-title">Manage Categories</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                <tr>
                  <th>S.No.</th><th>Category Name</th><th>Parent Category Name</th><th>Action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM `productcategories` ORDER BY `categoryParent` ASC, `categoryName` ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                      $i++;
                ?>
                <tr>
                  <td><?PHP echo $i; ?></td>
                  <td><?PHP echo $row["categoryName"]; ?></td>
                  <td><?PHP echo getCategoryName($conn,$row["categoryParent"]); ?></td>
                  <td><a href="?id=<?PHP echo $row["id"]; ?>&name=<?PHP echo $row["categoryName"]; ?>&group=<?PHP echo $row["categoryParent"]; ?>&url=<?PHP echo $row["categoryUrl"]; ?>" class="btn btn-primary btn-sm">Edit</a> <a href="?id=<?PHP echo $row["id"]; ?>&name=<?PHP echo $row["categoryName"]; ?>&group=<?PHP echo $row["categoryParent"]; ?>&delete&did" class="deleteOptionGroup btn btn-danger btn-sm">Delete</button></td>
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

  $('.optionAdd').on('click', function(e){
      e.preventDefault();
      var categoryId = $('#categoryId').val();
      var categoryName = $('#categoryName').val();
      var categoryParent = $('#categoryParent').val();
      var categoryUrl = $('#categoryUrl').val();
      $.post("calls/addCategory.php",{
        name: categoryName,
        id: categoryId,
        parent: categoryParent,
        url: categoryUrl
      },function(data, status){
        gotoPage('<?PHP echo basename($_SERVER['PHP_SELF']); ?>');
      });
  });

  function ToSeoUrl(data){
    var name = $('#categoryName').val();
    // make the url lowercase         
    var url = name;
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
    document.getElementById("categoryUrl").value = encodedUrl; 
  }
</script>
<?PHP
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["name"]) && !empty($_GET["name"]) && isset($_GET["group"])){
  $group = $_GET["group"];
  echo "<script>$('#optionForm option[value=".$group."]').prop('selected', true)</script>";
} ?>