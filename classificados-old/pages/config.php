<?php
session_start();
global $conn;
try {
    $dbUser = "hms";
    $dbPass = "password";
    $dns = "mysql:dbname=classificados;host=Localhost";
    $conn = new PDO($dns, $dbUser, $dbPass);
    #echo "Successfuly connected to the database";
} catch(PDOException $e) {
    echo "<div class='alert alert-danger'>Connection to the database failed, ".$e->getMessage()."</div>";
}
