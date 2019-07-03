<?php

class Documents
{
  private $pdo;
  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function getDocuments()
  {
    $arr = array();

    $sql = "SELECT * FROM documents";
    $sql = $this->pdo->query($sql);

    if($sql->rowCount() > 0) {
      $arr = $sql->fetchAll();
    }

    return $arr;
  }
}
