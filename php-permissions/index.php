<?php

session_start();
require 'config.php';
require 'classes/Users.class.php';
require 'classes/Documents.class.php';

if(!isset($_SESSION['logged'])) {
  header("Location: login.php");
  exit;
}

$users = new Users($pdo);
$users->setUser($_SESSION['logged']);

$documents = new Documents($pdo);
$list = $documenzzseets->getDocuments();
?>
<h1>You are in</h1>

<table border="1" style="border-collapse: collapse">
  <tr>
    <th>File name</th>
    <th>Actions</th>
  </tr>

    <?php
    foreach($list as $item) {
      echo "<tr>";
      echo "<td>{$item['title']}</td>";
      echo "<td>";
      echo "<a href='#'>Edit</a>";
      echo "<a href='#'>Delete</a>";
      echo "</td>";
      echo "</tr>";
    }
    ?>

</table>
