<?php
include('header.php');
if(isset($_GET["id"]) && !empty($_GET["id"])){
$Gid = $_GET["id"];
        
    $sqlUser = "SELECT * FROM `admin` WHERE `id` = '$Gid' LIMIT 1";
    $resultUser = $conn->query($sqlUser);
    if ($resultUser->num_rows > 0) {
        while($rowUser = $resultUser->fetch_assoc()) {
            $Gname = $rowUser["name"];
            $Gid = $rowUser["id"];
            $Gemail = $rowUser["email"];
            $Gphone = $rowUser["phone"];
            $Gaddress = $rowUser["address"];
            $Gcity = $rowUser["city"];
            $Ggstin = $rowUser["gstin"];
            $Gcomission = $rowUser["comission"];
        }
    }
}else{
  $Gname = '';
  $Gid = 0;
  $Gemail = '';
  $Gphone = '';
  $Gaddress = '';
  $Gcity = '';
  $Ggstin = '';
  $Gcomission = '';
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
      <h1>Add Users</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Users</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" id="optionForm">
              <input type="hidden" name="userId" id="userId" value="<?PHP echo $Gid; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="optionname">Name</label>
                  <input type="text" autocomplete="off" class="form-control" id="name" placeholder="Name" value="<?PHP echo $Gname; ?>" required>
                </div>
                <div class="form-group">
                  <label for="optionname">Email</label>
                  <input type="email" autocomplete="off" class="form-control" id="email" placeholder="Email Id" value="<?PHP echo $Gemail; ?>" required>
                </div>
                <div class="form-group">
                  <label for="optionname">Phone</label>
                  <input type="text" autocomplete="off" class="form-control" id="phone" placeholder="Phone No" value="<?PHP echo $Gphone; ?>" required>
                </div>
                <div class="form-group">
                  <label for="optionname">City</label>
                  <input type="text" autocomplete="off" class="form-control" id="city" placeholder="City" value="<?PHP echo $Gcity; ?>" required>
                </div>
                <div class="form-group">
                  <label for="optionname">Address</label>
                  <textarea autocomplete="off" class="form-control" id="address" placeholder="Address" required><?PHP echo $Gaddress; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="optionname">GSTIN</label>
                  <input type="text" autocomplete="off" class="form-control" id="gstin" placeholder="GSTIN" value="<?PHP echo $Ggstin; ?>" required>
                </div>
                <div class="form-group">
                  <label for="optionname">Password</label>
                  <input type="text" autocomplete="off" class="form-control" id="password" placeholder="Password" value="" <?PHP if(!isset($_GET["id"])){ echo "required"; } ?> >
                </div>
                <div class="form-group">
                  <label for="optionname">Comission</label>
                  <input type="text" autocomplete="off" class="form-control" id="comission" placeholder="Comission in %" value="<?PHP echo $Gcomission; ?>" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary optionAdd">Submit</button>
              </div>
            </form>
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

  $('#optionForm').submit(function(){
  	  var userId = $('#userId').val();
      var name = $('#name').val();
      var email = $('#email').val();
      var password = $('#password').val();
      var address = $('#address').val();
      var city = $('#city').val();
      var gstin = $('#gstin').val();
      var phone = $('#phone').val();
      var comission = $('#comission').val();
      
      $.ajax({
          url: 'calls/addUsers.php',
          type: 'POST',
          dataType: 'json', 
          data: {
            name: name,
            id: userId,
            password: password,
            email: email,
            phone: phone,
            address: address,
            city: city,
            gstin: gstin,
            comission: comission
          },            
          success: function (response) {
          	//console.log(response);
              gotoPage('manageUsers.php');
          }
      });
      alert(response);
      //e.preventDefault();
  });
</script>