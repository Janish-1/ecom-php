<?php

/*$servername = "localhost";
$username = "onashosw_chandni1";
$password = "Chandni@2018";
$dbname = "onashosw_chandni";
*/
$servername = 'localhost';
$username = "root";
$password = "janish11";
$dbname = "ecomphpdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
