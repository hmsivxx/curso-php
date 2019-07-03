<?php
  require 'Contact.class.php';
  $contact = new Contact();

  if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $info = $contact->getInfo($id);

    if(empty($info['email'])) {
      header("Location: index.php");
      exit;
    }
  } else {
    header("Location: index.php");
  }
?>

<h1>Edit Contact</h1>

<form action="editContact.php" method="post">
  <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
  Name:<br>
  <input type="text" name="name" value="<?php echo $info['name']; ?>"><br><br>
  EMail:<br>
  <input type="text" name="email" value="<?php echo $info['email'] ?>"><br><br>
  <input type="submit" name="btnEdit" value="Save">
</form>
