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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Users</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                <tr>
                  <th>S.No.</th><th>Name</th><th>Phone</th><th>Email Id</th><th>City</th><th>Points</th><th>Last Login IP</th><th>Action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM `admin` ORDER BY `name` ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                      $i++;
                ?>
                <tr>
                  <td><?PHP echo $i; ?></td>
                  <td><?PHP echo $row["name"]; ?></td>
                  <td><?PHP echo $row["phone"]; ?></td>
                  <td><?PHP echo $row["email"]; ?></td>
                  <td><?PHP echo $row["city"]; ?></td>
                  <td><?PHP echo $row["points"]; ?></td>
                  <td><?PHP echo $row["lastloginip"]; ?></td>
                  <td><a href="addUser.php?id=<?PHP echo $row["id"]; ?>" class="btn btn-primary btn-sm">Edit</a></td>
                </tr>
                <?php
                   }
                }else{
                  echo "<tr><td colspan='8'>No Users Found</td></tr>";
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
