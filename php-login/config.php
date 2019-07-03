<?php

$dbName = "firstDb";
$dbHost = "localhost";
$dbUser = "hms";
$dbPassword = "password";

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

if($conn->connect_error){
  die("Connect failed: " . $conn->connect_error);
}

echo "Successfully connected to the database<br>";

?>
