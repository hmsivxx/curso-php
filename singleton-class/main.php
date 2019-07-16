<?php
require 'Person.php';

$dude = Person::getInstance();

$dude->setName("Hermes");

print_r($dude->getName());

echo "\n\n";

$dude2 = Person::getInstance();

echo "I am dude 2, my name is also ".$dude2->getName();

$dude2->setAge(420);

echo "\n\n";

echo "I am the first dude, I am ".$dude->getAge()." years old\n";