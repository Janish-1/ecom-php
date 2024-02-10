<?php
require('../config/index.php');
//print_r($_FILES);
$files = array();
$productId = $_POST["productId"];
foreach($_FILES as $file){
  if(isset($file['tmp_name'])){
      if($file['tmp_name'] && $file['error'] === 0){
        //SET
          $sourcefile= $file['tmp_name'];
          $filea= $file['name'];
          $ext = pathinfo($filea, PATHINFO_EXTENSION);
          $prefix = $productId."_".time().".".$ext;
          $endfile= "../../product/".$prefix;
          $type= $file['type'];
          makeThumbnail($sourcefile, $max_width=800, $max_height=800, $endfile, $type);
        $aadharimage = $prefix;
        
        $sql = "INSERT INTO `productimages`(`id`, `productId`, `image`, `orderBy`) VALUES (NULL, '$productId', '$aadharimage', '0')";
        $conn->query($sql);
      }
    }else{
      echo "NO file";
    }
}
?>

