<?php

try {
    $dbUser = "hms";
    $dbPass = "password";
    $dns = "mysql:dbname=firstDb;host=localhost";
    $conn = new PDO($dns, $dbUser, $dbPass);
    echo "connected";
} catch (PDOException $e) {
    echo "Error on database: ".$e->getMessage();
}
