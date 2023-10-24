<?php

$numbers = [];

for ($i = 1; $i <= 3; $i++) {
    $num = (int)readline("Input the $i number: ");
    $numbers[] = $num;
}

$highestNumber = max($numbers);

echo "The highest number is: $highestNumber\n";
