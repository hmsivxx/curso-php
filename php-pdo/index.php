<?php
  require 'config.php';
 ?>
<a href="add.php">ADD USER</a>
<table border="0" width="100%">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Actions</th>
  </tr>
  <?php
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td><a href="edit.php?id='.$row['id'].'">EDIT</a> - <a href="delete.php?id='.$row['id'].'">DELETE</a></td>';
        echo '</tr>';
      }
    } else {
      echo "No results found on database.";
    }

    mysqli_close($conn);
   ?>
</table>
