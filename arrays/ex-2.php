<?php
$numbers = [20, 30, 25, 35, -16, 60, -100];

// Calculate the sum of the numbers
$sum = array_sum($numbers);

// Calculate the average
$count = count($numbers);
$average = $sum / $count;

// Format the average to display two decimal places
$averageFormatted = number_format($average, 2);

echo "Average value: $averageFormatted";
