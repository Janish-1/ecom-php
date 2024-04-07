<?php
include('../libs/index.php');

if(isset($_POST["pincode"])){
	$pincode = $_POST["pincode"];
	$sql = "SELECT * FROM `pincodes` WHERE `pincode` = '$pincode' LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			if($row["paymode"] == 1){
				echo "ok";	
			}else{
				echo "na";
			}
		}
	}else{
		echo "ne";
	}
}

?>