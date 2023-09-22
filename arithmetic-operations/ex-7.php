<?php

// Constants
$initialVelocity = 0; // Initial velocity in m/s
$accelerationDueToGravity = -9.81; // Acceleration due to gravity in m/s^2 (approx. -9.81 m/s^2 on Earth)

// Time in seconds
$time = 10;

// Calculate the position using the formula: position = initialVelocity * time + (1/2) * acceleration * time^2
$position = 0 * 10 + (1/2) * (-9.81) * pow(10, 2);

// Output the position
echo "The position of the object after falling for {$time} seconds is {$position} meters.\n";

