<?php

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
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

function get_options(){

}
function get_options_id(){

}

function listOptionGroups($conn){
    $sqlFeatured = "SELECT * FROM `optiongroup` ORDER BY `optionGroupName` ASC";
    $resultFeatured = $conn->query($sqlFeatured);
    if ($resultFeatured->num_rows > 0) {
        while($rowFeatured = $resultFeatured->fetch_assoc()) {
            echo "<option value='".$rowFeatured["id"]."'>".$rowFeatured["optionGroupName"]."</option>";
        }
    }
}
function getOptionGroupName($conn,$id){
    $sqlFeatured = "SELECT * FROM `optiongroup` WHERE `id` = '$id' LIMIT 1";
    $resultFeatured = $conn->query($sqlFeatured);
    if ($resultFeatured->num_rows > 0) {
        while($rowFeatured = $resultFeatured->fetch_assoc()) {
            return $rowFeatured["optionGroupName"];
        }
    }   
}

function listCategoryParent($conn){
    $sqlFeatured = "SELECT * FROM `productcategories` WHERE `categoryParent` = 0 ORDER BY `categoryName` ASC";
    $resultFeatured = $conn->query($sqlFeatured);
    if ($resultFeatured->num_rows > 0) {
        while($rowFeatured = $resultFeatured->fetch_assoc()) {
            echo "<option value='".$rowFeatured["id"]."'>".$rowFeatured["categoryName"]."</option>";
        }
    }
}
function listCategory($conn){
    $sqlFeatured = "SELECT * FROM `productcategories` ORDER BY `categoryParent` ASC, `categoryName` ASC";
    $resultFeatured = $conn->query($sqlFeatured);
    if ($resultFeatured->num_rows > 0) {
        while($rowFeatured = $resultFeatured->fetch_assoc()) {
            echo "<option value='".$rowFeatured["id"]."'>".$rowFeatured["categoryName"]."</option>";
        }
    }
}
function getCategoryName($conn,$id){
    if($id == 0){
        return "Parent";
    }else{
        $sqlFeatured = "SELECT * FROM `productcategories` WHERE `id` = '$id' LIMIT 1";
        $resultFeatured = $conn->query($sqlFeatured);
        if ($resultFeatured->num_rows > 0) {
            while($rowFeatured = $resultFeatured->fetch_assoc()) {
                return $rowFeatured["categoryName"];
            }
        }   
    }
}
function check_user_Acpermission($conn, $user){
    $sqlclass = "SELECT * FROM `permission` WHERE `user` = '$user'";
        $resultclass = $conn->query($sqlclass);
    $a = '';
    $i = 0;
    if ($resultclass->num_rows > 0) {
        while($rowclass = $resultclass->fetch_assoc()) {
        $i++;
            $a .= "'".$rowclass["roles"]."'";
            if($resultclass->num_rows != $i){
                $a .= ', ';
            }
        }
    }else{
        $a = '';
    }
    return $a;
}
function get_userName($conn, $userid){
    $sqlclass = "SELECT * FROM `admin` WHERE `id` = '$userid'";
    $resultclass = $conn->query($sqlclass);
    if ($resultclass->num_rows > 0) {
                // output data of each row
                while($rowclass = $resultclass->fetch_assoc()) {
                    return $rowclass["name"];
                }
    }
}
function check_user_permission($conn, $user, $page){
    $sqlclass = "SELECT * FROM `permission` WHERE `roles` = '$page' AND `user` = '$user'";
        $resultclass = $conn->query($sqlclass);
    if ($resultclass->num_rows > 0) {
        return true;
    }else{
        return false;
    }
}
function makeThumbnail($sourcefile,$max_width, $max_height, $endfile, $type){
    //IMAGE RESIZER
            switch($type){
                case'image/png':
                    $img = imagecreatefrompng($sourcefile);
                    break;
                    case'image/jpeg':
                    $img = imagecreatefromjpeg($sourcefile);
                    break;
                    case'image/gif':
                    $img = imagecreatefromgif($sourcefile);
                    break;
                    default : 
                    return 'Un supported format';
            }
            $width = imagesx( $img );
            $height = imagesy( $img );
            
            if ($width > $height) {
                if($width < $max_width)
                    $newwidth = $width;
                
                else
                
                $newwidth = $max_width; 
                
                
                $divisor = $width / $newwidth;
                $newheight = floor( $height / $divisor);
            }
            else {
                
                 if($height < $max_height)
                     $newheight = $height;
                 else
                     $newheight =  $max_height;
                 
                $divisor = $height / $newheight;
                $newwidth = floor( $width / $divisor );
            }

            $tmpimg = imagecreatetruecolor( $newwidth, $newheight );
            
                imagealphablending($tmpimg, false);
                imagesavealpha($tmpimg, true);
                
            imagecopyresampled( $tmpimg, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            
            switch($type){
                case'image/png':
                    imagepng($tmpimg, $endfile, 0);
                    break;
                case'image/jpeg':
                    imagejpeg($tmpimg, $endfile, 90);
                    break;
                case'image/gif':
                    imagegif($tmpimg, $endfile, 0);
                    break;  
            }
               imagedestroy($tmpimg);
               imagedestroy($img);
}
function getIpAddress() {
     $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                // trim for safety measures
                $ip = trim($ip);
                // attempt to validate IP
                if (validate_ip($ip)) {
                    return $ip;
                }
            }
        }
    }
    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}
