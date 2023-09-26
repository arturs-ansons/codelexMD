<?php
$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];
echo "Original numeric array: ";
echo implode(', ', $numbers);
echo "\n";
// Sort the numeric array
sort($numbers);

// Echo the sorted numeric array
echo "Sorted numeric array: ";
echo implode(', ', $numbers);
echo "\n";

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

// Echo the original string array
echo "Original string array: ";
echo implode(', ', $words);
echo "\n";

// Sort the string array
sort($words);

// Echo the sorted string array
echo "Sorted string array: ";
echo implode(', ', $words);
