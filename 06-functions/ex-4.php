<?php

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 8;

$person2 = new stdClass();
$person2->name = "Bon";
$person2->surname = "Doe";
$person2->age = 50;

$items = [$person, $person2];

function check (int $i): string{
    if($i>=18){
        return "True";
    }
    return "False";
}
foreach ($items as $person) {
    echo "Is {$person->name} an adult? " . check($person->age) . "<br/>";
}