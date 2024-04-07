<?php
require('config/conn.php');
require('config/function.php');
//echo basename($_SERVER["HTTP_REFERER"]);
$url = strtok(basename($_SERVER["HTTP_REFERER"]), '?');

if($url == "login.php?" || $url == "login.php"){
  if(isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT `id` FROM `admin` WHERE `email` = '$email' OR `phone` = '$email' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
          $user = $row["id"];
          $password = md5($password);
          $sql1 = "SELECT * FROM `admin` WHERE `id` = '$user' AND `password` = '$password' LIMIT 1";
          $result1 = $conn->query($sql1);
          if ($result1->num_rows == 1) {
              while($row1 = $result1->fetch_assoc()) {
                $blocked = $row1["blocked"];
                if($blocked == 0){
                  if(!isset($_SESSION)){
                    session_start();
                  }
                  $email = $row1["email"];
                  $userId = $row1["id"];
                  $comission = $row1["comission"];
                  $gstin = $row1["gstin"];
                  $city = $row1["city"];
                  $name = $row1["name"];

                  $_SESSION["userId"] = $row1["id"];
                  $_SESSION["name"] = $row1["name"];
                  $_SESSION["email"] = $row1["email"];
                  $_SESSION["comission"] = $row1["comission"];
                  $_SESSION["gstin"] = $row1["gstin"];
                  $_SESSION["city"] = $row1["city"];
                  $_SESSION["admin"] = $row1["admin"];
                  

                  $ip = getIpAddress();
                  $system = $_SERVER["HTTP_USER_AGENT"];
                  $sqlUpdate = "INSERT INTO `adminlogintable`(`id`, `user`, `ip`, `system`) VALUES (NULL, '$userId', '$ip', '$system')";
                  $conn->query($sqlUpdate);



                  header('Location: index.php');
                  exit;
                }else{
                  header('Location: login.php?blocked&error');
                  exit;      
                }
              }
          }else{
            header('Location: login.php?error&f');
            exit;
          }
        }
    }else{
      header('Location: login.php?error');
      exit;
    }
  }
}else{
  header('Location: login.php?a');
  exit;
}


?>