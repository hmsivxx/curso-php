<?php
  require 'Contact.class.php';
  $contact = new Contact();

  if(!empty($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if(!empty($email)){
      $contact->editContact($name, $email, $id);
    }

    header("Location: index.php");
  }
