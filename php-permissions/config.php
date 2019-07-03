<?php

try {
  $dsn = "mysql:dbname=firstDb;host=localhost";
  $user = "hms";
  $pass = "password";
  $pdo = new PDO($dsn, $user, $pass);
  echo "Connected to the database";
} catch(PDOException $err) {
  die("Fail to connect to the database" . $err->getMessage());
}
