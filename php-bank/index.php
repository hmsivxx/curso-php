<?php
  session_start();
  require 'config.php';
  if(isset($_SESSION['bank']) && !empty($_SESSION['bank'])) {
    $id = $_SESSION['bank'];

    $sql = $conn->prepare("SELECT * FROM bank WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount()){
      $info = $sql->fetch();
    } else {
      header("Location: login.php");exit;
    }
  } else {
    header("Location: login.php");exit;
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ATM</title>
  </head>
  <body>
    <h1>Stoner ATM</h1>
    Branch: <?php echo $info['branch']; ?><br>
    Account: <?php echo $info['account']; ?><br>
    Balance: <?php echo $info['balance']; ?><br>
    <a href="exit.php">Exit</a>
    <hr>
    <h3>In / Out</h3>

    <a href="add-transaction.php">Add transaction</a>

    <table border="1" width="400"><br><br>
      <tr>
        <th>Date</th>
        <th>Value</th>
      </tr>
      <?php
        $sql = $conn->prepare("SELECT * FROM bank_history WHERE account_id = :account_id");
        $sql->bindValue("account_id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
          foreach($sql->fetchAll() as $item){
            ?>
            <tr>
              <td><?php echo date('d/m/Y H:i', strtotime($item['trans_date'])); ?></td>
              <td>
                <?php
                  if($item['type'] == '0') {
                    echo "<span style='color:green'>+$".$item['value']."</span>";
                  } else {
                    echo "<span style='color:red'>-$".$item['value']."</span>";
                  }
                ?>
              </td>
            </tr>
            <?php
          }
        }
       ?>
    </table>
  </body>
</html>
