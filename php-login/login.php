<?php
  require 'config.php';
  session_start();

  if(isset($_POST['email']) && !empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";

    $result = $conn->query($sql);
    if($result->num_rows > 0){
      $data = $result->fetch_assoc();
      $_SESSION['id'] = $data['id'];
      header("Location: index.php");

    } else {
      echo "DEU RUIM";
    }
  }
 ?>

Pagina de Login:

<form method="POST">
  Email:<br>
  <input type="email" name="email" value="" placeholder="Email"><br><br>

  Password:<br>
  <input type="password" name="password" value="" placeholder="Password"><br><br>

  <input type="submit" name="login" value="LogIn">
</form>
