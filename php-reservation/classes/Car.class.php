<?php

class Car
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getCarName()
    {
        $array = array();

        $sql = "SELECT * from cars";
        $sql = $this->conn->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}
