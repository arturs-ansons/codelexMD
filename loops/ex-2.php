<?php
echo "Input number of terms: ";
$n = (int)readline();

echo "The powers of numbers from 1 to $n are:\n";

for ($i = 1; $i <= $n; $i++) {
    $result = 1;
    for ($j = 1; $j <= 5; $j++) {
        $result *= $i;
    }
    echo "Number $i raised to the power of $i is: $result\n";
}
