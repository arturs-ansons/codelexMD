<?php

$fruits = [
    "apple" => ["weight" => 15],
    "banana" => ["weight" => 12],
    "orange" => ["weight" => 8],
    "grape" => ["weight" => 9]
];

function check (int $i): int{
    if($i>=10){
        return 2;
    }
    return 1;
}

foreach ($fruits as $fruit => $data) {
    $result = check($data["weight"]);
    echo "{$fruit}: Shipping costs = {$result}<br/>";
}
