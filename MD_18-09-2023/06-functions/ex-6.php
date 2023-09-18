<?php

$array = [11,12,78,12.4,"Toto"];

$arrayCount = count($array);

function doubleInteger($number): string {
    if (is_int($number)) {
        return "Integers doubled: " . $number * 2;
    }
    return "Not integers: " . $number;
}

echo " Count of elements in array: " . $arrayCount . "<br/>";

for ($i = 0; $i < $arrayCount; $i++) {
    $doubled = doubleInteger($array[$i]);
    echo $doubled . "<br/>";

}








