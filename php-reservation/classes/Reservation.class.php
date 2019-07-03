<?php

class Reservation
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getReservation($startDate, $endDate)
    {
        $array = array();

        $sql = "SELECT * FROM reserves WHERE
                (NOT (start_date > :endDate OR end_date < :startDate))";
        $sql = $this->conn->prepare($sql);
        $sql->bindvalue(":startDate", $startDate);
        $sql->bindvalue(":endDate", $endDate);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function checkAvailability($carId, $startDate, $endDate)
    {
        $sql = "SELECT * FROM reserves WHERE id_car = :carId AND
                (NOT (start_date > :endDate OR end_date < :startDate))";
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(":carId", $carId);
        $sql->bindValue(":startDate", $startDate);
        $sql->bindValue(":endDate", $endDate);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function reserve($carId, $startDate, $endDate, $customerName)
    {
        $sql = "INSERT INTO reserves SET id_car = :carId, start_date = :startDate, end_date = :endDate, customer = :customerName";
        var_dump($carId);
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(":carId", $carId);
        $sql->bindValue(":startDate", $startDate);
        $sql->bindValue(":endDate", $endDate);
        $sql->bindValue(":customerName", $customerName);
        $sql->execute();
    }
}
