<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>The Chandni Chowk - Vendor's Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="AdminLTE/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../"><b>The Chandni Chowk</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Welcome to <b>Vendor's Panel</b><br> Please Sign In to Proceed</p>
    <?PHP if(isset($_GET["error"]) && !isset($_GET["blocked"])){ ?>
    <div class="alert alert-danger alert-dismissible">
      <h4><i class="icon fa fa-ban"></i> Error!</h4>
      Invalid Credentials, Enter Valid Email Id and Password 
    </div>
    <?PHP } ?>
    <?PHP if(isset($_GET["error"]) && isset($_GET["blocked"])){ ?>
    <div class="alert alert-danger alert-dismissible">
      <h4><i class="icon fa fa-ban"></i> Blocked!</h4>
      Your Account was Blocked by Admin, Kindly contact Administrator. 
    </div>
    <?PHP } ?>
    <form action="loginAction.php" method="POST" id="formLogin">
      <div class="form-group has-feedback <?PHP if(isset($_GET["error"])){ echo "has-error";} ?>">
        <input type="test" class="form-control" id="email" name="email" placeholder="Email / Mobile No">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback <?PHP if(isset($_GET["error"])){ echo "has-error";} ?>">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>

        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" id="doLogin" class="btn btn-primary btn-block btn-flat" value="Sign In">
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script>
$('#doLogin').on('click', function(e){
  $('#formLogin').submit();
});
<?PHP 
if(isset($_GET["error"])){ 
?>
$('#email').attr('id', 'inputError');
$('#password').attr('id', 'inputError');

<?PHP } ?>
</script>
</body>
</html>
