<?php

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;

$person2 = new stdClass();
$person2->name = "John";
$person2->surname = "Doe";
$person2->age = 50;

$items = [$person, $person2];

foreach ($items as $personObject) {
    echo "Name: " . $personObject->name . ", Surname: " . $personObject->surname . ", Age: " . $personObject->age . "<br>";
}