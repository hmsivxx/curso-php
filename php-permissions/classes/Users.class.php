<?php

class Users
{
  private $pdo;
  private $id;
  private $permissions;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function logMeIn($email, $password)
  {
    $sql = "SELECT * FROM user where email = :email AND password = :password";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":password", $password);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $sql = $sql->fetch();
      $_SESSION['logged'] = $sql['id'];
      return true;
    } else {
      return false;
    }
  }

  public function setUser($id) {
    $this->id = $id;

    $sql = "SELECT * FROM user WHERE :id = id";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $sql = $sql->fetch();
      $this->permissions = explode(",", $sql['permissions']);
    }
  }

  public function getPermissions()
  {
    return $this->permissions;
  }

}
