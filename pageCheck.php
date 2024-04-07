<?php

$page = basename($_SERVER['PHP_SELF']);
$page = str_replace('.php', "", $page);
    switch($page){
        case "index": {
            break;
        }
        case "shop": {

            if(isset($_GET['catid']) && !empty($_GET['catid'])){
                $caturl = mysqli_real_escape_string($conn,$_GET['catid']);
                $caturl = input($caturl);
                $caturl= strtolower($caturl);
                $sqlnews10 = "SELECT `id` FROM `productcategories` WHERE `categoryUrl` = '$caturl' OR `id` = '$caturl' LIMIT 1";
                $resultnews10 = $conn->query($sqlnews10);
                if ($resultnews10->num_rows <= 0) {
                    header("HTTP/1.1 301 Moved Permanently");
                    header('Location: index.php');
                    exit();
                }
            }else{
                header("HTTP/1.1 301 Moved Permanently");
                header('Location: index.php');
                exit();
            }
            break;
        }
        case "product":{
            if(isset($_GET['producturl']) && !empty($_GET['producturl'])){
                $producturl = mysqli_real_escape_string($conn,$_GET['producturl']);
                $producturl = input($producturl);
                $producturl= strtolower($producturl);
                $sqlnews10 = "SELECT `id` FROM `product` WHERE `metaUrl` = '$producturl' OR `id` = '$producturl' LIMIT 1";
                $resultnews10 = $conn->query($sqlnews10);
                if ($resultnews10->num_rows <= 0){
                    header('Location: index.php');
                    exit();
                }
            }else{
                header('Location: index.php');
                exit();
            }
            break;
        }
        case "cart":{
            if(!isset($_GET["sessionId"])){
                echo "<script>";
                echo "if(localStorage.getItem('uniqueVisitorId')){";
                echo "var uniqueVisitorId = localStorage.getItem('uniqueVisitorId');";
                echo "location.replace('cart.php?sessionId='+uniqueVisitorId+'&opration='+btoa(btoa(uniqueVisitorId)+btoa(uniqueVisitorId)));}";
                echo "</script>";
            }
            break;
        }
        case "checkout":{
            if(!isset($_GET["sessionId"])){
                echo "<script>";
                echo "if(localStorage.getItem('uniqueVisitorId')){";
                echo "var uniqueVisitorId = localStorage.getItem('uniqueVisitorId');";
                echo "location.replace('checkout.php?sessionId='+uniqueVisitorId+'&opration='+btoa(btoa(uniqueVisitorId)+btoa(uniqueVisitorId)));}";
                echo "</script>";
            }
            if(!isset($_SESSION["userId"]) && !isset($_SESSION["userKey"]) && !isset($_SESSION["localId"])){
                echo "<script>";
                echo "if(localStorage.getItem('uniqueVisitorId')){";
                echo "var uniqueVisitorId = localStorage.getItem('uniqueVisitorId');";
                echo "location.replace('login.php?sessionId='+uniqueVisitorId+'&refPage=checkout.php&opration='+btoa(btoa(uniqueVisitorId)+btoa(uniqueVisitorId)));}";
                echo "</script>";   
            }
            break;
        }
        case "login":{
            if(!isset($_GET["sessionId"])){
                echo "<script>";
                echo "if(localStorage.getItem('uniqueVisitorId')){";
                echo "var uniqueVisitorId = localStorage.getItem('uniqueVisitorId');";
                echo "location.replace('login.php?sessionId='+uniqueVisitorId+'&opration='+btoa(btoa(uniqueVisitorId)+btoa(uniqueVisitorId)));}";
                echo "</script>";
            }
            if(isset($_SESSION["userId"]) && isset($_SESSION["userKey"]) && isset($_SESSION["localId"]) && !empty($_SESSION["userId"]) && !empty($_SESSION["userKey"]) && !empty($_SESSION["localId"])){
                echo "<script>";
                echo "if(localStorage.getItem('uniqueVisitorId')){";
                echo "var uniqueVisitorId = localStorage.getItem('uniqueVisitorId');";
                echo "location.replace('myaccount.php?sessionId='+uniqueVisitorId+'&opration='+btoa(btoa(uniqueVisitorId)+btoa(uniqueVisitorId)));}";
                echo "</script>";   
            }
            break;
        }
    }

?>