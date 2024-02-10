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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Option Groups</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Option Group</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <input type="hidden" name="optionGroupId" id="optionGroupId" value="<?PHP echo $Gid; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="optiongroupname">Option Group Name</label>
                  <input type="text" autocomplete="off" class="form-control" id="optionGroupName" placeholder="Group Name" value="<?PHP echo $Gname; ?>" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary optionGroupAdd">Submit</button>
              </div>
            </form>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Option Group</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                <tr>
                  <th>S.No.</th><th>Group Name</th><th>Action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM `optiongroup` ORDER BY `optionGroupName` ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                      $i++;
                ?>
                <tr>
                  <td><?PHP echo $i; ?></td>
                  <td><?PHP echo $row["optionGroupName"]; ?></td>
                  <td><a href="?id=<?PHP echo $row["id"]; ?>&name=<?PHP echo $row["optionGroupName"]; ?>" class="btn btn-primary btn-sm">Edit</a> <a href="?id=<?PHP echo $row["id"]; ?>&name=<?PHP echo $row["optionGroupName"]; ?>&delete&did" class="deleteOptionGroup btn btn-danger btn-sm">Delete</button></td>
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

  $('.optionGroupAdd').on('click', function(e){
      e.preventDefault();
      var optionGroupId = $('#optionGroupId').val();
      var optionGroupName = $('#optionGroupName').val();
      $.post("calls/addOptionGroup.php",{
        name: optionGroupName,
        id: optionGroupId
      },function(data, status){
        gotoPage('<?PHP echo basename($_SERVER['PHP_SELF']); ?>');
      });
  });
</script>