<?php

try {
    $dbUser = "hms";
    $dbPass = "password";
    $dns = "mysql:dbname=firstDb;host=localhost";
    $conn = new PDO($dns, $dbUser, $dbPass);
    echo "connected to the database";
} catch (PDOException $e) {
    echo "connection to database failed" . $e->getMessage();
}
