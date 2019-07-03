<?php
  class User
  {
    private $id;
    private $email;
    private $password;
    private $name;
    public function __construct($i)
    {
      if(!empty($i)) {
        try {
          $this->pdo = new PDO("mysql:dbname=firstDb;host=localhost", "hms", "password");
          echo "deu bom";
        } catch (PDOException $e) {
          echo "error: " . $e.getMessage();
        }
      }
    }

    public function getId()
    {
      return $this->id;
    }


    public function setEmail($email)
    {
      $this->email = $email;
    }

    public function getEmail()
    {
      return $this->email;
    }


    public function setPassword($password)
    {
      $this->password = md5($password);
    }


    public function setName($name)
    {
      $this->name = $name;
    }

    public function getName()
    {
      return $this->name;
    }
  }
$user = new User(1);
?>
