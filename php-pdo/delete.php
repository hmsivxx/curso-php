<?php
  require 'config.php';

  if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);

    $sql = "DELETE FROM users WHERE id = '{$id}'";

    if(mysqli_query($conn, $sql)){
      header("Location: index.php");
      echo "Register successfully deleted";
    } else {
      header("Location: index.php");
      echo "Register cannot been deleted";
    }
  } else {
    header("Location: index.php");
  }

  mysqli_close($conn);

 ?>
