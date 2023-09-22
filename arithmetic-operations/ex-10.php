<?php

class Circle {
    public static function calculateArea($radius) {
        // Check if the radius is non-negative
        if ($radius >= 0) {
            // Calculate the area using the formula
            $area = M_PI * pow($radius, 2);
            return $area;
        } else {
            // If the radius is negative, return an error message or handle it as needed
            return "Error: Radius should be non-negative.";
        }
    }
}

// Usage example:
$radius = 5; // Replace with your desired radius
$area = Circle::calculateArea($radius);

if (is_numeric($area)) {
    echo "The area of the circle with radius {$radius} is {$area} square units.\n";
} else {
    echo $area . "\n"; // Error message
}
