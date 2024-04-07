<?php
include('header.php');
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["name"]) && !empty($_GET["name"])){
  $Gname = $_GET["name"];
  $Gid = $_GET["id"];
}else{
  $Gname = '';
  $Gid = 0;
}
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["name"]) && !empty($_GET["name"]) && isset($_GET["did"]) && isset($_GET["delete"])){
  $Gname = $_GET["name"];
  $Gid = $_GET["id"];
  $sqlDelete = "DELETE FROM `optiongroup` WHERE `id` = '$Gid'";
  if($conn->query($sqlDelete)){
    echo "<script>gotoPage('". basename($_SERVER['PHP_SELF']) ."');</script>";
  }
}

?>
<link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Products</h1>
      <ol class="breadcrumb">
        <li><a href="addProduct.php">Add Products</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Products</h3>
            </div>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-hover">
                <thead>
                  <tr>
                    <th>Action</th><th>S.No.</th><th>Image</th><th>Product Name</th><th>Product Selling</th><th>Stock</th><th>Category</th><th>Product Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM `product` ORDER BY `productName` ASC";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      $i = 0;
                      while($row = $result->fetch_assoc()) {
                        $i++;
                  ?>
                  <tr>
                    <td><a href="addProduct.php?productId=<?PHP echo $row["id"]; ?>" class="btn btn-primary btn-sm">Edit</a></td>
                    <td><?PHP echo $i; ?></td>
                    <td><a href="../product.php?producturl=<?PHP echo $row["id"]; ?>" target="_blank"><img src="../product/<?PHP echo get_productImage($conn, $row["id"]); ?>" width="50px" height="50px" /> </a></td>
                    <td><?PHP echo $row["productName"]; ?></td>
                    <td><?PHP echo $row["productTotal"]; ?></td>
                    <td><?PHP echo $row["productStock"]; ?></td>
                    <td><?PHP echo getCategoryName($conn, $row["productCategory"]); ?></td>
                    <td><?PHP echo date("d M Y", strtotime($row["productDate"])); ?></td>
                  </tr>
                  <?php
                     }
                  }else{
                    echo "<tr><td colspan='8'>No Users Found</td></tr>";
                  }
                  ?>
                </tbody>
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
<script src="AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('.table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>