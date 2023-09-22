<?php

$guns = [
    "colt" => ["license" => 1, "letter" => 'K', "price" => 120],
    "glok" => ["license" => 2, "letter" => 'G', "price" => 140],
    "tt" => ["license" => 3, "letter" => 'T', "price" => 80],
    "legoGun" => ["license" => 4, "letter" => 'L', "price" => 12]
];

$person = new stdClass();
$person->name = "John";
$person->licenses = [1,2,3];
$person->cash = 1555;

$person2 = new stdClass();
$person2->name = "Bon";
$person2->licenses = [4, 3];
$person2->cash = 150;

$per = [$person, $person2];

function canBuyGun($person, $gun): bool
{
    if (in_array($gun["license"], $person->licenses) && $person->cash >= $gun["price"]) {
            return true;
        }
    return false;
}

foreach ($per as $person) {

    foreach ($guns as $gunName => $gun) {
        if (canBuyGun($person, $gun)) {
            echo "{$person->name} can buy {$gunName}.<br/>";
        } else {
            echo "{$person->name} cannot buy {$gunName}.<br/>";
        }
    }

    echo "<br/>";
}
