<?php
require('../config/index.php');

$imageids_arr = $_POST['imageids'];
$productId = $_POST['productId'];

// Update sort position of images
$position = 1;
foreach($imageids_arr as $id){
  mysqli_query($conn,"UPDATE `productimages` SET `orderBy`=".$position." WHERE `id`=".$id);
  echo "$id";
  $position ++;
}

echo "Update successfully";
exit;
?>

