<?php

function input($data){
    global $conn;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($conn, $data);
  return $data;
}
function get_client_ip(){
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function get_productImage($conn, $productId){
    $sqlFeatured = "SELECT * FROM `productimages` WHERE `productId` = '$productId' ORDER BY `orderBy` ASC LIMIT 1";
        $resultFeatured = $conn->query($sqlFeatured);
        if ($resultFeatured->num_rows > 0) {
            while($rowFeatured = $resultFeatured->fetch_assoc()) {
                $image = $rowFeatured["image"];
                break;
            }
        }else{
        	$image = 'default.jpg';
        }
        return $image;
}
function get_productId($conn, $sku){
    $sqlFeatured = "SELECT * FROM `product` WHERE `productsku` = '$sku' LIMIT 1";
        $resultFeatured = $conn->query($sqlFeatured);
        if ($resultFeatured->num_rows > 0) {
            while($rowFeatured = $resultFeatured->fetch_assoc()) {
                $id = $rowFeatured["id"];
                break;
            }
        }
        return $id;
}
function get_productUrl($conn, $sku){
    $sqlFeatured = "SELECT `metaUrl` FROM `product` WHERE `productsku` = '$sku' OR `id` = '$sku' LIMIT 1";
        $resultFeatured = $conn->query($sqlFeatured);
        if ($resultFeatured->num_rows > 0) {
            while($rowFeatured = $resultFeatured->fetch_assoc()) {
                $id = $rowFeatured["metaUrl"];
                break;
            }
        }else{
            $id = '';
        }
        return $id;
}

function get_options(){

}
function get_options_id(){

}
function trim_text($text, $limit){
  if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos = array_keys($words);
      $text = substr($text, 0, $pos[$limit]) . '...';
  }
  return $text;
}
function getConfigData($conn, $name){
    $sqlFeatured = "SELECT `value` FROM `config` WHERE `name` = '$name' LIMIT 1";
    $resultFeatured = $conn->query($sqlFeatured);
    if ($resultFeatured->num_rows > 0) {
        while($rowFeatured = $resultFeatured->fetch_assoc()) {
            $id = $rowFeatured["value"];
            break;
        }
    }
    return $id;
}
function getCategoryName($conn, $id){
    $sqlFeatured = "SELECT `categoryName` FROM `productcategories` WHERE `id` = '$id' LIMIT 1";
    $resultFeatured = $conn->query($sqlFeatured);
    if ($resultFeatured->num_rows > 0) {
        while($rowFeatured = $resultFeatured->fetch_assoc()) {
            $id = $rowFeatured["categoryName"];
            break;
        }
    }
    return $id;
}
function getCategoryUrl($conn, $id){
    $sqlFeatured = "SELECT `categoryUrl` FROM `productcategories` WHERE `id` = '$id' LIMIT 1";
    $resultFeatured = $conn->query($sqlFeatured);
    if ($resultFeatured->num_rows > 0) {
        while($rowFeatured = $resultFeatured->fetch_assoc()) {
            $id = $rowFeatured["categoryUrl"];
            break;
        }
    }
    return $id;
}
function getOptionGroupName($conn, $id){
    $sqlFeatured = "SELECT `optionGroupName` FROM `optiongroup` WHERE `id` = '$id' LIMIT 1";
        $resultFeatured = $conn->query($sqlFeatured);
        if ($resultFeatured->num_rows > 0) {
            while($rowFeatured = $resultFeatured->fetch_assoc()) {
                $id = $rowFeatured["optionGroupName"];
                break;
            }
        }
        return $id;
}
function getOptionName($conn, $id){
    $sqlFeatured = "SELECT `optionName` FROM `options` WHERE `id` = '$id' LIMIT 1";
        $resultFeatured = $conn->query($sqlFeatured);
        if ($resultFeatured->num_rows > 0) {
            while($rowFeatured = $resultFeatured->fetch_assoc()) {
                $id = $rowFeatured["optionName"];
                break;
            }
        }
        return $id;
}
function getSellerName($conn, $id){
    $sqlFeatured = "SELECT `name` FROM `admin` WHERE `id` = '$id' LIMIT 1";
        $resultFeatured = $conn->query($sqlFeatured);
        if ($resultFeatured->num_rows > 0) {
            while($rowFeatured = $resultFeatured->fetch_assoc()) {
                $id = $rowFeatured["name"];
                return $id;
                break;
            }
        }
}
function getUserMobile($conn, $id){
    $sqlFeatured = "SELECT `userPhone` FROM `users` WHERE `id` = '$id' LIMIT 1";
        $resultFeatured = $conn->query($sqlFeatured);
        if ($resultFeatured->num_rows > 0) {
            while($rowFeatured = $resultFeatured->fetch_assoc()) {
                $id = $rowFeatured["userPhone"];
                return $id;
                break;
            }
        }
}
function getOrderNumber($conn){
    $sqlFeatured = "SELECT max(`orderNo`) AS `orderno` FROM `orders`";
        $resultFeatured = $conn->query($sqlFeatured);
        if ($resultFeatured->num_rows > 0) {
            while($rowFeatured = $resultFeatured->fetch_assoc()) {
                $id = $rowFeatured["orderno"]+1;
                return $id;
                break;
            }
        }
}
function checkforOptions($conn, $id){
    $sqlFeatured = "SELECT `id` FROM `productoption` WHERE `productId` = '$id'";
        $resultFeatured = $conn->query($sqlFeatured);
        return $resultFeatured->num_rows;
}

function get_Shipping($conn, $carttotal, $minshipping, $freesheepingLimit, $shippingCharges){
    if($carttotal > 0){
        if($carttotal < $freesheepingLimit){
            return '<i class="fa fa-rupee"></i> '.$shippingCharges;
        }else{
            return "Free";
        }
    }else{
        return 0;
    }
}

function sendSMS($phone, $message){
    $ch = curl_init();
    $user="purohit99999@gmail.com:cspx99999";
        $m1=$phone;

        $receipientno="$m1"; 
        $senderID="PANKAJ"; 

        $msgtxt=$message; 

        curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
        $buffer = curl_exec($ch);
        if(empty ($buffer)){ return false; }
        else{ return true; } 
        curl_close($ch);
}
function getUserDetails($conn, $id, $data){
    $sqlFeatured = "SELECT `$data` FROM `users` WHERE `id` = '$id' LIMIT 1";
    $resultFeatured = $conn->query($sqlFeatured);
    if ($resultFeatured->num_rows > 0) {
        while($rowFeatured = $resultFeatured->fetch_assoc()) {
            $id = $rowFeatured[$data];
            break;
        }
    }
    return $id;
}
function isLogin(){
    if(isset($_SESSION["userId"]) && isset($_SESSION["userKey"]) && isset($_SESSION["localId"]) && !empty($_SESSION["userId"]) && !empty($_SESSION["userKey"]) && !empty($_SESSION["localId"])){
        return true;
    }else{
        return false;
    }
}
?>