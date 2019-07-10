<?php

class Offers extends Model
{

    public function getQuantity()
    {
        $sql = "SELECT COUNT(*) as c FROM offers";
        $sql = $this->conn->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql['c'];
        } else {
            return 0;
        }
    }

    public function getTotalSales()
    {
        $totalSales = 520;

        return $totalSales;
    }
}