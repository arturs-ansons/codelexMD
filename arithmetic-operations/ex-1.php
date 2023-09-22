<?php

function isFifteen($num1, $num2) {
    // Check if either one is 15
    if ($num1 == 15 || $num2 == 15) {
        return true;
    }

    // Check if their sum or difference is 15
    if ($num1 + $num2 == 15 || abs($num1 - $num2) == 15) {
        return true;
    }

    // None of the conditions above were met
    return false;
}

// Example usage:
$num1 = 10;
$num2 = 5;

if (isFifteen($num1, $num2)) {
    echo "True";
} else {
    echo "False";
}

