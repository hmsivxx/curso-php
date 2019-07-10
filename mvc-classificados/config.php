<?php

global $conn;
try {
    define("BASE_URL", "http://localhost/curso-php/mvc-classificados/");
    $dbUser = 'hms';
    $dbPass = 'password';
    $dbConfig = "mysql:dbname=classificados;host=Localhost";
    $conn = new PDO($dbConfig, $dbUser, $dbPass);
} catch(PDOEXception $e) {
    echo "Error connecting to the database, ".$e.getMessage();
}
