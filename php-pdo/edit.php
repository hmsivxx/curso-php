<?php

  require 'config.php';

  $id = 0;
  if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
  }

  if(isset($_POST['name']) && !empty($_POST['name'])) {
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);

    $sql = "UPDATE users SET name = '{$name}', email = '{$email}' WHERE id = '{$id}'";
    if(mysqli_query($conn, $sql)){
      header("Location: index.php?updated=true");
      echo "Register successfully updated";
    } else {
      header("Location: index.php?updated=false");

    }
  }


    $sql = "SELECT * FROM users WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      $data = mysqli_fetch_assoc($result);
    } else {
      header("Location: index.php");
    }


?>

<form method="POST">
  Name:<br>
  <input type="text" name="name" value="<?php echo $data['name'];?>"><br><br>
  Email:<br>
  <input type="text" name="email" value="<?php echo $data['email'];?>"><br><br>

  <input type="submit" value="Update">
</form>
