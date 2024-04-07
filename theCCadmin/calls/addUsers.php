<?php
require('../config/index.php');
//echo $_POST["name"];
if(isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["phone"]) && !empty($_POST["phone"])){
  $name = input($_POST["name"]);
  $id = input($_POST["id"]);
  $email = input($_POST["email"]);
  $password = $passwordM = input($_POST["password"]);
  $phone = input($_POST["phone"]);
  $address = input($_POST["address"]);
  $city = input($_POST["city"]);
  $gstin = input($_POST["gstin"]);
  $comission = input($_POST["comission"]);
  $password = md5($password);  
  if($id == 0){
    $sql = "INSERT INTO `admin`(`id`, `email`, `phone`, `password`, `name`, `address`, `city`, `gstin`, `lastloginip`, `points`, `blocked`, `reason`, `admin`, `comission`) VALUES (NULL, '$email', '$phone', '$password', '$name', '$address', '$city', '$gstin', NULL, 0, 0, NULL, 0, '$comission')";
    $a = 1;
  }else{
    $sql = "UPDATE `admin` SET `email`='$email', `phone`='$phone',`name`='$name',`address`='$address',`city`='$city',`gstin`='$gstin', `comission` = '$comission' WHERE `id` = '$id'";
    if(!empty($passwordM)){
        $sql2 = "UPDATE `admin` SET `password`='$password' WHERE `id` = '$id'";
        $conn->query($sql2);  
    }
    $a = 0;
  }
 
  if($conn->query($sql)){
    if($id == 0){
     $id = $conn->insert_id;
    }
    $data = array();
    $data["id"] = $id;
    $data["type"] = $a;
    echo json_encode($data);
  }
}
?>

