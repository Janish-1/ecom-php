<?php
include('../libs/index.php');

if(isset($_POST["data_id"]) && isset($_POST["data_user"]) && !empty($_POST["data_id"]) && !empty($_POST["data_user"])){

	$id = $_POST["data_id"];
	$user = $_POST["data_user"];
	$option = $_POST["data_option"];
	$price = $_POST["data_price"];
	$productName = $_POST["data_name"];
	if(isset($_SESSION["userId"])){
		$userIdLogin = $_SESSION["userId"];
	}else{
		$userIdLogin = NULL;
	}

	$sqlFind = "SELECT `id` FROM `cartitem` WHERE `uniqueuserid` = '$user' AND `productid` = '$id' AND `productOption` = '$option' AND `active` = 1";
	$resultFind = $conn->query($sqlFind);
	if($resultFind->num_rows > 0){   
		$sql = "UPDATE `cartitem` SET `productQuantity` = `productQuantity` + '1', `productTotal` = `productTotal`+'$price'  WHERE `uniqueuserid` = '$user' AND `productid` = '$id' AND `productOption` = '$option'  AND `active` = 1";
		$conn->query($sql);
		$return = 0;
	}else{
		$sql = "INSERT INTO `cartitem`(`id`, `uniqueuserid`, `userid`, `productid`, `productName`, `productOption`, `productPrice`, `productQuantity`, `productTotal`, `active`) VALUES (NULL, '$user', '$userIdLogin', '$id', '$productName', '$option', '$price', '1', '$price', '1')";
		$conn->query($sql);
		$return = 1;
	}
	echo $return;
//	echo "ok";
//	echo $conn->error;
}
?>