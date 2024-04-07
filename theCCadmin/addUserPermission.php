<?php
include('header.php');
if(isset($_POST["roles"])){
    $roles = $_POST["roles"];
    $userid = $_POST["userId"];
  $arraySize = count($roles);
  for($i=0; $i<$arraySize;$i++){
    //echo $roles[$i];
    $sqlrole = "INSERT INTO `permission`(`id`, `roles`, `user`) VALUES ('', '$roles[$i]', '$userid')";
    $conn->query($sqlrole);
  }
  echo "<script>goto_page('users.php?success');</script>";
}else{
  echo "<script>goto_page('users.php');</script>";
}
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add User Permission</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User Permission</h3>
            </div>
            <div class="box-body">
            <form method="POST">
                  <div class="form-group col-md-5">
                  <label for="optionname">Name</label>
                  <select class="form-control" id="userId" name="userId" required>
                    <option value="">Select User</option>
                    <?PHP
                    $sqlsec = "SELECT * FROM `admin` ORDER BY `name`";
                    $resultsec = $conn->query($sqlsec);
                    if ($resultsec->num_rows > 0) {
                        while($rowsec = $resultsec->fetch_assoc()) {
                          echo "<option value='".$rowsec["id"]."'>".$rowsec["name"]." - ".$rowsec["email"]."</option>";
                        }
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-12"></div>
                <div class="form-group col-md-5">
                <?php
                $Acpermission = check_user_Acpermission($conn, $user);
                $sqlsec = "SELECT * FROM `roles` ";
                if($_SESSION["admin"] != 1){
                  $sqlsec .= " WHERE `roles` IN ($Acpermission)";
                }
                $sqlsec .= " ORDER BY `rolename`";
                $resultsec = $conn->query($sqlsec);
                if ($resultsec->num_rows > 0) {
                    while($rowsec = $resultsec->fetch_assoc()) {
                ?>
                  <div class="checkbox">
                    <label>
                      <input value="<?PHP echo $rowsec["roles"]; ?>" type="checkbox" name="roles[]">
                      <?PHP echo $rowsec["rolename"]; ?>
                    </label>
                  </div>
                <?php
                    }
                }
                ?>
                </div>
                <div class="box-footer col-md-12">
                  <button type="submit" class="btn btn-primary optionAdd">Submit</button>
                </div>
            </form>    
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
