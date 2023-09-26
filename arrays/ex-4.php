<?php


// Create an array of ten integers
$array1 = array();

// Fill the array with ten random numbers (1-100)
for ($i = 0; $i < 10; $i++) {
    $array1[] = rand(1, 100);
}

// Copy the array into another array of the same capacity
$array2 = $array1;

// Change the last value in the first array to -7
$array1[count($array1) - 1] = -7;

// Display the contents of both arrays
echo "Array 1: ";
foreach ($array1 as $value) {
    echo $value . ' ';
}
echo "\n";

echo "Array 2: ";
foreach ($array2 as $value) {
    echo $value . ' ';
}
echo "\n";

