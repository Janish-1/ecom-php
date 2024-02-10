<?php
include('../libs/index.php');

if(isset($_POST["uniqueVisitorId"])){
	$uniqueVisitorId = $_POST["uniqueVisitorId"];
	$ip = get_client_ip();
	$systeminfo = $_SERVER['HTTP_USER_AGENT'];
	$sql = "INSERT INTO `visitors`(`id`, `uniqueUserId`, `ip`, `systeminfo`) VALUES (NULL, '$uniqueVisitorId', '$ip', '$systeminfo')";
	$conn->query($sql);
}
?>