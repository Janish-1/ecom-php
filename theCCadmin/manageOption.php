<?php
include('header.php');
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["name"]) && !empty($_GET["name"])){
  $Gname = $_GET["name"];
  $Gid = $_GET["id"];
  $group = $_GET["group"];
  //
  echo "<script>$('#optionForm option:eq(".$group.")').prop('selected', true)</script>";
}else{
  $Gname = '';
  $Gid = 0;
}
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["name"]) && !empty($_GET["name"]) && isset($_GET["did"]) && isset($_GET["delete"])){
  $Gname = $_GET["name"];
  $Gid = $_GET["id"];
  $sqlDelete = "DELETE FROM `options` WHERE `id` = '$Gid'";
  if($conn->query($sqlDelete)){
    echo "<script>gotoPage('". basename($_SERVER['PHP_SELF']) ."');</script>";
  }
}

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Options</h1>
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
            <form role="form" id="optionForm">
              <input type="hidden" name="optionId" id="optionId" value="<?PHP echo $Gid; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="optionname">Option Name</label>
                  <input type="text" autocomplete="off" class="form-control" id="optionName" placeholder="Option Name" value="<?PHP echo $Gname; ?>" required>
                </div>
                <div class="form-group">
                  <label for="optiongroup">Option Group</label>
                  <select autocomplete="off" class="form-control" id="optionGroup"  required>
                    <option value="">Select</option>
                    <?PHP echo listOptionGroups($conn); ?>
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
              <h3 class="box-title">Manage Option Group</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                <tr>
                  <th>S.No.</th><th>Option Name</th><th>Group Name</th><th>Action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM `options` ORDER BY `optionGroup` ASC, `optionName` ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                      $i++;
                ?>
                <tr>
                  <td><?PHP echo $i; ?></td>
                  <td><?PHP echo $row["optionName"]; ?></td>
                  <td><?PHP echo getOptionGroupName($conn,$row["optionGroup"]); ?></td>
                  <td><a href="?id=<?PHP echo $row["id"]; ?>&name=<?PHP echo $row["optionName"]; ?>&group=<?PHP echo $row["optionGroup"]; ?>" class="btn btn-primary btn-sm">Edit</a> <a href="?id=<?PHP echo $row["id"]; ?>&name=<?PHP echo $row["optionName"]; ?>&group=<?PHP echo $row["optionGroup"]; ?>&delete&did" class="deleteOptionGroup btn btn-danger btn-sm">Delete</button></td>
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
      var optionId = $('#optionId').val();
      var optionName = $('#optionName').val();
      var optionGroup = $('#optionGroup').val();
      $.post("calls/addOption.php",{
        name: optionName,
        id: optionId,
        group: optionGroup
      },function(data, status){
        gotoPage('<?PHP echo basename($_SERVER['PHP_SELF']); ?>');
      });
  });
</script>
<?PHP
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["name"]) && !empty($_GET["name"])){
  $group = $_GET["group"];
  echo "<script>$('#optionForm option[value=".$group."]').prop('selected', true)</script>";
} ?>