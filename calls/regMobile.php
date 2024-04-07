<?php
require('../libs/index.php');
if(isset($_POST["sessionId"])){
	$sessionId = $_POST["sessionId"];
	$ip = get_client_ip();
	if(isset($_POST["regMobile"]) && !empty($_POST["regMobile"]) && isset($_POST["regpassword"]) && !empty($_POST["regpassword"]) && $_POST["type"] == 1){
		$regMobile = $_POST["regMobile"];
		$regPassword = sha1(md5($_POST["regpassword"]));
		$otp = rand(1000, 9999);
		$sql1 = "SELECT * FROM `users` WHERE `userPhone` = '$regMobile' LIMIT 1";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0) {
			while($row1 = $result1->fetch_assoc()){
				if(!empty($row1["firstName"])){
					echo 2;
				}else{
					$otp = $row1["regOtp"];
					$message = "$otp is your verification OTP for TheChandniChowk.com";
					if(sendSMS($regMobile, $message)){
						echo 1;	
					}
				}
			}
		}else{
			$sql = "INSERT INTO `users`(`userPhone`, `userKey`, `ip`, `regOtp`, `regId`, `status`) VALUES ('$regMobile', '$regPassword', '$ip', '$otp', '$sessionId', '0')";
			if($conn->query($sql)){
				$message = "$otp is your verification OTP for TheChandniChowk.com";
				if(sendSMS($regMobile, $message)){
					echo 1;	
				}
			}
		}
	}


	if(isset($_POST["regMobile"]) && !empty($_POST["regMobile"]) && isset($_POST["mobile_otp"]) && !empty($_POST["mobile_otp"]) && $_POST["type"] == 2){
		$regMobile = $_POST["regMobile"];
		$mobile_otp = $_POST["mobile_otp"];
		$sql1 = "SELECT * FROM `users` WHERE `userPhone` = '$regMobile' AND `regOtp` = '$mobile_otp' LIMIT 1";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0) {
			while($row1 = $result1->fetch_assoc()){
				$_SESSION["userId"] = $row1["id"];
				$_SESSION["userKey"] = md5($row1["userPhone"]);
				$_SESSION["localId"] = $sessionId;
			}
			$sqlUp = "UPDATE `users` SET `ip`= '$ip', `userCredits`= '0', `regId`= '$sessionId', `status`='1' WHERE `userPhone` = '$regMobile' AND `regOtp` = '$mobile_otp'";
			if($conn->query($sqlUp)){
				echo 1;
			}
		}else{
			echo 2;
		}
	}
}
?>

