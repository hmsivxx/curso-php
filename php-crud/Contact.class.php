<?php
  class Contact
  {
    private $conn;

    public function __construct()
    {
      $this->conn = new PDO("mysql:dbname=firstDb;host:localhost", "hms", "password");
    }

    public function addContact($email, $name)
    {
      if(!$this->checkEmail($email)) {
        $sql = "INSERT INTO contact SET name = :name, email = :email";
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":email", $email);
        $sql->execute();

        return true;
      } else {
        return false;
      }
    }

    public function getInfo($id)
    {
      $sql = "SELECT * FROM contact WHERE id = :id";
      $sql = $this->conn->prepare($sql);
      $sql->bindValue(":id", $id);
      $sql->execute();


      if($sql->rowCount() > 0) {
        return $sql->fetch();
      } else {
        return array();
      }
    }

    public function getAll()
    {
      $sql = "SELECT * FROM contact";
      $sql = $this->conn->query($sql);

      if($sql->rowCount() > 0) {
        return $sql->fetchAll();
      } else {
        return array();
      }
    }

    public function editContact($name, $email, $id)
    {
        if(!$this->checkEmail($email)){
          $sql = "UPDATE contact set name = :name, email = :email WHERE id = :id";
          $sql = $this->conn->prepare($sql);
          $sql->bindValue(":name", $name);
          $sql->bindValue(":email", $email);
          $sql->bindValue(":id", $id);
          $sql->execute();

          return true;
        } else {
          return false;
        }
    }

    public function deleteByEmail($email)
    {
      if($this->checkEmail($email)) {
        $sql = "DELETE FROM contact WHERE email = :email";
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        return true;
      } else {
        return false;
      }
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM contact WHERE id = :id";
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }


    private function checkEmail($email)
    {
      $sql = "SELECT * FROM contact WHERE email = :email";
      $sql = $this->conn->prepare($sql);
      $sql->bindValue(":email", $email);
      $sql->execute();

      if($sql->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }

  }

?>
