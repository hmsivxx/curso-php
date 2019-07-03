<?php
  require 'Contact.class.php';
  $contact = new Contact();

  if(!empty($_POST['email'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];

    $contact->addContact($email, $name);

    header("Location: index.php");
  }
