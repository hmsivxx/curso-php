<?php
  try {
    $dbName = "firstDb";
    $dbHost = "localhost";
    $dbUser = "hms";
    $dbPassword = "password";

    $PDOconfig = "mysql:dbname={$dbName};host={$dbHost}";

    $conn = new PDO($PDOconfig, $dbUser, $dbPassword);
    echo "Connected";
  } catch(PDOException $e){
    echo "Error connecting to the database: " . $e->getMessage();
  }

  if(isset($_POST['name']) && !empty($_POST['name'])){
    $name = addslashes($_POST['name']);
    $comment = addslashes($_POST['comment']);

    $sql = $conn->prepare("INSERT INTO comments SET name=:name, comment = :comment, comment_date = NOW()");
    $sql->bindValue(":name", $name);
    $sql->bindValue(":comment", $comment);
    $sql->execute();
  }
 ?>

<fieldset>
  <form method="post">
    Name: <br>
    <input type="text" name="name" value=""><br><br>
    Messsage: <br>
    <textarea name="comment" rows="8" cols="80"></textarea><br><br>


    <input type="submit" name="send" value="Send">
  </form>
</fieldset>
<br><br>

<?php
  $sql = "SELECT * FROM comments ORDER BY comment_date DESC";
  $sql = $conn->query($sql);

  if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $message){
?>
    <strong><?php echo $message['name'] ?></strong><br>
    <?php echo $message['comment'] ?>
    <hr>
<?php
    }
  } else {
    echo "No comments.";
  }
?>
