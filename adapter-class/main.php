<?php

class Person
{

    private $name;
    private $age;
    
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

class PersonAdapter
{

    private $gender;
    private $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getName()
    {
        return $this->person->getName();
    }

    public function getAge()
    {
        return $this->person->getAge();
    }
}

$person = new Person();
$person->setName("Hermes");
$person->setAge(420);

$dude = new PersonAdapter($person);
$dude->setGender('male');

echo "\nName: ".$dude->getName();
echo "\nAge: ".$dude->getAge();
echo "\nGender: ".$dude->getGender();
echo "\n";
echo "\n";

echo "\nName: ".$person->getName();
echo "\nAge: ".$person->getAge();
echo "\n";