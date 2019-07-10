<?php

class Model
{

    public function __construct()
    {
        global $conn;

        $this->conn = $conn;
    }
}