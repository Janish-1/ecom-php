<?php
include('../libs/index.php');
$caturl = mysqli_real_escape_string($conn,$_GET['catid']);
$caturl = input($caturl);
$caturl= strtolower($caturl);
$sqlnews10 = "SELECT `id` FROM `productcategories` WHERE `categoryUrl` = '$caturl' OR `id` = '$caturl' LIMIT 1";
$resultnews10 = $conn->query($sqlnews10);
if ($resultnews10->num_rows > 0) {
    $catid = array();
    while($rownews10 = $resultnews10->fetch_assoc()) {
        $catid[] = $cat =  $rownews10["id"];
        $sqlnews = "SELECT `id` FROM `productcategories` WHERE `categoryParent` = '$cat'";
        $resultnews = $conn->query($sqlnews);
        if ($resultnews->num_rows > 0) {
            while($rownews = $resultnews->fetch_assoc()) {
                $catid[] = $rownews["id"];
            }
        }
    }
    $catids = implode(',', $catid);
}else{
    exit();
}

$addQ = '';
if(isset($_GET["orderby"])){
	$orderby = $_GET["orderby"];
}else{
	$orderby = "0";
}
switch($orderby){
		case "date":{
			$addQ = "`productDate` DESC";
			break;
		}
		case "price":{
			$addQ = "`productTotal` ASC";
			break;
		}
		case "price-desc":{
			$addQ = "`productTotal` DESC";
			break;
		}
		default:{
			$addQ = "`productDate` DESC";
			break;
		}
}
$sqlCount = "SELECT * FROM `product` WHERE `productCategory` IN (".$catids.") AND `productLive` = '1' ";
$resultCount = $conn->query($sqlCount);
$size = $resultCount->num_rows;


$sqlFeatured = "SELECT * FROM `product` WHERE `productCategory` IN (".$catids.") AND `productLive` = '1' ORDER BY".$addQ ." LIMIT ".$_GET['last_id'].", 10";
$resultFeatured = $conn->query($sqlFeatured);
$size1 = $resultFeatured->num_rows;
$count = $_GET['last_id'];

		$json = include('shopLoadData.php');

return json_encode($json);

?>