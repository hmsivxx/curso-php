<?php
  session_start();
  require 'config.php';
  if(isset($_POST['branch']) && !empty($_POST['branch'])){
    $branch = addslashes($_POST['branch']);
    $account = addslashes($_POST['account']);
    $password = addslashes($_POST['password']);

  $sql = $conn->prepare("SELECT * FROM bank WHERE branch = :branch AND account = :account AND password = :password");
    $sql->bindValue(":branch", $branch);
    $sql->bindValue(":account", $account);
    $sql->bindValue(":password", $password);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $sql = $sql->fetch();

      $_SESSION['bank'] = $sql['id'];

      header("Location: index.php");
      exit;
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <fieldset>
      <form method="post">
        Branch:<br>
        <input type="text" name="branch" value=""><br><br>
        Account:<br>
        <input type="text" name="account" value=""><br><br>
        Password:<br>
        <input type="password" name="password" value=""><br><br>
        <input type="submit" name="login" value="LogIn">
      </form>
    </fieldset>
  </body>
</html>
