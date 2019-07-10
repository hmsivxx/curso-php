<?php
class Category extends Model
{
    public function getList()
    {
        $array = [];

        $sql = $this->conn->query("SELECT * FROM categories");

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}
