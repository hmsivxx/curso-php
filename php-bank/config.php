<?php
  try{
    $dbName = "firstDb";
    $dbHost = "localhost";
    $dbUser = "hms";
    $dbPass = "password";

    $PDOconf = "mysql:dbname={$dbName};host={$dbHost}";
    $conn = new PDO($PDOconf, $dbUser, $dbPass);

    echo "Im in";
  } catch (PDOException $e) {
    echo "Deu ruim: " . $e->getMessage();
  }
?>
