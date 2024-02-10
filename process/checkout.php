<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/phpmailer/src/Exception.php';
require '../assets/phpmailer/src/PHPMailer.php';
require '../assets/phpmailer/src/SMTP.php';
include('../libs/index.php');

if(isset($_POST)){
    if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && isset($_POST["sessionId"]) && !empty($_POST["sessionId"])){
        if(isset($_POST["firstname"])){
            $o_firstname = $_POST["firstname"];
        }else{
            $o_firstname = '';
        }
        if(isset($_POST["lastname"])){
            $o_lastname = $_POST["lastname"];
        }else{
            $o_lastname = '';
        }
        if(isset($_POST["address1"])){
            $o_address1 = $_POST["address1"];
        }else{
            $o_address1 = '';
        }
        if(isset($_POST["address2"])){
            $o_address2 = $_POST["address2"];
        }else{
            $o_address2 = '';
        }
        if(isset($_POST["city"])){
            $o_city = $_POST["city"];
        }else{
            $o_city = '';
        }
        if(isset($_POST["state"])){
            $o_state = $_POST["state"];
        }else{
            $o_state = '';
        }
        if(isset($_POST["pincode"])){
            $o_pincode = $_POST["pincode"];
        }else{
            $o_pincode = '';
        }
        if(isset($_POST["contact2"])){
            $o_contact2 = $_POST["contact2"];
        }else{
            $o_contact2 = '';
        }
        if(isset($_POST["email"])){
            $o_email = $_POST["email"];
        }else{
            $o_email = '';
        }
        if(isset($_POST["carttotal"])){
            $o_carttotal = $_POST["carttotal"];
        }else{
            $o_carttotal = 0;
        }
        if(isset($_POST["shipping"])){
            $o_shipping = $_POST["shipping"];
        }else{
            $o_shipping = 0;
        }
        if(isset($_POST["wallet"])){
            $o_wallet = $_POST["wallet"];
        }else{
            $o_wallet = 0;
        }
        if(isset($_POST["cashback"])){
            $o_cashback = $_POST["cashback"];
        }else{
            $o_cashback = 0;
        }
        if(isset($_POST["payable"])){
            $o_payable = $_POST["payable"];
        }else{
            $o_payable = 0;
        }
        if(isset($_POST["promo"])){
            $o_promo = $_POST["promo"];
        }else{
            $o_promo = '';
        }
        if(isset($_POST["payment_method"])){
            $o_payment_method = $_POST["payment_method"];
        }else{
            $o_payment_method = '';
        }
        if(isset($_POST["sessionId"])){
  		 	$uniqueVisitorId = $sessionId = $_POST["sessionId"];
        }else{
            $uniqueVisitorId = $sessionId = '';
        }
        $ip = get_client_ip();
        $userId = $_SESSION["userId"];
        $userMobile = getUserMobile($conn, $userId);
        $orderNo = getOrderNumber($conn);

        if(empty(getUserDetails($conn, $userId, 'firstName'))){
            $sqlUpdateUser = "UPDATE `users` SET `firstName`='$o_firstname',`lastName`='$o_lastname' WHERE `id` = '$userId'";
            $conn->query($sqlUpdateUser);
        }
        $sqlAddress= "INSERT INTO `users_address`( `userId`, `firstname`, `lastname`, `streetaddress`, `streetaddress2`, `city`, `state`, `pincode`, `contactno2`, `email`) VALUES ( '$userId', '$o_firstname', '$o_lastname', '$o_address1', '$o_address2', '$o_city', '$o_state', '$o_pincode', '$o_contact2', '$o_email')";
        if ($conn->query($sqlAddress) === TRUE) {
            $address = $conn->insert_id;
        }else{
            $address = '';
        }
        $sqlOrder = "INSERT INTO `orders`(`orderNo`, `userid`, `sessionId`, `orderAmount`, `orderShipping`, `walletPaid`, `promoApplied`, `cashback`, `paybleAmount`, `orderAddress`, `orderPaymentType`, `ip`) VALUES ('$orderNo', '$userId', '$sessionId', '$o_carttotal', '$o_shipping', '$o_wallet', '$o_promo', '$o_cashback', '$o_payable', '$address', '$o_payment_method', '$ip')";
        if ($conn->query($sqlOrder) === TRUE) {
            $orderId = $conn->insert_id;

            $message = "The Chandni Chowk: Thanks for shopping with us! Your order #".$orderNo." is recived of Amount Rs.".$o_payable.", and will be shipped once it will Confirmed by Us.";
            sendSMS($userMobile, $message);

            if($o_email != ''){
                /*
                $subject = "Order Recived #".$orderNo;
                $to = $o_email;
                $url = $url."process/sendMail.php?sessionId=".$uniqueVisitorId."&mailType=orderRecive&o_firstname=".$o_lastname."&o_lastname=".$o_lastname."&o_address1=".$o_address1."&o_address2=".$o_address2."&o_city=".$o_city."&o_state=".$o_state."&o_pincode=".$o_pincode."&userMobile=".$userMobile."&o_contact2=".$o_contact2;
                $message = file_get_contents($url);
                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    //Server settings
                    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = ' mail.thechandnichowk.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'no-reply@thechandnichowk.com';                 // SMTP username
                    $mail->Password = 'theCC!@#';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('no-reply@thechandnichowk.com', 'The Chandni Chowk');
                    $mail->addAddress($o_email, $o_firstname.' '.$o_lastname);     // Add a recipient
                    $mail->addReplyTo('sales@thechandnichowk.com', 'Sales Team - The Chandni Chowk');
                    $mail->addBCC('sales@thechandnichowk.com');

                    //Attachments
                    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = $message;
                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    //echo 'Message has been sent';
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
                */
            }


            if(!empty($o_promo) && $o_cashback > 0){
                $sqlPromo = "INSERT INTO `orderpromo`(`promo`, `orderId`, `userId`, `sessionId`, `ip`, `promoOff`, `cartValue`, `totalOrder`, `promoApplied`) VALUES ('$o_promo', '$orderId', '$userId', '$sessionId', '$ip', '$o_cashback', '$o_carttotal', '$o_payable', '1')";
                $conn->query($sqlPromo);
            }
            $sql = "SELECT * FROM `cartitem` WHERE `uniqueuserid` = '$uniqueVisitorId' AND `active` = '1'";
            $result = $conn->query($sql);
            $carttotal = 0;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        $pId = get_productId($conn, $row["productid"]);
                        $pUrl = get_productURL($conn, $row["productid"]);
                        $item = $row["productName"];
                        $get_options = get_options($conn, $pId);
                        $get_optionsid = get_options_id($conn, $pId);
                        $sqlItems = "INSERT INTO `orderdetails`(`orderId`, `productId`, `productOption`, `productName`, `productPrice`, `productQuantity`, `productTotal`) VALUES ('$orderId', '$pId', '".$row["productOption"]."', '$item', '".$row["productPrice"]."', '".$row["productQuantity"]."', '".$row["productPrice"]*$row["productQuantity"]."')";
                        $conn->query($sqlItems);
                }
            }
            $sqlDelCart = "UPDATE `cartitem` SET `active` = 2 WHERE `uniqueuserid` = '$sessionId'";
            $conn->query($sqlDelCart);
            if($o_wallet > 0){
                $sqlWallet = "UPDATE `users` SET `userCredits`= `userCredits` - '$o_wallet' WHERE `id` = '$userId' AND `status` = 1 AND `userCredits` > 0";
                $conn->query($sqlWallet);    
            }
            

            header('Location: ../orderRecived.php?sessionId='.$sessionId.'&opration='.sha1($sessionId).sha1(md5($sessionId)).'&orderId='.$orderId);
        }
    }
}
?>