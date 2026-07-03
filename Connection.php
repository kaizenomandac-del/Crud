<?php
$host = "0.0.0.0:3306";
$user = "root";
$pass = "root";
$db = "Agile";
 
$conn = mysqli_connect($host, $user, $pass, $db);
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>