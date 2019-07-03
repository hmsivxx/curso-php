<?php
  session_start();
  require 'config.php';

  if(isset($_POST['btnAdd'])) {
    $type = $_POST['type'];
    $value = $_POST['value'];

    $sql = $conn->prepare("INSERT INTO bank_history SET account_id = :account_id, type = :type, value = :value, trans_date = NOW()");
    $sql->bindValue(":account_id", $_SESSION['bank']);
    $sql->bindValue(":type", $type);
    $sql->bindValue(":value", $value);
    $sql->execute();

    if($type == '0') { //deposit
      $sql = $conn->prepare("UPDATE bank SET balance = balance + :value WHERE id = :id");
      $sql->bindValue(":value", $value);
      $sql->bindValue(":id", $_SESSION['bank']);
      $sql->execute();
    } else { //debit
      $sql = $conn->prepare("UPDATE bank SET balance = balance - :value WHERE id = :id");
      $sql->bindValue(":value", $value);
      $sql->bindValue(":id", $_SESSION['bank']);
      $sql->execute();
    }
    header("Location: index.php");
  }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form method="post">
      Transaction Type:<br>
      <select name="type">
        <option value="0">Deposit</option>
        <option value="1">Debit</option>
      </select>

      Value:<br>
      <input type="text" name="value" pattern="[0-9,.]{1,}">
      <input type="submit" name="btnAdd" value="Add">
     </form>
   </body>
 </html>
