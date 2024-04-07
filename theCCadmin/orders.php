<?PHP 
include('header.php');
?>
 <link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Orders
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Order Time</th>
                  <th>User</th>
                  <th>Status</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?PHP 
                  $sqlOrder = "SELECT * FROM `orders` ORDER BY `id` DESC";
                  $resultOrder = $conn->query($sqlOrder);

                  if ($resultOrder->num_rows > 0) {
                      while($rowOrder = $resultOrder->fetch_assoc()) {
                        $userData = getUserData($conn, $rowOrder["userid"]);
                  ?>
                  <tr>
                    <td><a href="orderManage.php?orderId=<?PHP echo $rowOrder["id"]; ?>"><?PHP echo $rowOrder["orderNo"]; ?></a></td>
                    <td><?PHP echo date("d-M-Y", strtotime($rowOrder["orderDate"])); ?></td>
                    <td><?PHP echo date("h:i A", strtotime($rowOrder["orderDate"])); ?></td>
                    <td><?PHP echo $userData["firstName"].' '.$userData["lastName"]; ?></td>
                    <td><span class="label label-warning"><?PHP echo getOrderStatus($rowOrder["orderStatus"]); ?></span></td>
                     <td>Rs. <?PHP echo $rowOrder["paybleAmount"]; ?></td>
                    <td><a href="orderManage.php?orderId=<?PHP echo $rowOrder["id"]; ?>">View</a></td>
                  </tr>
                  <?PHP } 
                  }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Order Time</th>
                  <th>User</th>
                  <th>Status</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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
<script src="AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      "order": [[ 1, "desc" ]],
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>