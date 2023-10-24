<?php
$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

echo "Enter the value to search for: ";

// Read user input
$valueToSearch = trim(fgets(STDIN));

// Convert the user input to an integer (assuming you're looking for integer values)
$valueToSearch = intval($valueToSearch);

// Initialize a flag to indicate if the value is found
$found = false;

// Loop through the array to check if the value exists
foreach ($numbers as $number) {
    if ($number === $valueToSearch) {
        $found = true;
        break; // Value found, no need to continue searching
    }
}

// Check and display the result
if ($found) {
    echo "The value $valueToSearch is in the array.";
} else {
    echo "The value $valueToSearch is not in the array.";
}
