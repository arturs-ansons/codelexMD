<?php
$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->hours = 40;

$person2 = new stdClass();
$person2->name = "Bon";
$person2->surname = "Poe";
$person2->hours = 61;

$person3 = new stdClass();
$person3->name = "Ben";
$person3->surname = "Afleck";
$person3->hours = 35;

$person4 = new stdClass();
$person4->name = "Peter";
$person4->surname = "Pen";
$person4->hours = 58;

$per = [$person, $person2, $person3, $person4];

function clcPay($person) {
    $basePay = 8;
    $overtime = 1.5;

    if ($person->hours < 40) {
        return "Error: Working hours are less than 40.";
    } elseif ($person->hours > 60) {
        return "Error: Working hours are greater than 60.";
    } else {
        return (40 * $basePay) + (($person->hours - 40) * $basePay * $overtime);
    }
}

foreach ($per as $person) {
    $pay = clcPay($person);

    if (is_numeric($pay)) {
        echo "{$person->name} can earn $" . number_format($pay, 2) . ".<br/>";
    } else {
        echo "{$person->name}: $pay<br/>";
    }

    echo "<br/>";
}
