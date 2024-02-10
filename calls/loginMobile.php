<?php
require('../libs/index.php');
if(isset($_POST["sessionId"])){
	$sessionId = $_POST["sessionId"];
	$ip = get_client_ip();
	if(isset($_POST["loginMobile"]) && !empty($_POST["loginMobile"]) && isset($_POST["loginpassword"]) && !empty($_POST["loginpassword"]) && $_POST["type"] == 1){
		$loginMobile = $_POST["loginMobile"];
		$loginPassword = $_POST["loginpassword"];
		$pwd = sha1(md5($loginPassword));
		$sql1 = "SELECT * FROM `users` WHERE `userPhone` = '$loginMobile' LIMIT 1";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0) {
			while($row1 = $result1->fetch_assoc()){
				if($row1["userKey"] === $pwd){
					$userId = $_SESSION["userId"] = $row1["id"];
					$_SESSION["userKey"] = md5($row1["userPhone"]);
					$_SESSION["localId"] = $sessionId;
					$sqlLoginRecord = "INSERT INTO `loginRecord`( `userId`, `sessionId`, `ip`) VALUES ('$userId', '$sessionId', '$ip')";
					$conn->query($sqlLoginRecord);
					$_SESSION["userTrackId"] = $conn->insert_id;
					echo 2;
					break;
				}else{
					echo 1;
					break;
				}
			}
		}else{
			echo 1;
			break;
		}
	}
}
?>

