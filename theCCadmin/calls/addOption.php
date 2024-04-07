<?php
require('../config/index.php');
//echo $_POST["name"];
if(isset($_POST["name"]) && !empty($_POST["name"])){
  $name = input($_POST["name"]);
  $id = input($_POST["id"]);
  $group = input($_POST["group"]);
  
  if($id == 0){
    $sql = "INSERT INTO `options`(`id`, `optionName`, `optionGroup`) VALUES (NULL, '$name', '$group')";
    $a = 1;
  }else{
    $sql = "UPDATE `options` SET `optionName`='$name', `optionGroup` = '$group' WHERE `id` = '$id'";
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