function validate_ip($ip){
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}
function get_lastLoginDetails($conn, $userid){
    $sqlclass = "SELECT * FROM `adminlogintable` WHERE `user` = '$userid' ORDER BY `id` DESC LIMIT 1";
    $resultclass = $conn->query($sqlclass);
    if ($resultclass->num_rows > 0) {
                $data = array();
                while($rowclass = $resultclass->fetch_assoc()) {
                    $data["ip"] = $rowclass["ip"];
                    $data["system"] = $rowclass["system"];
                    $data["dateTime"] = $rowclass["dateTime"];
                }
                return $data;
    }
}
function getOrderStatus($status){
    switch ($status) {
        case 0:
            return "Cancelled";
            break;
        case 1:
            return "Pending";
            break;
        case 2:
            return "Confirmed";
            break;
        case 3:
            return "Shipped from Vendor";
            break;
        case 4:
            return "Dispached & In Transist";
            break;
        case 5:
            return "Deliverd";
            break;
        case 6:
            return "Return Requested";
            break;
        case 7:
            return "Return Accepted";
            break;
        case 8:
            return "Pickup Scheduled";
            break;
        case 9:
            return "Picked Up & Processing";
            break;
        case 10:
            return "Money Refunded";
            break;
        case 11:
            return "Recived in Inventory";
            break;
        case 12:
            return "Return Denied";
            break;
        default:
            return "Error";
            break;
    }
}

function getUserData($conn, $id){
    $sqlclass = "SELECT * FROM `users` WHERE `id` = '$id' LIMIT 1";
    $resultclass = $conn->query($sqlclass);
    if ($resultclass->num_rows > 0) {
                $data = array();
                while($rowclass = $resultclass->fetch_assoc()) {
                    $data["firstName"] = $rowclass["firstName"];
                    $data["lastName"] = $rowclass["lastName"];
                    $data["userPhone"] = $rowclass["userPhone"];
                    $data["userEmail"] = $rowclass["userEmail"];
                }
                return $data;
    }
}

function getOrderAddresss($conn, $id){
    $sqlclass = "SELECT * FROM `users_address` WHERE `id` = '$id' LIMIT 1";
    $resultclass = $conn->query($sqlclass);
    if ($resultclass->num_rows > 0) {
                $data = array();
                while($rowclass = $resultclass->fetch_assoc()) {
                    $data["firstname"] = $rowclass["firstname"];
                    $data["lastname"] = $rowclass["lastname"];
                    $data["streetaddress"] = $rowclass["streetaddress"];
                    $data["streetaddress2"] = $rowclass["streetaddress2"];
                    $data["city"] = $rowclass["city"];
                    $data["state"] = $rowclass["state"];
                    $data["pincode"] = $rowclass["pincode"];
                    $data["contactno"] = $rowclass["contactno"];
                    $data["contactno2"] = $rowclass["contactno2"];
                    $data["email"] = $rowclass["email"];
                }
                return $data;
    }
}
function getProductData($conn,$id){
    $sqlFeatured = "SELECT * FROM `product` WHERE `id` = '$id' LIMIT 1";
    $resultFeatured = $conn->query($sqlFeatured);
    if ($resultFeatured->num_rows > 0) {
        $data = array();
        while($rowFeatured = $resultFeatured->fetch_assoc()) {
            $data["productsku"] =  $rowFeatured["productsku"];
            $data["productName"] =  $rowFeatured["productName"];
            $data["productSell"] =  $rowFeatured["productSell"];
            $data["productComission"] =  $rowFeatured["productComission"];
            $data["productTotal"] =  $rowFeatured["productTotal"];
            $data["productCategory"] =  $rowFeatured["productCategory"];
            $data["productUser"] =  $rowFeatured["productUser"];
            $data["metaUrl"] =  $rowFeatured["metaUrl"];
            $data["productStock"] =  $rowFeatured["productStock"];
        }
        return $data;
    }   
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
?>