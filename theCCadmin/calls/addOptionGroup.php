<?php
require('../config/index.php');
//echo $_POST["name"];
if(isset($_POST["name"]) && !empty($_POST["name"])){
  $name = input($_POST["name"]);
  $id = input($_POST["id"]);
  if($id == 0){
    $sql = "INSERT INTO `optiongroup`(`id`, `optionGroupName`) VALUES (NULL,'$name')";
    $a = 1;
  }else{
    $sql = "UPDATE `optiongroup` SET `optionGroupName`='$name' WHERE `id` = '$id'";
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

