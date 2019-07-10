<?php
class Category
{
    public function getList()
    {
        $array = [];
        global $conn;

        $sql = $conn->query("SELECT * FROM categories");
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}
