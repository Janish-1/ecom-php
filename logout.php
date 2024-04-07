<?PHP
session_start();
unset($_SESSION["userId"]);
unset($_SESSION["sessionId"]);
session_destroy();
echo "<script>location.replace('index.php');</script>";
exit();
?>