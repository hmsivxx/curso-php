<?php
require 'config.php';
  if(isset($_POST['name']) && !empty($_POST['name'])){
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $password = md5(addslashes($_POST['password']));

    $sql = "INSERT INTO users SET name = '{$name}', email='{$email}', password='{$password}'";

    if(mysqli_query($conn, $sql)) {
      echo "New record created! <br>";
    }

    mysqli_close($conn);
    header("Location: index.php");
  }
 ?>

<form method="POST">
  Name:<br>
  <input type="text" name="name"><br><br>
  Email:<br>
  <input type="text" name="email"><br><br>
  Password:<br>
  <input type="password" name="password"><br><br>

  <input type="submit" value="Insert">
</form>
