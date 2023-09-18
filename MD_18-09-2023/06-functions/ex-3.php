<?php

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 8;

$person2 = new stdClass();
$person2->name = "John";
$person2->surname = "Doe";
$person2->age = 50;

function check (int $i): string{
    if($i>=18){
        return "True";
    }
return "False";
}

echo check($person2->age);