<?php
if(!isset($_SESSION)){
  session_start();
}
$_SESSION["username"] = "";
$_SESSION["password"] = "";
$_SESSION["login"] = 0;

session_unset();
session_destroy();
header('Location: login.php?logout');
exit();
?>