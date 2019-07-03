<?php
  require 'Contact.class.php';
  $contact = new Contact();
?>

<h1>Contacts</h1>
<a href="add.php">ADD NEW</a><br><br>
<table border="1" width="500">
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th colspan="2">ACTIONS</th>
  </tr>
  <?php
    $list = $contact->getALl();
    foreach ($list as $item) {
      ?>
        <tr>
          <td><?php echo $item['id']; ?></td>
          <td><?php echo $item['name']; ?></td>
          <td><?php echo $item['email']; ?></td>
          <td><a href="edit.php?id=<?php echo $item['id'] ?>">EDIT</a></td>
          <td><a href="delete.php?id=<?php echo $item['id'] ?>">DELETE</a></td>
        </tr>
      <?php
    }
  ?>
</table>
