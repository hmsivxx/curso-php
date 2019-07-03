<?php

$dbHost = "localhost";
$dbName = "firstDb";
$dbUser = "hms";
$dbPassword = "password";

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";
