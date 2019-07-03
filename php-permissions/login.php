<?php
session_start();
require 'config.php';
require 'classes/Users.class.php';

if(isset($_POST['email']) && !empty($_POST['email'])) {
  $email = addslashes($_POST['email']);
  $password = md5($_POST['password']);

  $users = new Users($pdo);

  if($users->logMeIn($email, $password)) {
    header("Location: index.php");
  } else {
    echo "Wrong user or password";
  }
}
?>
<h1>LogIn</h1>
<form method="post">
  Email:<br>
  <input type="email" name="email" placeholder="Email"><br><br>
  Password:<br>
  <input type="password" name="password" placeholder="Password"><br><br>
  <input type="submit" name="login" value="Login">
</form>
