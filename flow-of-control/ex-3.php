<?php

// Read a positive integer from the user
$number = (int)readline("Enter a positive integer: ");

// Check if the entered number is positive
if ($number < 0) {
    echo "Please enter a positive integer.\n";
} else {
    // Convert the number to a string and count the digits
    $digitCount = strlen((string)$number);
echo $digitCount;

}