<?php
class Person
{
    private $name;
    private $age;
    
    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new Person();
        }
        return $instance;
    }

    private function __construct()
    {

    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }
}